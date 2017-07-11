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
<!-- ******** WP-TEMPLATE: PAGE-GET-INVOLVED.PHP ************** -->

<main>
    <section class="map-bg article-page-alt">
        <div class="wrapper">
            
            <h1 class="f2 tl">Get Involved</h1>
             
            <div class="box">
                <div class="mb4 sep">
              <h2 class="f3 f-accent">Share your stories, Share your ancestors’ stories, Share Iowans’ stories.</h2>
                <p>The Peoples’ Weather Map interviews scientists ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus, est vel ornare tristique, dolor lorem posuere mi, ut interdum mi sapien ut orci. Duis in justo a neque molestie imperdiet vestibulum ut ex. Vivamus quam augue, semper non hendrerit vitae, fringilla vitae justo. Nulla vulputate tincidunt purus in mollis.</p>
                </div>
                <div id="hm-hazards" class="media-cards sep">
                    
                    <h2 class="f3 f-accent" style="margin-bottom:2rem;">Types of Iowa weather hazard artifacts you can contribute:</h2>
                    <div class="flex-row">
  

                        <div class="media-object media-card col-sm-100 col-md-50 col-lg-50 <?php echo strtolower(get_the_title()); ?>">
                            <div class="media-obj--figure media-obj--height">
                                
                            </div>
                            <div class="media-obj--body">
                                <h4 style="text-transform:none;">Newspaper Clipping</h4>
                                <p class="f-small">about an Iowa weather hazard event</p>
                                <a href="#newspaper">see an example &raquo;</a>
                            </div>
                        </div><!-- end .col -->  
                        
                        <div class="media-object media-card col-sm-100 col-md-50 col-lg-50 <?php echo strtolower(get_the_title()); ?>">
                            <div class="media-obj--figure media-obj--height">
                                
                            </div>
                            <div class="media-obj--body">
                                <h4 style="text-transform:none;">Photos</h4>
                                <p class="f-small">about an Iowa weather hazard event</p>
                                <a href="#newspaper">see an example &raquo;</a>
                            </div>
                        </div><!-- end .col -->  
                        
                        <div class="media-object media-card col-sm-100 col-md-50 col-lg-50 <?php echo strtolower(get_the_title()); ?>">
                            <div class="media-obj--figure media-obj--height">
                                
                            </div>
                            <div class="media-obj--body">
                                <h4 style="text-transform:none;">Historical Documents</h4>
                                <p class="f-small">about an Iowa weather hazard event</p>
                                <a href="#newspaper">see an example &raquo;</a>
                            </div>
                        </div><!-- end .col -->  
                
                    </div><!-- end .flex-row -->
                    
                    <div class="tc mb3 mt4">
                    <a href="" class="btn btn-primary">Submit an Artifact Now &raquo;</a>
                    </div>
                    
                    </div><!-- end #hm-hazards terrible naming -->
                
                    <h2 class="f3 f-accent">Questions? Prefer to talk to someone? Can't upload?</h2>
                    <p>You can submit questions or issues to <a href="">pwm@pwm.org</a> or call 319.123.4567.</p>
                    
                
            </div><!-- end .box -->
            
            

        
        
    </div><!-- end .wrapper -->
</section><!-- end #home-main -->

<?php get_footer(); ?>
