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
// Register Employee Post Type
function employee_section_post_type() {

	$labels = array(
		'name'                  => 'Employees',
		'singular_name'         => 'Employee',
		'menu_name'             => 'Employees',
		'name_admin_bar'        => 'Employees',
		'archives'              => 'Employee Archives',
		'attributes'            => 'Employee Attributes',
		'parent_item_colon'     => 'Parent Employee:',
		'all_items'             => 'All Employees',
		'add_new_item'          => 'Add Employees',
		'add_new'               => 'Add New',
		'new_item'              => 'New Employee',
		'edit_item'             => 'Edit Employee',
		'update_item'           => 'Update Employee',
		'view_item'             => 'View Employee',
		'view_items'            => 'View Employee',
		'search_items'          => 'Search Employees',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Employees list',
		'items_list_navigation' => 'Employees list navigation',
		'filter_items_list'     => 'Filter employee list',
	);
	$args = array(
		'label'                 => 'Employee',
		'description'           => 'Builders Trust Capital Employees',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'),
        'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'employee_section', $args );

}
add_action( 'init', 'employee_section_post_type', 0 );


// Register Testimonial Post Type
function testimonial_post_type() {

	$labels = array(
		'name'                  => 'Testimonials',
		'singular_name'         => 'Testimonial',
		'menu_name'             => 'Testimonials',
		'name_admin_bar'        => 'Testimonials',
		'archives'              => 'Testimonial Archives',
		'attributes'            => 'Testimonial Attributes',
		'parent_item_colon'     => 'Parent Testimonial:',
		'all_items'             => 'All Testimonials',
		'add_new_item'          => 'Add Testimonials',
		'add_new'               => 'Add New',
		'new_item'              => 'New Testimonial',
		'edit_item'             => 'Edit Testimonial',
		'update_item'           => 'Update Testimonial',
		'view_item'             => 'View Testimonial',
		'view_items'            => 'View Testimonial',
		'search_items'          => 'Search Testimonials',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Testimonials list',
		'items_list_navigation' => 'Testimonials list navigation',
		'filter_items_list'     => 'Filter testimonial list',
	);
	$args = array(
		'label'                 => 'Testimonial',
		'description'           => 'Builders Trust Capital Testimonials',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields'),
        'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );

// Register Loan Gallery Post Type
function loan_gallery_post_type() {

	$labels = array(
		'name'                  => 'Loan Gallery',
		'singular_name'         => 'Loan',
		'menu_name'             => 'Loan Gallery',
		'name_admin_bar'        => 'Loan Gallery',
		'archives'              => 'Loan Archives',
		'attributes'            => 'Loan Attributes',
		'parent_item_colon'     => 'Parent Loan:',
		'all_items'             => 'All Loan Gallery',
		'add_new_item'          => 'Add Loan Gallery',
		'add_new'               => 'Add New',
		'new_item'              => 'New Loan',
		'edit_item'             => 'Edit Loan',
		'update_item'           => 'Update Loan',
		'view_item'             => 'View Loan',
		'view_items'            => 'View Loan',
		'search_items'          => 'Search Loan Gallery',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Loan Gallery list',
		'items_list_navigation' => 'Loan Gallery list navigation',
		'filter_items_list'     => 'Filter loan list',
	);
	$args = array(
		'label'                 => 'Loan',
		'description'           => 'Builders Trust Capital Loan Gallery',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields'),
        'taxonomies'            => array(),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-embed-photo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'       		=> array( 'slug' => 'gallery' ),
	);
	register_post_type( 'loan_gallery', $args );

}
add_action( 'init', 'loan_gallery_post_type', 0 );

/**
 * Custom Taxonomies
 * 
 */

