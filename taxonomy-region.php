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
            <section class="nt-header cf">
                <!-- queries -->
                <?php

                global $wp;
                $current_url = home_url(add_query_arg(array(),$wp->request));

                //Display Title
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

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
                ?>

                <!-- nt-map -->
                <div id="nt-map" class="media-obj">
                    <div class="media-obj--figure">
                        <div id="county-map"></div>
                    </div>
                    <div class="media-obj--body">
                        <h1 class="f2" style="padding-top:1rem;"><?php echo strtoupper($term->name) . ' REGION';?></h1>
                        <div id="county-donut"></div>
                    </div>
                </div> <!-- end nt-map -->
            
            </section> <!-- nt-header-->
            <section class="nt-content">
                        
                <ul class="nt-tabs">  <!-- tabs -->
                    <?php
                    foreach (array_keys($all_posts) as $key ) { ?>
                    <li class="<?php echo strtolower($key); ?>
                    <?php if ($key == 'All') { echo ' nt-active'; } ?>
                    <?php if ($all_posts[$key]->post_count == 0) { echo ' nt-none';} ?>

                    ">
                    <a href="" data-toggle="<?php echo strtolower($key); ?>"><?php echo $key; ?><span>
                    <?php echo $all_posts[$key]->post_count; ?>
                    </span></a></li>

                    <?php } ?>
                </ul> <!-- end tabs -->
                <script>
                // array of post information objects (JSON) for modals        
                    var posts = [];

                    <?php foreach ($all_posts['All']->posts as $single){
                        // parse JSON objects
                        $hazard  = wp_get_post_terms( $single->ID, 'hazard');
                
                        $lat = get_wpgeo_latitude($single->ID);
                        if ($lat == '') {$lat = 0;}
                
                        $lng = get_wpgeo_longitude($single->ID);
                        if ($lng == '') {$lng = 0;}
                
                        echo '            
                            posts.push (JSON.parse(\'{"id": "'.$single->post_name.'", "hazard": "'. strtolower($hazard[0]->name) .'",  "url" : "' .get_the_permalink($single->ID). '", "title": "'. $single->post_title .'","lat":'.$lat.',"lng":'.$lng.' }\'));
                        ';
                    }?>

                </script>
                <div class="nt-stories">
                    <?php
                    foreach ($all_posts['All']->posts as $single){

                        $hazard  = wp_get_post_terms( $single->ID, 'hazard'); ?>

                        <!-- .nt-card -->
                        <div id="<?php echo $single->post_name ?>" class="nt-card <?php echo $hazard[0]->slug; ?>" data-hazard="<?php echo $hazard[0]->slug; ?>">
                            <div class="img-wrap"> 
                                <?php echo get_the_post_thumbnail($single, 'archive'); ?>
                                <div class="nt-arrow"></div>
                                <span class="nt-category"> <?php echo $hazard[0]->name; ?></span>
                            </div> <!--img-wrap -->
                            <div class="nt-info"> 
                                <h2 class="f3">
                                    <?php echo get_the_title($single); ?>
                                </h2>
                                <h3 class="f-small">
                                    <?php wpgeo_title($single); ?>
                                </h3>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                                                    
                                <a href="<?php the_permalink($single); ?>" class="btn btn-primary">Read Story &raquo;</a>
                            
                                <div class="nt-timeline">
                                    <span class="timeline-line"></span>
                                    <span class="timeline-date">
                                        <?php echo get_post_custom_values('Event Date', $single->ID)[0] ; ?>
                                    </span>
                                </div>
                                
                            </div> <!-- end .nt-info -->                 
                                            
                        </div> <!-- end .nt-card -->
                    <?php } ?>

                </div><!-- end .nt-stories -->
                <div id="no-results" class="nt-empty pa3"> 
                    <h1 class="f3">We need your stories!</h1>
                    <p>We want to tell weather hazard stories of every region, but we need your help. Go to the <a href="get-involved">Get Involved</a> page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this region’s story.</p>
                    <a href="get-involved" class="btn btn-primary">Find Out How To Get Involved &raquo;</a>
                    
                    <h4 class="f5 mt4">Read Stories In This Region</h4>
                    <a href=""><?php echo $term->name; ?></a>
                    
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


<?php get_footer(); ?>
