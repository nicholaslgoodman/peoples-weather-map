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


        <div class="wrapper">
		 
		<article>
		<?php
		while ( have_posts() ) : the_post(); ?>
			<img src="img/nt-holder.jpg" alt="" class="fl" />
			<?php
			the_content();

			//get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();
			?>
 			
                        
                   
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			//if ( comments_open() || get_comments_number() ) :
			//	comments_template();
			//endif;

		endwhile; // End of the loop.
		?>
</article>
</div><!-- end .wrapper --><!-- end #home-main --> 
		</main><!-- #main -->

	</div><!-- #primary -->



