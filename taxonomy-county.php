<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */

get_header('county'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
		
				
			
			 <!-- .page-header -->
			<?php
			the_title('<h1 class="post-title">', '</h1>');
        	the_excerpt();
        	?>
        	<h5><a href="<?php the_permalink() ?>">Read the story</a></h5>
        <?php
    		endwhile;
    	else :
        	_e( 'Sorry, no posts matched your criteria.', 'textdomain' );
   		

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
