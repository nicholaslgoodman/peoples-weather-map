<?php
/**
 * The template for displaying hazard pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */
get_header();
echo '<main><section class="article-page map-bg"><div class="wrapper">';

$args = array( 'post_type' => 'hazards', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
echo '<article id="article" class="article-page">';
echo '</h1><img src="img/nt-holder.jpg" alt="" class="fl" />';
the_title('<h1 class="f2">', '</h1>');

  echo '<div class="entry-content">';
  the_excerpt();
  echo '</div>  <a href=';
  the_permalink();
  echo '> read now</a></article>';
endwhile;	
echo '</div><!-- end .wrapper -->
                </section><!-- end #home-main -->';
get_footer();
