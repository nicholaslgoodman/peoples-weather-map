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
            <h1 class="f2 tl">Climate Scientists</h1>

        <?php while ( have_posts() ) : the_post(); ?>
            
        
            
        <div class="box">
            <h2 class="f3"><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
            
            
            <h4>Recommended Link</h4>
            <!-- ******** WP-LOGIC
                    Climate custom post types will need some custom fields to add a recommended link by the scientist:
                        Recommended Link
                        Recommended Link Name
                        Recommended Link Description
            -->
            
        </div><!-- end .article-content-wrap -->
            
            
        <?php endwhile;	?>

            
        </div><!-- end .wrapper -->
    </section><!-- end #home-main -->

<?php get_footer(); ?>