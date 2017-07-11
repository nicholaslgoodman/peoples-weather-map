<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */

get_header(); ?>
<!-- ******** WP-TEMPLATE: PAGE.PHP ************** -->

<main>

<section class="article-page map-bg">
                    <div class="wrapper">
		<?php 
		while ( have_posts() ) : the_post(); ?>

			
		<article>

                            <h1 class="f2"> <?php the_title('<h1 class="post-title">', '</h1>'); ?> </h1>

                            
			
			<img src="img/nt-holder.jpg" alt="" class="fl" />
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
