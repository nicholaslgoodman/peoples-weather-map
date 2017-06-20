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
            
            <h1 class="f2 tl">Weather Hazards</h1>
            
<?php

        $argsDrought = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'hazard',
                'field'    => 'slug',
                'terms'    => 'drought',
            ))
        );
        $argsFlood = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'hazard',
                'field'    => 'slug',
                'terms'    => 'flood',
            ))
        );
       $argsInsects = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'hazard',
                'field'    => 'slug',
                'terms'    => 'insects',
            ))

        );
      $argsBlizzard = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'hazard',
                'field'    => 'slug',
                'terms'    => 'blizzard',
            ))
        );
         $argsHeat = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'hazard',
                'field'    => 'slug',
                'terms'    => 'heat',
            ))
        );
        $argsTornado = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'hazard',
                'field'    => 'slug',
                'terms'    => 'tornado',
            ))
        );
        $queryDrought = new WP_Query( $argsDrought );
        $queryFlood = new WP_Query( $argsFlood );
        $queryInsects = new WP_Query( $argsInsects );
        $queryBlizzard = new WP_Query( $argsBlizzard );
        $queryHeat = new WP_Query( $argsHeat );
        $queryTornado = new WP_Query( $argsTornado );  


        $counts = array(
            "drought" => $queryDrought->post_count,
            "flood" => $queryFlood->post_count,
            "insects" => $queryInsects->post_count,
            "blizzard" => $queryBlizzard->post_count,
            "heat" => $queryHeat->post_count,
            "tornado" => $queryTornado->post_count
        );


$args = array( 'post_type' => 'hazards', 'posts_per_page' => -1 );
$loop = new WP_Query( $args ); ?>

<div id="hm-hazards" class="archive-hazards">
    <div class="flex-row">


<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>                                 
        <div class="flex-row media-card col-sm-100 col-md-50 col-lg-33 <?php echo strtolower(get_the_title()); ?>">
            <!-- ******** WP-LOGIC
                    Enable featured images for hazard custom post type
                    Replace the holder.jpg with image
            -->
            <div class="col-sm-50 cover bg-center" style="background-image: url(<?php bloginfo( 'template_url' ); ?>/img/holder.jpg)"></div>
            <div class="col-sm-50 pa3">
                <h4><?php the_title(); ?></h4>
                <p class="f-small"><span><?php echo $counts[strtolower(get_the_title())]; ?> </span> stories</p>
                <a href="<?php echo get_the_permalink(); ?>" class="btn">read now &raquo;</a>
            </div>
        </div><!-- end .col -->                             

<?php endwhile; ?>
         </div><!-- end .flex-row -->
      </div><!-- end #hm-hazards -->

    </div><!-- end .wrapper -->
</section><!-- end #home-main -->

<?php get_footer(); ?>