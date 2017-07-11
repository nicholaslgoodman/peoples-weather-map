<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pwmap
 */

get_header(); ?>

<main>

<section class="article-page map-bg">
    <div class="wrapper">
		<?php while ( have_posts() ) : the_post(); ?>

			
		<article id="article" class="article-page">
		<div class="date-wrap"><span class="date"><?php echo get_the_modified_date('Y'); ?></span></div>
                            <h1 class="f2"> <?php the_title(); ?> </h1>
                            <h2 class="f-small"><?php if (function_exists('wpgeo_title')) { wpgeo_title(); } ?></h2>
            
			
			<?php
			the_content();

			//get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();
			?>
 			</article>
                        
                    </div><!-- end .wrapper -->
                </section><!-- end #home-main --> 
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			//if ( comments_open() || get_comments_number() ) :
			//	comments_template();
			//endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

	</div><!-- #primary -->


<?php
get_footer();
