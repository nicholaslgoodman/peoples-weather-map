<?php
/**
 * The template for displaying about
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pwmap
 */

get_header('article'); ?>

<main>

<section class="article-page map-bg">
    <div class="wrapper">
		<?php while ( have_posts() ) : the_post(); ?>

			
		<article id="article" class="article-page">
        <h3><?php echo strtoupper(get_the_title()); ?></h3>
			<img src="img/nt-holder.jpg" alt="" class="fl" />
			<?php
				global $id;
				    wp_list_pages( array(
				        'title_li'    => '',
				        'child_of'    => $id
				    ) );

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
