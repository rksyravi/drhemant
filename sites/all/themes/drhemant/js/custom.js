(function($){
    $(document).ready(function() {              
        $().UItoTop({ easingType: 'easeOutQuart' });

        $("#owl-demo").owlCarousel({
            autoPlay: true, //Set AutoPlay to 3 seconds
            items :3,
            itemsDesktop : [640,2],
            itemsDesktopSmall : [414,1],
            navigation : true,
            // THIS IS THE NEW PART
              afterAction: function(el){
                  //remove class active
                  this
                  .$owlItems
                  .removeClass('active')
                  //add class active
                  this
                  .$owlItems //owl internal $ object containing items
                  .eq(this.currentItem + 1)
                  .addClass('active')
                  }
          // END NEW PART
       
          });
          $(".swipebox").swipebox();
  
    });
})(jQuery);