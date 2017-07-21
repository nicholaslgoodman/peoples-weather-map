<?php
/**
 * The template for displaying taxonomy region pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */

get_header(); ?>
	<main>  

        <section class="narrative-track map-bg">
        <div class="wrapper">
            
            <section class="nt-header">
               
    			<h1 class="f2">
					<?php
					//Display Title
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						echo strtoupper($term->name) . ' REGION';
					?>
				</h1>
            </section>
            <section class="nt-content">
                            
        		<ul class="nt-tabs">  
        		
 		<?php
			//Display number of posts with taxonomy term
		function customQuery($hazard, $region) {

			if ($hazard != 'all'){
				$args = array(  
					'post_type' => 'post',
					'meta_key' => 'Event Date',
                    'orderby' => 'meta_value_num',
					'order'   => 'ASC',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => $hazard,
                        ),
                        array(
                            'taxonomy' => 'region',
                            'field'    => 'slug',
                            'terms'    => $region,
                        ),
                    ),
                    );
				
			}
			else{
				$args = array(
					'post_type' => 'post',
                    'meta_key' => 'Event Date',
                    'orderby' => 'meta_value_num',
					'order'   => 'ASC',
                    
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'region',
                            'field'    => 'slug',
                            'terms'    => $region,
                        ),
                    ),
                    );
				
			}

			return new WP_Query( $args);
		}
		$all_posts = array(
		    'All' => customQuery('all', $term->slug),
		    'Flood' => customQuery('flood', $term->slug),
		    'Drought' => customQuery('drought', $term->slug),
		    'Insects' => customQuery('insects', $term->slug),
		    'Heat' => customQuery('heat', $term->slug),
		    'Blizzard' => customQuery('blizzard', $term->slug),
		    'Tornado' => customQuery('tornado', $term->slug)
		);
		//print_r( array_keys($all_posts));
	//print_r (var_dump($all_posts['all']));
			//Display number of posts with taxonomy term
		// $hazards = array_keys($all_posts);	

		foreach ( array_keys($all_posts) as $key ) {
			echo '<li class="' . strtolower($key) . '"><a href="" data-toggle="' . strtolower($key) . '">' . $key . ' <span>';
			//echo var_dump($all_posts[$hazard]);
			echo $all_posts[$key]->post_count;
			echo '</span></a></li>';
		} ?>
		</ul>
                
		<div class="nt-stories">
		<?php
		//array_splice($all_posts, 0, 1);
		//print_r (array_keys($all_posts));
	//	foreach ( array_keys($all_posts) as $key ) {
//print_r (array_keys((array)$all_posts[$key]));
    		foreach ($all_posts['All']->posts as $single){
				setup_postdata($single);
				$hazard  = wp_get_post_terms( $single->ID, 'hazard');
				echo '<div class="nt-card ' . $hazard[0]->slug . '" data-hazard="' . $hazard[0]->slug . '">'; ?>
                <div class="img-wrap"> 
                	<?php echo get_the_post_thumbnail($single, 'archive'); ?>
                <div class="nt-arrow"></div><img src="img/nt-holder.jpg" alt="" />
                <?php echo '<span class="nt-category">' . $hazard[0]->name . '</span>';

                echo '</div>';
        		
        		echo '<div class="nt-info"> 
                    <h2 class="f3">';
                echo get_the_title($single);
                echo '</h2><h3 class="f-small">';
                wpgeo_title($single);
                echo '</h3>
               		<p>';
                the_excerpt();
                echo '</p>
                                        
                    <a href="';
                the_permalink($single);
                echo '" class="btn btn-primary">Read Story &raquo;</a>
                
		                <div class="nt-timeline">
		                    <span class="timeline-line"></span>
		                    <span class="timeline-date">'. get_post_custom_values('Event Date', $single->ID)[0] . '</span>
		                </div>
	                
                 </div> <!-- end .nt-info -->                 
                                    
              </div> <!-- end .nt-card -->';
            }
	//	}
//get_the_date('Y',$single)
             ?>

            </div><!-- end .nt-stories -->
            <div id="no-results" class="nt-empty pa3">
                <h1 class="f3">We need your stories!</h1>
                <p>We want to tell weather hazard stories of every region, but we need your help. Go to the <a href="get-involved">Get Involved</a> page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this region’s story.</p>
                <a href="get-involved" class="btn btn-primary">Find Out How To Get Involved &raquo;</a>
                
                <!--<h4 class="f5 mt4">Read Stories In This region</h4>
                <a href="">Southeast</a>-->
                
            </div><!-- end .nt-empty -->
        </section><!-- end .nt-content -->
                    </div><!-- end .wrapper -->
                </section><!-- end .narrative-track -->


    
        <section id="article-loader">
            <div id="al-top">
                <a class="close-x" href="#"><span></span></a>
                <div class="social"></div>
            </div>
            <div id="al-overflow">
                <div id="al-article"></div>
                <div id="al-bottom">
                    <a href="javascript:void(0);" class="x-text">Back to Johnson region Page</a>
                    <div>
                        <a href="" class="btn btn-reverse" id="al-hazard">Learn More About Floods &raquo;</a>
                        <a href="" class="btn btn-primary ml2" id="al-next">Read Next Story In Johnson region &raquo;</a>
                    </div>
                </div>
            </div>
        </section><!-- end #article-loader -->
        
<script src="<?php bloginfo('template_url'); ?>/js/narratives.js"></script>
    

<?php
get_footer();
