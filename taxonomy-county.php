<?php
/**
 * The template for displaying taxonomy county pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pwmap
 */

get_header(); ?>

	<main>  

        <section class="narrative-track map-bg">

        <?php
            
            global $wp;
            $current_url = home_url(add_query_arg(array(),$wp->request));

            
			//Display Title
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						
			//Display number of posts with taxonomy term
			function customQuery($hazard, $county) {

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
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $county,
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
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $county,
                        ),
                    ),
                    );
				
			}

			return new WP_Query( $args);
		}
		$all_posts = array(
		    'All' => customQuery('all', $term->slug)	,
		    'Flood' => customQuery('flood', $term->slug),
		    'Drought' => customQuery('drought', $term->slug),
		    'Insects' => customQuery('insects', $term->slug),
		    'Heat' => customQuery('heat', $term->slug),
		    'Blizzard' => customQuery('blizzard', $term->slug),
		    'Tornado' => customQuery('tornado', $term->slug)
		);
		?>
        <div class="wrapper">
            <section class="nt-header cf">
               
                <div id="nt-map" class="media-obj">
                    <div class="media-obj--figure">
                        <div id="county-map"></div>
                    </div>
                    <div class="media-obj--body">
                        <h1 class="f2" style="padding-top:1rem;"><?php echo strtoupper($term->name) . ' COUNTY';?></h1>
                        <div id="county-donut"></div>
                    </div>
                </div>
                
                
                
    			
            </section>
            <section class="nt-content">
                            
        		<ul class="nt-tabs">  
                   
		<?php
        // tabs generation
		foreach (array_keys($all_posts) as $key ) { ?>
			<li class="<?php echo strtolower($key); ?>
            <?php if ($key == 'All') { echo ' nt-active'; } ?>
            <?php if ($all_posts[$key]->post_count == 0) { echo ' nt-none';} ?>

            ">
            <a href="" data-toggle="<?php echo strtolower($key); ?>"><?php echo $key; ?><span>
			<?php echo $all_posts[$key]->post_count; ?>
			</span></a></li>

		<?php } ?>
		</ul>
        <script>
        // array post information objects (JSON) for modals        
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
				<div id="<?php echo $single->post_name ?>" class="nt-card <?php echo $hazard[0]->slug; ?>" data-hazard="<?php echo $hazard[0]->slug; ?>">
                <div class="img-wrap"> 
                	<?php echo get_the_post_thumbnail($single, 'archive'); ?>
                <div class="nt-arrow"></div>
                <span class="nt-category"> <?php echo $hazard[0]->name; ?></span>
                </div>
        		<div class="nt-info"> 
                    <h2 class="f3">
                <?php echo get_the_title($single); ?>
                </h2><h3 class="f-small">
                <?php wpgeo_title($single); ?>
                </h3>
               		<p>
                <?php the_excerpt(); ?>
                </p>
                                        
                    <a href="<?php the_permalink($single); ?>" class="btn btn-primary">Read Story &raquo;</a>
                
		                <div class="nt-timeline">
		                    <span class="timeline-line"></span>
		                    <span class="timeline-date"> <?php echo get_post_custom_values('Event Date', $single->ID)[0] ; ?></span>
		                </div>
	                
                 </div> <!-- end .nt-info -->                 
                                    
              </div> <!-- end .nt-card -->
            <?php }?>
             

            </div><!-- end .nt-stories -->
            <div id="no-results" class="nt-empty pa3">
                <h1 class="f3">We need your stories!</h1>
                <p>We want to tell weather hazard stories of every county, but we need your help. Go to the <a href="get-involved">Get Involved</a> page to submit a newspaper clipping, photos, or historical documents that our storytellers can use to help tell this county’s story.</p>
                <a href="get-involved" class="btn btn-primary">Find Out How To Get Involved &raquo;</a>
                
                <!--<h4 class="f5 mt4">Read Stories In This County</h4>
                <a href="">Southeast</a>-->
                
            </div><!-- end .nt-empty -->
        </section><!-- end .nt-content -->
                    </div><!-- end .wrapper -->
                </section><!-- end .narrative-track -->
    
        <section id="article-loader">
            <div id="al-top">
                <a class="close-x" href="#"><span></span></a>
                <div class="social">
                    <!-- based on https://simplesharebuttons.com/html-share-buttons/ -->
                    <a id="s-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $current_url; ?>" target="_blank">
                        <img src="<?php bloginfo('template_url');?>/img/social/Facebook.svg" alt="Facebook" />
                    </a>
                    <a id="s-twitter" href="https://twitter.com/share?url=<?php echo $current_url; ?>&amp;text=&amp;hashtags=" target="_blank">
                        <img src="<?php bloginfo('template_url');?>/img/social/Twitter.svg" alt="Twitter" />
                    </a>
