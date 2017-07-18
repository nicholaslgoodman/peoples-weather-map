<?php
/**
 *	WARNING: deletes current hazards and their connections to articles
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */

// Delete all hazard Terms
function delete_hazards() {
       $terms = get_terms( array(
            'taxonomy' => 'hazard',
            'hide_empty' => false,
        ) );

      foreach ( $terms as $term ) {
           wp_delete_term( $term->term_id, 'hazard' );
  		}
}
add_action( 'init', 'delete_hazards', 0 );
