// page init
jQuery(function(){
    initLoadMore();
    initTouchNav();
    initCarousel();
    initMobileNav();
    initSameHeight();
    initBackgroundResize();
    initFitVids();
    initLang();
});

function initLang() {
    jQuery("html").click(function() {
        jQuery(".lang-panel").removeClass("show");
    });

    jQuery(".lang-dropdown").click(function(event){
        if(jQuery(".lang-panel").hasClass("show")){
            jQuery(".lang-panel").removeClass("show");
        } else {
            jQuery(".lang-panel").addClass("show");
        }

        event.stopPropagation();
    });

    jQuery(".member").click(function(){
        jQuery(".title", this).toggleClass("active");
        if(jQuery("p", this).is(":hidden")){
            jQuery("p", this).show(300);
        } else {
            jQuery("p", this).slideUp(300);
        }

    });

    var newsIndex = 0;
    var pressIndex = 0;

    jQuery( "#newsList li" ).each(function( index ) {
        if(index >= 10){
            jQuery(this).css("display","none");
        }
        newsIndex = newsIndex + 1;
    });

    if(newsIndex <= 10){
        jQuery("#showNews").addClass("hidden");
    }

    jQuery( "#pressList li" ).each(function( index ) {
        if(index >= 10){
            jQuery(this).css("display","none");
        }
        pressIndex = pressIndex + 1;
    });

    if(pressIndex <= 10){
        jQuery("#showPress").addClass("hidden");
    }

    jQuery("#showNews").click(function(){
        jQuery( "#newsList li" ).each(function() {
            if(jQuery(this).is(":hidden")){
                jQuery(this).show(200);
            }
        });
        jQuery(this).css("display","none");
    });

    jQuery("#showPress").click(function(){
        jQuery( "#pressList li" ).each(function() {
            if(jQuery(this).is(":hidden")){
                jQuery(this).show(200);
            }
        });
        jQuery(this).css("display","none");
    });
}

// scroll gallery init
function initCarousel() {
    jQuery(".carousel").scrollGallery({
        mask: ".mask",
        slider: ".slideset",
        slides: ".slide",
        btnPrev: "a.btn-prev",
        btnNext: "a.btn-next",
        pagerLinks: ".pagination li",
        stretchSlideToMask: true,
        autoRotation: true,
        switchTime: 5000,
        animSpeed: 500,
        step: 1
    });
}

// mobile menu init
function initMobileNav() {
    jQuery("body").mobileNav({
        hideOnClickOutside: true,
        menuActiveClass: "nav-active",
        menuOpener: ".nav-opener",
        menuDrop: ".list-holder"
    });
    jQuery(".search-block").mobileNav({
        hideOnClickOutside: true,
        menuActiveClass: "active",
        menuOpener: ".opener",
        menuDrop: ".slide"
    });
}

// load more init
function initLoadMore() {
    jQuery(".articles-holder").loadMore({
        linkSelector: "a.load-more",
        newContentTarget: ".articles-frame",
        additionBottomOffset: 50,
        onLoaded: function(newItems) {
            newItems.find(".bg-stretch").each(function() {
                ImageStretcher.add({
                    container: this,
                    image: "img"
                });
            });
        }
    });
}

// align blocks height
function initSameHeight() {
    jQuery(".blog-categories-block").sameHeight({
        elements: ".heading-text-holder",
        flexible: true,
        multiLine: true,
        biggestHeight: true
    });
    jQuery(".articles-block").sameHeight({
        elements: ".title-heading-holder",
        flexible: true,
        multiLine: true,
        biggestHeight: true
    });
}

// handle dropdowns on mobile devices
function initTouchNav() {
    jQuery(".language-selector").each(function(){
        new TouchNav({
            navBlock: this,
            menuDrop: ".drop"
        });
    });
}

// stretch background to fill blocks
function initBackgroundResize() {
    jQuery(".bg-stretch").each(function() {
        ImageStretcher.add({
            container: this,
            image: "img"
        });
    });
}

// handle flexible video size
function initFitVids() {
    jQuery("#content").fitVids();
}

/*
 * jQuery Carousel plugin
 */