<!--
                    <a id="s-pinterest" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                        <img src="<?php bloginfo('template_url');?>/img/social/Pinterest.svg" alt="Pinterest" />
                    </a>
-->
                    <a id="s-email" href="mailto:?Subject=Peoples%27 Weather Map&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo $current_url; ?>">
                        <img src="<?php bloginfo('template_url');?>/img/social/Email.svg" alt="Email" />
                    </a>
                </div><!-- end .social -->
            </div>
            <div id="al-overflow">
                <div id="al-spinner"><div class="loader"></div></div>
                <div id="al-article"></div>
                <div id="al-bottom">
                    <a href="javascript:void(0);" class="x-text">Back to <?php echo $term->name; ?> County Page</a>
                    <div>
                        <a href="" class="btn btn-reverse" id="al-hazard">Learn More About &raquo;</a>
                        <a href="" class="btn btn-primary ml2" id="al-next">Read Next Story In <?php echo $term->name; ?> County &raquo;</a>
                    </div>
                </div>
            </div>
        </section><!-- end #article-loader -->
        
    <script src="<?php bloginfo('template_url'); ?>/js/narratives.js"></script>
        
    <script src="<?php bloginfo('template_url');?>/js/d3-scripts-min.js"></script>
    <script>
        
        var CountyMap = function(el,county){
            var self = this;
            this.el = d3.select(el);
            
            this.county = county;
            this.countyObject = [];
            
            this.aspectRatio = 0.6;
            
            this.width = 200;
            this.height = 200;
            
            this.colors = {
                drought: '#FBC679',
                flood: '#2E5FAC',
                insects: '#57A246',
                heat: '#B42825',
                blizzard: '#55C6D4',
                tornado: '#672D91'
            }
                        
            
            this.getCounty = function(iowa){
                var counties = topojson.feature(iowa,iowa.objects.counties).features,
                    county,patt;
                
                patt = new RegExp(self.county.replace('-',' '));
                
                if (self.county == 'obrien') {
                    patt = new RegExp('brien');
                }
                                
                for (i=0;i<counties.length;i++){
                    if (patt.test(counties[i].properties.name.toLowerCase())) {
                        self.countyObject.push(counties[i]);
                        break;
                    }
                }

            };
            
            this.countiesInfo = {
                "adair": {
                    "centroidX" : 41.3307464,
                    "centroidY" : -94.4709413,
                    "scale" : 110,
                    "aspect" : 1
                },
                "adams": {
                    "centroidX" : 41.0289839,
                    "centroidY" : -94.6991849,
                    "scale" : 150,
                    "aspect" : .75
                },
                "allamakee": {
                    "centroidX" : 43.2842838,
                    "centroidY" : -91.3780923,
                    "scale" : 85,
                    "aspect" : 1
                },
                "appanoose": {
                    "centroidX" : 40.7431635,
                    "centroidY" : -92.8686104,
                    "scale" : 125,
                    "aspect" : .9
                },
                "audubon": {
                    "centroidX" : 41.6845893,
                    "centroidY" : -94.9058222,
                    "scale" : 100,
                    "aspect" : 1.3
                },
                "benton": {
                    "centroidX" : 42.0801864,
                    "centroidY" : -92.0656912,
                    "scale" : 85,
                    "aspect" : 1.3
                },
                "black-hawk": {
                    "centroidX" : 42.4700957,
                    "centroidY" : -92.3088197,
                    "scale" : 110,
                    "aspect" : 1
                },
                "boone": {
                    "centroidX" : 42.0365493,
                    "centroidY" : -93.931671,
                    "scale" : 110,
                    "aspect" : 1
                },
                "bremer": {
                    "centroidX" : 42.7745873,
                    "centroidY" : -92.3180548,
                    "scale" : 140,
                    "aspect" : .75
                },
                "buchanan": {
                    "centroidX" : 42.4707777,
                    "centroidY" : -91.8378392,
                    "scale" : 110,
                    "aspect" : 1
                },
                "buena-vista": {
                    "centroidX" : 42.7354936,
                    "centroidY" : -95.151149,
                    "scale" : 110,
                    "aspect" : 1
                },
                "butler": {
                    "centroidX" : 42.7315661,
                    "centroidY" : -92.7901934,
                    "scale" : 110,
                    "aspect" : 1
                },
                "calhoun": {
                    "centroidX" : 42.3851848,
                    "centroidY" : -94.6404136,
                    "scale" : 110,
                    "aspect" : .9
                },
                "carroll": {
                    "centroidX" : 42.0362382,
                    "centroidY" : -94.8605593,
                    "scale" : 110,
                    "aspect" : 1
                },
                "cass": {
                    "centroidX" : 41.3314876,
                    "centroidY" : -94.9278266,
                    "scale" : 110,
                    "aspect" : 1
                },
                "cedar": {
                    "centroidX" : 41.7723207,
                    "centroidY" : -91.1324125,
                    "scale" : 110,
                    "aspect" : 1
                },
                "cerro-gordo": {
                    "centroidX" : 43.0815577,
                    "centroidY" : -93.2608184,
                    "scale" : 110,
                    "aspect" : 1
                },
                "cherokee": {
                    "centroidX" : 42.7356226,
                    "centroidY" : -95.6238055,
                    "scale" : 110,
                    "aspect" : 1
                },
                "chickasaw": {
                    "centroidX" : 43.0600414,
                    "centroidY" : -92.3176637,
                    "scale" : 110,
                    "aspect" : 1
                },
                "clarke": {
                    "centroidX" : 41.0290323,
                    "centroidY" : -93.7851579,
                    "scale" : 140,
                    "aspect" : .75
                },
                "clay": {
                    "centroidX" : 43.0825804,
                    "centroidY" : -95.1509194,
                    "scale" : 110,
                    "aspect" : 1
                },
                "clayton": {
                    "centroidX" : 42.8447493,
                    "centroidY" : -91.3414328,
                    "scale" : 80,
                    "aspect" : .8
                },
                "clinton": {
                    "centroidX" : 41.8980358,
                    "centroidY" : -90.5319724,
                    "scale" : 110,
                    "aspect" : .6
                },
                "crawford": {
                    "centroidX" : 42.0372125,
                    "centroidY" : -95.3819678,
                    "scale" : 100,
                    "aspect" :.9
                },
                "dallas": {
                    "centroidX" : 41.6848862,
                    "centroidY" : -94.0397374,
                    "scale" : 110,
                    "aspect" : 1
                },
                "davis": {
                    "centroidX" : 40.7476891,
                    "centroidY" : -92.4097173,
                    "scale" : 110,
                    "aspect" : 1
                },
                "decatur": {
                    "centroidX" : 40.7376827,
                    "centroidY" : -93.7862815,
                    "scale" : 110,
                    "aspect" : 1
                },
                "decatur": {
                    "centroidX" : 40.7376827,
                    "centroidY" : -93.7862815,
                    "scale" : 110,
                    "aspect" : 1
                },
                "delaware": {
                    "centroidX" : 42.471211,
                    "centroidY" : -91.3673502,
                    "scale" : 110,
                    "aspect" : 1
                },
                "des-moines": {
                    "centroidX" : 40.9231829,
                    "centroidY" : -91.1814707,
                    "scale" : 80,
                    "aspect" : 1
                },
                "dickinson": {
                    "centroidX" : 43.3779848,
                    "centroidY" : -95.1508301,
                    "scale" : 140,
                    "aspect" : .75
                },
                "dubuque": {
                    "centroidX" : 42.468832,
                    "centroidY" : -90.8824564,
                    "scale" : 85,
                    "aspect" : .8
                },
                "emmet": {
                    "centroidX" : 43.3780225,
                    "centroidY" : -94.6784803,
                    "scale" : 140,
                    "aspect" : .75
                },
                "fayette": {
                    "centroidX" : 42.8625919,
                    "centroidY" : -91.8443207,
                    "scale" : 85,
                    "aspect" : .8
                },
                "floyd": {
                    "centroidX" : 43.0599208,
                    "centroidY" : -92.7890033,
                    "scale" : 110,
                    "aspect" : 1
                },
                "franklin": {
                    "centroidX" : 42.7325458,
                    "centroidY" : -93.262473,
                    "scale" : 110,
                    "aspect" : 1
                },
                "fremont": {
                    "centroidX" : 40.7455892,
                    "centroidY" : -95.6046765,
                    "scale" : 100,
                    "aspect" : 1
                },
                "greene": {
                    "centroidX" : 42.0362394,
                    "centroidY" : -94.3968356,
                    "scale" : 110,
                    "aspect" : 1
                },
                "grundy": {
                    "centroidX" : 42.4018651,
                    "centroidY" : -92.7914177,
                    "scale" : 100,
                    "aspect" : 1
                },
                "guthrie": {
                    "centroidX" : 41.6837548,
                    "centroidY" : -94.501055,
                    "scale" : 110,
                    "aspect" : 1
                },
                "hamilton": {
                    "centroidX" : 42.3837722,
                    "centroidY" : -93.7068085,
                    "scale" : 105,
                    "aspect" : 1
                },
                "hancock": {
                    "centroidX" : 43.0818861,
                    "centroidY" : -93.7342723,
                    "scale" : 110,
                    "aspect" : 1
                },
                "hardin": {
                    "centroidX" : 42.3838803,
                    "centroidY" : -93.2404025,
                    "scale" : 110,
                    "aspect" : 1
                },
                "harrison": {
                    "centroidX" : 41.6828528,
                    "centroidY" : -95.8169209,
                    "scale" : 90,
                    "aspect" : 1
                },
                "henry": {
                    "centroidX" : 40.9879383,
                    "centroidY" : -91.5445241,
                    "scale" : 110,
                    "aspect" : 1.4
                },
                "howard": {
                    "centroidX" : 43.3567673,
                    "centroidY" : -92.3171989,
                    "scale" : 110,
                    "aspect" : 1
                },
                "humboldt": {
                    "centroidX" : 42.7764686,
                    "centroidY" : -94.2071868,
                    "scale" : 140,
                    "aspect" : .75
                },
                "ida": {
                    "centroidX" : 42.3868747,
                    "centroidY" : -95.5134962,
                    "scale" : 110,
                    "aspect" : 1
                },
                "iowa": {
                    "centroidX" : 41.6863229,
                    "centroidY" : -92.065524,
                    "scale" : 110,
                    "aspect" : 1
                },
                "jackson": {
                    "centroidX" : 42.1717426,
                    "centroidY" : -90.5742294,
                    "scale" : 80,
                    "aspect" : .8
                },
                "jasper": {
                    "centroidX" : 41.6860394,
                    "centroidY" : -93.053765,
                    "scale" : 95,
                    "aspect" : .8
                },
                "jefferson": {
                    "centroidX" : 41.0317596,
                    "centroidY" : -91.9488774,
                    "scale" : 140,
                    "aspect" : .75
                },
                "johnson": {
                    "centroidX" : 41.6715511,
                    "centroidY" : -91.58808494,
                    "scale" : 82,
                    "aspect" : 1.2
                },
                "jones": {
                    "centroidX" : 42.1212397,
                    "centroidY" : -91.1314352,
                    "scale" : 110,
                    "aspect" : 1
                },
                "keokuk": {
                    "centroidX" : 41.336465,
                    "centroidY" : -92.1786426,
                    "scale" : 110,
                    "aspect" : 1
                },
                "kossuth": {
                    "centroidX" : 43.20413,
                    "centroidY" : -94.2067199,
                    "scale" : 65,
                    "aspect" : 1.4
                },
                "lee": {
                    "centroidX" : 40.6419764,
                    "centroidY" : -91.479264,
                    "scale" : 75,
                    "aspect" : 1
                },
                "jones": {
                    "centroidX" : 42.1212397,
                    "centroidY" : -91.1314352,
                    "scale" : 110,
                    "aspect" : 1
                },     
                "linn": {
                    "centroidX" : 42.0789478,
                    "centroidY" : -91.5989646,
                    "scale" : 90,
                    "aspect" : 1.2
                },
                "louisa": {
                    "centroidX" : 41.2185073,
                    "centroidY" : -91.2596184,
                    "scale" : 90,
                    "aspect" : 1
                },
                "lucas": {
                    "centroidX" : 41.0293738,
                    "centroidY" : -93.3277207,
                    "scale" : 150,
                    "aspect" : .75
                },
                "lyon": {
                    "centroidX" : 43.380497,
                    "centroidY" : -96.2102924,
                    "scale" : 100,
                    "aspect" : .7
                },
                "madison": {
                    "centroidX" : 41.3307142,
                    "centroidY" : -94.0155619,
                    "scale" : 110,
                    "aspect" : 1
                }, 
                "mahaska": {
                    "centroidX" : 41.3352035,
                    "centroidY" : -92.6409094,
                    "scale" : 110,
                    "aspect" : 1
                }, 
                "marion": {
                    "centroidX" : 41.3344515,
                    "centroidY" : -93.0994367,
                    "scale" : 110,
                    "aspect" : 1
                },
                "marshall": {
                    "centroidX" : 42.0358499,
                    "centroidY" : -92.9987706,
                    "scale" : 110,
                    "aspect" : 1
                }, 
                "mills": {
                    "centroidX" : 41.0334523,
                    "centroidY" : -95.6213267,
                    "scale" : 140,
                    "aspect" : .75
                }, 
                "mitchell": {
                    "centroidX" : 43.3564124,
                    "centroidY" : -92.7890315,
                    "scale" : 110,
                    "aspect" : 1
                },
                "monona": {
                    "centroidX" : 42.0516663,
                    "centroidY" : -95.9599235,
                    "scale" : 78,
                    "aspect" : .9
                },
                "monroe": {
                    "centroidX" : 41.0297826,
                    "centroidY" : -92.8689877,
                    "scale" : 150,
                    "aspect" : .75
                },
                "montgomery": {
                    "centroidX" : 41.03014,
                    "centroidY" : -95.1563758,
                    "scale" : 150,
                    "aspect" : .75
                },
                "muscatine": {
                    "centroidX" : 41.4839221,
                    "centroidY" : -91.1127562,
                    "scale" : 110,
                    "aspect" : .75
                },
                "obrien": {
                    "centroidX" : 43.0837527,
                    "centroidY" : -95.6248784,
                    "scale" : 110,
                    "aspect" : 1
                },
                "osceola": {
                    "centroidX" : 43.3785704,
                    "centroidY" : -95.6236852,
                    "scale" : 150,
                    "aspect" : .75
                },
                "page": {
                    "centroidX" : 40.7391444,
                    "centroidY" : -95.1501747,
                    "scale" : 110,
                    "aspect" : 1
                },
                "palo-alto": {
                    "centroidX" : 43.0820643,
                    "centroidY" : -94.6781371,
                    "scale" : 110,
                    "aspect" : 1
                },
                "plymouth": {
                    "centroidX" : 42.7378346,
                    "centroidY" : -96.2140431,
                    "scale" : 80,
                    "aspect" : .8
                },
                "pocahontas": {
                    "centroidX" : 42.7341351,
                    "centroidY" : -94.6787466,
                    "scale" : 110,
                    "aspect" : 1
                },
                "polk": {
                    "centroidX" : 41.6855048,
                    "centroidY" : -93.5735335,
                    "scale" : 98,
                    "aspect" : .9
                },
                "pottawattamie": {
                    "centroidX" : 41.3366123,
                    "centroidY" : -95.5423935,
                    "scale" : 80,
                    "aspect" : .75
                },
                "poweshiek": {
                    "centroidX" : 41.6864422,
                    "centroidY" : -92.5314684,
                    "scale" : 110,
                    "aspect" : 1
                },
                "ringgold": {
                    "centroidX" : 40.7352023,
                    "centroidY" : -94.2439719,
                    "scale" : 110,
                    "aspect" : 1
                },
                "sac": {
                    "centroidX" : 42.3862604,
                    "centroidY" : -95.1053946,
                    "scale" : 100,
                    "aspect" : 1
                },
                "scott": {
                    "centroidX" : 41.6370978,
                    "centroidY" : -90.6232428,
                    "scale" : 90,
                    "aspect" : 1
                },
                "shelby": {
                    "centroidX" : 41.6850926,
                    "centroidY" : -95.3102113,
                    "scale" : 100,
                    "aspect" : 1
                },
                "sioux": {
                    "centroidX" : 43.0826174,
                    "centroidY" : -96.1778827,
                    "scale" : 80,
                    "aspect" : .8
                },
                "story": {
                    "centroidX" : 42.0362415,
                    "centroidY" : -93.4650448,
                    "scale" : 110,
                    "aspect" : 1
                },
                "tama": {
                    "centroidX" : 42.0798117,
                    "centroidY" : -92.5325425,
                    "scale" : 80,
                    "aspect" : 1.2
                },
                "taylor": {
                    "centroidX" : 40.7374324,
                    "centroidY" : -94.6964148,
                    "scale" : 110,
                    "aspect" : 1
                },
                "union": {
                    "centroidX" : 41.0277304,
                    "centroidY" : -94.2423792,
                    "scale" : 150,
                    "aspect" : .75
                },
                "van-buren": {
                    "centroidX" : 40.7532294,
                    "centroidY" : -91.9499871,
                    "scale" : 110,
                    "aspect" : 1
                },
                "wapello": {
                    "centroidX" : 41.0305845,
                    "centroidY" : -92.4094499,
                    "scale" : 150,
                    "aspect" : .75
                },
                "warren": {
                    "centroidX" : 41.3343735,
                    "centroidY" : -93.5613594,
                    "scale" : 110,
                    "aspect" : 1
                },
                "washington": {
                    "centroidX" : 41.335591,
                    "centroidY" : -91.7178676,
                    "scale" : 110,
                    "aspect" : 1
                },
                "wayne": {
                    "centroidX" : 40.7394702,
                    "centroidY" : -93.3273639,
                    "scale" : 110,
                    "aspect" : 1
                },
                "webster": {
                    "centroidX" : 42.4279662,
                    "centroidY" : -94.1817881,
                    "scale" : 80,
                    "aspect" : 1.3
                },
                "winnebago": {
                    "centroidX" : 43.3775678,
                    "centroidY" : -93.7341955,
                    "scale" : 150,
                    "aspect" : .75
                },
                "winneshiek": {
                    "centroidX" : 43.2906746,
                    "centroidY" : -91.84370749,
                    "scale" : 80,
                    "aspect" : 1.3
                },
                "woodbury": {
                    "centroidX" : 42.3897169,
                    "centroidY" : -96.0447673,
                    "scale" : 85,
                    "aspect" : .75
                },
                "worth": {
                    "centroidX" : 43.3773984,
                    "centroidY" : -93.2608476,
                    "scale" : 150,
                    "aspect" : .75
                },
                "wright": {
                    "centroidX" : 42.7331189,
                    "centroidY" : -93.7351465,
                    "scale" : 110,
                    "aspect" : 1
                }
            }
            
            
            this.setCountyProjection = function(){
                var county = self.countiesInfo[self.county];
                                
                // size of svg
                self.height = self.width * county.aspect;
                
                // projection
                self.projection = d3.geoMercator()
                    .scale(this.height * county.scale)
                    .center([county.centroidY,county.centroidX])
                    .translate([this.width/2, this.height/2.1]);
                
                // path generator
                self.path = d3.geoPath()
                    .projection(this.projection);
                
                
            };
                        

            
            
            this.counties = null;
            
            this.drawCounties = function(iowa){
                var county = self.countiesInfo[self.county];
                
                
                self.wrapper = this.el.append('div').classed("svg-container", true);
            
                self.svg = this.wrapper.append('svg')
                        .attr("preserveAspectRatio", "xMinYMin meet")
                        .attr("viewBox", "0 0 " + self.width + " " + self.height)
                        .classed("svg-content-responsive", true)
                        .classed("svg-map",true);
                self.mapG = this.svg.append('g').attr('id','iowa');
                
                self.wrapper.style('padding-top',(county.aspect * 100) + '%');
                                
                self.counties = self.mapG.selectAll(".county")
                    .data(self.countyObject)
                    .enter()
                    .append('path')
                    .attr("class","county")
                    .attr("d",self.path)
                    .attr("id",function(d){return d.properties.name.replace(" County, IA",'').replace(" ",'-').replace("'",'').toLowerCase()});
                
                
            };
            
            this.drawWater = function(water) {
                var lakes = topojson.feature(water,water.objects.iowa_lakes).features,
                    co_lakes = [];
                                                
                for (i=0;i<lakes.length;i++) {
                    if (lakes[i].properties.CO_NAME == self.county.toUpperCase().replace('-',' ')) {
                        co_lakes.push(lakes[i]);
                    }
                }
                
                self.mapG.selectAll(".water")
                    .data(co_lakes)
                    .enter()
                    .append('path')
                    .attr("class","water")
                    .attr("d",function(d){ return self.path(d)})
                    .style('fill','#d2d8d6')
                    .style('stroke','#d2d8d6');
            };
            
            this.drawPostMarkers = function(posts) {
                self.mapG.selectAll(".marker")
                    .data(posts)
                    .enter()
                    .append('circle')
                    .attr('r',3)
                    .attr('cx', function(d){return self.projection([d.lng,d.lat])[0]})
                    .attr('cy', function(d){return self.projection([d.lng,d.lat])[1]})
                    .style('fill',function(d){return self.colors[d.hazard]});
            };
            
            
            this.drawDonut = function(posts) {
                self.donut = d3.select('#county-donut');
                
                var p_hazards = {},
                    p_haz_array = [],
                    total = 0,
                    temp;
                
                posts.map(function(p){
                    if (!p_hazards[p.hazard]) {p_hazards[p.hazard] = 0}
                   return p_hazards[p.hazard] += 1; 
                });
                
                for (var h in p_hazards) {
                    temp = {};
                    temp.hazard = h;
                    temp.count = p_hazards[h];
                    p_haz_array.push(temp);
                    total += p_hazards[h];
                }
                
                
                self.donutSVG = self.donut.append('svg')
                    .attr('width','100px')
                    .attr('height','100px');
                
                self.donutG = self.donutSVG.append('g')
                    .attr('transform','translate(50,50)');
                
                
                if (total > 0) {
                
                    var arcs = d3.pie()
                        .value(function(d) { return d.count; })
                        (p_haz_array);
                    
                    var path = d3.arc()
                        .outerRadius(50)
                        .innerRadius(30);
                    
                    
                    var arc = self.donutG.selectAll(".arc")
                        .data(arcs)
                        .enter()
                        .append("g")
                        .attr("class", "arc");
                                        
                     arc.append("path")
                          .attr("d", path)
                          .styles({
                                fill:function(d) {  return self.colors[d.data.hazard]; },
                                stroke: 'none'
                            });
                    
                    var circ = self.donutG.append('circle')
                        .attrs({
                            r: 30,
                            cx : 0,
                            cy : 0
                        })
                        .style('fill','white');

                     var label = self.donutG.append('text').attr('text-anchor','middle')
                        .text(total).attr('transform',"translate(0,10)").style('font-size','24px').style('font-weight','bold');
                    
                }
                
                
//                if (total > 0) {
//                         
//                        
//                    
//                         var arcs = d3.pie()
//                            .value(function(d) { return d.count; })
//                            (d.hazards);
//                         
//                         var path = d3.arc()
//                            .outerRadius(100)
//                            .innerRadius(0);
//                         
//                         var data = {
//                            county: d.properties.name.replace(', IA',''),
//                            cx: d.cx,
//                            cy: d.cy,
//                            hazards: d.hazards,
//                            countySafe : d.countySafe
//                         };
//                         
//                         var pie = self.mapG.append('g').attr('transform',"translate(" + d.cx + "," + d.cy + ")")
//                            .classed('pie',true)
//                            .datum(data);
//                         
//                         var arc = pie.selectAll(".arc")
//                            .data(arcs)
//                            .enter()
//                            .append("g")
//                            .attr("class", "arc");
//                                                  
//                         arc.append("path")
//                          .attr("d", path)
//                          .styles({
//                                fill:function(d) { return self.colors[d.data.hazard]; },
//                                stroke: 'none'
//                            });
//                         
//                         var circ = pie.append('circle')
//                            .attrs({
//                                r: self.storyCountScale(d.count) - 10,
//                                cx : 0,
//                                cy : 0
//                            })
//                            .style('fill','white');
//                                                  
//                         var label = pie.append('text').attr('text-anchor','middle')
//                            .text(d.count).attr('transform',"translate(0,6)");
//                         
//                     } else {
//                         
//                         var data = {
//                            county: d.properties.name.replace(', IA',''),
//                            cx: d.cx,
//                            cy: d.cy,
//                            countySafe : d.countySafe
//                         };
//                         
//                         var circ = self.mapG.append('circle')
//                            .attrs({
//                                r: 8,
//                                cx : d.cx,
//                                cy : d.cy
//                            })
//                            .style('fill','#efefef')
//                            .classed('pie',true)
//                            .datum(data);
//                         
//                     }   
            };
            
            
            
            
            /******* DRAW ROUTINE ***************/
            this.init = function(iowa,water){
                self.getCounty(iowa);
                self.setCountyProjection();
                self.drawCounties(iowa);
                self.drawWater(water);
                self.drawPostMarkers(posts);
                if (window.innerWidth >= 900) {
                    this.drawDonut(posts);
                }
                
                                
                
//                self.mergeStories();
//                self.buildDonuts();
//                self.buildTooltip();
            }
        };
            
        var countyMap = new CountyMap('#county-map','<?php echo $term->slug ?>',posts);
                
        d3.queue(2)
            .defer(d3.json, '<?php bloginfo( 'template_url' ); ?>/js/countiesTopo.json')
            .defer(d3.json, '<?php bloginfo( 'template_url' ); ?>/js/iowa_lakes.topo.json')
                .await(function(err,data,water){
                    countyMap.init(data,water)
                });     
        
    </script>
    

<?php
get_footer();
