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
            
            <h1 class="f2 tl">Climate</h1>
            
                
              
                
            <div class="box">
                <div class="mb4">
              <h2 class="f3">Iowa Climate Scientists</h2>
                <p>The Peoples’ Weather Map interviews scientists ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus, est vel ornare tristique, dolor lorem posuere mi, ut interdum mi sapien ut orci. Duis in justo a neque molestie imperdiet vestibulum ut ex. Vivamus quam augue, semper non hendrerit vitae, fringilla vitae justo. Nulla vulputate tincidunt purus in mollis.</p>
                </div>
                <div id="hm-hazards" class="archive-hazards">
                <div class="flex-row">
  
<?php 
$args = array( 'post_type' => 'climate', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
        <div class="media-object media-card col-sm-100 col-md-50 col-lg-33 <?php echo strtolower(get_the_title()); ?>">
            <div class="media-obj--figure media-obj--height">
                <!-- ******** WP-LOGIC
                        Enable featured images for hazard custom post type
                        Image will not be the standard featured image size. Use small/medium version of uploaded image.
                        Add in an image
                -->
            </div>
            <div class="media-obj--body">
                <h4 style="text-transform:none;"><?php the_title(); ?></h4>
                <!-- ******** WP-LOGIC
                        Add 'title' custom field to climate custom post type
                -->
                <p class="f-small">chemist</p>
                <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">read now &raquo;</a>
            </div>
        </div><!-- end .col -->  
                
<?php endwhile;	 ?>
                </div><!-- end .flex-row -->
                    </div><!-- end #hm-hazards terrible naming -->
            </div><!-- end .box -->
            
            
             <div id="home-get-involved" class="pwm-box mb0">
                <h5 class="f3">Iowa Yearly Climate Reports</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin volutpat ipsum nec massa imperdiet accumsan. Ut ullamcorper et risus sit amet porttitor. Pellentesque quis auctor dolor. Integer tempor mi a condimentum iaculis. Nam auctor accumsan arcu, eget ornare magna viverra in. </p>
            </div><!-- end .home-get-involved -->
            <div class="box" style="border-top:0;">
                <ul class="climate-list">
                    <!-- ******** WP-LOGIC
                            Can the links section of wordpress be used to create these links? With a category? Each link is a year and links out to somewhere. See curretn website.
                    -->
                    <li><a href=""><span>2017</span></a></li>
                    <li><a href=""><span>2017</span></a></li>
                    <li><a href=""><span>2017</span></a></li>
                    <li><a href=""><span>2017</span></a></li>
                    <li><a href=""><span>2017</span></a></li>
                    <li><a href=""><span>2017</span></a></li>
                    <li><a href=""><span>2017</span></a></li>
                    
                </ul>
            </div><!-- end .box2 -->
            

        
        
    </div><!-- end .wrapper -->
</section><!-- end #home-main -->

<?php get_footer(); ?>
