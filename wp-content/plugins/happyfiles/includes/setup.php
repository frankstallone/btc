<?php
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Setup {

  public function __construct() {
    add_action( 'init', [$this, 'register_taxonomy'] );
    add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
    register_activation_hook( HAPPYFILES_FILE, [$this, 'plugin_activation'] );
    register_deactivation_hook( HAPPYFILES_FILE, [$this, 'plugin_deactivation'] );

    // Load HappyFiles CSS and JS on frontend for page builder editing
    if ( Helpers::$is_page_builder ) {
      add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
    }

    // Elementor Support
		add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'enqueue_scripts'] );

		// Setup plugin internationalization
		add_action( 'plugins_loaded', [$this, 'load_plugin_textdomain'] );
	}

	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'happyfiles',          // Text domain
			false,                 // Deprecated
			'happyfiles/languages' // Relativ path from 'plugins' folders
		);
	}

  public function enqueue_scripts() {
    wp_enqueue_style( 'happyfiles', HAPPYFILES_ASSETS_URL . '/css/hf.min.css', [], filemtime( HAPPYFILES_ASSETS_PATH .'/css/hf.min.css' ) );

    if ( is_rtl() ) {
      wp_enqueue_style( 'happyfiles-rtl', HAPPYFILES_ASSETS_URL . '/css/hf-rtl.min.css', [], filemtime( HAPPYFILES_ASSETS_PATH .'/css/hf-rtl.min.css' ) );
    }

		wp_enqueue_script( 'happyfiles', HAPPYFILES_ASSETS_URL . '/js/hf.min.js', ['jquery'], filemtime( HAPPYFILES_ASSETS_PATH .'/js/hf.min.js' ), true );

		$post_type = Helpers::get_current_post_type();
		$post_type_label_singular = ucwords( str_replace( '_', '', $post_type ) );
		$post_type_label_plural = $post_type_label_singular;
		$post_type_object = get_post_type_object( $post_type );

		if ( is_object( $post_type_object ) ) {
			if ( isset( $post_type_object->labels->singular_name ) ) {
				$post_type_label_singular = $post_type_object->labels->singular_name;
			}

			if ( isset( $post_type_object->labels->name ) ) {
				$post_type_label_plural = $post_type_object->labels->name;
			}
		}

    wp_localize_script( 'happyfiles', 'happyFiles', [
      'debug'               => false,
      'initialized'         => false,
			'width'               => get_option( HAPPYFILES_DB_OPTION_WIDTH, 300 ),
			'listViewDisableAjax' => get_option( HAPPYFILES_SETTING_LIST_VIEW_DISABLE_AJAX, false ),
      'attachmentsBrowser'  => '', // Backbone.js view to refresh .attachements-browser
			'open'                => Helpers::get_open_category(),
			'minimize'            => is_admin() ? Helpers::minimize_category() : false,
      'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
			'editUrl'             => admin_url( 'edit.php' ),
			'uploadUrl'           => admin_url( 'upload.php' ),
			'canEdit'             => Helpers::$can_edit,
			'filters'             => '',
      'filterId'            => Helpers::$taxonomy_name,
      'filterIdUpload'      => 'happyfiles_category_upload',

			'taxonomy'            => Helpers::$taxonomy_name,
			'terms'               => Helpers::$category_terms,
			'tree'                => Helpers::get_tree(),
			'postType'            => $post_type,
			'postTypeSingular'    => $post_type_label_singular,
			'postTypePlural'      => $post_type_label_plural,

      'l10n'                => [
        'move'                              => esc_html__( 'Move', 'happyfiles' ),
        'newCategoryNoName'                 => esc_html__( 'Please enter a category name.', 'happyfiles' ),
        'renameCategoryNoName'              => esc_html__( 'Please enter a category name.', 'happyfiles' ),
        'renameCategoryNoCategorySelected'  => esc_html__( 'Please select a category to rename.', 'happyfiles' ),
        'deleteCategoryConfirmation'        => esc_html__( 'Do you want to delete this media category? This only deletes the taxonomy term in your database. Your files are safe.', 'happyfiles' ),
        'deleteCategoryNoCategorySelected'  => esc_html__( 'Please select a media category to delete.', 'happyfiles' ),
				'deleteCategoryFinishRenamingFirst' => esc_html__( 'Please finish renaming your media category first.', 'happyfiles' ),
				'deleteHappyFilesPluginData'        => esc_html__( 'Are you sure you want to delete all your HappyFiles folders and settings data?', 'happyfiles' ),
				'block'                             => [
					'gallery' => [
						'title'              => esc_html__( 'HappyFiles Gallery', 'happyfiles' ),
						'description'        => esc_html__( 'Display your images in a beautiful gallery.', 'happyfiles' ),
						'settingsTitle'      => esc_html__( 'Gallery Settings', 'happyfiles' ),
						'columns'            => esc_html__( 'Columns', 'happyfiles' ),
						'maxNumberOfImages'  => esc_html__( 'Max. number of images', 'happyfiles' ),
						'categories'         => esc_html__( 'Categories', 'happyfiles' ),
						'categoriesHelp'     => esc_html__( 'Hold down CTRL/CMD to select multiple categories.', 'happyfiles' ),
						'imageSize'          => esc_html__( 'Image size', 'happyfiles' ),
						'linkTo'             => esc_html__( 'Link to', 'happyfiles' ),
						'orderBy'            => esc_html__( 'Order by', 'happyfiles' ),
						'order'              => esc_html__( 'Order', 'happyfiles' ),
						'includeChildren'    => esc_html__( 'Include child categories', 'happyfiles' ),
						'crop'               => esc_html__( 'Crop images', 'happyfiles' ),
						'caption'            => esc_html__( 'Caption', 'happyfiles' ),
						'lightbox'           => esc_html__( 'Lightbox', 'happyfiles' ),
						'lightboxFullscreen' => esc_html__( 'Lightbox: Fullscreen', 'happyfiles' ),
						'lightboxThumbnails' => esc_html__( 'Lightbox: Thumbnails', 'happyfiles' ),
						'lightboxZoom'       => esc_html__( 'Lightbox: Zoom', 'happyfiles' ),
					],
				],
			],

			'order' => [
				'ASC'  => __( 'Ascending' ),
				'DESC' => __( 'Descending' ),
			],

			'orderBy' => [
				'none'     => __( 'None' ),
				'ID'       => __( 'ID' ),
				'author'   => __( 'Author' ),
				'title'    => __( 'Title' ),
				'name'     => __( 'Name' ),
				'type'     => __( 'Type' ),
				'date'     => __( 'Date' ),
				'modified' => __( 'Modified' ),
				'parent'   => __( 'Parent' ),
				'rand'     => __( 'Random' ),
			],

			'imageSizes' => [
				'thumbnail' => esc_html__( 'Thumbnail', 'happyfiles' ),
				'medium'    => esc_html__( 'Medium', 'happyfiles' ),
				'large'     => esc_html__( 'Large', 'happyfiles' ),
				'full'      => esc_html__( 'Full size', 'happyfiles' ),
			],

			'linkTo' => [
				'attachment' => esc_html__( 'Attachment Page', 'happyfiles' ),
				'media'      => esc_html__( 'Media File', 'happyfiles' ),
				'none'       => esc_html__( 'None', 'happyfiles' ),
			],
    ] );
  }

  public function register_taxonomy() {
    register_taxonomy(
      HAPPYFILES_TAXONOMY,
      ['attachment'],
      [
        'labels' => [
          'name'               => esc_html__( 'Category', 'happyfiles' ),
          'singular_name'      => esc_html__( 'Category', 'happyfiles' ),
          'add_new_item'       => esc_html__( 'Add New Category', 'happyfiles' ),
          'edit_item'          => esc_html__( 'Edit Category', 'happyfiles' ),
          'new_item'           => esc_html__( 'Add New Category', 'happyfiles' ),
          'search_items'       => esc_html__( 'Search Category', 'happyfiles' ),
          'not_found'          => esc_html__( 'Category not found', 'happyfiles' ),
          'not_found_in_trash' => esc_html__( 'Category not found in trash', 'happyfiles' ),
        ],
        'public'             => false,
        'publicly_queryable' => false,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => false,
        'show_in_nav_menus'  => false,
				'show_in_quick_edit' => false,
				'show_in_rest'       => true, // wp.data.select('core').getEntityRecords('taxonomy', 'happyfiles_category', {per_page: -1}) // max 100 items for REST API call
        'show_admin_column'  => false,
        'rewrite'            => false,
        'update_count_callback' => '_update_generic_term_count', // Update term count for attachments
      ]
    );
  }

  public function plugin_activation() {
    // Store plugin activation timestamp for "Rate Us" notification after 7 days
    update_option( 'happyfiles_plugin_activation', time() );
  }

  public function plugin_deactivation() {
    delete_option( 'happyfiles_plugin_activation' );
    delete_option( 'happyfiles_hide_rate_us_notification' );
  }

}