(function($){
    function ScrollGallery(options) {
        this.options = $.extend({
            mask: "div.mask",
            slider: ">*",
            slides: ">*",
            activeClass:"active",
            disabledClass:"disabled",
            btnPrev: "a.btn-prev",
            btnNext: "a.btn-next",
            generatePagination: false,
            pagerList: "<ul>",
            pagerListItem: "<li><a href=\"#\"></a></li>",
            pagerListItemText: "a",
            pagerLinks: ".pagination li",
            currentNumber: "span.current-num",
            totalNumber: "span.total-num",
            btnPlay: ".btn-play",
            btnPause: ".btn-pause",
            btnPlayPause: ".btn-play-pause",
            galleryReadyClass: "gallery-js-ready",
            autorotationActiveClass: "autorotation-active",
            autorotationDisabledClass: "autorotation-disabled",
            stretchSlideToMask: false,
            circularRotation: true,
            disableWhileAnimating: false,
            autoRotation: false,
            pauseOnHover: isTouchDevice ? false : true,
            maskAutoSize: false,
            switchTime: 4000,
            animSpeed: 600,
            event:"click",
            swipeThreshold: 15,
            handleTouch: true,
            vertical: false,
            useTranslate3D: false,
            step: false
        }, options);
        this.init();
    }
    ScrollGallery.prototype = {
        init: function() {
            if(this.options.holder) {
                this.findElements();
                this.attachEvents();
                this.refreshPosition();
                this.refreshState(true);
                this.resumeRotation();
                this.makeCallback("onInit", this);
            }
        },
        findElements: function() {
            // define dimensions proporties
            this.fullSizeFunction = this.options.vertical ? "outerHeight" : "outerWidth";
            this.innerSizeFunction = this.options.vertical ? "height" : "width";
            this.slideSizeFunction = "outerHeight";
            this.maskSizeProperty = "height";
            this.animProperty = this.options.vertical ? "marginTop" : "marginLeft";

            // control elements
            this.gallery = $(this.options.holder).addClass(this.options.galleryReadyClass);
            this.mask = this.gallery.find(this.options.mask);
            this.slider = this.mask.find(this.options.slider);
            this.slides = this.slider.find(this.options.slides);
            this.btnPrev = this.gallery.find(this.options.btnPrev);
            this.btnNext = this.gallery.find(this.options.btnNext);
            this.currentStep = 0; this.stepsCount = 0;

            // get start index
            if(this.options.step === false) {
                var activeSlide = this.slides.filter("."+this.options.activeClass);
                if(activeSlide.length) {
                    this.currentStep = this.slides.index(activeSlide);
                }
            }

            // calculate offsets
            this.calculateOffsets();

            // create gallery pagination
            if(typeof this.options.generatePagination === "string") {
                this.pagerLinks = $();
                this.buildPagination();
            } else {
                this.pagerLinks = this.gallery.find(this.options.pagerLinks);
                this.attachPaginationEvents();
            }

            // autorotation control buttons
            this.btnPlay = this.gallery.find(this.options.btnPlay);
            this.btnPause = this.gallery.find(this.options.btnPause);
            this.btnPlayPause = this.gallery.find(this.options.btnPlayPause);

            // misc elements
            this.curNum = this.gallery.find(this.options.currentNumber);
            this.allNum = this.gallery.find(this.options.totalNumber);
        },
        attachEvents: function() {
            // bind handlers scope
            var self = this;
            this.bindHandlers(["onWindowResize"]);
            $(window).bind("load resize orientationchange", this.onWindowResize);

            // previous and next button handlers
            if(this.btnPrev.length) {
                this.prevSlideHandler = function(e) {
                    e.preventDefault();
                    self.prevSlide();
                };
                this.btnPrev.bind(this.options.event, this.prevSlideHandler);
            }
            if(this.btnNext.length) {
                this.nextSlideHandler = function(e) {
                    e.preventDefault();
                    self.nextSlide();
                };
                this.btnNext.bind(this.options.event, this.nextSlideHandler);
            }

            // pause on hover handling
            if(this.options.pauseOnHover && !isTouchDevice) {
                this.hoverHandler = function() {
                    if(self.options.autoRotation) {
                        self.galleryHover = true;
                        self.pauseRotation();
                    }
                };
                this.leaveHandler = function() {
                    if(self.options.autoRotation) {
                        self.galleryHover = false;
                        self.resumeRotation();
                    }
                };
                this.gallery.bind({mouseenter: this.hoverHandler, mouseleave: this.leaveHandler});
            }

            // autorotation buttons handler
            if(this.btnPlay.length) {
                this.btnPlayHandler = function(e) {
                    e.preventDefault();
                    self.startRotation();
                };
                this.btnPlay.bind(this.options.event, this.btnPlayHandler);
            }
            if(this.btnPause.length) {
                this.btnPauseHandler = function(e) {
                    e.preventDefault();
                    self.stopRotation();
                };
                this.btnPause.bind(this.options.event, this.btnPauseHandler);
            }
            if(this.btnPlayPause.length) {
                this.btnPlayPauseHandler = function(e) {
                    e.preventDefault();
                    if(!self.gallery.hasClass(self.options.autorotationActiveClass)) {
                        self.startRotation();
                    } else {
                        self.stopRotation();
                    }
                };
                this.btnPlayPause.bind(this.options.event, this.btnPlayPauseHandler);
            }

            // enable hardware acceleration
            if(isTouchDevice && this.options.useTranslate3D) {
                this.slider.css({"-webkit-transform": "translate3d(0px, 0px, 0px)"});
            }

            // swipe event handling
            if(isTouchDevice && this.options.handleTouch && window.Hammer && this.mask.length) {
                this.swipeHandler = new Hammer.Manager(this.mask[0]);
                this.swipeHandler.add(new Hammer.Pan({
                    direction: self.options.vertical ? Hammer.DIRECTION_VERTICAL : Hammer.DIRECTION_HORIZONTAL,
                    threshold: self.options.swipeThreshold
                }));

                this.swipeHandler.on("panstart", function() {
                    if(self.galleryAnimating) {
                        self.swipeHandler.stop();
                    } else {
                        self.pauseRotation();
                        self.originalOffset = parseFloat(self.slider.css(self.animProperty));
                    }
                }).on("panmove", function(e) {
                    var tmpOffset = self.originalOffset + e[self.options.vertical ? "deltaY" : "deltaX"];
                    tmpOffset = Math.max(Math.min(0, tmpOffset), self.maxOffset);
                    self.slider.css(self.animProperty, tmpOffset);
                }).on("panend", function(e) {
                    self.resumeRotation();
                    if(e.distance > self.options.swipeThreshold) {
                        if(e.offsetDirection === Hammer.DIRECTION_RIGHT || e.offsetDirection === Hammer.DIRECTION_DOWN) {
                            self.nextSlide();
                        } else {
                            self.prevSlide();
                        }
                    } else {
                        self.switchSlide();
                    }
                });
            }
        },
        onWindowResize: function() {
            if(!this.galleryAnimating) {
                this.calculateOffsets();
                this.refreshPosition();
                this.buildPagination();
                this.refreshState();
                this.resizeQueue = false;
            } else {
                this.resizeQueue = true;
            }
        },
        refreshPosition: function() {
            this.currentStep = Math.min(this.currentStep, this.stepsCount - 1);
            this.tmpProps = {};
            this.tmpProps[this.animProperty] = this.getStepOffset();
            this.slider.stop().css(this.tmpProps);
        },
        calculateOffsets: function() {
            var self = this, tmpOffset, tmpStep;
            if(this.options.stretchSlideToMask) {
                var tmpObj = {};
                tmpObj[this.innerSizeFunction] = this.mask[this.innerSizeFunction]();
                this.slides.css(tmpObj);
            }

            this.maskSize = this.mask[this.innerSizeFunction]();
            this.sumSize = this.getSumSize();
            this.maxOffset = this.maskSize - this.sumSize;

            // vertical gallery with single size step custom behavior
            if(this.options.vertical && this.options.maskAutoSize) {
                this.options.step = 1;
                this.stepsCount = this.slides.length;
                this.stepOffsets = [0];
                tmpOffset = 0;
                for(var i = 0; i < this.slides.length; i++) {
                    tmpOffset -= $(this.slides[i])[this.fullSizeFunction](true);
                    this.stepOffsets.push(tmpOffset);
                }
                this.maxOffset = tmpOffset;
                return;
            }

            // scroll by slide size
            if(typeof this.options.step === "number" && this.options.step > 0) {
                this.slideDimensions = [];
                this.slides.each($.proxy(function(ind, obj){
                    self.slideDimensions.push( $(obj)[self.fullSizeFunction](true) );
                },this));

                // calculate steps count
                this.stepOffsets = [0];
                this.stepsCount = 1;
                tmpOffset = tmpStep = 0;
                while(tmpOffset > this.maxOffset) {
                    tmpOffset -= this.getSlideSize(tmpStep, tmpStep + this.options.step);
                    tmpStep += this.options.step;
                    this.stepOffsets.push(Math.max(tmpOffset, this.maxOffset));
                    this.stepsCount++;
                }
            }
            // scroll by mask size
            else {
                // define step size
                this.stepSize = this.maskSize;

                // calculate steps count
                this.stepsCount = 1;
                tmpOffset = 0;
                while(tmpOffset > this.maxOffset) {
                    tmpOffset -= this.stepSize;
                    this.stepsCount++;
                }
            }
        },
        getSumSize: function() {
            var sum = 0;
            this.slides.each($.proxy(function(ind, obj){
                sum += $(obj)[this.fullSizeFunction](true);
            },this));
            this.slider.css(this.innerSizeFunction, sum);
            return sum;
        },
        getStepOffset: function(step) {
            step = step || this.currentStep;
            if(typeof this.options.step === "number") {
                return this.stepOffsets[this.currentStep];
            } else {
                return Math.min(0, Math.max(-this.currentStep * this.stepSize, this.maxOffset));
            }
        },
        getSlideSize: function(i1, i2) {
            var sum = 0;
            for(var i = i1; i < Math.min(i2, this.slideDimensions.length); i++) {
                sum += this.slideDimensions[i];
            }
            return sum;
        },
        buildPagination: function() {
            if(typeof this.options.generatePagination === "string") {
                if(!this.pagerHolder) {
                    this.pagerHolder = this.gallery.find(this.options.generatePagination);
                }
                if(this.pagerHolder.length && this.oldStepsCount != this.stepsCount) {
                    this.oldStepsCount = this.stepsCount;
                    this.pagerHolder.empty();
                    this.pagerList = $(this.options.pagerList).appendTo(this.pagerHolder);
                    for(var i = 0; i < this.stepsCount; i++) {
                        $(this.options.pagerListItem).appendTo(this.pagerList).find(this.options.pagerListItemText).text(i+1);
                    }
                    this.pagerLinks = this.pagerList.children();
                    this.attachPaginationEvents();
                }
            }
        },
        attachPaginationEvents: function() {
            var self = this;
            this.pagerLinksHandler = function(e) {
                e.preventDefault();
                self.numSlide(self.pagerLinks.index(e.currentTarget));
            };
            this.pagerLinks.bind(this.options.event, this.pagerLinksHandler);
        },
        prevSlide: function() {
            if(!(this.options.disableWhileAnimating && this.galleryAnimating)) {
                if(this.currentStep > 0) {
                    this.currentStep--;
                    this.switchSlide();
                } else if(this.options.circularRotation) {
                    this.currentStep = this.stepsCount - 1;
                    this.switchSlide();
                }
            }
        },
        nextSlide: function(fromAutoRotation) {
            if(!(this.options.disableWhileAnimating && this.galleryAnimating)) {
                if(this.currentStep < this.stepsCount - 1) {
                    this.currentStep++;
                    this.switchSlide();
                } else if(this.options.circularRotation || fromAutoRotation === true) {
                    this.currentStep = 0;
                    this.switchSlide();
                }
            }
        },
        numSlide: function(c) {
            if(this.currentStep != c) {
                this.currentStep = c;
                this.switchSlide();
            }
        },
        switchSlide: function() {
            var self = this;
            this.galleryAnimating = true;
            this.tmpProps = {};
            this.tmpProps[this.animProperty] = this.getStepOffset();
            this.slider.stop().animate(this.tmpProps, {duration: this.options.animSpeed, complete: function(){
                // animation complete
                self.galleryAnimating = false;
                if(self.resizeQueue) {
                    self.onWindowResize();
                }

                // onchange callback
                self.makeCallback("onChange", self);
                self.autoRotate();
            }});
            this.refreshState();

            // onchange callback
            this.makeCallback("onBeforeChange", this);
        },
        refreshState: function(initial) {
            if(this.options.step === 1 || this.stepsCount === this.slides.length) {
                this.slides.removeClass(this.options.activeClass).eq(this.currentStep).addClass(this.options.activeClass);
            }
            this.pagerLinks.removeClass(this.options.activeClass).eq(this.currentStep).addClass(this.options.activeClass);
            this.curNum.html(this.currentStep+1);
            this.allNum.html(this.stepsCount);

            // initial refresh
            if(this.options.maskAutoSize && typeof this.options.step === "number") {
                this.tmpProps = {};
                this.tmpProps[this.maskSizeProperty] = this.slides.eq(Math.min(this.currentStep,this.slides.length-1))[this.slideSizeFunction](true);
                this.mask.stop()[initial ? "css" : "animate"](this.tmpProps);
            }

            // disabled state
            if(!this.options.circularRotation) {
                this.btnPrev.add(this.btnNext).removeClass(this.options.disabledClass);
                if(this.currentStep === 0) this.btnPrev.addClass(this.options.disabledClass);
                if(this.currentStep === this.stepsCount - 1) this.btnNext.addClass(this.options.disabledClass);
            }

            // add class if not enough slides
            this.gallery.toggleClass("not-enough-slides", this.sumSize <= this.maskSize);
        },
        startRotation: function() {
            this.options.autoRotation = true;
            this.galleryHover = false;
            this.autoRotationStopped = false;
            this.resumeRotation();
        },
        stopRotation: function() {
            this.galleryHover = true;
            this.autoRotationStopped = true;
            this.pauseRotation();
        },
        pauseRotation: function() {
            this.gallery.addClass(this.options.autorotationDisabledClass);
            this.gallery.removeClass(this.options.autorotationActiveClass);
            clearTimeout(this.timer);
        },
        resumeRotation: function() {
            if(!this.autoRotationStopped) {
                this.gallery.addClass(this.options.autorotationActiveClass);
                this.gallery.removeClass(this.options.autorotationDisabledClass);
                this.autoRotate();
            }
        },
        autoRotate: function() {
            var self = this;
            clearTimeout(this.timer);
            if(this.options.autoRotation && !this.galleryHover && !this.autoRotationStopped) {
                this.timer = setTimeout(function(){
                    self.nextSlide(true);
                }, this.options.switchTime);
            } else {
                this.pauseRotation();
            }
        },
        bindHandlers: function(handlersList) {
            var self = this;
            $.each(handlersList, function(index, handler) {
                var origHandler = self[handler];
                self[handler] = function() {
                    return origHandler.apply(self, arguments);
                };
            });
        },
        makeCallback: function(name) {
            if(typeof this.options[name] === "function") {
                var args = Array.prototype.slice.call(arguments);
                args.shift();
                this.options[name].apply(this, args);
            }
        },
        destroy: function() {
            // destroy handler
            $(window).unbind("load resize orientationchange", this.onWindowResize);
            this.btnPrev.unbind(this.options.event, this.prevSlideHandler);
            this.btnNext.unbind(this.options.event, this.nextSlideHandler);
            this.pagerLinks.unbind(this.options.event, this.pagerLinksHandler);
            this.gallery.unbind("mouseenter", this.hoverHandler);
            this.gallery.unbind("mouseleave", this.leaveHandler);

            // autorotation buttons handlers
            this.stopRotation();
            this.btnPlay.unbind(this.options.event, this.btnPlayHandler);
            this.btnPause.unbind(this.options.event, this.btnPauseHandler);
            this.btnPlayPause.unbind(this.options.event, this.btnPlayPauseHandler);

            // destroy swipe handler
            if(this.swipeHandler) {
                this.swipeHandler.destroy();
            }

            // remove inline styles, classes and pagination
            var unneededClasses = [this.options.galleryReadyClass, this.options.autorotationActiveClass, this.options.autorotationDisabledClass];
            this.gallery.removeClass(unneededClasses.join(" "));
            this.slider.add(this.slides).removeAttr("style");
            if(typeof this.options.generatePagination === "string") {
                this.pagerHolder.empty();
            }
        }
    };

    // detect device type
    var isTouchDevice = /Windows Phone/.test(navigator.userAgent) || ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch;

    // jquery plugin
    $.fn.scrollGallery = function(opt){
        return this.each(function(){
            $(this).data("ScrollGallery", new ScrollGallery($.extend(opt,{holder:this})));
        });
    };
}(jQuery));

