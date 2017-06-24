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
        <ul class="nt-tabs"> 

            <li class="nt-active"><a href="#about"><?php echo get_the_title(220); ?></a></li>
            <li><a href="#team"><?php echo get_the_title(222); ?></a></li>
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

 <script>
        $(function(){
            
           /** pull stories up for layout **/
            // cache nt cards
            var $cards = $('.nt-card');
            
            
            function pullCards(){
                var visCards = $cards.filter(function(i,e){
                    return $(e).is(':visible');
                });
                
                var empty = $('#no-results');
                
                if (visCards.length == 0) {
                    empty.show();
                } else {
                    empty.hide();            
                     visCards.each(function(i,el){
                        var that = $(this);
                         that.removeClass('even').removeClass('odd');
                        if (i!==0){
                             var prev = $($cards[i-1]),
                                 prevHeight = prev.height(),
                                 pull = prevHeight/2;


                            that.css('margin-top',-pull + 'px');

                        } else {
                            that.css('margin-top',0);
                        }

                        if (i%2 == 1) {
                            that.addClass('even');
                        }  else {
                            that.addClass('odd')
                        }


                    }); //each
                    
                }
            }
            
            if (window.innerWidth >= 600) {
                 pullCards();
            }
           
             /** tabs **/
            var tabs = $('.nt-tabs li');
            $('.nt-tabs a').on('click',function(e){
                e.preventDefault();
                var that = $(this),
                    parent = that.parent(),
                    hazard = that.data('toggle');
                
                tabs.removeClass('nt-active');
                parent.addClass('nt-active');
                
                if (hazard == 'all') {
                    $cards.show();
                } else {
                    $cards.each(function(){
                        if (!$(this).hasClass(hazard)) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                }
                
                
                
                if (window.innerWidth >= 600) {
                     pullCards();
                }
                
            });
            
            
        });
    </script>        
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
        $('.tab-wrapper').tabs();
    });
</script>

<?php
get_footer();
