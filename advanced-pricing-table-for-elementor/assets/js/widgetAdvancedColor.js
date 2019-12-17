( function( $, elementor ) {

    'use strict';
    function backgroundImage(scope){
            if ( scope.find( '.set-bg')){
                 jQuery(".set-bg").each(function() {
                    var thesrc = jQuery(this).attr('data-bg');
                    jQuery(this).css("background-image", "url(" + thesrc + ")");
                    jQuery(this).css("background-position", "center");
                    jQuery(this).css("background-size", "cover");
                    jQuery(this).css("background-repeat", "no-repeat");
                    jQuery(this).removeAttr('data-bg');

                });
            }
        }

        function backgroundColor(scope){
            scope.find("div[data-color]").each(function(index, el) {
                let atvalue =  jQuery(this).attr('data-color');
                jQuery(this).css({
                    'background-color' : '#' + atvalue
                });
            });
        }
        function resizerElement(scope){

            $('.APE-parent-container').each(function(){
                var parentWidth =  $(this).parents('.elementor-widget-container').width();
                if(parentWidth >= 768 && parentWidth <= 991){
                    $(this).parents('.elementor-widget-container').addClass('active-tab');
               }
               if(parentWidth >= 992 && parentWidth <= 1100){
                    $(this).parents('.elementor-widget-container').addClass('active-lg');
               }
               if(parentWidth >= 577 && parentWidth <= 767){
                    $(this).parents('.elementor-widget-container').addClass('active-sm');
               }

            });
           


            // $('.APE-parent-container').each(function(){
            //     var parentWidth = $(this).parent('.elementor-widget-container').width();
            //     alert(parentWidth);
            //    if(parentWidth >= 768 || parentWidth <= 991){
            //         $(this).parents('.elementor-widget-container').addClass('active-tab');
            //    }
            //    if(parentWidth >= 992 || parentWidth <= 1100){
            //         $(this).parents('.elementor-widget-container').addClass('active-lg');
            //    }
            //    if(parentWidth >= 577 || parentWidth <= 767){
            //         $(this).parents('.elementor-widget-container').addClass('active-sm');
            //    }
            // });
           

        }
    var AdvancedAddons = {
        init: function(){
            var widgets = {
                'inline-notice.default'    : AdvancedAddons.widgetBgColor,
                'APE-post-grid.default'    : AdvancedAddons.widgetBgColor,

            };
            $.each( widgets, function( widget, callback ) {
                elementorFrontend.hooks.addAction( 'frontend/element_ready/' + widget, callback );
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/section', AdvancedAddons.elementorSection );
        },
        // widget bg color 
        widgetBgColor: function($scope){
            backgroundColor($scope)
            backgroundImage($scope)
            resizerElement()
        },
        

    };
    $( window ).on( 'elementor/frontend/init', AdvancedAddons.init );


}( jQuery, window.elementorFrontend ) );

