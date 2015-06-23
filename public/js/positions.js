/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function resizing(elem) {

    var arrays = [];
    var monitor_w = $(window).width();
    var static_w = 1188;
    var static_h = 790;
    var monitor_h = $(window).height();
    var values = [];
    $(elem).each(function () {
        arrays.push($(this));
    });
    for (var x = 0; x < arrays.length; x++) {
        var w = $(arrays[x]).width(),
                h = $(arrays[x]).height(),
                f = parseInt($(arrays[x]).css("font-size")),
                marginleft = parseInt($(arrays[x]).css("margin-left")),
                marginright = parseInt($(arrays[x]).css("margin-right")),
                margintop = parseInt($(arrays[x]).css("margin-top")),
                marginbottom = parseInt($(arrays[x]).css("margin-bottom"));

        if ($(arrays[x]).thisis100() == false) {
            $(arrays[x]).css("width", ((monitor_w * w) / static_w) + "px");
        } else {
            $(arrays[x]).css("width", "100%");
        }
        if ($(arrays[x]).parent().isAuto('height')) {
            $(arrays[x]).css("height", "auto");
        } else {
            $(arrays[x]).css("height", ((monitor_h * h) / static_h) + "px");
        }
        //margin & padding

        if (marginleft != 0) {
            $(arrays[x]).css("margin-left", ((monitor_w * marginleft) / static_w) + "px");
        }
        if (marginright != 0 || marginright == null) {
            $(arrays[x]).css("margin-right", ((monitor_w * marginright) / static_w) + "px");
        }
        if (margintop != 0 || margintop == null) {
            $(arrays[x]).css("margin-top", ((monitor_w * margintop) / static_w) + "px");
        }
        if (marginbottom != 0 || marginbottom == null) {
            $(arrays[x]).css("margin-bottom", ((monitor_w * marginbottom) / static_w) + "px");
        }
        //margin & padding end
        var f_end = 0;
if(monitor_w > 1000 && monitor_w<1600){
         f_end = (monitor_w * f)/static_w*0.8;
    }else if(monitor_w < 1000){
         f_end = (monitor_w * f)/static_w;
        
    }else if(monitor_w > 1600){
         f_end = (monitor_w * f)/static_w*0.7;
        
    }
        $(arrays[x]).css("font-size", f_end+"px");
        $(arrays[x]).css("background-size", "100% 100%");
        $(arrays[x]).css("float", "left");

    }
}
$(function () {
    resizing("img");
    resizing("div");
    resizing("p");
    resizing("a");
    resizing("span");
//    resizing("hr");
    resizing("form");
    resizing("button");
    resizing("input");

});

$.fn.isAuto = function (dimension) {
    if (dimension == 'width') {
        var originalWidth = this.innerWidth();
        var marginLeft = parseInt(this.css('margin-left'));
        var testMarginWidth = marginLeft + 50;
        this.css('margin-left', testMarginWidth);
        var newWidth = this.innerWidth();
        this.css('margin-left', marginLeft);
        if (newWidth < originalWidth) {
            return true;
        }
        else {
            return false;
        }
    }
    else if (dimension == 'height') {
        var originalHeight = this.height();
        this.append('<div id="test"></div>');
        var testHeight = originalHeight + 500;
        $('#test').css({height: testHeight});
        var newHeight = this.height();
        $('#test').remove();
        if (newHeight > originalHeight) {
            return true;
        }
        else {
            return false;
        }
    }
};
$.fn.thisis100 = function () {
    var par = this.parent();

    if (par.width() == this.width()) {
        return true;
    } else {
        return false;
    }
}

