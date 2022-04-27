/**
 * Viral Mag Custom JS
 *
 * @package Viral Mag
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

jQuery(function ($) {
   

    /*---------Sticky Header---------*/
    var hHeight = 0;
    var adminbarHeight = 0;

    if ($('body').hasClass('admin-bar')) {
        adminbarHeight = 32;
    }


    var $stickyHeader = $('.navigation-bar');


    if ($('.om-sticky-header').length > 0 && $stickyHeader.length > 0) {
        hHeight = $stickyHeader.outerHeight();

         if ($('body').hasClass('vm-header-style4')) {
            hHeight = hHeight + 38
        }

        var hOffset = $stickyHeader.offset().top;

        var offset = hOffset - adminbarHeight;

        $stickyHeader.headroom({
            offset: offset,
            onTop: function () {
                $('.site-content').css({
                    paddingTop: 0
                });
            },
            onNotTop: function () {
                $('.site-content').css({
                    paddingTop: hHeight + 'px'
                });
            }
        });

        $('.om-sticky-header .secondary-wrap').css('top', (hHeight + adminbarHeight + 40) + 'px');
    }


   
});