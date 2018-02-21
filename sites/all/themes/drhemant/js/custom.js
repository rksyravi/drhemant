(function($){
    $(document).ready(function() {              
        $().UItoTop({ easingType: 'easeOutQuart' });

        $("#owl-demo").owlCarousel({
            autoPlay: true,
            items :3,
            itemsDesktop : [640,2],
            itemsDesktopSmall : [414,1],
            navigation : true,
            afterAction: function(el){
                //remove class active
                this.$owlItems.removeClass('active')
                //add class active
                this.$owlItems.eq(this.currentItem + 1).addClass('active') //owl internal $ object containing items
            }
        });

        if($('.expanded.dropdown .dropdown-menu li a.active').length > 0){
            $('.expanded.dropdown .dropdown-menu li a.active').parents('ul.dropdown-menu').siblings('a').addClass('active');
        }
          
    });
})(jQuery);