<?php
/**
 * taxonomy registration
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */

// Register Weather Hazards Taxonomy
function weather_hazards_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Weather Hazards', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Weather Hazard', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Weather Hazard', 'text_domain' ),
		'all_items'                  => __( 'All Weather Hazards', 'text_domain' ),
		'parent_item'                => __( 'Parent Weather Hazard', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Weather Hazard:', 'text_domain' ),
		'new_item_name'              => __( 'New Weather Hazard Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Weather Hazard', 'text_domain' ),
		'edit_item'                  => __( 'Edit Weather Hazard', 'text_domain' ),
		'update_item'                => __( 'Update Weather Hazard', 'text_domain' ),
		'view_item'                  => __( 'View Weather Hazard', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Weather Hazard with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Weather Hazards', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Weather Hazards', 'text_domain' ),
		'search_items'               => __( 'Search Weather Hazards', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Weather Hazards', 'text_domain' ),
		'items_list'                 => __( 'Weather Hazards list', 'text_domain' ),
		'items_list_navigation'      => __( 'Weather Hazardslist navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'weather-hazards', array( 'post' ), $args );

}
add_action( 'init', 'weather_hazards_taxonomy', 0 );

// Register Region Taxonomy
function region_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Regions', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Region', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Region', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Region:', 'text_domain' ),
		'new_item_name'              => __( 'New RegionName', 'text_domain' ),
		'add_new_item'               => __( 'Add New Region', 'text_domain' ),
		'edit_item'                  => __( 'Edit Region', 'text_domain' ),
		'update_item'                => __( 'Update Region', 'text_domain' ),
		'view_item'                  => __( 'View Region', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Regions with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Region', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Region', 'text_domain' ),
		'search_items'               => __( 'Search Regions', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Regions', 'text_domain' ),
		'items_list'                 => __( 'Regions list', 'text_domain' ),
		'items_list_navigation'      => __( 'Region list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'region', array( 'post' ), $args );

}
add_action( 'init', 'region_taxonomy', 0 );

// Register County Taxonomy
function county_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Counties', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'County', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'County', 'text_domain' ),
		'all_items'                  => __( 'All Counties', 'text_domain' ),
		'parent_item'                => __( 'Parent County', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent County:', 'text_domain' ),
		'new_item_name'              => __( 'New County Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New County', 'text_domain' ),
		'edit_item'                  => __( 'Edit County', 'text_domain' ),
		'update_item'                => __( 'Update County', 'text_domain' ),
		'view_item'                  => __( 'View County', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Counties with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Counties', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Counties', 'text_domain' ),
		'search_items'               => __( 'Search Counties', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Counties', 'text_domain' ),
		'items_list'                 => __( 'Counties list', 'text_domain' ),
		'items_list_navigation'      => __( 'Counties list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'county', array( 'post' ), $args );

}
add_action( 'init', 'county_taxonomy', 0 );