/*
 * Simple Mobile Navigation
 */
(function($) {
    function MobileNav(options) {
        this.options = $.extend({
            container: null,
            hideOnClickOutside: false,
            menuActiveClass: "nav-active",
            menuOpener: ".nav-opener",
            menuDrop: ".nav-drop",
            toggleEvent: "click",
            outsideClickEvent: "click touchstart pointerdown MSPointerDown"
        }, options);
        this.initStructure();
        this.attachEvents();
    }
    MobileNav.prototype = {
        initStructure: function() {
            this.page = $("html");
            this.container = $(this.options.container);
            this.opener = this.container.find(this.options.menuOpener);
            this.drop = this.container.find(this.options.menuDrop);
        },
        attachEvents: function() {
            var self = this;

            if(activateResizeHandler) {
                activateResizeHandler();
                activateResizeHandler = null;
            }

            this.outsideClickHandler = function(e) {
                if(self.isOpened()) {
                    var target = $(e.target);
                    if(!target.closest(self.opener).length && !target.closest(self.drop).length) {
                        self.hide();
                    }
                }
            };

            this.openerClickHandler = function(e) {
                e.preventDefault();
                self.toggle();
            };

            this.opener.on(this.options.toggleEvent, this.openerClickHandler);
        },
        isOpened: function() {
            return this.container.hasClass(this.options.menuActiveClass);
        },
        show: function() {
            this.container.addClass(this.options.menuActiveClass);
            if(this.options.hideOnClickOutside) {
                this.page.on(this.options.outsideClickEvent, this.outsideClickHandler);
            }
        },
        hide: function() {
            this.container.removeClass(this.options.menuActiveClass);
            if(this.options.hideOnClickOutside) {
                this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
            }
        },
        toggle: function() {
            if(this.isOpened()) {
                this.hide();
            } else {
                this.show();
            }
        },
        destroy: function() {
            this.container.removeClass(this.options.menuActiveClass);
            this.opener.off(this.options.toggleEvent, this.clickHandler);
            this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
        }
    };

    var activateResizeHandler = function() {
        var win = $(window),
            doc = $("html"),
            resizeClass = "resize-active",
            flag, timer;
        var removeClassHandler = function() {
            flag = false;
            doc.removeClass(resizeClass);
        };
        var resizeHandler = function() {
            if(!flag) {
                flag = true;
                doc.addClass(resizeClass);
            }
            clearTimeout(timer);
            timer = setTimeout(removeClassHandler, 500);
        };
        win.on("resize orientationchange", resizeHandler);
    };

    $.fn.mobileNav = function(options) {
        return this.each(function() {
            var params = $.extend({}, options, {container: this}),
                instance = new MobileNav(params);
            $.data(this, "MobileNav", instance);
        });
    };
}(jQuery));

