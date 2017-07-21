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

            
            var Stories = function(data){
                var self = this;
                this.articles = data;
                this.filteredArticles = [];
                
                // index # of currently viewed this.filteredArticles
                this.currentArticle = 0;
                              
                
                // html elements in article view
                this.loader = $('#al-article');
                this.spinner = $('#al-spinner');
                this.overlay = $('#article-loader');
                this.topDiv = $('#al-top');
                this.close = this.topDiv.find('.close-x').add('.x-text');
                this.hazardLink = $('#al-hazard');
                this.nextLink = $('#al-next');
                
                // needed?
                this.currentCard = null;
                this.nextCard = null;
                
                // always work in a filtered state so self.data remains a cache
                this.setFilteredArticles = function(hazard){
                    if (hazard == 'all') {
                        self.filteredArticles = self.articles;
                    } else {
                        self.filteredArticles = self.articles.filter(function(a){return a.hazard == hazard});
                    }
                };
                this.setFilteredArticles('all');
                
                // on tab press, cache hazard state
                this.hazard = 'all';
                
                
                // cache the article cards 
                this.setCards = function(){
                    return $('.nt-card');
                };
                this.cards = this.setCards();
                
                // sync filteredArticles with cards
                this.setCardIndices = function(){
                  for (i = 0; i < self.filteredArticles.length; i++) {
                      $('#' + self.filteredArticles[i].id).data('index',i);
                  }  
                };
                this.setCardIndices();
                
                // cache the 'read more' buttons
                this.setBtns = function(){
                    return self.cards.find('.btn');
                };
                this.btns = this.setBtns();
                
                // tabs events
                this.tabs = $('.nt-tabs a');
                self.tabs.on('click',function(){
                    var hazard = $(this).data('toggle');
                    self.hazard = hazard;
                    self.setFilteredArticles(hazard);
                    self.currentArticle = 0;
                
                    // set last class
                    self.cards.removeClass('last');
                    if (self.filteredArticles.length > 0) {
                        $('#'+self.filteredArticles[self.filteredArticles.length - 1].id).addClass('last');
                    }
                    
                    
                    // set card indices for easier logic
                    self.setCardIndices();
                });
                
                
                // set the link to the related hazard page in the article view
                this.setHazardLink = function(hazard){
                    self.hazardLink.attr('href','/hazards/' + hazard)
                        .text('Learn More About ' + hazard);
                };
                
                // set the link to the next article in the article view
                this.setNextLink = function(){
                    if (self.currentArticle != self.filteredArticles.length -1) {
                        self.nextLink.show();
                        self.nextLink.attr('href', self.filteredArticles[self.currentArticle + 1].url);
                    } else {
                        self.nextLink.hide();
                    }
                };
                
                // animate load
                this.loadArticle = function(link){
                    self.spinner.css('display','flex');
                    self.loader.hide();
                    self.loader.load(link,function(){
                        self.loader.fadeIn();
                        self.spinner.hide();
                    });
                    self.overlay.css('right',0);
                    self.topDiv.css('right',0);
                    self.loader.parent().scrollTop(0);
                }
                
                // base URL of page
                this.getBaseURL = function(){
                    var url = window.location + '';
                    return url.split('#!/')[0];
                };
                this.baseURL = this.getBaseURL();
                
                // social sharing
                this.social = [
                    {
                        btn : $('#s-facebook'),
                        build : function(url) {
                            return 'http://www.facebook.com/sharer.php?u=' + url;
                        }
                    }, {
                        btn : $('#s-twitter'),
                        build : function(url) {
                            return 'https://twitter.com/share?url=' + url;
                        }
                    },{
                        btn : $('#s-email'),
                        build : function(url) {
                            return 'mailto:?Subject=Peoples%27 Weather Map&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 ' + url;
                        } 
                    }
                    
                ];
                
                this.makeSocialLinks = function(){
                  for (i=0;i<self.social.length;i++){
                      self.social[i].btn.attr('href',self.social[i].build('http://peoplesweathermap.org/' + self.filteredArticles[self.currentArticle].id));
                  }  
                };
                
                
                
//                // handle history state
//                this.handleHashURL = function(){
//                    var url = window.location + '',
//                        hash = new RegExp("#!"),
//                        hasHash = hash.test(url),
//                        link;
//                    if (hasHash) {
//                        link = url.split('#!/')[1];
//                        $('#' + link).find('.btn-primary').trigger('click');
//                    } else {
//                        if (self.overlay.css('right') == '0px') {
//                            self.topDiv.find('.close-x').trigger('click');
//                        } 
////                        else {
////                            history.pushState(url,'','');
////                        }
//                    }
//                };
                
                
                // history state
                this.setHistoryState = function(){                 
                  history.pushState(self.filteredArticles[self.currentArticle].id, self.filteredArticles[self.currentArticle].title, '#!/' + self.filteredArticles[self.currentArticle].id);  
                };
                
                // back to archive page
                this.clearHistoryState = function(){
                  history.pushState('base', '' , self.baseURL);  
                };
                
                // back and forward buttons
                 window.addEventListener('popstate', function(event) {
                     if (event.state == 'base') {
                         self.topDiv.find('.close-x').trigger('click');
                         $('html').removeClass('noscroll');
                     } else {
                         /*** PRODUCTION - CHANGE TO SITE URL **/
                         self.loadArticle('/pwm/' + event.state + ' #article');
                          $('html').addClass('noscroll');
                     }

                 });
                

                                
                // read more button events
                this.addBtnEvents = function(){
                    self.btns.on('click',function(e){
                        var that = $(this);
                        e.preventDefault();
                        
                        $('html').addClass('noscroll');
                        
                        // load article and show article view
                        self.loadArticle($(this).attr('href') + ' #article');
                        
                        var currentCard = $(this).parent().parent();
                        self.currentArticle = currentCard.data('index');
                        
                        // get the article's hazard
                        var hazard = currentCard.data('hazard');
                        
                        // set the learn more about hazard link
                        self.setHazardLink(hazard);
                        
                        // set the next article link
                        self.setNextLink();
                        
                        self.setHistoryState();
                        
                        self.makeSocialLinks();
                                                
                    });
                };
                
                // next button in article loader events
                this.addNextBtnEvents = function(){
                    self.nextLink.on('click',function(e){
                        e.preventDefault();
                        
                        
                        self.currentArticle++;

                        self.loadArticle($(this).attr('href') + ' #article');
                        
                                                
                        // get the article's hazard
                        var hazard = self.filteredArticles[self.currentArticle].hazard
                        self.setHazardLink(hazard);
                        
                        // set the next article link
                        self.setNextLink();
                        
                        self.setHistoryState();
                        
                        self.makeSocialLinks();
                        
                    });
                };
                
                // close button in article loader events
                this.close.on('click',function(e,){
                    e.preventDefault();                    
                    self.overlay.css('right','-100%');
                    self.topDiv.css('right','-100%');
                    $('html').removeClass('noscroll');
                    self.clearHistoryState();
                });
                

                
                this.init = function(){
                    this.addBtnEvents();
                    this.addNextBtnEvents();
//                    this.handleHashURL();
                }
                this.init();
                
            }; // stories
            
            var pwmStories = new Stories(posts);
            
        });