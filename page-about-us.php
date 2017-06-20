<?php
/**
 * The template for displaying about page archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pwmap
 */

get_header(); ?>

<main>

<section class="article-page map-bg">
    <div class="wrapper">
		<?php while ( have_posts() ) : the_post(); ?>
        
        <h1 class="f2" style="text-align:left;"><?php echo strtoupper(get_the_title()); ?></h1>
        <!-- ****** WP-LOGIC
            It's up to you if you want to loop thru child pages for the tabs.
            If you do, make sure first has class of nt-active
        -->
       <section class="tab-wrapper"> 
        <ul class="tabs"> 
            <li class="nt-active"><a href="#about">About PWM</a></li>
            <li><a href="#team">Our Team</a></li>
            <li><a href="#funders">Our Funders</a></li>
            <li><a href="#partners">Our Partners</a></li>
        </ul>
        <div class="tab-container">
        <!-- ****** WP-LOGIC
            It's up to you if you want to loop thru child pages for the tabs or just output the contents for each individually
        -->
            <div id="about" class="pa3">
                <article>
                    output about page here
                </article>
            </div><!-- #about -->
            <div id="team" class="pa3">
                <article>
                    output team page here
                </article>
            </div><!-- #team -->
            <div id="funders" class="pa3">
                <article>
                    output fundrs page here
                </article>
            </div><!-- #funders -->
            <div id="partners" class="pa3">
                <article>
                    output partners page here
                </article>
            </div><!-- #partners -->
            
            
        </div><!-- .tab-container -->
           
           
        </section>
        

			
                        
    </div><!-- end .wrapper -->
</section><!-- end #home-main --> 
		<?php endwhile; ?>

<!-- ****** WP-LOGIC
            enqueue? Could use a nice way to embed javascript on a template by template basis. All JS should load right before </body> tag
        -->		
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
        $('.tab-wrapper').tabs();
    });
</script>

<?php
get_footer();
