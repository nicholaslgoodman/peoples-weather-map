<?php
/**
 * hazard term registration
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */



// Register hazard Terms
function add_hazards() {

	$hazards = array(
		'Drought',
		'Blizzard',
		'Flood',
		'Heat',
		'Insects',
		'Tornado',
		
	);

	foreach ($hazards as $hazard) {
		wp_insert_term( $hazard, 'hazard');
	}
	

}
add_action( 'init', 'add_hazards', 0 );