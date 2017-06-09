<?php
/**
 * county term registration, also deletes current counties
 */
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */



// Register County Terms
function add_counties() {

	$counties = array(
		'Adair',
		'Adams',
		'Allamakee',
		'Appanoose',
		'Audubon',
		'Benton',
		'Black Hawk',
		'Boone',
		'Bremer',
		'Buchanan',
		'Buena Vista',
		'Butler',
		'Calhoun',
		'Carroll',
		'Cass',
		'Cedar',
		'Cerro Gordo',
		'Cherokee',
		'Chickasaw',
		'Clarke',
		'Clay',
		'Clayton',
		'Clinton',
		'Crawford',
		'Dallas',
		'Davis',
		'Decatur',
		'Delaware',
		'Des Moines',
		'Dickinson',
		'Dubuque',
		'Emmet',
		'Fayette',
		'Floyd',
		'Franklin',
		'Fremont',
		'Greene',
		'Grundy',
		'Guthrie',
		'Hamilton',
		'Hancock',
		'Hardin',
		'Harrison',
		'Henry',
		'Howard',
		'Humboldt',
		'Ida',
		'Iowa',
		'Jackson',
		'Jasper',
		'Jefferson',
		'Johnson',
		'Jones',
		'Keokuk',
		'Kossuth',
		'Lee',
		'Linn',
		'Louisa',
		'Lucas',
		'Lyon',
		'Madison',
		'Mahaska',
		'Marion',
		'Marshall',
		'Mills',
		'Mitchell',
		'Monona',
		'Monroe',
		'Montgomery',
		'Muscatine',
		'O\'Brien',
		'Osceola',
		'Page',
		'Palo Alto',
		'Plymouth',
		'Pocahontas',
		'Polk',
		'Pottawattamie',
		'Poweshiek',
		'Ringgold',
		'Sac',
		'Scott',
		'Shelby',
		'Sioux',
		'Story',
		'Tama',
		'Taylor',
		'Union',
		'Van Buren',
		'Wapello',
		'Warren',
		'Washington',
		'Wayne',
		'Webster',
		'Winnebago',
		'Winneshiek',
		'Woodbury',
		'Worth',
		'Wright'
	);

	foreach ($counties as $county) {
		wp_insert_term( $county, 'county');
	}
	

}
add_action( 'init', 'add_counties', 0 );