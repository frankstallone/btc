<?php
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Admin {

  public function __construct() {
    add_filter( 'plugin_action_links_' . HAPPYFILES_BASENAME, [$this, 'plugin_action_links'], 10, 4 );

		add_action( 'admin_notices', [$this, 'admin_notices'] );
		add_action( 'admin_enqueue_scripts' , [$this, 'admin_enqueue_scripts'] );

		add_action( 'wp_ajax_happyfiles_dismiss_admin_notification_import_folders', [$this, 'dismiss_admin_notification_import_folders'] );
    add_action( 'wp_ajax_happyfiles_dismiss_admin_notification_first_use', [$this, 'dismiss_admin_notification_first_use'] );
		add_action( 'wp_ajax_happyfiles_dismiss_admin_notification_rate_us', [$this, 'dismiss_admin_notification_rate_us'] );

		add_action( 'wp_ajax_happyfiles_delete_plugin_data', [$this, 'delete_plugin_data'] );

    add_action( 'admin_init', [$this, 'admin_init'] );
    add_action( 'admin_menu', [$this, 'admin_menu'] );

    // List view category filter
    add_action( 'restrict_manage_posts', [$this, 'add_categories_filter'] );

    add_action( 'add_attachment', [$this, 'add_attachment'] );

    add_filter( 'ajax_query_attachments_args', [$this, 'ajax_query_attachments_args'] );

    // Add categories HTML to media library
    add_action( 'admin_footer-upload.php', [$this, 'render'] );

    // Get categories HTML for media modal
		add_action( 'wp_ajax_happyfiles_get_categories_html', [$this, 'get_categories_html'] );
    add_action( 'wp_ajax_happyfiles_get_category_terms_and_tree', [$this, 'get_category_terms_and_tree'] );
    add_action( 'wp_ajax_happyfiles_create_category', [$this, 'create_category'] );
    add_action( 'wp_ajax_happyfiles_rename_category', [$this, 'rename_category'] );
    add_action( 'wp_ajax_happyfiles_delete_category', [$this, 'delete_category'] );

    add_action( 'wp_ajax_happyfiles_update_term_parent', [$this, 'update_term_parent'] );
    add_action( 'wp_ajax_happyfiles_update_term_position', [$this, 'update_term_position'] );

    add_action( 'wp_ajax_happyfiles_update_attachment_terms', [$this, 'update_attachment_terms'] );
    add_action( 'wp_ajax_happyfiles_get_attachment_terms', [$this, 'get_attachment_terms'] );

		add_action( 'wp_ajax_happyfiles_get_item_categories', [$this, 'get_item_categories'] );
		add_action( 'wp_ajax_happyfiles_sort_categories', [$this, 'sort_categories'] );

		add_action( 'wp_ajax_happyfiles_save_category_state', [$this, 'save_category_state'] );
		add_action( 'wp_ajax_happyfiles_save_category_minimize', [$this, 'save_category_minimize'] );
		add_action( 'wp_ajax_happyfiles_save_sidebar_width', [$this, 'save_sidebar_width'] );

		add_filter( 'pre-upload-ui', [$this, 'upload_ui_media_new'] );

		// Set tax query on initial page load
		add_action( 'pre_get_posts', [$this, 'pre_get_posts'] );

		// Set tax query on every sequential category change
		add_action( 'parse_tax_query', [$this, 'parse_tax_query'] );
	}

  public function plugin_action_links( $actions, $plugin_file, $plugin_data, $context ) {
		$actions = ['settings' => '<a href="' . network_admin_url( 'options-general.php?page=happyfiles_settings' ) . '">' . esc_html__( 'Settings', 'happyfiles' ) . '</a>'] + $actions;

		if ( HAPPYFILES_BASENAME === 'happyfiles/happyfiles.php' ) {
			$actions['go_pro'] = '<a href="https://happyfiles.io/#download?utm_source=wp-admin-plugins&utm_medium=wp-dashboard&utm_campaign=gopro" target="_blank" class="happyfiles-go-pro">' . esc_html__( 'Go Pro', 'happyfiles' ) . '</a>';
		}

    return $actions;
  }

  public function admin_notices() {
		self::notification_import_folders();
		self::notification_first_use();
    self::notification_rate_plugin();
	}

	public static function notification_import_folders() {
		// Check db option
    if ( get_option( 'happyfiles_hide_import_folders_notification', false ) ) {
      return;
    }

    if ( ! Helpers::$can_edit ) {
      return;
		}

		$classes = [
			'hf-notice',
      'notice',
      'notice-info',
      'is-dismissible',
		];

		// Don't show on HappyFiles settings page
		$current_screen = get_current_screen();

		if ( $current_screen && $current_screen->base === 'settings_page_happyfiles_settings' ) {
			return;
		}

		// Only show when there is least one third-party plugin found with folders data to import
		$third_party_folders_data_to_import = false;

		foreach ( Import::$plugins as $slug => $plugin_data ) {
			if ( count( $plugin_data['folders'] ) ) {
				$third_party_folders_data_to_import = true;
			}
		}

		if ( ! $third_party_folders_data_to_import ) {
			return;
		}

		$message = sprintf(
      esc_html__( 'Looks like you\'ve used another media folders plugin before HappyFiles. %s', 'happyfiles' ),
      '<a href="' . admin_url( 'options-general.php?page=happyfiles_settings#tab-import' ) . '" class="button button-primary">' . esc_html__( 'Import/delete plugin data', 'happyfiles' ) . '</a>'
    );

    printf(
      '<div id="hf-notification-import-folders" class="%s"><p>%s</p></div>',
      trim( implode( ' ', $classes ) ),
      $message
    );
	}

  public static function notification_first_use() {
    // Check db option
    if ( get_option( 'happyfiles_hide_first_use_notification', false ) ) {
      return;
    }

    if ( ! Helpers::$can_edit ) {
      return;
    }

    if ( get_current_screen() && get_current_screen()->base === 'upload' ) {
      return;
    }

    $media_terms = get_terms( [
      'taxonomy'   => HAPPYFILES_TAXONOMY,
      'hide_empty' => false,
    ] );

    // Don't show if media categories exist
    if ( $media_terms ) {
      return;
    }

    $classes = [
			'hf-notice',
      'notice',
      'notice-info',
      'is-dismissible',
    ];

    $message = sprintf(
      '<span>' . esc_html__( 'Let\'s create your first media category: %s', 'happyfiles' ) . '</span>',
      '<a href="' . esc_url( admin_url( '/upload.php' ) ) . '" class="button button-primary">' . esc_html__( 'Go to media library', 'happyfiles' ) . '</a>'
    );

    printf(
      '<div id="hf-notification-first-use" class="%s"><p>%s</p></div>',
      trim( implode( ' ', $classes ) ),
      $message
    );
  }

  public static function notification_rate_plugin() {
    $classes = [
			'hf-notice',
      'notice',
      'notice-info',
      'is-dismissible',
    ];

    $plugin_activation_timestamp = get_option( 'happyfiles_plugin_activation' );
    $seconds_till_activation = time() - $plugin_activation_timestamp;

    // Show rating notification 7 days after plugin activation
    $rate_us_notification_time_passed = ( $seconds_till_activation / 60 / 60 / 24 ) > 7;

    $hide_rate_us_notification = get_option( 'happyfiles_hide_rate_us_notification', false );

    if ( $rate_us_notification_time_passed && ! $hide_rate_us_notification ) {
      $message = sprintf(
        esc_html__( 'Wow, time flies. You have been using HappyFiles for quite a while now. If you like the plugin, please consider %s to help others discover it too.', 'happyfiles' ),
        '<a href="https://wordpress.org/support/plugin/happyfiles/reviews/#new-post" target="_blank">' . esc_html__( 'rating it', 'happyfiles' ) . '</a>'
      );

      printf(
        '<div id="hf-notification-rate-plugin" class="%s"><p>%s</p></div>',
        trim( implode( ' ', $classes ) ),
        $message
      );
    }
  }

  public function admin_enqueue_scripts() {
		wp_enqueue_style( 'happyfiles-admin', HAPPYFILES_ASSETS_URL . '/css/admin.min.css', [], filemtime( HAPPYFILES_ASSETS_PATH .'/css/admin.min.css' ) );
    wp_enqueue_script( 'happyfiles-admin', HAPPYFILES_ASSETS_URL . '/js/admin.js', ['jquery'], filemtime( HAPPYFILES_ASSETS_PATH .'/js/admin.js' ) );
	}

	public function dismiss_admin_notification_import_folders() {
		// Return if user is not an admin
    if ( ! current_user_can( 'administrator' ) ) {
      wp_send_json_error( ['error' => esc_html__( 'Not an admin', 'happyfiles' )] );
    }

		update_option( 'happyfiles_hide_import_folders_notification', true );

		wp_send_json_success( $_POST );
	}

  public function dismiss_admin_notification_first_use() {
    // Return if user is not an admin
    if ( ! current_user_can( 'administrator' ) ) {
      wp_send_json_error( ['error' => esc_html__( 'Not an admin', 'happyfiles' )] );
    }

    update_option( 'happyfiles_hide_first_use_notification', true );

    wp_send_json_success( $_POST );
  }

  public function dismiss_admin_notification_rate_us() {
    // Return if user is not an admin
    if ( ! current_user_can( 'administrator' ) ) {
      wp_send_json_error( ['error' => esc_html__( 'Not an admin', 'happyfiles' )] );
    }

    update_option( 'happyfiles_hide_rate_us_notification', true );

    wp_send_json_success( $_POST );
	}

	/**
	 * Delete all HappyFiles plugin data (folders, options db entries, etc.)
	 */
	public function delete_plugin_data() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		$terms = get_terms( HAPPYFILES_TAXONOMY, ['hide_empty' => false] );

		// PRO: Get HappyFiles terms of all post types (terms starting with 'hf_cat_')
		global $wpdb;

		$hf_category_terms = $wpdb->get_results(
			"SELECT * FROM " . $wpdb->term_taxonomy . "
			LEFT JOIN  " . $wpdb->terms . "
			ON  " . $wpdb->term_taxonomy . ".term_id =  " . $wpdb->terms . ".term_id
			WHERE " . $wpdb->term_taxonomy . ".taxonomy LIKE 'hf_cat_%'
			ORDER BY parent ASC"
		);

		$terms = array_merge( $terms, $hf_category_terms );

		$terms_deleted = [];

		foreach ( $terms as $term ) {
			$term_id = intval( $term->term_id );

			// Delete term meta (position)
			delete_term_meta( 'term', $term_id, HAPPYFILES_POSITION );

			// Delete taxonomy term (post type: attachment)
			$term_deleted = wp_delete_term( $term_id, $term->taxonomy );

			$terms_deleted[$term_id] = $term_deleted;
		}

		// Delete db options entries (starting with 'happyfiles_')
		$all_options = wp_load_alloptions();
		$happyfiles_options = [];
		$options_deleted = [];

		foreach ( array_keys( $all_options ) as $option_key ) {
			if ( substr( $option_key, 0, strlen( 'happyfiles_' ) ) === 'happyfiles_' ) {
				$happyfiles_options[] = $option_key;
				$option_deleted = delete_option( $option_key );

				if ( $option_deleted ) {
					$options_deleted[] = $option_key;
				}
			}
		}

		$message = '';

		if ( count( $terms_deleted ) || count( $options_deleted ) ) {
			$message = esc_html__( 'HappyFiles data and options deleted.', 'happyfiles' );
		}

		else if ( ! count( $term_ids ) ) {
			$message = esc_html__( 'No HappyFiles data to delete.', 'happyfiles' );
		}

		wp_send_json_success( [
			'terms'           => $terms,
			'terms_deleted'   => $terms_deleted,
			'options'         => $happyfiles_options,
			'options_deleted' => $options_deleted,
			'message'         => $message,
		] );
	}

  public function admin_init() {
    // Register HappyFiles settings
		register_setting( HAPPYFILES_SETTINGS_GROUP, HAPPYFILES_SETTING_USER_ROLES );
		register_setting( HAPPYFILES_SETTINGS_GROUP, HAPPYFILES_SETTING_MULTIPLE_CATEGORIES );
		register_setting( HAPPYFILES_SETTINGS_GROUP, HAPPYFILES_SETTING_REMOVE_FROM_ALL_CATEGORIES );
		register_setting( HAPPYFILES_SETTINGS_GROUP, HAPPYFILES_SETTING_LIST_VIEW_DISABLE_AJAX );
		register_setting( HAPPYFILES_SETTINGS_GROUP, HAPPYFILES_SETTING_ALTERNATIVE_COUNT );
  }

  public function admin_menu() {
    add_options_page(
      esc_html__( 'HappyFiles Settings', 'happyfiles' ),
      'HappyFiles',
      'manage_options',
      HAPPYFILES_SETTINGS_GROUP,
      [$this, 'admin_screen_settings']
    );
  }

  public function admin_screen_settings() {
    require_once HAPPYFILES_PATH . 'includes/admin/admin-screen-settings.php';
	}

	public function pre_get_posts( $query ) {
		if ( ! $query->is_main_query() ) {
			return;
		}

		global $pagenow;

		// Return if we are not in media library
    if ( $pagenow !== 'upload.php' ) {
      return;
		}

		$post_type = $query->get( 'post_type' );
		$happyfiles_taxonomy = Helpers::get_taxonomy_by( 'post_type', $post_type );

		if ( ! $happyfiles_taxonomy ) {
			return;
		}

		// Get user selected category from stored user meta data
		$user_category_state = get_user_meta( get_current_user_id(), 'happyfiles_category_state', true );
		$open_category = isset( $user_category_state[$happyfiles_taxonomy] ) ? $user_category_state[$happyfiles_taxonomy] : [];

		// No or all categories selected
		if ( ! $open_category || $open_category === 'all' ) {
			return;
		}

		// Uncategorized
		if ( $open_category == '-1' ) {
			$tax_query = [
				[
					'taxonomy' => $happyfiles_taxonomy,
					'operator' => 'NOT EXISTS',
				]
			];
		}

		// Custom taxonomy term
		else {
			$tax_query = [
				[
					'taxonomy' 			   => $happyfiles_taxonomy,
					'field' 			     => 'term_id',
					'terms' 			     => [intval( $open_category )],
					'include_children' => false,
				],
			];
		}

		$query->set( 'tax_query', $tax_query );
	}

  /**
   * Exclude term children for non-AJAX taxonomy requests: List View
   *
   * https://core.trac.wordpress.org/ticket/18703#comment:10
   *
   * @param object $query Already parsed query object.
   * @return void
   */
  public function parse_tax_query( $query ) {
		global $pagenow, $typenow;

    // Return if we are not in media library
    if ( $pagenow !== 'upload.php' ) {
      return;
		}

    if ( ! empty( $query->tax_query->queries ) ) {
      foreach ( $query->tax_query->queries as &$tax_query ) {
				$taxonomy = $tax_query['taxonomy'];

				if ( $taxonomy === Helpers::get_taxonomy_by( 'post_type', $typenow ) ) {
					$term_id = &$query->query_vars[$taxonomy];

					// All categories
					if ( $term_id == 'all' ) {
            $tax_query['operator'] = '';
          }

          // Uncategorized
          else if ( $term_id == '-1' ) {
            $tax_query['operator'] = 'NOT EXISTS';
          }

          else {
            $tax_query['include_children'] = false;
            $tax_query['field'] = 'id';
          }
        }
      }
    }
  }

  /**
   * Add category filter select dropdown HTML
   *
   * https://stackoverflow.com/a/48656819/2009539
   *
   * @return string
   */
  public function add_categories_filter() {
		global $pagenow, $typenow;

    if ( $pagenow !== 'upload.php' ) {
      return;
		}

		$taxonomy = Helpers::get_taxonomy_by( 'post_type', $typenow );
		$open_term_id = Helpers::get_open_category();

		// Check if taxonomy exists
		if ( $taxonomy ) {
			wp_dropdown_categories( [
				'class'            => 'happyfiles-filter',
				'show_option_all'  => esc_html__( 'All Categories', 'happyfiles' ),
				'show_option_none' => esc_html__( 'Uncategorized', 'happyfiles' ),
				'taxonomy'         => $taxonomy,
				'name'             => $taxonomy,
				'value_field'      => 'term_id',
				'selected'         => $open_term_id,
				'hierarchical'     => false,
				'hide_empty'       => false,
			] );
		}
  }

  /**
   * Get media category HTML for media modal
   */
  public static function get_categories_html() {
    ob_start();
    self::render();
    $html = ob_get_clean();

    wp_send_json_success( ['html' => $html] );
	}

  /**
   * Update term position (SortableJS.onEnd)
   *
   * @return void
   */
  public function update_term_position() {
    if ( ! Helpers::$can_edit ) {
      exit;
    }

    $term_ids = isset( $_POST['termIds'] ) && is_array( $_POST['termIds'] ) ? Helpers::sanitize_data( $_POST['termIds'] ) : [];

    foreach ( $term_ids as $index => $term_id ) {
      update_term_meta( intval( $term_id ), HAPPYFILES_POSITION, $index );
    }

    wp_send_json_success( ['term_ids' => $term_ids] );
  }

  /**
   * Update term parent (SortableJS.onEnd)
   *
   * @return array
   */
  public function update_term_parent() {
    if ( ! Helpers::$can_edit ) {
      exit;
		}

    $term_id = isset( $_POST['termId'] ) && ! empty( $_POST['termId'] ) ? intval( Helpers::sanitize_data( $_POST['termId'] ) ) : false;
		$parent_id = isset( $_POST['parentId'] ) && ! empty( $_POST['parentId'] ) ? intval( Helpers::sanitize_data( $_POST['parentId'] ) ) : 0;
		$taxonomy = isset( $_POST['taxonomy'] ) && ! empty( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : Helpers::$taxonomy_name;

    $update_response = wp_update_term( $term_id, $taxonomy, ['parent' => $parent_id] );

    if ( is_wp_error( $update_response ) ) {
      wp_send_json_error( ['error' => $update_response->get_error_message() ] );
    }

    wp_send_json_success( [
			'post'            => $_POST,
			'update_response' => $update_response
		] );
  }

  /**
   * Set term for uploaded attachment
   *
   * @see admin.js:BeforeUpload
   *
   * @param integer $post_id
   * @return void
   */
  public function add_attachment( $post_id ) {
    if ( ! Helpers::$can_edit ) {
      return;
    }

    $attachment_term_id = isset( $_REQUEST['hfTermId'] ) ? intval( Helpers::sanitize_data( $_REQUEST['hfTermId'] ) ) : 0;

    if ( $attachment_term_id > 0 ) {
      wp_set_object_terms( $post_id, $attachment_term_id, Helpers::$taxonomy_name, false );
    }
  }

  /**
   * Filter out 'uncategorized' attachments (View: Grid)
   *
   * Value of '-1' for uncategorized media. Positive integer for custom media terms.
   *
   * @return array
   */
  public function ajax_query_attachments_args( $query = [] ) {
		$taxonomy = Helpers::$taxonomy_name;

    // Media category term
    if ( isset( $query[$taxonomy] ) && is_numeric( $query[$taxonomy] ) ) {

      if ( isset( $query['tax_query'] ) && is_array( $query['tax_query'] ) ) {
        $query['tax_query']['relation'] = 'AND';
      } else {
        $query['tax_query'] = ['relation' => 'AND'];
      }

      $terms = $query[$taxonomy];

      // Uncategorized (value: -1)
      if ( $terms == -1 ) {
        $query['tax_query'][] = [
          'taxonomy' => $taxonomy,
          'operator' => 'NOT EXISTS',
        ];
      }

      // Media term ID
      else {
        $query['tax_query'][] = [
          'taxonomy'         => $taxonomy,
          'terms'            => $terms,
          'field'            => 'id',
          'include_children' => false,
        ];
      }

      unset( $query[$taxonomy] );
    }

    return $query;
  }

  /**
   * Get category terms and tree
   *
   * To refresh categories on every modal open.
   *
   * @return array
   */
  public function get_category_terms_and_tree() {
		$post_type = isset( $_POST['postType'] ) && ! empty( $_POST['postType'] ) ? $_POST['postType'] : 'attachment';
		$taxonomy = isset( $_POST['taxonomy'] ) && ! empty( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : Helpers::$taxonomy_name;

    wp_send_json_success( [
      'terms'    => Helpers::get_category_terms( $taxonomy, $post_type ),
      'tree'     => Helpers::get_tree(),
    ] );
  }

  /**
   * Create new category
   *
   * @return array
   */
  public function create_category() {
    if ( ! Helpers::$can_edit ) {
      exit;
		}

		$post_type = isset( $_POST['postType'] ) && ! empty( $_POST['postType'] ) ? $_POST['postType'] : 'attachment';
		$taxonomy = isset( $_POST['taxonomy'] ) && ! empty( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : Helpers::$taxonomy_name;

    // Check if category is provided
    $new_category_names = isset( $_POST['newCategoryNames']) && ! empty( $_POST['newCategoryNames'] ) ? Helpers::sanitize_data( $_POST['newCategoryNames'] ) : false;
		$parent_id = isset( $_POST['parentId']) && ! empty( $_POST['parentId'] ) ? intval( Helpers::sanitize_data( $_POST['parentId'] ) ) : 0;

		$new_category_names = explode( ',', $new_category_names );
		$limit_reached = false;

		// Check if parent term exists
		if ( $parent_id ) {
			$parent_id = term_exists( $parent_id, $taxonomy ) ? $parent_id : 0;
		}

    if ( ! $new_category_names ) {
      wp_send_json_error( ['error' => esc_html__( 'Please enter a category name.', 'happyfiles' )] );
    }

		foreach ( $new_category_names as $new_category_name ) {
			$terms = Helpers::get_category_terms( $taxonomy, $post_type );

			// Check term count
			if ( is_plugin_active( 'happyfiles/happyfiles.php' ) ) {
				$category_count = get_terms( [
					'taxonomy'   => HAPPYFILES_TAXONOMY,
					'hide_empty' => false,
					'fields'     => 'ids',
				] );

				$limit_reached = count( $category_count ) >= 10;
			}

			if ( ! $limit_reached ) {
				$new_term = wp_insert_term( esc_attr( trim( $new_category_name ) ), $taxonomy, ['parent' => $parent_id] );

				if ( is_wp_error( $new_term ) ) {
					wp_send_json_error( ['error' => $new_term->get_error_message() ] );
				}
			}
		}

    // Update category terms
		$terms = Helpers::get_category_terms( $taxonomy, $post_type );
		$tree = Helpers::get_terms_hierarchical( $terms );

    wp_send_json_success( [
			'post_type'     => $post_type,
			'taxonomy'      => $taxonomy,
			'parent_id'     => $parent_id,
      'terms'         => $terms,
			'tree'          => $tree,
			'limit_reached' => $limit_reached,
    ] );
  }

  /**
   * Rename category: Name and slug
   *
   * @return array
   */
  public function rename_category() {
    if ( ! Helpers::$can_edit ) {
      exit;
    }

    $new_category_name = isset( $_POST['newCategoryName'] ) ? esc_attr( Helpers::sanitize_data( $_POST['newCategoryName'] ) ) : false;
		$term_id = isset( $_POST['termId'] ) ? intval( Helpers::sanitize_data( $_POST['termId'] ) ) : false;
		$taxonomy = isset( $_POST['taxonomy'] ) ? Helpers::sanitize_data( $_POST['taxonomy'] ) : false;

    if ( ! $new_category_name || ! $term_id ) {
      wp_send_json_error( ['error' => esc_html__( 'No category name or term ID provided.', 'happyfiles' )] );
    }

    $slug = sanitize_title( $new_category_name );

    $rename_response = wp_update_term( $term_id, $taxonomy, [
      'name' => $new_category_name,
      'slug' => $slug,
    ] );

    if ( is_wp_error( $rename_response ) ) {
      wp_send_json_error( ['error' => $rename_response->get_error_message()] );
    }

    wp_send_json_success( [
      'term_id' => $term_id,
      'name'    => $new_category_name,
      'slug'    => $slug,
    ] );
  }

  /**
   * Delete category
   *
   * @return array
   */
  public function delete_category() {
    if ( ! Helpers::$can_edit ) {
      exit;
    }

		$term_id = isset( $_POST['termId'] ) ? intval( Helpers::sanitize_data( $_POST['termId'] ) ) : false;
		$taxonomy = isset( $_POST['taxonomy'] ) ? Helpers::sanitize_data( $_POST['taxonomy'] ) : Helpers::$taxonomy_name;
		$post_type = isset( $_POST['postType'] ) && ! empty( $_POST['postType'] ) ? $_POST['postType'] : 'attachment';

    if ( ! $term_id ) {
      wp_send_json_error( ['error' => esc_html__( 'No category name or term ID provided.', 'happyfiles' )] );
		}

		// Remove all categories (terms) from all items in deleted category
		$remove_from_all_categories = get_option( HAPPYFILES_SETTING_REMOVE_FROM_ALL_CATEGORIES, false );

		if ( $remove_from_all_categories ) {
			$item_ids = get_posts( [
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'fields'         => 'ids',
				'tax_query'      => [
					[
						'taxonomy'         => $taxonomy,
						'terms'            => $term_id,
						'field'            => 'term_id',
						'include_children' => false,
					],
				],
			] );

			foreach ( $item_ids as $item_id ) {
				wp_delete_object_term_relationships( $item_id, $taxonomy );
			}
		}

		// Delete category (taxonomy term)
		$delete_response = wp_delete_term( $term_id, $taxonomy );

    if ( is_wp_error( $delete_response ) ) {
      wp_send_json_error( ['error' => $delete_response->get_error_message() ] );
		}

		// Delete term meta (position)
		delete_term_meta( 'term', $term_id, HAPPYFILES_POSITION );

    // Get updated terms (with count)
    $terms = Helpers::get_category_terms( $taxonomy, $post_type );

    wp_send_json_success( [
      'term_id'   => $term_id,
      'terms'     => $terms,
			'tree'      => Helpers::get_tree(),
			'post_type' => $post_type,
			'taxonomy'  => $taxonomy,
    ] );
  }

  /**
   * When dropping item(s) on term folder
   *
   * @return array
   */
  public function update_attachment_terms() {
    if ( ! Helpers::$can_edit ) {
      exit;
    }

    // Check: Term ID provided
    $term_id = isset( $_POST['termId'] ) ? intval( Helpers::sanitize_data( $_POST['termId'] ) ) : false;
		$open_id = isset( $_POST['openId'] ) ? intval( Helpers::sanitize_data( $_POST['openId'] ) ) : false;
		$taxonomy = isset( $_POST['taxonomy'] ) ? Helpers::sanitize_data( $_POST['taxonomy'] ) : Helpers::$taxonomy_name;

    if ( $term_id === false ) {
      wp_send_json_error( ['error' => esc_html__( 'Error: No term ID passed.', 'happyfiles' ) ] );
		}

    // Check: Item IDs provided
		$item_ids = isset( $_POST['itemId'] ) ? array_map( 'intval', explode( ',', Helpers::sanitize_data( $_POST['itemId'] ) ) ) : false;
		$multiple_categories = get_option( HAPPYFILES_SETTING_MULTIPLE_CATEGORIES, false );

    if ( ! count( $item_ids ) ) {
      wp_send_json_error( ['error' => esc_html__( 'Error: No item ID(s) passed.', 'happyfiles' ) ] );
		}

		// STEP: Categorize media files duplicated by WPML for each language
		if ( class_exists( 'SitePress' ) ) {
			foreach ( $item_ids as $item_id ) {
				$trid = apply_filters( 'wpml_element_trid', null, $item_id, 'post_attachment' );
				$translations = apply_filters( 'wpml_get_element_translations', null, $trid, 'post_attachment' );

				foreach ( $translations as $lang => $post ) {
					$wmpl_lang_item_id = intval( $post->element_id );

					if ( $wmpl_lang_item_id && $wmpl_lang_item_id != $item_id ) {
						$item_ids[] = $wmpl_lang_item_id;
					}
				}
			}
		}

    foreach ( $item_ids as $item_id ) {
      $term_ids = wp_get_object_terms( $item_id, $taxonomy, ['fields' => 'ids'] );

      // Multiple categories enabled
      if ( $multiple_categories ) {
				// Remove category/categories: Dropped on 'All Files' or 'Uncategorized'
        if ( $term_id < 1 ) {

					// Check if setting to remove all categories from an item is set
					$remove_from_all_categories = get_option( HAPPYFILES_SETTING_REMOVE_FROM_ALL_CATEGORIES, false );

					if ( $remove_from_all_categories ) {
						$term_ids = [];
					}

					// Remove only open category from item (default)
					else {
						$term_index = array_search( $open_id, $term_ids );

						if ( is_int( $term_index ) ) {
							unset( $term_ids[$term_index] );
						}
					}

				}

				// Add to category
				else {
          $term_ids[] = $term_id;
        }
      }

      // One category per item
      else {
        // Dropped on 'All Files' or 'Uncategorized'
        if ( $term_id < 1 ) {
          $term_ids = [];
        } else {
          $term_ids = [$term_id];
        }
      }

      // Delete terms
      if ( ! count( $term_ids ) ) {
        wp_delete_object_term_relationships( $item_id, $taxonomy );
      }

      $term_reponse = wp_set_object_terms( $item_id, $term_ids, $taxonomy, false );

      if ( is_wp_error( $term_reponse ) ) {
        wp_send_json_error( ['error' => $term_reponse->get_error_message() ] );
      }
    }

		// Get fresh category terms with updated count
		$post_type = isset( $_POST['postType'] ) ? $_POST['postType'] : Helpers::get_current_post_type();
		$terms = Helpers::get_category_terms( $taxonomy, $post_type );

    $term_ids = [];

    // Update term count now
    foreach ( $terms as $term ) {
      $term_ids[] = $term->term_id;
      wp_update_term_count_now( [$term->term_id], $taxonomy );
		}

    wp_send_json_success( [
			'terms'     => $terms,
			'taxonomy'  => $taxonomy,
			'post_type' => $post_type,
			'term_ids'  => $term_ids,
		] );
  }

  public function get_attachment_terms() {
		$taxonomy = isset( $_POST['taxonomy'] ) && ! empty( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : Helpers::$taxonomy_name;
		$post_type = isset( $_POST['postType'] ) && ! empty( $_POST['postType'] ) ? $_POST['postType'] : 'attachment';

		$terms = Helpers::get_category_terms( $taxonomy, $post_type );

    wp_send_json_success( ['terms' => $terms] );
	}

	public static function get_parent_terms( $parent_term_id, $taxonomy ) {
		$parent_term = get_term( $parent_term_id, $taxonomy );
		$parent_terms = [$parent_term];

		if ( is_int( $parent_term->parent ) && $parent_term->parent > 0 ) {
			$parent_terms[] = self::get_parent_terms( $parent_term->parent, $taxonomy )[0];
		}

		return $parent_terms;
	}

  public function get_item_categories() {
		$taxonomy = Helpers::$taxonomy_name;

    $terms = wp_get_object_terms(
      intval( $_POST['itemId'] ),
      ( $_POST['taxonomy'] ),
      ['orderby' => 'parent']
		);

		$categorie_terms = [];

		foreach ( $terms as $term ) {
			// Get parents and children (@since 1.1)
			if ( is_int( $term->parent ) && $term->parent > 0 ) {
				$parent_terms = self::get_parent_terms( $term->parent, $taxonomy );
				$parent_terms = array_reverse( $parent_terms );

				$level = 0;

				foreach ( $parent_terms as $parent_term ) {
					$level++;

					$parent_term->level = $level;
					$categorie_terms[] = $parent_term;
				}

				$term->level = $level + 1;
				$categorie_terms[] = $term;
			}

			// Get parentless category
			else {
				$term->level = 1;
				$categorie_terms[] = $term;
			}
		}

		if ( count( $categorie_terms ) ) {
			wp_send_json_success( $categorie_terms );
		} else {
			$uncategorized_items = Helpers::get_uncategorized_items( $_POST['postType'], $_POST['taxonomy'] );

			wp_send_json_success( [[
				'term_id' => -1,
				'level'   => 1,
				'name'    => esc_html__( 'Uncategorized', 'happyfiles' ),
				'count'   => $uncategorized_items->found_posts,
			]] );
		}
	}

	/**
	 * Sort terms by name (asc/desc)
	 *
	 * Save new term position in db.
	 */
	public function sort_categories() {
		$order = isset( $_POST['order'] ) && ! empty( $_POST['order'] ) ? $_POST['order'] : false;
		$terms = isset( $_POST['terms'] ) && ! empty( $_POST['terms'] ) ? $_POST['terms'] : [];
		$taxonomy = isset( $_POST['taxonomy'] ) && ! empty( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : Helpers::$taxonomy_name;

		if ( ! count( $terms ) || ! in_array( $order, ['asc', 'desc'] ) ) {
			wp_send_json_error();
		}

		// Sort
		if ( $order === 'asc' ) {
			array_multisort( array_column( $terms, 'name' ), SORT_ASC, $terms );
		}

		else if ( $order === 'desc' ) {
			array_multisort( array_column( $terms, 'name' ), SORT_DESC, $terms );
		}

		// Remove All & Uncategorized categorized > Sort custom terms > Prepend default terms
		$default_terms = [];
		$new_position = 0;

		foreach ( $terms as $index => $term ) {
			$term_id = $term['term_id'];

			// All / Uncategorized
			if ( in_array( $term_id, ['all', '-1'] ) ) {
				$default_terms[$term_id] = $term;
				unset( $terms[$index] );
			}

			// Custom terms
			else {
				// Save new position
				$term_position_updated = update_term_meta( $term_id, HAPPYFILES_POSITION, $new_position );

				if ( $term_position_updated === true || is_int( $term_position_updated ) ) {
					$new_position++;
				}
			}
		}

		// Reindex array
		$terms = array_values( $terms );

		// Prepend default terms
		array_unshift( $terms, $default_terms['-1'] );
		array_unshift( $terms, $default_terms['all'] );

		$terms = Helpers::get_category_terms( $taxonomy );
		$tree = Helpers::get_terms_hierarchical( $terms );

		// Reload page via JS
		wp_send_json_success( [
			'terms' => $terms,
			'tree'  => $tree,
		] );
	}

	public function save_category_state() {
		$user_id = get_current_user_id();

		$user_category_state = get_user_meta( $user_id, 'happyfiles_category_state', true );

		if ( ! $user_category_state ) {
			$user_category_state = [];
		}

		$taxonomy = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : false;
		$term_id = isset( $_POST['termId'] ) ? $_POST['termId'] : false;

		if ( ! $taxonomy ) {
			wp_send_json_error( ['message' => 'Error: No taxonomy provided (save_category_state)'] );
		}

		if ( ! $term_id ) {
			wp_send_json_error( ['message' => 'Error: No term_id provided (save_category_state)'] );
		}

		$user_category_state[$taxonomy] = $term_id;

		$updated = update_user_meta( $user_id, 'happyfiles_category_state', $user_category_state );

		wp_send_json_success( ['update_user_meta' => $updated] );
	}

	public function save_category_minimize() {
		$user_id = get_current_user_id();

		$user_category_minimize = get_user_meta( $user_id, 'happyfiles_category_minimize', true );

		if ( ! $user_category_minimize ) {
			$user_category_minimize = [];
		}

		$taxonomy = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : false;
		$minimize = isset( $_POST['minimize'] ) && $_POST['minimize'] == 'true';

		if ( ! $taxonomy ) {
			wp_send_json_error( ['message' => 'Error: No taxonomy provided (save_category_minimize)'] );
		}

		if ( $minimize ) {
			if ( ! in_array( $taxonomy, $user_category_minimize ) ) {
				$user_category_minimize[] = $taxonomy;
			}
		} else {
			$remove_index = array_search( $taxonomy, $user_category_minimize );

			if ( gettype( $remove_index ) === 'integer' ) {
				unset( $user_category_minimize[$remove_index] );
			}
		}

		$updated = update_user_meta( $user_id, 'happyfiles_category_minimize', $user_category_minimize );

		wp_send_json_success( [
			'minimize'               => $minimize,
			'update_user_meta'       => $updated,
			'user_category_minimize' => $user_category_minimize,
		] );
	}

	public function save_sidebar_width() {
    $sidebar_width = isset( $_POST['width'] ) && intval( Helpers::sanitize_data( $_POST['width'] ) ) >= 210 && intval( Helpers::sanitize_data( $_POST['width'] ) ) <= 600 ? intval( Helpers::sanitize_data( $_POST['width'] ) ) : false;

    if ( ! $sidebar_width  ) {
      wp_send_json_error( ['error' => esc_html__( 'Invalid sidebar width.', 'happyfiles' )] );
    }

    update_option( HAPPYFILES_DB_OPTION_WIDTH, $sidebar_width );

    wp_send_json_success( ['message' => esc_html__( 'Sidebar width updated.', 'happyfiles') ] );
	}

  public static function render() {
		$user_can_edit = Helpers::$can_edit; // set in happyfiles_user_roles
    ?>
    <div id="hf-sidebar-wrapper" class="wrap">
      <div id="hf-sidebar-inner">
        <div class="title-wrapper">
					<div class="title"><?php esc_html_e( 'Categories', 'happyfiles' ); ?></div>

					<svg id="hf-sort-toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M296 136c0-22.002-17.998-40-40-40s-40 17.998-40 40 17.998 40 40 40 40-17.998 40-40zm0 240c0-22.002-17.998-40-40-40s-40 17.998-40 40 17.998 40 40 40 40-17.998 40-40zm0-120c0-22.002-17.998-40-40-40s-40 17.998-40 40 17.998 40 40 40 40-17.998 40-40z"></path></svg>

					<?php if ( $user_can_edit ) { ?>
					<ul id="hf-context-menu-sort-wrapper">
						<li data-order="asc"><?php esc_html_e( 'Sort ascending', 'happyfiles' ); ?></li>
						<li data-order="desc"><?php esc_html_e( 'Sort descending', 'happyfiles' ); ?></li>
					</ul>
					<?php } ?>
        </div>

        <?php if ( $user_can_edit ) { ?>
        <div class="toolbar-wrapper">
          <div id="hf-new-category-toggle" class="create button">
            <i class="dashicons dashicons-plus-alt"></i>
            <span><?php esc_html_e( 'Create', 'happyfiles' ); ?></span>
          </div>

          <div id="hf-rename-category" class="rename button">
						<i class="dashicons dashicons-edit"></i>
            <span><?php esc_html_e( 'Rename', 'happyfiles' ); ?></span>
          </div>

          <div id="hf-delete-category" class="delete button">
						<i class="dashicons dashicons-trash"></i>
            <span><?php esc_html_e( 'Delete', 'happyfiles' ); ?></span>
					</div>

					<div id="hf-upload-wrapper"></div>
        </div>
        <?php
        }
        else {
          echo '<div class="toolbar-wrapper info">' .  esc_html__( 'You can view, but not edit media categories.', 'happyfiles' ) . '</div>';
        }
        ?>

        <?php
				$categories = Helpers::$category_terms;

        if ( is_array( $categories ) && count( $categories ) <= 2 ) { ?>
        <div id="hf-no-category-notification-wrapper">
          <?php esc_html_e( 'Click the "Create" button above to add your first category. Then start to drag and drop files into your category.', 'happyfiles' ); ?>
        </div>
        <?php } ?>

        <div id="hf-upgrade-notification-wrapper">
          <h3 class="title"><?php esc_html_e( 'Category Limit Reached!', 'happyfiles' ); ?></h3>
          <p><?php esc_html_e( 'This free version of HappyFiles allows you to create and manage up to 10 media categories. Get HappyFiles Pro for unlimited media categories and premium support.', 'happyfiles' ); ?></p>
          <a href="https://happyfiles.io/#download?utm_source=plugin&utm_medium=wp-admin" target="_blank"><?php esc_html_e( 'Get HappyFiles Pro', 'happyfiles' ); ?></a>
        </div>

        <?php if ( $user_can_edit ) { ?>
        <div id="hf-new-category-wrapper">
          <input type="text" name="hf-new-category-input" id="hf-new-category-input" autocomplete="off" placeholder="<?php esc_attr_e( 'New category name', 'happyfiles' ); ?>" spellcheck="false">
          <button class="button button-small" id="hf-new-category-cancel"><?php esc_html_e( 'Cancel', 'happyfiles' ); ?></button>
          <button class="button button-small button-primary" id="hf-new-category-create"><?php esc_html_e( 'Create', 'happyfiles' ); ?></button>
        </div>
        <?php } ?>

        <!-- NOTE: Populated via admin.js -->
        <ul id="hf-categories-wrapper"></ul>

        <div id="hf-term-action-wrapper">
          <i id="hf-confirm" class="dashicons dashicons-yes"></i>
          <i id="hf-cancel" class="dashicons dashicons-no"></i>
        </div>
      </div>

      <?php if ( get_current_screen() && ( get_current_screen()->base === 'upload' || get_current_screen()->base === 'edit' ) ) { ?>
      <div id="hf-resizable">
        <i id="hf-toggle" class="dashicons dashicons-arrow-left"></i>
      </div>
      <?php } ?>

			<?php if ( $user_can_edit ) { ?>
      <ul id="hf-context-menu-wrapper">
        <li class="create"><?php esc_html_e( 'Create Category', 'happyfiles' ); ?></li>
        <li class="rename"><?php esc_html_e( 'Rename Category', 'happyfiles' ); ?></li>
        <li class="delete"><?php esc_html_e( 'Delete Category', 'happyfiles' ); ?></li>
      </ul>
      <?php } ?>

      <ul id="hf-context-menu-categories-wrapper"></ul>
    </div>
    <?php
  }

  /**
   * Add term dropdown to media-new.php in WP admin
   */
  public function upload_ui_media_new() {
    if ( ! Helpers::$can_edit ) {
      return;
    }

    if ( is_admin() && get_current_screen() && get_current_screen()->base === 'media' ) {
      $tax_slug = Helpers::$taxonomy_name;
      $tax_obj = get_taxonomy( $tax_slug );

      echo '<div id="hf-category-upload-wrapper">';
      echo '<p>' . esc_html__( 'Optional: Assign a category to your uploaded file(s):', 'happyfiles' ) . '</p>';

      echo '<p>';

      wp_dropdown_categories( [
        'id'               => 'hf-category-upload', // Has to be different from AJAX generated 'hf_category' filter
        // 'show_option_all'  => esc_html__( 'All Categories', 'happyfiles' ),
        'show_option_none' => esc_html__( 'Uncategorized', 'happyfiles' ),
        'taxonomy'         => $tax_slug,
        'name'             => $tax_obj->name,
        'hierarchical'     => true,
				'hide_empty'       => false,
      ] );

      echo '</p>';
      echo '</div>';
    }
  }
}
