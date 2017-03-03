jQuery(document).ready(function(){
    jQuery('.shadescreen').on("click", function () {
        if(!jQuery(this).hasClass("hard")) {
            hideModalPopup();
        }
    });
});
// extension:
jQuery.fn.scrollEnd = function(callback, timeout) {
    var scrollTimeout = 'scrollTimeout'+Math.floor((Math.random() * 99999) + 10000);
    jQuery(this).scroll(function(){
        var $this = jQuery(this);
        if ($this.data(scrollTimeout)) {
            clearTimeout($this.data(scrollTimeout));
        }
        $this.data(scrollTimeout, setTimeout(callback,timeout));
    });
};
//to check whether dynamically added element loaded
jQuery.fn.onElemLoad = function(opt) {
    var elem = this;
    var defaults = {
        failure: (function() {return false;}),
        success: (function() {return true;}),
        timeOut: 10000,
        timeInterval: 500
    };
    if(typeof opt == "function") opt = {success: opt};
    opt = jQuery.fn.extend(defaults, opt);

    InterV=setInterval(function(){
        if(jQuery(elem.selector).length>0){
            clearInterval(InterV);
            clearTimeout(timeOutFunc);
            opt.success();
        }
    },opt.timeInterval);

    var timeOutFunc=setTimeout(function () {
        clearInterval(InterV);
        clearTimeout(timeOutFunc);
        opt.failure();
    },opt.timeOut);
};

function isElementInViewport (el) {
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }
    if (typeof (el) === "undefined" || el == null)
       return false;

    var rect = el.getBoundingClientRect();

    return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
    rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
    );
}

jQuery(window).resize(function () {
    if (modalpopupshown != null) {
        positionpopup(modalpopupshown);
    }
});

var modalpopupshown = null;

function positionpopup(popupobject) {
    if(!popupobject.hasClass("genericmodalpopup-compact")) {
        popupobject.css({
            position: 'fixed',
            left: ((jQuery(window).width())/2 - (popupobject.outerWidth())/2),
            top: ((jQuery(window).height())/2 - (popupobject.outerHeight())/2)
        });
    }
}

function showModalPopup(popupobjectstr, params,callback, hardmode) {
    if (!(jQuery('.' + popupobjectstr).length)) { //checking if div exists in html
        var message = (typeof params == "undefined") ? '' : params;
        jQuery('body').append('<div class="genericmodalpopup ' + popupobjectstr + '"><div style="margin-bottom: 20px;">'+message+'</div><button class="defbutton" onclick="hideModalPopup();">OKAY</button></div>');
    } else {
        jQuery('.' + popupobjectstr).attr('dontremoveonhide', 'true').removeClass("genericmodalpopup-compact").addClass("genericmodalpopup");
    }
    var popupobject = jQuery('.' + popupobjectstr);

    jQuery('.shadescreen').fadeIn(function() {
            if(hardmode) { jQuery(this).addClass("hard"); } //this makes sure that the shadescreen doesn't go away on a click
        }
    );
    popupobject.fadeIn(callback);
    positionpopup(popupobject);
    modalpopupshown = popupobject;
}

function showModalPopupForMobile(popupobjectstr, params) {
    if (!(jQuery('.' + popupobjectstr).length)) { //checking if div exists in html
        var message = (typeof params == "undefined") ? '' : params;
        jQuery('body').append('<div class="genericmodalpopup-compact ' + popupobjectstr + '"><div style="margin-bottom: 20px;">'+message+'</div><button class="defbutton" onclick="hideModalPopup();">OKAY</button></div>');
    } else {
        jQuery('.' + popupobjectstr).attr('dontremoveonhide', 'true').removeClass("genericmodalpopup").addClass("genericmodalpopup-compact");
    }
    var popupobject = jQuery('.' + popupobjectstr);
    popupobject.css("display","block").addClass("side-menu-open");
    modalpopupshown = popupobject;
}

function showGenericModalPopup(message, callback) {
    showModalPopup("genericalert",message, callback);
}

function hideModalPopup(callback) {
    if (modalpopupshown !== null) {
        jQuery('.shadescreen').fadeOut();
        if(modalpopupshown.hasClass("genericmodalpopup-compact")) {
            modalpopupshown.removeClass('side-menu-open').addClass('side-menu-close');
            if(callback){
                callback();
            }
        } else {
            modalpopupshown.fadeOut(function () {
                if (jQuery(this).attr('dontremoveonhide') !== 'true') {
                    jQuery(this).remove();
                } else {
                    jQuery(this).attr("style","");
                }
                if(callback){
                    callback();
                }
            });
        }
        modalpopupshown = null;
    }
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function isAppWebView() {
    webView = getParameterByName("cjhb_web_view");
    webView = webView.replace("/", "");
    acceptedVals = ['true','ios','android'];
    return (acceptedVals.indexOf(webView) > -1);
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function gaTrackAnchorLinkInContent(link, category, action, label) {
    if(link.getAttribute("target") !== "_blank") {
        setTimeout(function() {
            window.location.href = link.href;
        }, 100);
    } else {
        window.open(link.href, "_blank");
    }
}

function mailTo_Fallback(emailId) {
    var link = "mailto:"+emailId;
    window.location.href = link;
}

function showModalPopupWithEvent(popup, eventCat, eventAct, eventLab) {
    showModalPopup(popup);
}
