/* =========================================================
 * jquery.vc_chart.js v1.0
 * =========================================================
 * Copyright 2013 Wpbakery
 *
 * Jquery chart plugin for the Visual Composer.
 * ========================================================= */
(function($){
// add a new method to JQuery
    $.fn.vc_chart = function() {
        var chart_colors = {};
        chart_colors['light'] = 'rgba(255, 255, 255, 1)';
        chart_colors['dark'] = 'rgba(45, 45, 45, 1)';
        chart_colors['green'] = 'rgba(184, 211, 11, 1)';
        chart_colors['turquoise'] = 'rgba(31,180,218, 1)';
        chart_colors['purple'] = 'rgba(74, 70, 131, 1)';
        chart_colors['pink'] = 'rgba(246, 71, 71, 1)';
        chart_colors['orange'] = 'rgba(255, 164, 50, 1)';
        chart_colors['light-grey'] = 'rgba(245, 245, 245, 1)';

        this.each(function(index) {
            var w = jQuery(this).width()/100*80,
                canvas = jQuery(this).find('canvas').attr({"id" : "main_canvas_"+index, "width" : w, "height" : w}),
                mainCanvas = document.getElementById('main_canvas_'+index),
                p1 = 0,
                border_w = 3,
                radius = w/2 - border_w - 1,
                pie_value = jQuery(this).data('pie-value')/100,
                pie_chart_value = jQuery(this).find('.vc_pie_chart_value'),
                pie_chart_back = jQuery(this).find('.vc_pie_chart_back'),
                pie_chart_units = jQuery(this).data('pie-units'),
                this_chart_color = jQuery(this).data('pie-color');

            jQuery(this).find('.vc_pie_wrapper').css({"width" : w+"px"});
            pie_chart_value.css({"width" : w, "height" : w, "line-height" : w+"px"});
            pie_chart_back.css({"width" : w, "height" : w});

            var circle = new ProgressCircle({
                canvas: mainCanvas,
                minRadius: radius,
                arcWidth: border_w
            });

            circle.addEntry({
                fillColor: chart_colors[this_chart_color],
                progressListener: function() { return p1; }
            });//.start(5);

            if (typeof jQuery.fn.waypoint !== 'undefined') {
                circle.start(5);
                jQuery(this).waypoint(function() {
                    var pieInt = setInterval(function() {
                        if (p1 < pie_value) {
                            p1 = p1 + 0.005;
                            var val = Math.round(parseFloat(p1.toFixed(2)) * 100)+pie_chart_units;
                            pie_chart_value.text(val);
                        }
                        else {
                            circle.stop();
                            clearInterval(pieInt);
                        }
                    }, 15);
                }, { offset: '85%' });
            } //end if;
        });
    };
    $(document).ready(function(){
        $('.vc_pie_chart').vc_chart();
    })

})(window.jQuery);