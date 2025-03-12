
// smooth scrolling
jQuery("a[href*=\\#]:not([href=\\#],[href^=\\#tabs],[href^=\\#cta-form])").click(function() {
    if (location.pathname.replace(/^\//,"") == this.pathname.replace(/^\//,"") && location.hostname == this.hostname) {
        var target = jQuery(this.hash);
        target = target.length ? target : jQuery("[name=" + this.hash.slice(1) +"]");
        if (target.length) {
            jQuery("html,body").animate({
                scrollTop: target.offset().top - 100
            }, 1000);
            return false;
        }
    }
});


// lightbox controls for linked Vimeo videos
jQuery(".vimeo-start").click(function(){
    var video_id = jQuery(this).attr("data-id");
    var video_lang = jQuery(this).attr("data-lang");
    var embed_link = "//player.vimeo.com/video/"+video_id+"?api=1&amp;player_id=player_1&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933&amp;autoplay=1&amp;texttrack="+video_lang;
    jQuery(".vimeo-lay").fadeIn(400);
    jQuery(".vimeo-lay iframe").attr("src", embed_link);
});

jQuery(".vimeo-close").click(function() {
    jQuery(".vimeo-lay").fadeOut(300);
    jQuery(".vimeo-lay iframe").attr("src", "about:blank");
});


// Policy Center - Privacy menu toggle controls
jQuery("#nav-toggle-policies").click(function(event){
    if(jQuery("#nav-menu-policies").hasClass("show")){
        jQuery("#nav-menu-policies").removeClass("show");
    } else {
        jQuery("#nav-menu-policies").addClass("show");
    }

    if(jQuery("#nav-toggle-policies").hasClass("open")){
        jQuery("#nav-toggle-policies").removeClass("open");
    } else {
        jQuery("#nav-toggle-policies").addClass("open");
    }

    event.stopPropagation();
});

// Policy Center - Terms menu toggle controls
jQuery("#nav-toggle-terms").click(function(event){
    if(jQuery("#nav-menu-terms").hasClass("show")){
        jQuery("#nav-menu-terms").removeClass("show");
    } else {
        jQuery("#nav-menu-terms").addClass("show");
    }

    if(jQuery("#nav-toggle-terms").hasClass("open")){
        jQuery("#nav-toggle-terms").removeClass("open");
    } else {
        jQuery("#nav-toggle-terms").addClass("open");
    }

    event.stopPropagation();
});


// All functions tied to scrolling
jQuery(window).scroll(function() {

	  // selectors
	  var $window = jQuery(window),
		     $body = jQuery("body");

	  // Change 50% earlier than scroll position
	  var scroll = $window.scrollTop() + ($window.height() / 2);

	  // Glossary page index nav bar
	  var $glossaryIndex = jQuery(".glossary-alphabet-wrap");
	  if ($window.scrollTop() > 500) {
	      $glossaryIndex.addClass( "scrolled" );
	  } else {
	      $glossaryIndex.removeClass( "scrolled" );
	  }

}).scroll();

// Popup alert functions
// wait for the popup to be created by the HS script
var checkPopId;
checkPopId = setInterval(checkPopup, 200);

var checkDropId;
checkDropId = setInterval(checkDropdown, 200);


function checkPopup() {
    if (jQuery(".leadinModal-theme-bottom-right-corner").length) {
        clearInterval(checkPopId);
        var $popuplink = jQuery(".leadin-button").attr("href");
        jQuery(".leadinModal-content-wrapper").click(function() {

            // GA event tracking - click
            dataLayer.push({"event": "popup-alert-click"});

  			// based on MDN new window method
  			var windowObjectReference = null; // global var

            if(windowObjectReference == null || windowObjectReference.closed)
            {
                windowObjectReference = window.open($popuplink,
                    "PopupWin");
            }
            else
            {
                windowObjectReference.focus();
            }
        });

        // Popup closer detection
        jQuery(".leadinModal-close").click(function() {
            // GA event tracking - close
            dataLayer.push({"event": "popup-alert-close"});
        });
    }
}

function checkDropdown() {
    if (jQuery("#leadinModal-2703269").length) {
        clearInterval(checkDropId);
        jQuery("#wrapper").addClass("shifted");
        jQuery("#footer").addClass("shifted");
        jQuery("#responsive-menu-button").addClass("shifted");
        jQuery("#responsive-menu-container").addClass("shifted");
    }
    // Popup closer detection
    jQuery(".leadinModal-close, .leadin-button").click(function() {
        jQuery("#wrapper").removeClass("shifted");
        jQuery("#footer").removeClass("shifted");
        jQuery("#responsive-menu-button").removeClass("shifted");
        jQuery("#responsive-menu-container").removeClass("shifted");
    });

}

setTimeout(function() {
    clearInterval(checkPopId);
    clearInterval(checkDropId);
}, 10000);

// AppLovin Tab/Panel Slides v1 - 2022
let activeSlideNum = 1;
let maxSlideNum = 2;

let slideID = 0;

function cycleQuote(n) {
    clearInterval(slideID);

    let $loop = 0;
    const logoTabs = document.querySelectorAll(".logo-tab");
    logoTabs.forEach(function(currentIndex) {
        $loop += 1;
        if ( $loop == n ) {
            currentIndex.classList.add("active");
            activeSlideNum = n;
        } else {
            currentIndex.classList.remove("active");
        }
    });
    maxSlideNum = $loop;
    $loop = 0;

    const quotePanels = document.querySelectorAll(".quote-slide");
    quotePanels.forEach(function(currentIndex) {
        $loop += 1;
        if ( $loop == n ) {
            currentIndex.classList.add("active");
        } else {
            currentIndex.classList.remove("active");
        }
    });
    slideID = setInterval(advanceSlide, 6000);
}


function advanceSlide() {
    if ( activeSlideNum < maxSlideNum ) {
        cycleQuote(activeSlideNum + 1);
    } else {
        cycleQuote(1);
        activeSlideNum = 1;
    }
}


if ( window.innerWidth > 640 ) {
    slideID = setInterval(advanceSlide, 6000);
}
