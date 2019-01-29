/*
 *  Document   : animated.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Checkout page
 */

var Animated = function() {

    return {
        init: function() {
            
			// Toggle animation class when an element appears with Jquery Appear plugin
			$('[data-toggle="animation-appear"]').each(function(){
				var $this       = $(this);
				var $animClass  = $this.data('animation-class');
				var $elemOff    = $this.data('element-offset');

				$this.appear(function() {
					$this.removeClass('visibility-none').addClass($animClass);
				},{accY: $elemOff});
			});
        }
    };
}();

$(function(){ Animated.init(); });