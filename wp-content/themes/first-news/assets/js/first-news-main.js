jQuery(document).ready(function() {
    
    //Recnet News Control
    jQuery(window).load(function() {
        jQuery('.breaking-news-slider').show().flexslider({
            animation: "slide",
            
        });
      });

      //
        /**
         * Date & Time 
        */
        var datetime = null,
        date = null;
        var update = function() {
            date = moment(new Date())
            datetime.html(date.format('dddd, D MMMM  YYYY, h:mm:ss a'));
        };
        datetime = jQuery('.date-time');
            update();
        setInterval(update, 1000);

    
    //Main Slider Control
        jQuery(window).load(function() {
        jQuery('.flexslider').flexslider({
            animation: "fade"
        });
            jQuery(function() {
                jQuery('.show_menu').click(function(){
                        jQuery('.menu').fadeIn();
                        jQuery('.show_menu').fadeOut();
                        jQuery('.hide_menu').fadeIn();
                });
                jQuery('.hide_menu').click(function(){
                        jQuery('.menu').fadeOut();
                        jQuery('.show_menu').fadeIn();
                        jQuery('.hide_menu').fadeOut();
                });
            });
    });

    
    /**
     * Thumbnail Control Post
     */
    jQuery(window).load(function() {
        jQuery('.thumbnail_control').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
        });
    });



});
