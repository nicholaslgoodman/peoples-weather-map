<?php
/**
 *	WARNING: deletes current regions and their connections to articles
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */

// Delete all region Terms
function delete_regions() {
       $terms = get_terms( array(
            'taxonomy' => 'region',
            'hide_empty' => false,
        ) );

      foreach ( $terms as $term ) {
           wp_delete_term( $term->term_id, 'region' );
  		}
}
add_action( 'init', 'delete_regions', 0 );
