<?php
/**
 *	WARNING: deletes current counties and their connections to articles
 */
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */

// Delete all County Terms
function delete_counties() {
       $terms = get_terms( array(
            'taxonomy' => 'county',
            'hide_empty' => false,
        ) );

      foreach ( $terms as $term ) {
           wp_delete_term( $term->term_id, 'county' );
  		}
}
add_action( 'init', 'delete_counties', 0 );