/*
 * jQuery Load More plugin
 */
(function($, $win) {
 	"use strict";

 	var ScrollLoader = {
 		attachEvents: function() {
 			var self = this;

 			$win.on("load.ScrollLoader resize.ScrollLoader orientationchange.ScrollLoader", function() { self.onResizeHandler(); });
 			$win.on("scroll.ScrollLoader", function() { self.onScrollHandler(); });
 			this.$holder.on("ContentLoader/loaded.ScrollLoader", function() { self.onResizeHandler(); });

 			this.winProps = {};
 			this.holderProps = {};
 			this.onResizeHandler();
 		},

 		onResizeHandler: function() {
 			this.winProps.height = $win.height();
 			this.holderProps.height = this.$holder.outerHeight();
 			this.holderProps.offset = this.$holder.offset().top;

 			this.onScrollHandler();
 		},

 		onScrollHandler: function() {
 			this.winProps.scroll = $win.scrollTop();

 			if (this.winProps.scroll + this.winProps.height + Math.min(1, this.options.additionBottomOffset) > this.holderProps.height + this.holderProps.offset) {
 				this.loadInclude();
 			}
 		},

 		destroySubEvents: function() {
 			$win.off(".ScrollLoader");
 			this.$holder.off(".ScrollLoader");
 		}
 	};

 	var ClickLoader = {
 		attachEvents: function() {
 			var self = this;

 			this.$holder.on("click.ClickLoader", this.options.linkSelector, function(e) { self.onClickHandler(e); });
 		},

 		onClickHandler: function(e) {
 			e.preventDefault();

 			this.loadInclude();
 		},

 		destroySubEvents: function() {
 			this.$holder.off(".ClickLoader");
 		}
 	};

 	var ContentLoader = function($holder, options) {
 		this.$holder = $holder;
 		this.options = options;

 		this.init();
 	};

 	var ContentLoaderProto = {
 		init: function() {
 			this.$link = this.$holder.find(this.options.linkSelector);
 			this.$newContentTarget = this.options.newContentTarget ? this.$holder.find(this.options.newContentTarget) : this.$holder;

 			if (!this.$link.length) {
 				this.removeInstance();
 				return;
 			}

 			this.attachEvents();
 		},

 		loadInclude: function() {
 			if (this.isBusy) {
 				return;
 			}

 			var self = this;

 			this.toggleBusyMode(true);

 			$.get(self.$link.attr("href"), function(source) { self.successHandler(source); });
 		},

 		successHandler: function(include) {
 			var $tmpDiv = jQuery("<div>").html(include);
 			var $nextIncludeLink = $tmpDiv.find(this.options.linkSelector);

 			if ($nextIncludeLink.length) {
 				this.refreshLink($nextIncludeLink);
 			} else {
 				this.destroy();
 			}

 			this.appendItems($tmpDiv.children());
 		},

 		appendItems: function($newItems) {
 			var self = this;

 			this.$newContentTarget.append($newItems.addClass(this.options.preAppendClass));

 			setTimeout(function() { // need this timeout coz need some time for css preAppendClass applied to the new items
 				$newItems.removeClass(self.options.preAppendClass);

 				self.$holder.trigger("ContentLoader/loaded");
 				self.toggleBusyMode(false);
 				self.makeCallback("onLoaded", $newItems);
 			}, 100);

            if (window.picturefill) {
                window.picturefill();
            }
 		},

 		refreshLink: function($nextIncludeLink) {
 			this.$link.attr("href", $nextIncludeLink.attr("href"));
 			$nextIncludeLink.remove();
 		},

 		toggleBusyMode: function(state) {
 			this.$holder.toggleClass(this.options.busyClass, state);
 			this.isBusy = state;
 		},

 		removeInstance: function() {
 			this.$holder.removeData("ContentLoader");
 		},

 		makeCallback: function(name) {
            if (typeof this.options[name] === "function") {
                var args = Array.prototype.slice.call(arguments);
                args.shift();
                this.options[name].apply(this, args);
            }
        },

 		destroy: function() {
 			this.removeInstance();
 			this.destroySubEvents();

 			this.$link.remove();
 		}
 	};

 	$.fn.loadMore = function(options) {
 		options = $.extend({
 			scroll: false,
 			linkSelector: ".load-more",
 			newContentTarget: null,
 			busyClass: "is-busy",
 			additionBottomOffset: 50,
 			preAppendClass: "new-item"
 		}, options);

 		return this.each(function() {
 			var $holder = $(this);

 			ContentLoader.prototype = $.extend(options.scroll ? ScrollLoader : ClickLoader, ContentLoaderProto);

 			$holder.data("ContentLoader", new ContentLoader($holder, options));
 		});
 	};
}(jQuery, jQuery(window)));

