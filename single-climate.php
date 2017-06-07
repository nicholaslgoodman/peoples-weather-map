<?php
/**
 * The template for displaying hazard pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */
get_header('tax');
echo '<main><section class="article-page map-bg"><div class="wrapper">';

while ( have_posts() ) : the_post();
echo '<article id="article" class="article-page"><h1 class="f2">';
the_title('<h1 class="post-title">', '</h1>');
echo '</h1><img src="img/nt-holder.jpg" alt="" class="fl" />';
  echo '<div class="entry-content">';
  the_content();
  echo '</article></div><!-- end .wrapper --></section><!-- end #home-main --></div><!-- #primary -->';
endwhile;	
get_footer();
