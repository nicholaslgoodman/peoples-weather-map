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
		<?php 

		//query_posts(array('showposts' => 4, 'post_parent' => 218, 'post_type' => 'page'));
		//while ( have_posts() ) : the_post(); ?>
        
        <h1 class="f2" style="text-align:left;"><?php echo strtoupper(get_the_title());?></h1>
        <!-- ****** WP-LOGIC
            It's up to you if you want to loop thru child pages for the tabs.
            If you do, make sure first has class of nt-active
        -->
       <section class="tab-wrapper"> 
        <ul class="tabs"> 

            <li class="nt-empty"><a href="#about"><?php echo get_the_title(220); ?></a></li>
            <li class="nt-empty"><a href="#team"><?php echo get_the_title(222); ?></a></li>
            <li><a href="#funders"><?php echo get_the_title(259); ?></a></li>
            <li><a href="#partners"><?php echo get_the_title(261); ?></a></li>
        </ul>
        <div class="tab-container">
        <!-- ****** WP-LOGIC
            It's up to you if you want to loop thru child pages for the tabs or just output the contents for each individually
        -->
        	<!-- #about -->
            <div id="about" class="pa3">
                <article>
                <? 
                $id= 220; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  

				?>
                </article>
            </div>
            <!-- #team -->
            <div id="team" class="pa3">
                <article>
                        <? 
                $id= 222; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  

				?>
                </article>
            </div>
            <!-- #funders -->
            <div id="funders" class="pa3">
                <article>
                        <? 
                $id= 259; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  

				?>
                </article>
            </div>
            <!-- #partners -->
            <div id="partners" class="pa3">
                <article>
                        <? 
                $id= 261; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  

				?>
                </article>
            </div>
            
            
        </div><!-- .tab-container -->
           
           
        </section>
        

			
                        
    </div><!-- end .wrapper -->
</section><!-- end #home-main --> 

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