/*
 * jQuery SameHeight plugin
 */
(function($){
    $.fn.sameHeight = function(opt) {
        var options = $.extend({
            skipClass: "same-height-ignore",
            leftEdgeClass: "same-height-left",
            rightEdgeClass: "same-height-right",
            elements: ">*",
            flexible: false,
            multiLine: false,
            useMinHeight: false,
            biggestHeight: false
        },opt);
        return this.each(function(){
            var holder = $(this), postResizeTimer, ignoreResize;
            var elements = holder.find(options.elements).not("." + options.skipClass);
            if(!elements.length) return;

            // resize handler
            function doResize() {
                elements.css(options.useMinHeight && supportMinHeight ? "minHeight" : "height", "");
                if(options.multiLine) {
                    // resize elements row by row
                    resizeElementsByRows(elements, options);
                } else {
                    // resize elements by holder
                    resizeElements(elements, holder, options);
                }
            }
            doResize();

            // handle flexible layout / font resize
            var delayedResizeHandler = function() {
                if(!ignoreResize) {
                    ignoreResize = true;
                    doResize();
                    clearTimeout(postResizeTimer);
                    postResizeTimer = setTimeout(function() {
                        doResize();
                        setTimeout(function(){
                            ignoreResize = false;
                        }, 10);
                    }, 100);
                }
            };

            // handle flexible/responsive layout
            if(options.flexible) {
                $(window).bind("resize orientationchange fontresize", delayedResizeHandler);
            }

            // handle complete page load including images and fonts
            $(window).bind("load", delayedResizeHandler);
        });
    };

    // detect css min-height support
    var supportMinHeight = typeof document.documentElement.style.maxHeight !== "undefined";

    // get elements by rows
    function resizeElementsByRows(boxes, options) {
        var currentRow = $(), maxHeight, maxCalcHeight = 0, firstOffset = boxes.eq(0).offset().top;
        boxes.each(function(ind){
            var curItem = $(this);
            if(curItem.offset().top === firstOffset) {
                currentRow = currentRow.add(this);
            } else {
                maxHeight = getMaxHeight(currentRow);
                maxCalcHeight = Math.max(maxCalcHeight, resizeElements(currentRow, maxHeight, options));
                currentRow = curItem;
                firstOffset = curItem.offset().top;
            }
        });
        if(currentRow.length) {
            maxHeight = getMaxHeight(currentRow);
            maxCalcHeight = Math.max(maxCalcHeight, resizeElements(currentRow, maxHeight, options));
        }
        if(options.biggestHeight) {
            boxes.css(options.useMinHeight && supportMinHeight ? "minHeight" : "height", maxCalcHeight);
        }
    }

    // calculate max element height
    function getMaxHeight(boxes) {
        var maxHeight = 0;
        boxes.each(function(){
            maxHeight = Math.max(maxHeight, $(this).outerHeight());
        });
        return maxHeight;
    }

    // resize helper function
    function resizeElements(boxes, parent, options) {
        var calcHeight;
        var parentHeight = typeof parent === "number" ? parent : parent.height();
        boxes.removeClass(options.leftEdgeClass).removeClass(options.rightEdgeClass).each(function(i){
            var element = $(this);
            var depthDiffHeight = 0;
            var isBorderBox = element.css("boxSizing") === "border-box" || element.css("-moz-box-sizing") === "border-box" || element.css("-webkit-box-sizing") === "border-box";

            if(typeof parent !== "number") {
                element.parents().each(function(){
                    var tmpParent = $(this);
                    if(parent.is(this)) {
                        return false;
                    } else {
                        depthDiffHeight += tmpParent.outerHeight() - tmpParent.height();
                    }
                });
            }
            calcHeight = parentHeight - depthDiffHeight;
            calcHeight -= isBorderBox ? 0 : element.outerHeight() - element.height();

            if(calcHeight > 0) {
                element.css(options.useMinHeight && supportMinHeight ? "minHeight" : "height", calcHeight);
            }
        });
        boxes.filter(":first").addClass(options.leftEdgeClass);
        boxes.filter(":last").addClass(options.rightEdgeClass);
        return calcHeight;
    }
}(jQuery));

