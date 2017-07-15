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
        
        
        <!-- ****** WP-LOGIC
            It's up to you if you want to loop thru child pages for the tabs or just output the contents for each individually
        -->
        	<!-- #about -->
<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );
$first = true; 
?>
   <h1 class="f2" style="text-align:left;"><?php echo strtoupper(get_the_title());?></h1>
    <section class="tab-wrapper"> 
        <ul class="nt-tabs"> 
            <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                <li <?php if($first==true){ echo 'class="nt-active"'; $first = false;} ?> ><a href="#<?php echo $post->post_name; ?>"><?php echo get_the_title(); ?></a></li>
            
            <?php endwhile; ?>
        </ul>
  <?php wp_reset_query(); ?>
<div class="tab-container">

<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>


            <div id="<?php echo $post->post_name;?>" class="pa3">
                <article>
                    <?php the_content(); ?>
                </article>
            </div><!-- #about -->
 <?php endwhile; ?>   
 <?php wp_reset_query(); ?>
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
