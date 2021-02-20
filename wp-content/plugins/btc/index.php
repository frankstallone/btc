<?php
/**
 * Builders Trust Capital WP Plugin
 *
 * @package           PluginPackage
 * @author            Frank Stallone
 * @copyright         2021 Hoverboard Media
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Builders Trust Capital WP Plugin
 * Description:       Asset, Custom Post Types and Taxonomy Management for Ashmore Partners
 * Version:           1.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Frank Stallone
 * Author URI:        https://stallone.dev
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Asset Loading
 * 
 */


/**
 * Custom Post Types
 * 
 */
// Register Reusable Section Post Type
function reusable_section_post_type() {

	$labels = array(
		'name'                  => 'Reusable Sections',
		'singular_name'         => 'Reusable Section',
		'menu_name'             => 'Reusable Sections',
		'name_admin_bar'        => 'Reusable Sections',
		'archives'              => 'Reusable Section Archives',
		'attributes'            => 'Reusable Section Attributes',
		'parent_item_colon'     => 'Parent Reusable Section:',
		'all_items'             => 'All Reusable Sections',
		'add_new_item'          => 'Add Reusable Sections',
		'add_new'               => 'Add New',
		'new_item'              => 'New Reusable Section',
		'edit_item'             => 'Edit Reusable Section',
		'update_item'           => 'Update Reusable Section',
		'view_item'             => 'View Reusable Section',
		'view_items'            => 'View Reusable Section',
		'search_items'          => 'Search Reusable Sections',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Reusable Sections list',
		'items_list_navigation' => 'Reusable Sections list navigation',
		'filter_items_list'     => 'Filter reusable sections list',
	);
	$args = array(
		'label'                 => 'Reusable Section',
		'description'           => 'Builders Trust Capital Reusable Sections',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'custom-fields'),
        'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-block-default',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'reusable_section', $args );

}
add_action( 'init', 'reusable_section_post_type', 0 );

/**
 * Custom Taxonomies
 * 
 */

