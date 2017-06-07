$(function(){
    
   $('header .hamburger, nav .close-x').on('click',function(){
        var that = $(this);
        var toggle = that.data('toggle');
       var active = that.data('active');
       
       that.toggleClass('active');
        $(toggle).toggleClass('shown');
       
       if (active) {
           $(active).removeClass('active');
       }
       
   });
    
    $('#nav-weather-stories').on('click',function(){
        $(this).toggleClass('active');
        $('#stories-nav').toggleClass('shown');
    });
    
    
    
    $('.county-search').chosen({no_results_text: "Oops, nothing found!"}); 
    $('.styled-select').chosen({disable_search_threshold: 10});
    
    $('.county-search, .styled-select').change(function(e){
        window.location = '' + $(this).val();
        $(this).val('');
    });
    
    
});