<?php
/**
 * The template for displaying hazard pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */
get_header(); ?>
<main>
    <section class="map-bg article-page-alt">
        <div class="wrapper">
            <h1 class="f2 tl">Weather Hazards</h1>

        <?php while ( have_posts() ) : the_post(); ?>
            
        
            
        <div class="box">
            <h2 class="f3"><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
            
        </div><!-- end .article-content-wrap -->
            
            
        <?php endwhile;	?>

            
        </div><!-- end .wrapper -->
    </section><!-- end #home-main -->

<?php get_footer(); ?>
