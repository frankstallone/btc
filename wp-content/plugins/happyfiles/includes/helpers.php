<?php
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Helpers {

  public static $can_edit = false;

	public static $category_terms = [];

	public static $post_type = '';

	public static $taxonomy_name = 'happyfiles_category';

	public static $is_page_builder = false;
	public static $load_plugin = true;

  public function __construct() {
		/**
     * Load HappyFiles CSS and JS conditionally (only load on frontend for page builder editing)
     *
     * Bricks:          Check via URL param 'bricksbuilder'
     * Beaver Builder:  Check via URL param 'fl_builder'
     * Brizy:           Check via URL param 'brizy-edit-iframe'
     * Divi Theme:      Check via URL param 'et_fb'
     * Elementor:       Editor already loads in wp-admin
     * Oxygen:          Check via URL param 'ct_builder'
     * Visual Composer: Editor already loads in wp-admin
     */

		if (
      isset( $_GET['bricksbuilder'] ) ||
			isset( $_GET['et_fb'] ) ||
			isset( $_GET['fl_builder'] ) ||
      isset( $_GET['brizy-edit-iframe'] ) ||
			( isset( $_GET['ct_builder'] ) && ! isset( $_GET['oxygen_iframe'] ) )
		) {
			self::$is_page_builder = true;
		}

		if ( ! self::$is_page_builder && ! is_admin() ) {
			self::$load_plugin = false;
		}

		// Prevent HappyFiles db queries when plugin not needed
		if ( ! self::$load_plugin ) {
			return;
		}

		self::$post_type = self::get_current_post_type();

    add_action( 'init', [$this, 'can_edit_media_categories'] );

		// Call after register_taxonomy
		add_action( 'init', [$this, 'set_taxonomy_name'], 10, 2 );
		add_action( 'init', [$this, 'get_category_terms'], 11, 2 );

		$alternative_count = get_option( HAPPYFILES_SETTING_ALTERNATIVE_COUNT, false );

		if ( $alternative_count ) {
			add_filter( 'get_terms', [$this, 'set_terms_count'], 10, 4 );
		}
	}

	public static function set_taxonomy_name() {
		self::$taxonomy_name = self::$post_type && self::$post_type !== 'attachment' ? 'hf_cat_' . self::$post_type : 'happyfiles_category';
	}

	public static function get_taxonomy_by( $type, $data ) {
		// Return taxonomy name for files if not in wp-admin (e.g. page builder frontend editing)
		if ( ! is_admin() || ! $data ) {
			return HAPPYFILES_TAXONOMY;
		}

		switch ( $type ) {
			case 'ID':
				$taxonomy_obj = get_term( $data );

				return is_object( $taxonomy_obj ) ? $taxonomy_obj->taxonomy : HAPPYFILES_TAXONOMY;
			break;

			case 'post_type':
				return $data === 'attachment' ? HAPPYFILES_TAXONOMY : 'hf_cat_' . $data; // Max. tax length of 32 characters
			break;

			default:
				return HAPPYFILES_TAXONOMY;
			break;
		}
	}

  /**
   * Sanitize all $_GET, $_POST, $_REQUEST, $_FILE input data before processing
   *
   * @param $data (array|string)
   * @since  0.1
   * @return mixed
   */
  public static function sanitize_data( $data ) {
   // Sanitize string
    if ( is_string( $data ) ) {
      $data = sanitize_text_field( $data );
    }

    // Sanitize each element individually
    else if ( is_array( $data ) ) {
      foreach ( $data as $key => &$value ) {
        if ( is_array( $value ) ) {
          $value = sanitize_data( $value );
        } else {
          $value = sanitize_text_field( $value );
        }
      }
    }

    return $data;
 }

  public static function get_category_terms( $taxonomy = '', $post_type = '' ) {
		if ( ! $post_type ) {
			$post_type = self::$post_type;
		}

		if ( ! $taxonomy ) {
			$taxonomy = self::$taxonomy_name ? self::$taxonomy_name : self::get_taxonomy_by( 'post_type', $post_type );
		}

		// Apply WP filters like date, etc.
		global $wp_query;

		$month_filter = gettype( $wp_query ) === 'object' && isset( $wp_query->query['m'] ) && $wp_query->query['m'] ? $wp_query->query['m'] : 0;

		// NOTE: Not in use till $wp_query_args works for get_terms below
		// $wp_query_args = [
		// 	'm' => $month_filter,
		// ];

		$wp_query_args = [];

    // Add 'all' terms to category terms (easier to update DOM with all list items)
		$default_terms = [];

		$name = esc_html__( 'All Files', 'happyfiles' );

		if ( $post_type !== 'attachment' ) {
			$post_type_object = get_post_type_object( $post_type );
			$name = sprintf( esc_html__( 'All %s', 'happyfiles' ), ucwords( $post_type_object->label ) );
		}

		$all_items = self::get_all_items( $post_type, $wp_query_args );

		$term_all = new \stdClass();

		$term_all->term_id  = 'all';
		$term_all->parent   = 0;
    $term_all->slug     = 'all';
		$term_all->name     = $name;
		$term_all->value    = ''; // Empty value to show all attachments
		$term_all->count    = $all_items->found_posts;
		$term_all->item_ids = $all_items->posts;

		if ( isset( $_GET['debug'] ) ) {
			foreach ( $all_items->posts as $post_id ) {
				$term_all->items[] = [
					'id'  => $post_id,
					'url' => get_post_type( $post_id ) === 'attachment' ? wp_get_attachment_url( $post_id ) : get_the_permalink( $post_id ),
				];
			}
		}

		$default_terms[] = $term_all;

		// Add 'all' and 'uncategorized' terms to category terms (easier to update DOM with all list items)
		$uncategorized_items = self::get_uncategorized_items( $post_type, $taxonomy, $wp_query_args );

		$term_uncategorized = new \stdClass();

    $term_uncategorized->term_id  = -1;
    $term_uncategorized->parent   = 0;
    $term_uncategorized->slug     = 'uncategorized';
    $term_uncategorized->name     = esc_html__( 'Uncategorized', 'happyfiles' );
		$term_uncategorized->value    = -1; // = Identifier for uncategorized items in 'ajax_query_attachments_args' filter
		$term_uncategorized->count    = $uncategorized_items->found_posts;
		$term_uncategorized->item_ids = $uncategorized_items->posts;

		if ( isset( $_GET['debug'] ) ) {
			foreach ( $uncategorized_items->posts as $post_id ) {
				$term_uncategorized->items[] = [
					'id'  => $post_id,
					'url' => get_post_type( $post_id ) === 'attachment' ? wp_get_attachment_url( $post_id ) : get_the_permalink( $post_id ),
				];
			}
		}

		$default_terms[] = $term_uncategorized;

		// Sort by category position: Terms with position
		// TODO: Apply WP date_query, search query, etc. (see: $wp_query_args)
    $terms_with_position = get_terms( [
      'taxonomy'   => $taxonomy,
			'hide_empty' => false,

      'meta_query' => [
        'terms_exists' => [
          'key'     => HAPPYFILES_POSITION,
          'compare' => 'EXISTS'
        ],
      ],

      // 'orderby'    => 'terms_exists',
      'orderby'    => 'meta_value_num',
			'order'      => 'ASC',
		] );

		// Check if taxonomy exists
		if ( is_wp_error( $terms_with_position ) ) {
			$terms_with_position = [];
		}

		self::$category_terms = array_merge( $default_terms, $terms_with_position );

    $terms_without_position = get_terms( [
      'taxonomy'   => $taxonomy,
			'hide_empty' => false,

      'meta_query' => [
        'terms_not_exists' => [
          'key'     => HAPPYFILES_POSITION,
          'compare' => 'NOT EXISTS'
        ],
      ],

      'orderby'    => 'terms_not_exists',
			'order'      => 'ASC',
		] );

		// Check if taxonomy exists
		if ( is_wp_error( $terms_without_position ) ) {
			$terms_without_position = [];
		}

		self::$category_terms = array_merge( self::$category_terms, $terms_without_position );

    return self::$category_terms;
	}

	/**
	 * Fix term count for WPML, etc.
	 *
	 * Doesn't work with get_posts().
	 *
	 * @since 1.4
	 */
  public function set_terms_count( $terms ) {
    foreach ( $terms as $index => $term ) {
			// Return terms if we aren't looping through a HappyFiles taxonomy
			if (
				! is_object( $term ) ||
				( is_object( $term ) && $term->taxonomy !== self::$taxonomy_name )
			) {
				return $terms;
			}

      $term_query_results = new \WP_Query( [
				'post_type'      => self::$post_type,
				'posts_per_page' => -1,
				'post_status'    => self::$post_type === 'attachment' ? ['inherit', 'private'] : ['any'],
				'fields'         => 'ids',
				'tax_query'      => [
					[
						'taxonomy' => $term->taxonomy,
						'terms'    => [$term->term_id],
						'field'    => 'term_id',
					],
				],
			] );

			$terms[$index]->count = $term_query_results->found_posts;

			// Get term IDs for debugging
			$terms[$index]->term_ids = $term_query_results->posts;

			wp_reset_postdata();
		}

    return $terms;
	}

  /**
   * Get terms hierarchical
   *
   * Term array with nested 'children' array
   *
   * @param [type] $terms
   * @param integer $parent_id
   *
   * @return array
   */
  public static function get_terms_hierarchical( $terms, $parent_id = 0 ) {
    $hierarchical_terms = [];

    foreach ( $terms as $term ) {
      if ( $term->parent === $parent_id ) {
        $term->children = self::get_terms_hierarchical( $terms, $term->term_id );
        $hierarchical_terms[] = $term;
      }
		}

    return $hierarchical_terms;
  }

  public static function get_tree() {
    return Helpers::get_terms_hierarchical( Helpers::$category_terms );
  }

  public static function get_all_items( $post_type = 'attachment', $wp_query_args = [] ) {
		$attachment_args = array_merge( $wp_query_args, [
			'post_type'      => $post_type,
			'post_status'    => $post_type === 'attachment' ? ['inherit', 'private'] : ['any'],
			'posts_per_page' => -1,
      'fields'         => 'ids',
		] );

		$query = new \WP_Query( $attachment_args );

		wp_reset_postdata();

		return $query;
  }

  public static function get_uncategorized_items( $post_type = 'attachment', $taxonomy, $wp_query_args = [] ) {
		$attachment_args = array_merge( $wp_query_args, [
			'post_type'      => $post_type,
			'post_status'    => $post_type === 'attachment' ? ['inherit', 'private'] : ['any'],
      'posts_per_page' => -1,
      'fields'         => 'ids',
      'tax_query'      => [
        [
          'taxonomy' => $taxonomy,
          'operator' => 'NOT EXISTS',
        ],
      ],
		] );

		$results = new \WP_Query( $attachment_args );

		wp_reset_postdata();

    return $results;
  }

  /**
   * Check currently logged in user against HappyFiles option setting to determine if user can edit media categories
   */
  public static function can_edit_media_categories() {
    // Admin can always edit
    if ( current_user_can( 'administrator' ) ) {
      self::$can_edit = true;

      return;
    }

    $setting_user_roles = get_option( HAPPYFILES_SETTING_USER_ROLES, [] );

    if ( empty( $setting_user_roles ) ) {
      $setting_user_roles = [];
    }

    $current_user_roles = wp_get_current_user()->roles;

    $user_can_edit = array_intersect( array_map( 'strtolower', $setting_user_roles ), array_map( 'strtolower', $current_user_roles ) );

    self::$can_edit = count( $user_can_edit ) ? true : false;
	}

	public static function get_open_category() {
		$user_category_state = get_user_meta( get_current_user_id(), 'happyfiles_category_state', true );

		return isset( $user_category_state[Helpers::$taxonomy_name] ) && ! empty( $user_category_state[Helpers::$taxonomy_name] ) ? $user_category_state[Helpers::$taxonomy_name] : '';
	}

	public static function minimize_category() {
		$user_category_minimize = get_user_meta( get_current_user_id(), 'happyfiles_category_minimize', true );

		if ( ! is_array( $user_category_minimize ) ) {
			return false;
		}

		return in_array( Helpers::$taxonomy_name, $user_category_minimize );
	}

  /**
   * Get current post type in wp-admin
   */
	public static function get_current_post_type() {
		global $post, $pagenow, $typenow, $current_screen;

		// Page builder frontend editing
		if ( ! is_admin() || $pagenow !== 'edit.php' ) {
			return 'attachment';
		}

		if ( $post && $post->post_type )  {
			return $post->post_type;
		}

		else if ( $typenow ) {
			return $typenow;
		}

		else if ( $current_screen && $current_screen->post_type ) {
			return $current_screen->post_type;
		}

		else if ( isset( $_REQUEST['post_type'] ) ) {
			return sanitize_key( $_REQUEST['post_type'] );
		}

		else if ( isset( $_GET['post_type'] ) && ! empty( $_GET['post_type'] ) ) {
			return sanitize_key( $_GET['post_type'] );
		}

		else if ( $pagenow === 'edit.php' ) {
			return 'post';
		}

		// Default post type for media library
		return 'attachment';
	}

}
