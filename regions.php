<?php
/**
 * region term registration
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */



// Register region Terms
function add_regions() {

	$regions = array(
		'Northwest',
		'Northeast',
		'Southwest',
		'Southeast',
		
	);

	foreach ($regions as $region) {
		wp_insert_term( $region, 'region');
	}
	

}
add_action( 'init', 'add_regions', 0 );