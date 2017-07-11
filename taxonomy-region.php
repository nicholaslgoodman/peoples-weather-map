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
            
            <section class="nt-header">
               
    			<h1 class="f2">
					<?php
					//Display Title
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						echo strtoupper($term->name) . ' REGION';
					?>
				</h1>
            </section>
            <section class="nt-content">
                            
        		<ul class="nt-tabs">  
        		
 		<?php
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
		//print_r( array_keys($all_posts));
	//print_r (var_dump($all_posts['all']));
			//Display number of posts with taxonomy term
		// $hazards = array_keys($all_posts);	

		foreach ( array_keys($all_posts) as $key ) {
			echo '<li class="' . strtolower($key) . '"><a href="" data-toggle="' . strtolower($key) . '">' . $key . ' <span>';
			//echo var_dump($all_posts[$hazard]);
			echo $all_posts[$key]->post_count;
			echo '</span></a></li>';
		} ?>
		</ul>
		<div class="nt-stories">
		<?php
		//array_splice($all_posts, 0, 1);
		//print_r (array_keys($all_posts));
	//	foreach ( array_keys($all_posts) as $key ) {
//print_r (array_keys((array)$all_posts[$key]));
    		foreach ($all_posts['All']->posts as $single){
				setup_postdata($single);
				$hazard  = wp_get_post_terms( $single->ID, 'hazard');
				echo '<div class="nt-card ' . $hazard[0]->slug . '" data-hazard="' . $hazard[0]->slug . '">'; ?>
                <div class="img-wrap"> 
                	<?php echo get_the_post_thumbnail($single, 'archive'); ?>
                <div class="nt-arrow"></div><img src="img/nt-holder.jpg" alt="" />
                <?php echo '<span class="nt-category">' . $hazard[0]->name . '</span>';

                echo '</div>';
        		
        		echo '<div class="nt-info"> 
                    <h2 class="f3">';
                echo get_the_title($single);
                echo '</h2><h3 class="f-small">';
                wpgeo_title($single);
                echo '</h3>
               		<p>';
                the_excerpt();
                echo '</p>
                                        
                    <a href="';
                the_permalink($single);
                echo '" class="btn btn-primary">Read Story &raquo;</a>
                
		                <div class="nt-timeline">
		                    <span class="timeline-line"></span>
		                    <span class="timeline-date">'. get_post_custom_values('Event Date', $single->ID)[0] . '</span>
		                </div>
	                
                 </div> <!-- end .nt-info -->                 
                                    
              </div> <!-- end .nt-card -->';
            }
	//	}
//get_the_date('Y',$single)
             ?>

            </div><!-- end .nt-stories -->
            <div id="no-results" class="nt-empty pa3">
                <h1 class="f3">We need your stories!</h1>
                <p>We want to tell weather hazard stories of every region, but we need your help. Go to the <a href="get-involved">Get Involved</a> page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this region’s story.</p>
                <a href="get-involved" class="btn btn-primary">Find Out How To Get Involved &raquo;</a>
                
                <!--<h4 class="f5 mt4">Read Stories In This region</h4>
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
                    <a href="javascript:void(0);" class="x-text">Back to Johnson region Page</a>
                    <div>
                        <a href="" class="btn btn-reverse" id="al-hazard">Learn More About Floods &raquo;</a>
                        <a href="" class="btn btn-primary ml2" id="al-next">Read Next Story In Johnson region &raquo;</a>
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