/*
 * jQuery FontResize Event
 */
jQuery.onFontResize = (function($) {
    $(function() {
        var randomID = "font-resize-frame-" + Math.floor(Math.random() * 1000);
        var resizeFrame = $("<iframe>").attr("id", randomID).addClass("font-resize-helper");

        // required styles
        resizeFrame.css({
            width: "100em",
            height: "10px",
            position: "absolute",
            borderWidth: 0,
            top: "-9999px",
            left: "-9999px"
        }).appendTo("body");

        // use native IE resize event if possible
        if (window.attachEvent && !window.addEventListener) {
            resizeFrame.bind("resize", function () {
                $.onFontResize.trigger(resizeFrame[0].offsetWidth / 100);
            });
        }
        // use script inside the iframe to detect resize for other browsers
        else {
            var doc = resizeFrame[0].contentWindow.document;
            doc.open();
            doc.write("<scri" + "pt>window.onload = function(){var em = parent.jQuery(\"#" + randomID + "\")[0];window.onresize = function(){if(parent.jQuery.onFontResize){parent.jQuery.onFontResize.trigger(em.offsetWidth / 100);}}};</scri" + "pt>");
            doc.close();
        }
        jQuery.onFontResize.initialSize = resizeFrame[0].offsetWidth / 100;
    });
    return {
        // public method, so it can be called from within the iframe
        trigger: function (em) {
            $(window).trigger("fontresize", [em]);
        }
    };
}(jQuery));

