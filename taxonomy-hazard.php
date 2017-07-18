<?php
/**
 * The template for displaying taxonomy hazard pages
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
						$name = $term->name;
						if ($name != 'Tornado' && $name != 'Insects' && $name != 'Heat'){
							echo strtoupper($term->name) . 'S';
						}
						elseif ($name == 'Tornado'){
							echo 'TORNADOES';
						}
						else {
							echo strtoupper($term->name);
						}
						

					?>
				</h1>
				<span>
				<a href = "<?php get_home_url();?>/hazards/<?php $term->slug;?>">Read more about
                <?php
                        if ($name != 'Tornado' && $name != 'Insects' && $name != 'Heat'){
                            echo $term->name . 's';
                        }
                        elseif ($name == 'Tornado'){
                            echo 'Tornadoes';
                        }
                        else {
                            echo $term->name;
                        }
                ?></a>
				</span>
            </section>
            <section class="nt-content">
                            	
        		
 		<?php
			//Display number of posts with taxonomy term
		function customQuery($hazard) {

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
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => $hazard,
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
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => $hazard,
                        ),
                    ),
                    );
				
			}

			return new WP_Query( $args);
		}
		$all_posts = array(
		    'All' => customQuery($term->slug),
		    'Flood' => customQuery($term->slug),
		    'Drought' => customQuery($term->slug),
		    'Insects' => customQuery($term->slug),
		    'Heat' => customQuery($term->slug),
		    'Blizzard' => customQuery($term->slug),
		    'Tornado' => customQuery($term->slug)
		); ?>
	
		<div class="nt-stories">
		<?php

    		foreach ($all_posts['All']->posts as $single){
				setup_postdata($single);
				$hazard  = wp_get_post_terms( $single->ID, 'hazard'); ?>
				<div class="nt-card <?php $hazard[0]->slug;?>" data-hazard="<?php $hazard[0]->slug;?>">
                <div class="img-wrap"> 
                	<?php echo get_the_post_thumbnail($single, 'archive'); ?>
                <div class="nt-arrow"></div><img src="img/nt-holder.jpg" alt="" />
                <span class="nt-category"> <?php $hazard[0]->name; ?></span>

                </div>
        		
        		<div class="nt-info"> 
                    <h2 class="f3">
                <?php echo get_the_title($single); ?>
                <h3 class="f-small">The University of Iowa, Iowa City,  Johnson hazard, Iowa</h3>
               		<p>
                <?php the_excerpt();?>
                </p>
                                        
                    <a href="<?php the_permalink($single); ?>">Read Story &raquo;</a>
                
		                <div class="nt-timeline">
		                    <span class="timeline-line"></span>
		                    <span class="timeline-date"><?php echo get_post_custom_values('Event Date', $single->ID)[0] ?></span>
		                </div>
	                
                 </div> <!-- end .nt-info -->                 
                                    
              </div> <!-- end .nt-card -->
            <?php };?>

             

            </div><!-- end .nt-stories -->
            <div id="no-results" class="nt-empty pa3">
                <h1 class="f3">We need your stories!</h1>
                <p>We want to tell weather hazard stories of every hazard, but we need your help. Go to the <a href="get-involved">Get Involved</a> page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this hazard’s story.</p>
                <a href="get-involved" class="btn btn-primary">Find Out How To Get Involved &raquo;</a>
                
                <!--<h4 class="f5 mt4">Read Stories In This hazard</h4>
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
                    <a href="javascript:void(0);" class="x-text">Back to Johnson hazard Page</a>
                    <div>
                        <a href="" class="btn btn-reverse" id="al-hazard">Learn More About Floods &raquo;</a>
                        <a href="" class="btn btn-primary ml2" id="al-next">Read Next Story In Johnson hazard &raquo;</a>
                    </div>
                </div>
            </div>
        </section><!-- end #article-loader -->
        
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
    
    <!-- this is to load the articles within this page's context -->
    <script>
        $(function(){
            var $cards = $('.nt-card');
            
            $cards.find('.btn').on('click',function(e){
                e.preventDefault();
                $('#al-article').load($(this).attr('href') + ' #article');
                $('#article-loader').show();
            });
            
            var Stories = function(el,data){
                var self = this;
                
                this.loader = $('#al-article');
                this.overlay = $('#article-loader');
                this.topDiv = $('#al-top');
                this.close = this.topDiv.find('.close-x').add('.x-text');
                this.hazardLink = $('#al-hazard');
                this.nextLink = $('#al-next');
                this.currentCard = null;
                this.nextCard = null;
                
                this.setCards = function(){
                    return $('.nt-card');
                };
                this.cards = this.setCards();
                
                this.setBtns = function(){
                    return self.cards.find('.btn');
                };
                this.btns = this.setBtns();
                
                this.getVisibleCards = function(){
                    return self.cards.filter(function(i,e){
                        return $(e).is(':visible');
                    });
                }
                
                this.setHazardLink = function(btn){
                    var hazard;
                    if (btn.attr('id') == '#al-next') {
                        hazard = self.nextCard.data('hazard');
                    } else {
                        hazard = self.currentCard.data('hazard');
                    }
                    self.hazardLink.attr('href','/' + hazard)
                        .text('Learn More About ' + hazard);
                };
                
                this.setNextLink = function(btn){
                    // need to only get from visible cards
                     var link = self.nextCard.find('.btn-primary');
                    
                    if (self.nextCard.length >= 1) {
                        self.nextLink.show();
                        self.nextLink.attr('href', link.attr('href'));
                    } else {
                        self.nextLink.hide();
                    }
                    
                };
                
                this.addBtnEvents = function(){
                    self.btns.on('click',function(e){
                        e.preventDefault();
                        self.loader.load($(this).attr('href') + ' #article');
                        self.overlay.css('right',0);
                        self.topDiv.css('right',0);
                        self.currentCard = $(this).parent().parent(); 
                        self.nextCard = self.currentCard.next('.nt-card');
                        console.log(self.nextCard.find('h2').text());
                        self.setHazardLink($(this));
                        self.setNextLink($(this));
                    });
                };
                
                this.addNextBtnEvents = function(){
                    self.nextLink.on('click',function(e){
                        e.preventDefault();
                        self.loader.load($(this).attr('href') + ' #article');
                        self.loader.parent().scrollTop(0);
                        self.setHazardLink($(this));
                        
                        self.currentCard = self.nextCard;
                        self.nextCard = self.currentCard.next('.nt-card');
                    
                        console.log(self.nextCard.find('h2').text());
                        
                        // fix the url and history state
                        
                        // set hazard link (has to be different)

                        // set next link (has to be different)
                    });
                };
                
                this.close.on('click',function(e){
                    e.preventDefault();
                    self.overlay.css('right','-100%');
                    self.topDiv.css('right','-100%');
                });
                
                this.init = function(){
                    this.addBtnEvents();
                    this.addNextBtnEvents();
                }
                this.init();
                
            }; // stories
            
            var pwmStories = new Stories();
            
        });
    
    </script>
    

<?php
get_footer();
?>