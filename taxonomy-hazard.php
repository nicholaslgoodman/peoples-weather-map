<?php
/**
 * The template for displaying taxonomy hazard pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */

get_header('tax'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				
			<h1 class="page-title">
				<?php
				//Display Title
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				
					echo strtoupper($term->name);
				?>
			</h1>
					
		<?php
			//Display number of posts with taxonomy term
			$args = array(
			  'numberposts' => -1,
			  'hazard'   => $term->name
			);
			$term_posts = get_posts( $args );

		if (count($term_posts) > 0): 
			//Display number of posts with taxonomy term
			echo 'Hazard Story Count: ' . count($term_posts);

				foreach ( $term_posts as $post ) {
		            setup_postdata($post);
			
					// display post title 
					the_title('<h1 class="post-title">', '</h1>');
					// display post excerpts
			    	the_excerpt();
			    
		        	?>
		        	<h5><a href="<?php the_permalink() ?>">Read the story</a> </h5>
		        	<?php
				}


		else: ?>
    	
    		<!-- No posts in with term, call to action -->
    		<h5>
    		We need your stories! We want to tell weather hazard stories of every county, but we need your help. Go to the Get Involved page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this county’s story. 
    		</h5>
    		<a href="../../get-involved">Find out how to get involved.</a>
    		
 		<?php	endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
