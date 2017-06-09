<?php
/**
 * The template for displaying the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package pwmap
 */

  get_header(); ?>


<main>            
            
                <section id="hero">
                    <div class="wrapper">
                        <hgroup>
                            <h1 class="f-headline">Sharing Weather Hazard Stories Of Iowa’s Past And Present</h1>
                            <h2 class="f-subheadline">To Remember Our Resilience In The Future.</h2>
                        </hgroup>
                        <ul id="hero--article-stats">
                            <li><span class="has-num">99</span><span class="has-desc">counties</span></li>
                            <li><span class="has-num">6</span><span class="has-desc">weather hazards</span></li>
                            <li><span class="has-num">99</span><span class="has-desc">stories</span><span id="has-growing">and growing!</span></li>
                        </ul>
                    </div><!-- end wrapper -->
                </section><!-- end #hero -->


                <section id="home-main" class="map-bg">
                    <div class="wrapper">
                        
                        
                        <div id="home-map">
                        
                            <div id="hm-intro" class="pt4 pb4">
                                <h2 class="relative pin-before dib">Stories of Iowa Weather</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin volutpat ipsum nec massa imperdiet accumsan. Ut ullamcorper et risus sit amet porttitor. Pellentesque quis auctor dolor. Integer tempor mi a condimentum iaculis. Nam auctor accumsan arcu, eget ornare magna viverra in. </p>
                            </div>
                            
                            <div id="iowa-map"></div>
                            
                            <div id="hm-nav" class="mb4">
                                
                                <h3 class="f3-alt">Explore stories by county or region</h3>
                                <div class="flex-row mb4">

                                    <div class="col-sm-100 col-md-50 col-lg-50">
                                        <h3 class="f5">Select a county</h3>
                                        <select class="county-search input-reset" data-placeholder="Select a county" style="width:100%;">
                                            <option></option>
                              <?php

                                 $counties = get_terms( array(
                                    'taxonomy' => 'county',
                                    'hide_empty' => false,
                                ) );

                                foreach ($counties as $county) {
                                    echo '<option value="county/' . $county->slug . '">' . $county->name . '</option>';
                                }

                                ?> 
                                        </select>
                                    </div><!-- end .col -->

                                    <div class="col-sm-100 col-md-50 col-lg-50">
                                        <h3 class="f5">Select a region</h3>
                                        <select class="styled-select input-reset" data-placeholder="Select a region" style="width:100%;">
                                            <option></option>
                              <?php

                                 $regions = get_terms( array(
                                    'taxonomy' => 'region',
                                    'hide_empty' => false,
                                ) );

                                foreach ($regions as $region) {
                                    echo '<option value="region/' . $region->slug . '">' . $region->name . '</option>';
                                }

                                ?> 
                                        </select>
                                    </div><!-- end .col -->

                                </div><!-- end .flex-row -->
                                
                                <div id="hm-hazards">
                                    <div class="flex-row">
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
                                        ?>
                                        <div class="col-sm-50 col-md-33 col-lg-16 drought">
                                            <img src="<?php bloginfo( 'template_url' ); ?>/img/holder.jpg" alt="drought" />
                                            <h4>Drought</h4>
                                            <p class="f-small"><span><?php echo $queryDrought->post_count; ?> </span> stories</p>
                                            <a href="hazard/drought" class="btn">read now &raquo;</a>
                                        </div><!-- end .col -->
                                        
                                        <div class="col-sm-50 col-md-33 col-lg-16 flood">
                                            <img src="<?php bloginfo( 'template_url' ); ?>/img/holder.jpg" alt="flood" />
                                            <h4>Flood</h4>
                                            <p class="f-small"><span><?php echo $queryFlood->post_count; ?></span> stories</p>
                                            <a href="hazard/flood" class="btn">read now &raquo;</a>
                                        </div><!-- end .col -->
                                        
                                        <div class="col-sm-50 col-md-33 col-lg-16 insects">
                                            <img src="<?php bloginfo( 'template_url' ); ?>/img/holder.jpg" alt="insects" />
                                            <h4>Insects</h4>
                                            <p class="f-small"><span><?php echo $queryInsects->post_count; ?></span> stories</p>
                                            <a href="hazard/insects" class="btn">read now &raquo;</a>
                                        </div><!-- end .col -->
                                        
                                        <div class="col-sm-50 col-md-33 col-lg-16 heat">
                                            <img src="<?php bloginfo( 'template_url' ); ?>/img/holder.jpg" alt="heat" />
                                            <h4>Heat</h4>
                                            <p class="f-small"><span><?php echo $queryHeat->post_count; ?></span> stories</p>
                                            <a href="hazard/heat" class="btn">read now &raquo;</a>
                                        </div><!-- end .col -->
                                        
                                        <div class="col-sm-50 col-md-33 col-lg-16 blizzard">
                                            <img src="<?php bloginfo( 'template_url' ); ?>/img/holder.jpg" alt="blizzard" />
                                            <h4>Blizzard</h4>
                                            <p class="f-small"><span><?php echo $queryBlizzard->post_count; ?></span> stories</p>
                                            <a href="hazard/blizzard" class="btn">read now &raquo;</a>
                                        </div><!-- end .col -->
                                        
                                        <div class="col-sm-50 col-md-33 col-lg-16 tornado">
                                            <img src="<?php bloginfo( 'template_url' ); ?>/img/holder.jpg" alt="tornado" />
                                            <h4>Tornado</h4>
                                            <p class="f-small"><span><?php echo $queryTornado->post_count; ?></span> stories</p>
                                            <a href="hazard/tornado" class="btn">read now &raquo;</a>
                                        </div><!-- end .col -->
                                        
                                    </div><!-- end .flex-row -->
                                </div><!-- end #hm-hazards -->
                                
                            </div><!-- end #hm-nav -->
                            
                        </div><!-- end #home-map -->
                        
                        <div id="home-get-involved" class="pwm-box mb4">
                            <h5 class="f3">Help get more stories on the map</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin volutpat ipsum nec massa imperdiet accumsan. Ut ullamcorper et risus sit amet porttitor. Pellentesque quis auctor dolor. Integer tempor mi a condimentum iaculis. Nam auctor accumsan arcu, eget ornare magna viverra in. </p>
                            <a href="get-involved" class="btn btn-primary">Find out how to submit stories for your county &raquo;</a>
                        </div><!-- end .home-get-involved -->
                        
                        
                    </div><!-- end wrapper -->
                </section><!-- end #home-main -->


                <footer>
                    <div class="wrapper">
                        <small>&copy; 2017 Peoples' Weather Map</small>
                    </div><!-- end wrapper -->
                </footer>
        
        </main>
        

        
        <!-- map -->
        
        <script src="https://d3js.org/d3.v4.js"></script>
        <script src="https://d3js.org/d3-selection-multi.v1.min.js"></script>
        <script src="https://d3js.org/d3-path.v1.min.js"></script>
        <script src="https://d3js.org/d3-shape.v1.min.js"></script>
        <script src="https://d3js.org/topojson.v2.min.js"></script>
        <script src="http://d3js.org/queue.v1.min.js"></script>
        
        <script>
            
       var stories = [
            <?php    
                // $terms = get_terms( array(
                // 'taxonomy' => 'county',
                // 'hide_empty' => false,
                // ));
                 $terms = get_terms( array(
                                'taxonomy' => 'county',
                                'hide_empty' => false,
                        ) );

                foreach ($terms as $term) {
                    $argsCounties = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                    $argsDrought = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => 'drought',
                        ),
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                    $argsFlood = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => 'flood',
                        ),
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                   $argsInsects = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => 'insects',
                        ),
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                  $argsBlizzard = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => 'blizzard',
                        ),
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                     $argsHeat = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => 'heat',
                        ),
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                    $argsTornado = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'hazard',
                            'field'    => 'slug',
                            'terms'    => 'tornado',
                        ),
                        array(
                            'taxonomy' => 'county',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                    );
                    $queryCounties = new WP_Query( $argsCounties );
                    $queryDrought = new WP_Query( $argsDrought );
                    $queryFlood = new WP_Query( $argsFlood );
                    $queryInsects = new WP_Query( $argsInsects );
                    $queryBlizzard = new WP_Query( $argsBlizzard );
                    $queryHeat = new WP_Query( $argsHeat );
                    $queryTornado = new WP_Query( $argsTornado );
                    echo '{
                            county: \'' . $term->slug . '\', 
                            countySafe: \''. $term->slug . '\', 
                            countTotal: '. $queryCounties->post_count . ', 
                            hazards: [';
                    if ($queryDrought->post_count > 0):
                        echo '{hazard: \'drought\',count: '. $queryDrought->post_count .'},';
                     endif;
                    if ($queryFlood->post_count > 0):
                        echo '{hazard: \'flood\',count: '. $queryFlood->post_count .'},';
                     endif;
                    if ($queryInsects->post_count > 0):
                        echo '{hazard: \'insects\',count: '. $queryInsects->post_count .'},';
                     endif;
                    if ($queryBlizzard->post_count > 0):
                        echo    '{hazard: \'blizzard\',count: '. $queryBlizzard->post_count .'},';
                     endif;
                    if ($queryHeat->post_count > 0):
                         echo '{hazard: \'heat\',count: '. $queryHeat->post_count .'},';
                    endif;
                    if ($queryTornado->post_count > 0) :                   
                        echo '{hazard: \'tornado\',count: '. $queryTornado->post_count .'}';
                    endif;
                    echo']
                         },';
                }
            ?>  
       ];

        // var stories = [
        //     {
        //         county: 'Johnson',
        //         countySafe: 'johnson',
        //         countTotal: 16,
        //         hazards: [
        //             {hazard: 'drought',count: 5},
        //             {hazard: 'flood',count: 8},
        //             {hazard: 'tornado',count: 3}
        //         ]
        //     },
        //     {
        //         county: 'Black Hawk',
        //         countySafe: 'black-hawk',
        //         countTotal: 4,
        //         hazards: [
        //             {hazard: 'insects',count: 2},
        //             {hazard: 'heat',count: 2}
        //         ]
        //     },
        //     {
        //         county: "O'Brien",
        //         countySafe: 'obrien',
        //         countTotal: 9,
        //         hazards: [
        //             {hazard: 'blizzard',count: 5},
        //             {hazard: 'flood',count: 3},
        //             {hazard: 'tornado',count: 1}
        //         ]
        //     }
            
        // ];
          
        
            
        var IowaMap = function(el,data){
            var self = this;
            this.el = d3.select(el);
            
            this.aspectRatio = 0.6;
            
            this.width = 1000;
            this.height = 600;
            
            this.colors = {
                drought: '#FBC679',
                flood: '#2E5FAC',
                insects: '#57A246',
                heat: '#B42825',
                blizzard: '#55C6D4',
                tornado: '#672D91'
            }
            
            
            this.wrapper = this.el.append('div').classed("svg-container", true);
            
            this.svg = this.wrapper.append('svg')
                    .attr("preserveAspectRatio", "xMinYMin meet")
                    .attr("viewBox", "0 0 " + this.width + " " + this.height)
                    .classed("svg-content-responsive", true)
                    .classed("svg-map",true);
            this.mapG = this.svg.append('g').attr('id','iowa');
            
            this.projection = d3.geoMercator()
                .scale(this.height * 12)
                .center([-93.0977,41.8780])
                .translate([this.width/1.75, this.height / 2.1]);
            
            this.path = d3.geoPath()
                .projection(this.projection);
            
            this.counties = null;
            
            this.drawCounties = function(iowa){
                 self.counties = self.mapG.selectAll(".county")
                    .data(topojson.feature(iowa,iowa.objects.counties).features)
                    .enter()
                    .append('path')
                    .attr("class","county")
                    .attr("d",self.path)
                    .attr("id",function(d){return d.properties.name.replace(" County, IA",'').replace(" ",'-').replace("'",'').toLowerCase()});
                
                /** create centroids **/
                self.counties.each(function(d){
                    var c = self.path.centroid(d);
                    d.cx = c[0].toFixed(2);
                    d.cy = c[1].toFixed(2)
                });
                
                /** mark with safe county name **/
                self.counties.each(function(d){
                    d.countySafe = d.properties.name.replace(" County, IA",'').replace(" ",'-').replace("'",'').toLowerCase();
                });

                
            };
            
            
            /*** ALL FOR STORIES AND DONUT CHARTS ********/
            this.storyCountMin = d3.min(stories,function(d){return d.countTotal});
            this.storyCountMax = d3.max(stories,function(d){return d.countTotal});
            this.storyCountScale = d3.scaleLinear().domain([this.storyCountMin,this.storyCountMax]).range([24,40]);
            
            this.mergeStories = function(){
                self.counties.each(function(d){
                    var countyData = stories.filter(function(county){return county.countySafe == d.countySafe});
                    
                    if (countyData.length > 0) {
                        d.hazards = countyData[0].hazards;
                        d.count = countyData[0].countTotal;
                    } else {
                        d.count = 0;
                    }
                    
                    
                    
                });
            };
            
            this.buildDonuts = function(){
                  self.counties.each(function(d){
                     if (d.hazards) {
                         
                         var arcs = d3.pie()
                            .value(function(d) { return d.count; })
                            (d.hazards);
                         
                         var path = d3.arc()
                            .outerRadius(self.storyCountScale(d.count))
                            .innerRadius(0);
                         
                         var data = {
                            county: d.properties.name.replace(', IA',''),
                            cx: d.cx,
                            cy: d.cy,
                            hazards: d.hazards,
                            countySafe : d.countySafe
                         };
                         
                         var pie = self.mapG.append('g').attr('transform',"translate(" + d.cx + "," + d.cy + ")")
                            .classed('pie',true)
                            .datum(data);
                         
                         var arc = pie.selectAll(".arc")
                            .data(arcs)
                            .enter()
                            .append("g")
                            .attr("class", "arc");
                                                  
                         arc.append("path")
                          .attr("d", path)
                          .styles({
                                fill:function(d) { return self.colors[d.data.hazard]; },
                                stroke: 'none'
                            });
                         
                         var circ = pie.append('circle')
                            .attrs({
                                r: self.storyCountScale(d.count) - 10,
                                cx : 0,
                                cy : 0
                            })
                            .style('fill','white');
                                                  
                         var label = pie.append('text').attr('text-anchor','middle')
                            .text(d.count).attr('transform',"translate(0,6)");
                         
                     } else {
                         
                         var data = {
                            county: d.properties.name.replace(', IA',''),
                            cx: d.cx,
                            cy: d.cy,
                            countySafe : d.countySafe
                         };
                         
                         var circ = self.mapG.append('circle')
                            .attrs({
                                r: 8,
                                cx : d.cx,
                                cy : d.cy
                            })
                            .style('fill','#efefef')
                            .classed('pie',true)
                            .datum(data);
                         
                     } 
                  });
                
                self.pies = self.mapG.selectAll('.pie');
                
                /** click to story track *******/
                self.pies.on('click',function(d){
                    window.location = d.countySafe; 
                });
            };
            
            

            /******* TOOLTIP ***************/
            this.buildTooltip = function(){
                self.tooltip = d3.select("body")
                    .append("div")
                    .style("position", "absolute")
                    .style("z-index", "10")
                    .style("visibility", "hidden")
                    .attr('id','map-tooltip');
                
                self.tooltip.h1 = self.tooltip.append('h1').text("County");
                self.tooltip.legendWrap = self.tooltip.append('div');
                                
                function capitalizeFirstLetter(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }
                
                function makeLegend(d){
                    self.tooltip.legendWrap.html("");
                    var tr;
                    if (d.hazards) {
                        var legend = self.tooltip.legendWrap.append('table');
                        for (var i = 0; i<d.hazards.length; i++) {
                            tr = legend.append('tr');
                            tr.append('td').append('span').style('background-color',self.colors[d.hazards[i].hazard]);
                            tr.append('td').text( capitalizeFirstLetter(d.hazards[i].hazard) );
                            tr.append('td').text(d.hazards[i].count);
                        }
                    } else {
//                        self.tooltip.legend.append('tr').append('td').classed('nopad',true).text("Currently No Stories");
                    }
                }
                
                
                                
                self.pies.on("mouseover", function(d){ 
                    var position = this.getBoundingClientRect(),
                        elTop = position.top + window.scrollY
                    self.tooltip.h1.text(d.county);
                    makeLegend(d);
                    var tipWidth = self.tooltip.style('width').replace('px',''),
                        tipHeight = self.tooltip.style('height').replace('px',''); 
                    self.tooltip.style("visibility", "visible");
                    self.tooltip.style("top", (elTop - tipHeight - 10) + "px")
                        .style("left", ((position.left + position.width/2) - (tipWidth/2)) + "px");
                })
	               .on("mouseout", function(){return self.tooltip.style("visibility", "hidden");});
            }
            
            
            /******* DRAW ROUTINE ***************/
            this.init = function(iowa){
                 self.mapG.empty();
                self.drawCounties(iowa);
                self.mergeStories();
                self.buildDonuts();
                self.buildTooltip();
            }
  
            
        };
        var homeMap = new IowaMap('#iowa-map');
            
        d3.queue(1)
            .defer(d3.json, '<?php bloginfo( 'template_url' ); ?>/js/countiesTopo.json')
                .await(function(err,data){
                    homeMap.init(data)
                }); 
            

        
        </script>


<?php get_footer();
