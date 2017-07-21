<?php
/**
 * The template for displaying taxonomy county pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */

get_header(); ?>

	<main>  

        <section class="narrative-track map-bg">

        <?php
            
            global $wp;
            $current_url = home_url(add_query_arg(array(),$wp->request));

            
			//Display Title
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						
			//Display number of posts with taxonomy term
			function customQuery($hazard, $county) {

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
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $county,
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
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $county,
                        ),
                    ),
                    );
				
			}

			return new WP_Query( $args);
		}
		$all_posts = array(
		    'All' => customQuery('all', $term->slug)	,
		    'Flood' => customQuery('flood', $term->slug),
		    'Drought' => customQuery('drought', $term->slug),
		    'Insects' => customQuery('insects', $term->slug),
		    'Heat' => customQuery('heat', $term->slug),
		    'Blizzard' => customQuery('blizzard', $term->slug),
		    'Tornado' => customQuery('tornado', $term->slug)
		);
		?>
        <div class="wrapper">
        <?php
        foreach ($all_posts['All']->posts as $single){
        	$ID = $single->ID;
			$lat = get_wpgeo_latitude( $ID);
			$long = get_wpgeo_longitude( $ID );
        	if ($lat==NULL) {
        		continue;
        	}
		}
       ?>
            <section class="nt-header">
               
    			<h1 class="f2">
					<?php
					//Display Title
						
						echo strtoupper($term->name) . ' COUNTY';
					?>
				</h1>
            </section>
            <section class="nt-content">
                            
        		<ul class="nt-tabs">  
                   
		<?php
        // tabs generation
		foreach (array_keys($all_posts) as $key ) { ?>
			<li class="<?php echo strtolower($key);
            if ($key == 'All') { echo ' nt-active'; } ?>">
            <a href="" data-toggle="<?php echo strtolower($key); ?>"><?php echo $key; ?><span>
			<?php echo $all_posts[$key]->post_count; ?>
			</span></a></li>

		<?php } ?>
		</ul>
        <script>
        // array post information objects (JSON) for modals        
            var posts = [];
        </script> 
        <script>
        <?php foreach ($all_posts['All']->posts as $single){
            // parse JSON objects
            $hazard  = wp_get_post_terms( $single->ID, 'hazard');
            echo '            
                posts.push (JSON.parse(\'{"id": "'.$single->post_name.'", "hazard": "'. strtolower($hazard[0]->name) .'",  "url" : "' .get_the_permalink($single->ID). '", "title": "'. $single->post_title .'" }\'));
            ';
        }?>

        </script>
        <!-- Testing JSON 
        <p id="demo"></p>

        <script>
            document.getElementById("demo").innerHTML = posts[0].id + ", " + posts[0].hazard + ", " + posts[0].url;
        </script> 
        -->
		<div class="nt-stories">
		<?php

    		foreach ($all_posts['All']->posts as $single){
				$hazard  = wp_get_post_terms( $single->ID, 'hazard'); ?>
				<div id="<?php echo $single->post_name ?>" class="nt-card <?php echo $hazard[0]->slug; ?>" data-hazard="<?php echo $hazard[0]->slug; ?>">
                <div class="img-wrap"> 
                	<?php echo get_the_post_thumbnail($single, 'archive'); ?>
                <div class="nt-arrow"></div>
                <span class="nt-category"> <?php echo $hazard[0]->name; ?></span>
                </div>
        		<div class="nt-info"> 
                    <h2 class="f3">
                <?php echo get_the_title($single); ?>
                </h2><h3 class="f-small">
                <?php wpgeo_title($single); ?>
                </h3>
               		<p>
                <?php the_excerpt(); ?>
                </p>
                                        
                    <a href="<?php the_permalink($single); ?>" class="btn btn-primary">Read Story &raquo;</a>
                
		                <div class="nt-timeline">
		                    <span class="timeline-line"></span>
		                    <span class="timeline-date"> <?php echo get_post_custom_values('Event Date', $single->ID)[0] ; ?></span>
		                </div>
	                
                 </div> <!-- end .nt-info -->                 
                                    
              </div> <!-- end .nt-card -->
            <?php }?>
             

            </div><!-- end .nt-stories -->
            <div id="no-results" class="nt-empty pa3">
                <h1 class="f3">We need your stories!</h1>
                <p>We want to tell weather hazard stories of every county, but we need your help. Go to the <a href="get-involved">Get Involved</a> page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this county’s story.</p>
                <a href="get-involved" class="btn btn-primary">Find Out How To Get Involved &raquo;</a>
                
                <!--<h4 class="f5 mt4">Read Stories In This County</h4>
                <a href="">Southeast</a>-->
                
            </div><!-- end .nt-empty -->
        </section><!-- end .nt-content -->
                    </div><!-- end .wrapper -->
                </section><!-- end .narrative-track -->
    
        <section id="article-loader">
            <div id="al-top">
                <a class="close-x" href="#"><span></span></a>
                <div class="social">
                    <!-- based on https://simplesharebuttons.com/html-share-buttons/ -->
                    <a id="s-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $current_url; ?>" target="_blank">
                        <img src="<?php bloginfo('template_url');?>/img/social/Facebook.svg" alt="Facebook" />
                    </a>
                    <a id="s-twitter" href="https://twitter.com/share?url=<?php echo $current_url; ?>&amp;text=&amp;hashtags=" target="_blank">
                        <img src="<?php bloginfo('template_url');?>/img/social/Twitter.svg" alt="Twitter" />
                    </a>
<!--
                    <a id="s-pinterest" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                        <img src="<?php bloginfo('template_url');?>/img/social/Pinterest.svg" alt="Pinterest" />
                    </a>
-->
                    <a id="s-email" href="mailto:?Subject=Peoples%27 Weather Map&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo $current_url; ?>">
                        <img src="<?php bloginfo('template_url');?>/img/social/Email.svg" alt="Email" />
                    </a>
                </div><!-- end .social -->
            </div>
            <div id="al-overflow">
                <div id="al-spinner"><div class="loader"></div></div>
                <div id="al-article"></div>
                <div id="al-bottom">
                    <a href="javascript:void(0);" class="x-text">Back to <?php echo $term->name; ?> County Page</a>
                    <div>
                        <a href="" class="btn btn-reverse" id="al-hazard">Learn More About &raquo;</a>
                        <a href="" class="btn btn-primary ml2" id="al-next">Read Next Story In <?php echo $term->name; ?> County &raquo;</a>
                    </div>
                </div>
            </div>
        </section><!-- end #article-loader -->
        
    <script src="<?php bloginfo('template_url'); ?>/js/narratives.js"></script>
    

<?php
get_footer();
