<?php
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Import {

	public static $post_types = [];
	public static $plugins = [
		'filebird' => [
			'name'        => 'FileBird (v4)',
			'taxonomy'    => 'filebird', // Uses custom db table
			'folders'     => [],
			'attachments' => [],
		],

		'enhanced-media-library' => [
			'name'        => 'Enhanced Media Library',
			'taxonomy'    => 'media_category',
			'folders'     => [],
			'attachments' => [],
		],

		'folders' => [
			'name'        => 'Folders (by Premio)',
			'taxonomy'    => 'media_folder',
			'folders'     => [],
			'attachments' => [],
		],

		'wicked-folders' => [
			'name'        => 'Wicked Folders',
			'taxonomy'    => 'wf_attachment_folders',
			'folders'     => [],
			'attachments' => [],
		],


		'real-media-library' => [
			'name'        => 'Real Media Library (by DevOwl)',
			'taxonomy'    => 'rml', // Uses custom db table
			'folders'     => [],
			'attachments' => [],
		],

		'wp-media-folder' => [
			'name'        => 'WP Media Folder (by JoomUnited)',
			'taxonomy'    => 'wpmf-category',
			'folders'     => [],
			'attachments' => [],
		],
	];

  public function __construct() {
		add_action( 'init', [$this, 'get_plugins_data'] );

		// Enhanced Media Library, Wicked Folders, Folders (by Premio): Use custom taxonomy term
		add_action( 'wp_ajax_happyfiles_import_3rd_party_terms', [$this, 'import_3rd_party_terms'] );
		add_action( 'wp_ajax_happyfiles_delete_3rd_party_terms', [$this, 'delete_3rd_party_terms'] );

		// FileBird: Uses it's own db tables for folders
		add_action( 'wp_ajax_happyfiles_import_terms_from_table', [$this, 'import_terms_from_table'] );
		add_action( 'wp_ajax_happyfiles_delete_terms_from_table', [$this, 'delete_terms_from_table'] );
	}

	/**
	 * Get folders and attachments data from third-party plugins to import/delete their data
	 */
	public function get_plugins_data() {
		if (
			( ! isset( $_GET['page'] ) || ( isset( $_GET['page'] ) && $_GET['page'] !== 'happyfiles_settings' ) ) && // Run on HappyFiles Settings page
			( ! isset( $_POST['plugin'] ) && ! wp_doing_ajax() ) && // Run on import/delete third-party plugin data via AJAX
			get_option( 'happyfiles_hide_import_folders_notification', false ) // Run when "Import folders" admin notification hasn't been dismissed
		) {
			return;
		}

		self::$post_types = array_keys( get_post_types( ['show_ui' => true] ) );

		// Get plugins folder and attachments data to import into HappyFiles
		foreach ( self::$plugins as $slug => $plugin_data ) {
			$taxonomy = $plugin_data['taxonomy'];

			if ( $slug === 'wicked-folders' ) {
				// Run for all registered post types
				$folders = [];

				foreach ( self::$post_types as $post_type ) {
					$wicked_folders = self::get_folders( 'wf_' . $post_type . '_folders', $slug );

					if ( is_array( $wicked_folders ) ) {
						$folders = array_merge( $folders, $wicked_folders );
					}
				}
			}

			else {
				$folders = self::get_folders( $taxonomy, $slug );
			}

			if ( in_array( $taxonomy, ['filebird', 'rml'] ) ) {
				$folders = is_array( $folders ) && count( $folders ) ? self::map_folders( $taxonomy, $folders ) : [];
			}

			self::$plugins[$slug]['folders'] = $folders;

			$attachments = is_array( $folders ) && count( $folders ) ? self::get_attachments( $taxonomy, $folders ) : [];

			if ( in_array( $taxonomy, ['filebird', 'rml'] ) ) {
				$attachments = self::map_attachments( $taxonomy, $attachments );
			}

			self::$plugins[$slug]['attachments'] = $attachments;
		}
	}

	/**
	 * Get folders from third-party plugins
	 */
	public static function get_folders( $taxonomy, $slug ) {
		global $wpdb;

		// FileBird has its own db table
		if ( $taxonomy === 'filebird' ) {
			$filebird_folders_table = $wpdb->prefix . 'fbv';

			// Get FileBird folders (order by 'parent' to create parent categories first)
			if ( $wpdb->get_var( "SHOW TABLES LIKE '$filebird_folders_table'") == $filebird_folders_table ) {
				return $wpdb->get_results( "SELECT * FROM $filebird_folders_table ORDER BY parent ASC" );
			}
		}

		// Real Media Library has its own db table
		else if ( $taxonomy === 'rml' ) {
			$rml_folders_table = $wpdb->prefix . 'realmedialibrary';

			// Get FileBird folders (order by 'parent' to create parent categories first)
			if ( $wpdb->get_var( "SHOW TABLES LIKE '$rml_folders_table'") == $rml_folders_table ) {
				return $wpdb->get_results( "SELECT * FROM $rml_folders_table ORDER BY parent ASC" );
			}
		}

		// Default: Plugins with custom taxonomy terms
		else {
			$folders = $wpdb->get_results(
					"SELECT * FROM " . $wpdb->term_taxonomy . "
					LEFT JOIN  " . $wpdb->terms . "
					ON  " . $wpdb->term_taxonomy . ".term_id =  " . $wpdb->terms . ".term_id
					WHERE " . $wpdb->term_taxonomy . ".taxonomy = '" . $taxonomy . "'
					ORDER BY parent ASC"
			);

			// WP Media Folder (JoomUnited): Remove root folder
			if ( $slug === 'wp-media-folder' ) {
				foreach ( $folders as $index => $folder ) {
					if ( $folder->slug === 'wp-media-folder-root' ) {
						unset( $folders[$index] );
					}
				}
			}

			return array_values( $folders );
		}
	}

	/**
	 * Get categorized attachments from third-party plugins
	 */
	public static function get_attachments( $taxonomy, $folders ) {
		global $wpdb;

		// FileBird has its own db table
		if ( $taxonomy === 'filebird' ) {
			$filebird_attachments_table = $wpdb->prefix . 'fbv_attachment_folder';

			// Get FileBird attachments (order by 'folder_id')
			if ( $wpdb->get_var( "SHOW TABLES LIKE '$filebird_attachments_table'") == $filebird_attachments_table ) {
				return $wpdb->get_results( "SELECT * FROM $filebird_attachments_table ORDER BY folder_id ASC" );
			}
		}

		// Real Media Library has its own db table
		else if ( $taxonomy === 'rml' ) {
			$rml_attachments_table = $wpdb->prefix . 'realmedialibrary_posts';

			// Get FileBird folders (order by 'parent' to create parent categories first)
			if ( $wpdb->get_var( "SHOW TABLES LIKE '$rml_attachments_table'") == $rml_attachments_table ) {
				return $wpdb->get_results( "SELECT * FROM $rml_attachments_table ORDER BY fid ASC" );
			}
		}

		// Default: Plugins with custom taxonomy terms
		else {
			return $wpdb->get_results(
				"SELECT  " . $wpdb->term_relationships . ".object_id,
				" . $wpdb->term_relationships . ".term_taxonomy_id
				FROM " . $wpdb->term_relationships . "
				WHERE " . $wpdb->term_relationships . ".term_taxonomy_id IN (" . implode( ',', array_column( $folders, 'term_id' ) ) . ")"
			);
		}
	}

	/**
	 * Map folders to import folders from plugins that use their own db table: FileBird, Real Media Library
	 */
	public static function map_folders( $taxonomy, $folders ) {
		$mapped_folders = [];

		foreach ( $folders as $folder ) {

			// FileBird, Real Media Library
			if ( $taxonomy === 'filebird' || $taxonomy === 'rml' ) {
				$folder_object = new \stdClass();

				$folder_object->name = $folder->name;
				$folder_object->id = intval( $folder->id );
				$folder_object->parent = intval( $folder->parent );
				$folder_object->position = intval( $folder->ord );

				$mapped_folders[] = $folder_object;
			}

		}

		return $mapped_folders;
	}

	/**
	 * Map attachments to import attachments from plugins that use their own db table: FileBird, Real Media Library
	 */
	public static function map_attachments( $taxonomy, $attachments ) {
		$mapped_attachments = [];

		foreach ( $attachments as $folder ) {

			// FileBird
			if ( $taxonomy === 'filebird' ) {
				$folder_object = new \stdClass();

				$folder_object->folder_id = intval( $folder->folder_id );
				$folder_object->attachment_id = intval( $folder->attachment_id );

				$mapped_attachments[] = $folder_object;
			}

			// Real Media Library
			if ( $taxonomy === 'rml' ) {
				$folder_object = new \stdClass();

				$folder_object->folder_id = intval( $folder->fid );
				$folder_object->attachment_id = intval( $folder->attachment );

				$mapped_attachments[] = $folder_object;
			}

		}

		return $mapped_attachments;
	}

	/**
	 * Import custom taxonomy terms from third-party plugins
	 */
	public function import_3rd_party_terms() {
		$plugin = isset( $_POST['plugin'] ) ? $_POST['plugin'] : false;
		$folders = isset( self::$plugins[$plugin]['folders'] ) ? self::$plugins[$plugin]['folders'] : [];
		$attachments = isset( self::$plugins[$plugin]['attachments'] ) ? self::$plugins[$plugin]['attachments'] : [];

		// wp_send_json_success( [
		// 	'plugin'      => $plugin,
		// 	'folders'     => $folders,
		// 	'attachments' => $attachments,
		// ] );

		$new_cat_by_id = [];
		$folders_imported = [];
		$attachments_imported = [];

		// STEP: Create HF categories from plugin folders
		foreach ( $folders as $folder ) {
			$folder_id = $folder->term_id;
			$parent = intval( $folder->parent );
			$taxonomy = HAPPYFILES_TAXONOMY;

			// Get correct taxonomy of folder to import by post type (e.g. 'wf_page_folders')
			foreach ( self::$post_types as $post_type ) {
				if ( strpos( $folder->taxonomy, $post_type ) !== false ) {
					$taxonomy = $post_type === 'attachment' ? HAPPYFILES_TAXONOMY : 'hf_cat_' . $post_type;
				}
			}

			if ( $parent && isset( $new_cat_by_id[$parent]['term_id'] ) ) {
				$parent = intval( $new_cat_by_id[$parent]['term_id'] );
			}

			// Create new HF term from plugin folder
			$new_hf_term = wp_insert_term( $folder->name, $taxonomy, ['parent' => $parent] );

			// Skip if category couldn't be created
			if ( is_wp_error( $new_hf_term ) ) {
				continue;
			}

			// Save HF position as term meta (Plugins: Folders)
			if ( in_array( $plugin, ['folders'] ) ) {
				$position_meta_key = false;

				switch ( $plugin ) {
					case 'folders':
						$position_meta_key = 'wcp_custom_order';
					break;
				}

				$position = get_term_meta( $folder_id, $position_meta_key, true );

				if ( $position_meta_key && $position !== '' ) {
					update_term_meta( $new_hf_term['term_id'], HAPPYFILES_POSITION, $position );
				}
			}

			$folders_imported[] = $new_hf_term;

			$new_cat_by_id[$folder_id] = [
				'term_id' => $new_hf_term['term_id'],
				'parent'  => $parent,
				'name'    => $folder->name,
			];
		}

		// STEP: Assign plugin categories to HF categories
		foreach ( $attachments as $attachment ) {
			$hf_category_id = isset( $new_cat_by_id[$attachment->term_taxonomy_id]['term_id'] ) ? intval( $new_cat_by_id[$attachment->term_taxonomy_id]['term_id'] ) : 0;
			$attachment_id = isset( $attachment->object_id ) ? intval( $attachment->object_id ) : 0;

			if ( ! $hf_category_id || ! $attachment_id ) {
				continue;
			}

			// Get attachment taxonomy by post type
			$post_type = get_post_type( $attachment_id );
			$taxonomy = $post_type === 'attachment' ? HAPPYFILES_TAXONOMY : 'hf_cat_' . $post_type;

			$term_ids = wp_get_object_terms( $attachment_id, $taxonomy, ['fields' => 'ids'] );
			$term_ids[] = $hf_category_id;

			$term_set = wp_set_object_terms( $attachment_id, $term_ids, $taxonomy );

			if ( is_wp_error( $term_set ) ) {
				continue;
			}

			$attachments_imported[] = [
				'cat_id'   => $hf_category_id,
				'term_ids' => $term_ids,
				'set'      => $term_set,
			];
		}

		wp_send_json_success( [
			'folders_imported'     => $folders_imported,
			'attachments_imported' => $attachments_imported,
			'message'              => sprintf(
				esc_html__( '%s folders imported and %s attachments categorized.', 'happyfiles' ),
				count( $folders_imported ) . '/' . count( $folders ),
				count( $attachments_imported ) . '/' . count( $attachments )
			),
		] );

	}

	/**
	 * Delete custom taxonomy terms from third-party plugins
	 */
	public function delete_3rd_party_terms() {
		global $wpdb;

		$plugin = isset( $_POST['plugin'] ) ? $_POST['plugin'] : false;
		$folders = isset( self::$plugins[$plugin]['folders'] ) ? self::$plugins[$plugin]['folders'] : [];
		$attachments = isset( self::$plugins[$plugin]['attachments'] ) ? self::$plugins[$plugin]['attachments'] : [];

		$deleted = [];

		foreach ( $folders as $folder ) {
			$term_id = intval( $folder->term_id );

			if ( $term_id ) {
				$deleted[$term_id]['term_relationships'] = $wpdb->delete( $wpdb->prefix . 'term_relationships', ['term_taxonomy_id' => $term_id] );
				$deleted[$term_id]['term_taxonomy'] = $wpdb->delete( $wpdb->prefix . 'term_taxonomy', ['term_id' => $term_id] );
				$deleted[$term_id]['terms'] = $wpdb->delete( $wpdb->prefix . 'terms', ['term_id' => $term_id] );

				// Delete termmeta data (= Category position)
				if ( $plugin === 'folders' ) {
					$deleted[$term_id]['termmeta'] = $wpdb->delete( $wpdb->prefix . 'termmeta', ['term_id' => $term_id] );
				}
			}
		}

		wp_send_json_success( [
			'deleted' => $deleted,
			'post'    => $_POST,
		] );
	}

	/**
	 * Import data from third-party plugins with custom db table: FileBird, Real Media Library
	 */
	public static function import_terms_from_table() {
		$plugin = isset( $_POST['plugin'] ) ? $_POST['plugin'] : false;
		$folders = isset( self::$plugins[$plugin]['folders'] ) ? self::$plugins[$plugin]['folders'] : [];
		$attachments = isset( self::$plugins[$plugin]['attachments'] ) ? self::$plugins[$plugin]['attachments'] : [];

		$folders_imported = [];
		$attachments_imported = [];

		$new_cat_by_id = [];

		// wp_send_json_success( [
		// 	'plugin'      => $plugin,
		// 	'folders'     => $folders,
		// 	'attachments' => $attachments,
		// ] );

		// STEP: Create HF categories from plugin folders
		foreach ( $folders as $folder ) {
			$parent = intval( $folder->parent );
			$happyfiles_parent = 0;

			if ( $parent && isset( $new_cat_by_id[$parent]['term_id'] ) ) {
				$happyfiles_parent = $new_cat_by_id[$parent]['term_id'];
			}

			// Create new HF term from plugin
			$new_hf_term = wp_insert_term( $folder->name, HAPPYFILES_TAXONOMY, ['parent' => $happyfiles_parent] );

			// Skip if category couldn't be created
			if ( is_wp_error( $new_hf_term ) ) {
				continue;
			}

			// Save position as HappyFiles termmeta data
			update_term_meta( $new_hf_term['term_id'], HAPPYFILES_POSITION, intval( $folder->position ) );

			$folders_imported[] = $new_hf_term;

			$new_cat_by_id[$folder->id] = [
				'name'    => $folder->name,
				'parent'  => $parent,
				'term_id' => $new_hf_term['term_id'],
			];
		}

		// STEP: Assign plugin folders to HF categories
		foreach ( $attachments as $attachment ) {
			$hf_category_id = isset( $new_cat_by_id[$attachment->folder_id]['term_id'] ) ? intval( $new_cat_by_id[$attachment->folder_id]['term_id'] ) : 0;
			$attachment_id = isset( $attachment->attachment_id ) ? intval( $attachment->attachment_id ) : 0;

			if ( ! $hf_category_id || ! $attachment_id ) {
				continue;
			}

			$term_ids = wp_get_object_terms( $attachment_id, HAPPYFILES_TAXONOMY, ['fields' => 'ids'] );
			$term_ids[] = $hf_category_id;

			$term_set = wp_set_object_terms( $attachment_id, $term_ids, HAPPYFILES_TAXONOMY );

			if ( is_wp_error( $term_set ) ) {
				continue;
			}

			$attachments_imported[] = [
				'cat_id'   => $hf_category_id,
				'term_ids' => $term_ids,
				'set'      => $term_set,
			];
		}

		wp_send_json_success( [
			'message' => sprintf(
				'<span>' . esc_html__( '%s folders imported and %s attachments categorized.', 'happyfiles' ) . '</span>',
				count( $folders_imported ) . '/' . count( $folders ),
				count( $attachments_imported ) . '/' . count( $attachments )
			) . '<a href="' . admin_url( 'upload.php' )  . '" target="_blank" class="button button-large">' . esc_html__( 'View media library', 'happyfiles' ) . '</a>',
		] );

	}

	/**
	 * Delete data from third-party plugins with custom db table: FileBird, Real Media Library
	 */
	public static function delete_terms_from_table() {
		global $wpdb;

		$plugin = isset( $_POST['plugin'] ) ? $_POST['plugin'] : false;
		$folders = isset( self::$plugins[$plugin]['folders'] ) ? self::$plugins[$plugin]['folders'] : [];
		$attachments = isset( self::$plugins[$plugin]['attachments'] ) ? self::$plugins[$plugin]['attachments'] : [];

		$folders_deleted = false;
		$attachments_deleted = false;

		if ( count( $folders ) ) {
			if ( $plugin === 'filebird' ) {
				$folders_deleted = $wpdb->query( 'DELETE FROM ' . $wpdb->prefix . 'fbv' );
			}

			if ( $plugin === 'real-media-library' ) {
				$folders_deleted = $wpdb->query( 'DELETE FROM ' . $wpdb->prefix . 'realmedialibrary' );

				$wpdb->query( 'DELETE FROM ' . $wpdb->prefix . 'realmedialibrary_meta' );
			}
		}

		if ( count( $attachments ) ) {
			if ( $plugin === 'filebird' ) {
				$attachments_deleted = $wpdb->query( 'DELETE FROM ' . $wpdb->prefix . 'fbv_attachment_folder' );
			}

			if ( $plugin === 'real-media-library' ) {
				$attachments_deleted = $wpdb->query( 'DELETE FROM ' . $wpdb->prefix . 'realmedialibrary_posts' );
			}
		}

		wp_send_json_success( [
			'folders_deleted'     => $folders_deleted,
			'attachments_deleted' => $attachments_deleted,
		] );
	}

}
