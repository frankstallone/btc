<?php 
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Gallery {

	public function __construct() {
		add_action( 'init', [$this, 'register_block'] );
		add_filter( 'block_categories', [$this, 'block_categories'] );
		add_shortcode( 'happyfiles_gallery', [$this, 'render_shortcode'] );
	}

	/**
	 * Block category: 'HappyFiles'
	 */
	public function block_categories( $categories ) {
		$category_slugs = wp_list_pluck( $categories, 'slug' );
		
    if ( in_array( 'happyfiles', $category_slugs, true ) ) {
			return $categories;
		}
		
		return array_merge(
			$categories,
			[
				[
					'slug'  => 'happyfiles',
					'title' => 'HappyFiles',
					'icon'  => null,
				],
			]
    );
	}

	/**
	 * Register block: 'happyfiles/gallery'
	 */
	public function register_block() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		// https://developer.wordpress.org/block-editor/tutorials/javascript/js-build-setup/#dependency-management
		$asset_file = require_once( HAPPYFILES_ASSETS_PATH . '/blocks/blocks.asset.php' );
		$dependencies = array_merge( ['happyfiles'], $asset_file['dependencies'] );
		$version = $asset_file['version'];

		$dependencies = ['happyfiles', 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components'];

		wp_register_script( 'happyfiles-block-gallery', HAPPYFILES_ASSETS_URL . '/blocks/blocks.js', $dependencies, $version );
		
		register_block_type( 'happyfiles/gallery', [
			'editor_script'   => 'happyfiles-block-gallery',
			'render_callback' => [$this, 'render_block'],
			'attributes'      => [
				'columns' => [
					'type'    => 'number',
					'default' => 3,
				],

				'max' => [
					'type'    => 'number',
					// 'default' => -1,
				],

				'categories' => [
					'type'    => 'array',
					'default' => [],
				],

				'orderBy' => [
					'type' => 'string',
					'default' => 'date',
				],

				'order' => [
					'type' => 'string',
					'default' => 'DESC',
				],

				'imageSize' => [
					'type'    => 'string',
					'default' => 'medium',
				],

				'linkTo' => [
					'type'    => 'string',
					'default' => 'none',
				],

				'includeChildren' => [
					'type'    => 'boolean',
					'default' => false,
				],
				
				'crop' => [
					'type'    => 'boolean',
					'default' => true,
				],

				'caption' => [
					'type'    => 'boolean',
					'default' => false,
				],

				'lightbox' => [
					'type'    => 'boolean',
					'default' => false,
				],

				'lightboxFullscreen' => [
					'type'    => 'boolean',
					'default' => false,
				],

				'lightboxThumbnails' => [
					'type'    => 'boolean',
					'default' => false,
				],

				'lightboxZoom' => [
					'type'    => 'boolean',
					'default' => false,
				],
			],
		] );
	}

	/**
	 * Render "HappyFiles Gallery" Gutenberg block
	 * 
	 * Also used in editor via ServerSideRender.
	 */
	public static function render_block( $attributes = [], $content = '' ) {
		$categories = false;
		$columns = 3;
		$max = -1;
		$image_size = 'medium';
		$link_to = 'none';
		$order_by = 'date';
		$order = 'DESC';
		$include_children = false;
		$crop = true;
		$show_caption = true;
		$lightbox = false;
		$lightbox_thumbnails = false;
		$lightbox_zoom = false;
		$lightbox_fullscreen = false;

		if ( ! is_array( $attributes ) ) {
			$attributes = [];
		}

		foreach ( $attributes as $key => $value ) {
			if ( ! $key || $value === '' ) {
				continue;
			}

			// NOTE: As shortcode atts are converted to lowercase (e.g.: imageSize > imagesize)
			$key = strtolower( $key );

			switch ( $key ) {
				case 'categories':
					$categories = $value;
				break;

				case 'columns':
					$columns = intval( $value );
				break;

				case 'max':
					$max = intval( $value );
				break;

				case 'imagesize':
					$image_size = $value;
				break;

				case 'linkto':
					$link_to = $value;
				break;

				case 'orderby':
					$order_by = $value;
				break;

				case 'order':
					$order = $value;
				break;

				case 'includechildren':
					$include_children = filter_var( $value, FILTER_VALIDATE_BOOLEAN );
				break;

				case 'crop':
					$crop = filter_var( $value, FILTER_VALIDATE_BOOLEAN );
				break;

				case 'caption':
					$show_caption = filter_var( $value, FILTER_VALIDATE_BOOLEAN );
				break;

				case 'lightbox':
					$lightbox = filter_var( $value, FILTER_VALIDATE_BOOLEAN );;
				break;

				case 'lightboxfullscreen':
					$lightbox_fullscreen = filter_var( $value, FILTER_VALIDATE_BOOLEAN );;
				break;

				case 'lightboxthumbnails':
					$lightbox_thumbnails = filter_var( $value, FILTER_VALIDATE_BOOLEAN );;
				break;

				case 'lightboxzoom':
					$lightbox_zoom = filter_var( $value, FILTER_VALIDATE_BOOLEAN );;
				break;

			}
		}

		if ( ! is_array( $categories ) ) {
			$categories = explode( ',', $categories );
		}

		if ( ! $categories ) {
			return '<div class="components-notice is-error"><div class="components-notice__content"><p>' . esc_html__( 'No category selected.', 'happyfiles' ) . '</p></div></div>';
		}

		// Get term field type from first passed category
		$field = count( $categories ) && ! is_numeric( $categories[0] ) ? 'slug' : 'term_id';

		$attachment_ids = get_posts( [
			'post_type'      => 'attachment',
			'posts_per_page' => intval( $max ),
			'post_status'    => ['inherit', 'private'],
			'fields'         => 'ids',
			'orderby'        => $order_by,
			'order'          => $order,
			'tax_query'      => [
				[
					'taxonomy'         => HAPPYFILES_TAXONOMY,
					'terms'            => $categories,
					'field'            => $field,
					'include_children' => $include_children,
				],
			],
		] );

		if ( ! count( $attachment_ids ) ) {
			return '<div class="components-notice is-error"><div class="components-notice__content"><p>' . esc_html__( 'The selected category has no images.', 'happyfiles' ) . '</p></div></div>';
		}

		$wrapper_classes = [
			'happyfiles-gallery',
			'wp-block-gallery',
			"columns-$columns",
		];

		if ( $crop ) {
			$wrapper_classes[] = 'is-cropped';
		}

		if ( $lightbox ) {
			$wrapper_classes[] = 'lightbox';
		}

		// Rendered in Gutenberg (wp-admin): Remove 'a' link tag
		$gutenberg_requested = strpos( wp_get_referer(), admin_url() ) === 0;

		if ( $gutenberg_requested ) {
			$link_to = false;
		}

		// Gallery element ID 
		$gallery_id = 'happyfiles-gallery-';

		// Generate random element ID to every gallery lightbox
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$characters_length = strlen( $characters );
		
		for ( $i = 0; $i < 6; $i++ ) {
			$gallery_id .= $characters[rand(0, $characters_length - 1)];
		}

		if ( $lightbox ) {
			// https://github.com/sachinchoolur/lightgallery.js
			wp_enqueue_script( 'happyfiles-gallery-lightbox', HAPPYFILES_ASSETS_URL . '/lightgallery/js/lightgallery.min.js', [], filemtime( HAPPYFILES_ASSETS_PATH .'/lightgallery/js/lightgallery.min.js' ) );

			if ( $lightbox_fullscreen ) {
				wp_enqueue_script( 'happyfiles-gallery-lightbox-fullscreen', HAPPYFILES_ASSETS_URL . '/lightgallery/js/lg-fullscreen.min.js', ['happyfiles-gallery-lightbox'], filemtime( HAPPYFILES_ASSETS_PATH .'/lightgallery/js/lg-fullscreen.min.js' ) );
			}
			
			if ( $lightbox_thumbnails ) {
				wp_enqueue_script( 'happyfiles-gallery-lightbox-thumbnail', HAPPYFILES_ASSETS_URL . '/lightgallery/js/lg-thumbnail.min.js', ['happyfiles-gallery-lightbox'], filemtime( HAPPYFILES_ASSETS_PATH .'/lightgallery/js/lg-thumbnail.min.js' ) );
			}

			if ( $lightbox_zoom ) {
				wp_enqueue_script( 'happyfiles-gallery-lightbox-zoom', HAPPYFILES_ASSETS_URL . '/lightgallery/js/lg-zoom.min.js', ['happyfiles-gallery-lightbox'], filemtime( HAPPYFILES_ASSETS_PATH .'/lightgallery/js/lg-zoom.min.js' ) );
			}

			wp_add_inline_script( 'happyfiles-gallery-lightbox', "
				lightGallery(document.querySelector('#$gallery_id ul'), {
					counter: false,
					download: false,
					hideBarsDelay: 1000,
					fullScreen: " . var_export( $lightbox_fullscreen, true ) . ",
					thumbnail: " . var_export( $lightbox_thumbnails, true ) . ",
					zoom: " . var_export( $lightbox_zoom, true ) . "
				})
			" );
			
			wp_enqueue_style( 'happyfiles-gallery-lightbox', HAPPYFILES_ASSETS_URL . '/lightgallery/css/lightgallery.min.css', [], filemtime( HAPPYFILES_ASSETS_PATH .'/lightgallery/css/lightgallery.min.css' ) );
		}

		ob_start();
		?>
		<figure id="<?php echo esc_attr( $gallery_id ); ?>" class="<?php echo implode( ' ', $wrapper_classes ); ?>">
			<ul class="blocks-gallery-grid" style="width: 100%;">
				<?php
				$attr = [];

				foreach ( $attachment_ids as $attachment_id ) {
					$image_classes = ['blocks-gallery-item'];

					$image_categories = get_the_terms( $attachment_id, HAPPYFILES_TAXONOMY );

					if ( is_array( $image_categories ) && count( $image_categories ) ) {
						$image_categories = wp_list_pluck( $image_categories, 'slug' );

						$image_classes = array_merge( $image_classes, $image_categories );
					}

					if ( $lightbox ) {
						echo '<li class="' . join( ' ', $image_classes ) . '" data-src="' . wp_get_attachment_url( $attachment_id ) . '">';
					} else {
						echo '<li class="' . join( ' ', $image_classes ) . '">';
					}
					
					echo '<figure>';

					if ( $link_to && $link_to !== 'none' ) {
						$attachment_url = $link_to === 'attachment' ? get_permalink( $attachment_id ) : wp_get_attachment_url( $attachment_id );

						echo '<a href="' . $attachment_url . '">';	
					}

					echo wp_get_attachment_image( $attachment_id, $image_size, false, $attr );

					if ( $link_to && $link_to !== 'none' ) {
						echo '</a>';
					}

					$the_caption = wp_get_attachment_caption( $attachment_id );

					if ( $show_caption && $the_caption ) {
						echo '<figcaption class="blocks-gallery-item__caption">' . $the_caption . '</figcaption>';
					}

					echo '</figure>';
					echo '</li>';
				}
				?>
			</ul>
		</figure>
		<?php

		return ob_get_clean();
	}

	/**
	 * Render shortcode using the same code we use to render the "HappyFiles Gallery" block
	 */
	public function render_shortcode( $tag, $callback ) {
		return self::render_block( $tag );
	}

}