// navigation accesibility module
function TouchNav(opt) {
    this.options = {
        hoverClass: "hover",
        menuItems: "li",
        menuOpener: "a",
        menuDrop: "ul",
        navBlock: null
    };
    for(var p in opt) {
        if(opt.hasOwnProperty(p)) {
            this.options[p] = opt[p];
        }
    }
    this.init();
}
TouchNav.isActiveOn = function(elem) {
    return elem && elem.touchNavActive;
};
TouchNav.prototype = {
    init: function() {
        if(typeof this.options.navBlock === "string") {
            this.menu = document.getElementById(this.options.navBlock);
        } else if(typeof this.options.navBlock === "object") {
            this.menu = this.options.navBlock;
        }
        if(this.menu) {
            this.addEvents();
        }
    },
    addEvents: function() {
        // attach event handlers
        var self = this;
        var touchEvent = (navigator.pointerEnabled && "pointerdown") || (navigator.msPointerEnabled && "MSPointerDown") || (this.isTouchDevice && "touchstart");
        this.menuItems = lib.queryElementsBySelector(this.options.menuItems, this.menu);

        var initMenuItem = function(item) {
            var currentDrop = lib.queryElementsBySelector(self.options.menuDrop, item)[0],
                currentOpener = lib.queryElementsBySelector(self.options.menuOpener, item)[0];

            // only for touch input devices
            if( currentDrop && currentOpener && (self.isTouchDevice || self.isPointerDevice) ) {
                lib.event.add(currentOpener, "click", lib.bind(self.clickHandler, self));
                lib.event.add(currentOpener, "mousedown", lib.bind(self.mousedownHandler, self));
                lib.event.add(currentOpener, touchEvent, function(e){
                    if( !self.isTouchPointerEvent(e) ) {
                        self.preventCurrentClick = false;
                        return;
                    }
                    self.touchFlag = true;
                    self.currentItem = item;
                    self.currentLink = currentOpener;
                    self.pressHandler.apply(self, arguments);
                });
            }
            // for desktop computers and touch devices
            jQuery(item).bind("mouseenter", function(){
                if(!self.touchFlag) {
                    self.currentItem = item;
                    self.mouseoverHandler();
                }
            });
            jQuery(item).bind("mouseleave", function(){
                if(!self.touchFlag) {
                    self.currentItem = item;
                    self.mouseoutHandler();
                }
            });
            item.touchNavActive = true;
        };

        // addd handlers for all menu items
        for(var i = 0; i < this.menuItems.length; i++) {
            initMenuItem(self.menuItems[i]);
        }

        // hide dropdowns when clicking outside navigation
        if(this.isTouchDevice || this.isPointerDevice) {
            lib.event.add(document.documentElement, "mousedown", lib.bind(this.clickOutsideHandler, this));
            lib.event.add(document.documentElement, touchEvent, lib.bind(this.clickOutsideHandler, this));
        }
    },
    mousedownHandler: function(e) {
        if(this.touchFlag) {
            e.preventDefault();
            this.touchFlag = false;
            this.preventCurrentClick = false;
        }
    },
    mouseoverHandler: function() {
        lib.addClass(this.currentItem, this.options.hoverClass);
        jQuery(this.currentItem).trigger("itemhover");
    },
    mouseoutHandler: function() {
        lib.removeClass(this.currentItem, this.options.hoverClass);
        jQuery(this.currentItem).trigger("itemleave");
    },
    hideActiveDropdown: function() {
        for(var i = 0; i < this.menuItems.length; i++) {
            if(lib.hasClass(this.menuItems[i], this.options.hoverClass)) {
                lib.removeClass(this.menuItems[i], this.options.hoverClass);
                jQuery(this.menuItems[i]).trigger("itemleave");
            }
        }
        this.activeParent = null;
    },
    pressHandler: function(e) {
        // hide previous drop (if active)
        if(this.currentItem !== this.activeParent) {
            if(this.activeParent && this.currentItem.parentNode === this.activeParent.parentNode) {
                lib.removeClass(this.activeParent, this.options.hoverClass);
            } else if(!this.isParent(this.activeParent, this.currentLink)) {
                this.hideActiveDropdown();
            }
        }
        // handle current drop
        this.activeParent = this.currentItem;
        if(lib.hasClass(this.currentItem, this.options.hoverClass)) {
            this.preventCurrentClick = false;
        } else {
            e.preventDefault();
            this.preventCurrentClick = true;
            lib.addClass(this.currentItem, this.options.hoverClass);
            jQuery(this.currentItem).trigger("itemhover");
        }
    },
    clickHandler: function(e) {
        // prevent first click on link
        if(this.preventCurrentClick) {
            e.preventDefault();
        }
    },
    clickOutsideHandler: function(event) {
        var e = event.changedTouches ? event.changedTouches[0] : event;
        if(this.activeParent && !this.isParent(this.menu, e.target)) {
            this.hideActiveDropdown();
            this.touchFlag = false;
        }
    },
    isParent: function(parent, child) {
        while(child.parentNode) {
            if(child.parentNode == parent) {
                return true;
            }
            child = child.parentNode;
        }
        return false;
    },
    isTouchPointerEvent: function(e) {
        return (e.type.indexOf("touch") > -1) ||
				(navigator.pointerEnabled && e.pointerType === "touch") ||
				(navigator.msPointerEnabled && e.pointerType == e.MSPOINTER_TYPE_TOUCH);
    },
    isPointerDevice: (function() {
        return !!(navigator.pointerEnabled || navigator.msPointerEnabled);
    }()),
    isTouchDevice: (function() {
        return !!(("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch);
    }())
};

/*
 * Image Stretch module
 */
var ImageStretcher = {
    getDimensions: function(data) {
        // calculate element coords to fit in mask
        var ratio = data.imageRatio || (data.imageWidth / data.imageHeight),
            slideWidth = data.maskWidth,
            slideHeight = slideWidth / ratio;

        if(slideHeight < data.maskHeight) {
            slideHeight = data.maskHeight;
            slideWidth = slideHeight * ratio;
        }
        return {
            width: slideWidth,
            height: slideHeight,
            top: (data.maskHeight - slideHeight) / 2,
            left: (data.maskWidth - slideWidth) / 2
        };
    },
    getRatio: function(image) {
        if(image.prop("naturalWidth")) {
            return image.prop("naturalWidth") / image.prop("naturalHeight");
        } else {
            var img = new Image();
            img.src = image.prop("src");
            return img.width / img.height;
        }
    },
    imageLoaded: function(image, callback) {
        var self = this;
        var loadHandler = function() {
            callback.call(self);
        };
        if(image.prop("complete")) {
            loadHandler();

        } else {
            image.one("load", loadHandler);
        }
    },
    resizeHandler: function() {
        var self = this;
        jQuery.each(this.imgList, function(index, item) {
            if(item.image.prop("complete")) {
                self.resizeImage(item.image, item.container);
            }
        });
    },
    resizeImage: function(image, container) {
        this.imageLoaded(image, function() {
            var styles = this.getDimensions({
                imageRatio: this.getRatio(image),
                maskWidth: container.width(),
                maskHeight: container.height()
            });
            image.css({
                width: styles.width,
                height: styles.height,
                marginTop: styles.top,
                marginLeft: styles.left
            });
        });
    },
    add: function(options) {
        var container = jQuery(options.container ? options.container : window),
            image = typeof options.image === "string" ? container.find(options.image) : jQuery(options.image);

        // resize image
        this.resizeImage(image, container);

        // add resize handler once if needed
        if(!this.win) {
            this.resizeHandler = jQuery.proxy(this.resizeHandler, this);
            this.imgList = [];
            this.win = jQuery(window);
            this.win.on("resize orientationchange", this.resizeHandler);
        }

        // store item in collection
        this.imgList.push({
            container: container,
            image: image
        });
    }
};

/*
 * Utility module
 */
lib = {
    hasClass: function(el,cls) {
        return el && el.className ? el.className.match(new RegExp("(\\s|^)"+cls+"(\\s|$)")) : false;
    },
    addClass: function(el,cls) {
        if (el && !this.hasClass(el,cls)) el.className += " "+cls;
    },
    removeClass: function(el,cls) {
        if (el && this.hasClass(el,cls)) {el.className=el.className.replace(new RegExp("(\\s|^)"+cls+"(\\s|$)")," ");}
    },
    extend: function(obj) {
        for(var i = 1; i < arguments.length; i++) {
            for(var p in arguments[i]) {
                if(arguments[i].hasOwnProperty(p)) {
                    obj[p] = arguments[i][p];
                }
            }
        }
        return obj;
    },
    each: function(obj, callback) {
        var property, len;
        if(typeof obj.length === "number") {
            for(property = 0, len = obj.length; property < len; property++) {
                if(callback.call(obj[property], property, obj[property]) === false) {
                    break;
                }
            }
        } else {
            for(property in obj) {
                if(obj.hasOwnProperty(property)) {
                    if(callback.call(obj[property], property, obj[property]) === false) {
                        break;
                    }
                }
            }
        }
    },
    event: (function() {
        var fixEvent = function(e) {
            e = e || window.event;
            if(e.isFixed) return e; else e.isFixed = true;
            if(!e.target) e.target = e.srcElement;
            e.preventDefault = e.preventDefault || function() {this.returnValue = false;};
            e.stopPropagation = e.stopPropagation || function() {this.cancelBubble = true;};
            return e;
        };
        return {
            add: function(elem, event, handler) {
                if(!elem.events) {
                    elem.events = {};
                    elem.handle = function(e) {
                        var ret, handlers = elem.events[e.type];
                        e = fixEvent(e);
                        for(var i = 0, len = handlers.length; i < len; i++) {
                            if(handlers[i]) {
                                ret = handlers[i].call(elem, e);
                                if(ret === false) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                }
                            }
                        }
                    };
                }
                if(!elem.events[event]) {
                    elem.events[event] = [];
                    if(elem.addEventListener) elem.addEventListener(event, elem.handle, false);
                    else if(elem.attachEvent) elem.attachEvent("on"+event, elem.handle);
                }
                elem.events[event].push(handler);
            },
            remove: function(elem, event, handler) {
                var handlers = elem.events[event];
                for(var i = handlers.length - 1; i >= 0; i--) {
                    if(handlers[i] === handler) {
                        handlers.splice(i,1);
                    }
                }
                if(!handlers.length) {
                    delete elem.events[event];
                    if(elem.removeEventListener) elem.removeEventListener(event, elem.handle, false);
                    else if(elem.detachEvent) elem.detachEvent("on"+event, elem.handle);
                }
            }
        };
    }()),
    queryElementsBySelector: function(selector, scope) {
        scope = scope || document;
        if(!selector) return [];
        if(selector === ">*") return scope.children;
        if(typeof document.querySelectorAll === "function") {
            return scope.querySelectorAll(selector);
        }
        var selectors = selector.split(",");
        var resultList = [];
        for(var s = 0; s < selectors.length; s++) {
            var currentContext = [scope || document];
            var tokens = selectors[s].replace(/^\s+/,"").replace(/\s+$/,"").split(" ");
            for (var i = 0; i < tokens.length; i++) {
                token = tokens[i].replace(/^\s+/,"").replace(/\s+$/,"");
                if (token.indexOf("#") > -1) {
                    var bits = token.split("#"), tagName = bits[0], id = bits[1];
                    var element = document.getElementById(id);
                    if (element && tagName && element.nodeName.toLowerCase() != tagName) {
                        return [];
                    }
                    currentContext = element ? [element] : [];
                    continue;
                }
                if (token.indexOf(".") > -1) {
                    var bits = token.split("."), tagName = bits[0] || "*", className = bits[1], found = [], foundCount = 0;
                    for (var h = 0; h < currentContext.length; h++) {
                        var elements;
                        if (tagName == "*") {
                            elements = currentContext[h].getElementsByTagName("*");
                        } else {
                            elements = currentContext[h].getElementsByTagName(tagName);
                        }
                        for (var j = 0; j < elements.length; j++) {
                            found[foundCount++] = elements[j];
                        }
                    }
                    currentContext = [];
                    var currentContextIndex = 0;
                    for (var k = 0; k < found.length; k++) {
                        if (found[k].className && found[k].className.match(new RegExp("(\\s|^)"+className+"(\\s|$)"))) {
                            currentContext[currentContextIndex++] = found[k];
                        }
                    }
                    continue;
                }
                if (token.match(/^(\w*)\[(\w+)([=~\|\^\$\*]?)=?"?([^\]"]*)"?\]$/)) {
                    var tagName = RegExp.$1 || "*", attrName = RegExp.$2, attrOperator = RegExp.$3, attrValue = RegExp.$4;
                    if(attrName.toLowerCase() == "for" && this.browser.msie && this.browser.version < 8) {
                        attrName = "htmlFor";
                    }
                    var found = [], foundCount = 0;
                    for (var h = 0; h < currentContext.length; h++) {
                        var elements;
                        if (tagName == "*") {
                            elements = currentContext[h].getElementsByTagName("*");
                        } else {
                            elements = currentContext[h].getElementsByTagName(tagName);
                        }
                        for (var j = 0; elements[j]; j++) {
                            found[foundCount++] = elements[j];
                        }
                    }
                    currentContext = [];
                    var currentContextIndex = 0, checkFunction;
                    switch (attrOperator) {
                        case "=": checkFunction = function(e) { return (e.getAttribute(attrName) == attrValue); }; break;
                        case "~": checkFunction = function(e) { return (e.getAttribute(attrName).match(new RegExp("(\\s|^)"+attrValue+"(\\s|$)"))); }; break;
                        case "|": checkFunction = function(e) { return (e.getAttribute(attrName).match(new RegExp("^"+attrValue+"-?"))); }; break;
                        case "^": checkFunction = function(e) { return (e.getAttribute(attrName).indexOf(attrValue) == 0); }; break;
                        case "$": checkFunction = function(e) { return (e.getAttribute(attrName).lastIndexOf(attrValue) == e.getAttribute(attrName).length - attrValue.length); }; break;
                        case "*": checkFunction = function(e) { return (e.getAttribute(attrName).indexOf(attrValue) > -1); }; break;
                        default : checkFunction = function(e) { return e.getAttribute(attrName); };
                    }
                    currentContext = [];
                    var currentContextIndex = 0;
                    for (var k = 0; k < found.length; k++) {
                        if (checkFunction(found[k])) {
                            currentContext[currentContextIndex++] = found[k];
                        }
                    }
                    continue;
                }
                tagName = token;
                var found = [], foundCount = 0;
                for (var h = 0; h < currentContext.length; h++) {
                    var elements = currentContext[h].getElementsByTagName(tagName);
                    for (var j = 0; j < elements.length; j++) {
                        found[foundCount++] = elements[j];
                    }
                }
                currentContext = found;
            }
            resultList = [].concat(resultList,currentContext);
        }
        return resultList;
    },
    trim: function (str) {
        return str.replace(/^\s+/, "").replace(/\s+$/, "");
    },
    bind: function(f, scope, forceArgs){
        return function() {return f.apply(scope, typeof forceArgs !== "undefined" ? [forceArgs] : arguments);};
    }
};

/*!
* FitVids 1.0.3
*
*/
(function (a) {
    a.fn.fitVids = function (b) {
        var c = { customSelector: null };
        if (!document.getElementById("fit-vids-style")) {
            var f = document.createElement("div"),
                d = document.getElementsByTagName("base")[0] || document.getElementsByTagName("script")[0],
                e =
                    "&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>";
            f.className = "fit-vids-style";
            f.id = "fit-vids-style";
            f.style.display = "none";
            f.innerHTML = e;
            d.parentNode.insertBefore(f, d);
        }
        if (b) {
            a.extend(c, b);
        }
        return this.each(function () {
            var g = ["iframe[src*='player.vimeo.com']", "iframe[src*='youtube.com']", "iframe[src*='youtube-nocookie.com']", "iframe[src*='kickstarter.com'][src*='video.html']", "object", "embed"];
            if (c.customSelector) {
                g.push(c.customSelector);
            }
            var h = a(this).find(g.join(","));
            h = h.not("object object");
            h.each(function () {
                var m = a(this);
                if ((this.tagName.toLowerCase() === "embed" && m.parent("object").length) || m.parent(".fluid-width-video-wrapper").length) {
                    return;
                }
                var i = this.tagName.toLowerCase() === "object" || (m.attr("height") && !isNaN(parseInt(m.attr("height"), 10))) ? parseInt(m.attr("height"), 10) : m.height(),
                    j = !isNaN(parseInt(m.attr("width"), 10)) ? parseInt(m.attr("width"), 10) : m.width(),
                    k = i / j;
                if (!m.attr("id")) {
                    var l = "fitvid" + Math.floor(Math.random() * 999999);
                    m.attr("id", l);
                }
                m.wrap("<div class='fluid-width-video-wrapper'></div>")
                    .parent(".fluid-width-video-wrapper")
                    .css("padding-top", k * 100 + "%");
                m.removeAttr("height").removeAttr("width");
            });
        });
    };
})(window.jQuery || window.Zepto);


(function ( $ ) {

    function floatShare(){
        var element = $("#float-share");
        var topPos = $(".content-holder").offset();
        var botPos = $(".share-block").offset();

        $(window).scroll(function (event) {
	    var scroll = $(window).scrollTop();

            if (scroll+156 > topPos.top) {
                element.addClass("static");
            } else {
                element.removeClass("static");
            }

            if (scroll > botPos.top - 300) {
                element.addClass("bottom");
            } else {
                element.removeClass("bottom");
            }
        });
    }

    if($(".container").hasClass("track")){
        floatShare();
    }

}( jQuery ));
