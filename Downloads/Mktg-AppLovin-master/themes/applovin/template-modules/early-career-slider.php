<script delay src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script delay src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="slide-grid">
    <div class="slide-part">
        <div class="slideshow">
            <!-- First slide with Wistia video ID '6thexlbzzy' -->
            <div class="video-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/AppLovin_ResearchScience_Thumbnail.jpg" alt="">
                <button class="play-button" onclick="openLightbox('lightbox1', '6thexlbzzy')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5v14l11-7z"></path>
                    </svg>
                </button>
            </div>

            <!-- Second slide with Wistia video ID '1ca634980g' -->
            <div class="video-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/AppLovin_ResearchScience_Jack_Portrait_Thumbnail.jpg" alt="">
                <button class="play-button" onclick="openLightbox('lightbox2', '1ca634980g')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5v14l11-7z"></path>
                    </svg>
                </button>
            </div>

            <!-- Third slide with Wistia video ID 'cni7v6r25x' -->
            <div class="video-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/AppLovin_Intern_Thumbnail.jpg" alt="">
                <button class="play-button" onclick="openLightbox('lightbox3', 'kg5060l8m5')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5v14l11-7z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="pagi">
            <!-- Dots will be added here dynamically -->
        </div>
    </div>
</div>


<!-- Lightbox One -->
<div id="lightbox1" class="lightbox fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden z-[1000]">
    <div class=" relative w-11/12 md:w-3/4 h-auto">
        <button onclick="closeLightbox('lightbox1', '6thexlbzzy')" class="absolute top-[10px] right-[10px] p-0 opacity-25 z-[1]">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16ZM19.86 21.64L15.9998 17.7798L12.1395 21.64C11.8995 21.86 11.5995 22 11.2595 22C10.5795 22 10.0195 21.46 10.0195 20.76C10.0195 20.44 10.1395 20.12 10.3795 19.88L14.2398 16.0198L10.36 12.14C10.12 11.9 10 11.58 10 11.26C10 10.56 10.56 10.02 11.24 10.02C11.58 10.02 11.88 10.16 12.12 10.38L15.9998 14.2598L19.8795 10.38C20.1195 10.16 20.4195 10.02 20.7595 10.02C21.4395 10.02 21.9995 10.56 21.9995 11.26C21.9995 11.58 21.8795 11.9 21.6395 12.14L17.7598 16.0198L21.62 19.88C21.86 20.12 21.98 20.44 21.98 20.76C21.98 21.46 21.42 22 20.74 22C20.4 22 20.1 21.86 19.86 21.64Z" fill="white" />
            </svg>
        </button>
        <div class="aspect-w-16 aspect-h-9">
            <script src="https://fast.wistia.com/embed/medias/6thexlbzzy.jsonp" async></script>
            <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_6thexlbzzy seo=true videoFoam=true" style="height:100%;position:relative;width:100%">
                        <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/6thexlbzzy/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Lightbox One End -->

<!-- Lightbox Two -->
<div id="lightbox2" class="lightbox fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden z-[1000]">
    <div class=" relative w-11/12 md:w-3/4 h-auto">
        <button onclick="closeLightbox('lightbox2', '1ca634980g')" class="absolute top-[10px] right-[10px] p-0 opacity-25 z-[1]">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16ZM19.86 21.64L15.9998 17.7798L12.1395 21.64C11.8995 21.86 11.5995 22 11.2595 22C10.5795 22 10.0195 21.46 10.0195 20.76C10.0195 20.44 10.1395 20.12 10.3795 19.88L14.2398 16.0198L10.36 12.14C10.12 11.9 10 11.58 10 11.26C10 10.56 10.56 10.02 11.24 10.02C11.58 10.02 11.88 10.16 12.12 10.38L15.9998 14.2598L19.8795 10.38C20.1195 10.16 20.4195 10.02 20.7595 10.02C21.4395 10.02 21.9995 10.56 21.9995 11.26C21.9995 11.58 21.8795 11.9 21.6395 12.14L17.7598 16.0198L21.62 19.88C21.86 20.12 21.98 20.44 21.98 20.76C21.98 21.46 21.42 22 20.74 22C20.4 22 20.1 21.86 19.86 21.64Z" fill="white" />
            </svg>
        </button>
        <div class="aspect-w-16 aspect-h-9">
            <script src="https://fast.wistia.com/embed/medias/1ca634980g.jsonp" async></script>
            <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_1ca634980g seo=true videoFoam=true" style="height:100%;position:relative;width:100%">
                        <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/1ca634980g/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Lightbox Two End -->

<!-- Lightbox Three -->
<div id="lightbox3" class="lightbox fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden z-[1000]">
    <div class=" relative w-11/12 md:w-3/4 h-auto">
        <button onclick="closeLightbox('lightbox3', 'kg5060l8m5')" class="absolute top-[10px] right-[10px] p-0 opacity-25 z-[1]">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16ZM19.86 21.64L15.9998 17.7798L12.1395 21.64C11.8995 21.86 11.5995 22 11.2595 22C10.5795 22 10.0195 21.46 10.0195 20.76C10.0195 20.44 10.1395 20.12 10.3795 19.88L14.2398 16.0198L10.36 12.14C10.12 11.9 10 11.58 10 11.26C10 10.56 10.56 10.02 11.24 10.02C11.58 10.02 11.88 10.16 12.12 10.38L15.9998 14.2598L19.8795 10.38C20.1195 10.16 20.4195 10.02 20.7595 10.02C21.4395 10.02 21.9995 10.56 21.9995 11.26C21.9995 11.58 21.8795 11.9 21.6395 12.14L17.7598 16.0198L21.62 19.88C21.86 20.12 21.98 20.44 21.98 20.76C21.98 21.46 21.42 22 20.74 22C20.4 22 20.1 21.86 19.86 21.64Z" fill="white" />
            </svg>
        </button>
        <div class="aspect-w-16 aspect-h-9">
            <script src="https://fast.wistia.com/embed/medias/kg5060l8m5.jsonp" async></script>
            <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_kg5060l8m5 seo=true videoFoam=true" style="height:100%;position:relative;width:100%">
                        <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/kg5060l8m5/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Lightbox Three End -->


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
jQuery(function() {
    var slideInterval;
    var autoRotateDelay = 10000; // 10 seconds interval for auto-rotation
    var $slides = jQuery('.video-slide');
    var isSwiping = false; // To detect if the user is swiping

    // Initially set up the slides
    $slides.first().addClass('active');
    $slides.last().addClass('prev');
    $slides.eq(1).addClass('next');

    // Set up the dots for pagination
    $slides.each(function(i) {
        var $dot = jQuery('<div>').addClass('dot').attr('data-index', i);
        jQuery('.pagi').append($dot);
    });

    jQuery('.dot').first().addClass('active');

    // Function to update slide classes (prev, active, next)
    function updateSlideClasses($newActive) {
        var $next = $newActive.next('.video-slide').length ? $newActive.next('.video-slide') : jQuery('.video-slide:first');
        var $prev = $newActive.prev('.video-slide').length ? $newActive.prev('.video-slide') : jQuery('.video-slide:last');

        $slides.removeClass('active prev next');
        $newActive.addClass('active');
        $prev.addClass('prev');
        $next.addClass('next');

        setupVideoListeners($newActive);

        var activeIndex = $newActive.index();
        jQuery('.dot').removeClass('active');
        jQuery('.dot').eq(activeIndex).addClass('active');

        resetSlideRotation();
    }

    function setupVideoListeners($slide) {
        var $video = $slide.find('video')[0];
        if ($video) {
            $video.addEventListener('play', stopSlideRotation);
            $video.addEventListener('pause', resetSlideRotation);
            $video.addEventListener('ended', function() {
                resetSlideRotation();
                goToNextSlide();
            });
        }
    }

    function resetSlideRotation() {
        stopSlideRotation();
        if (!isSwiping) {
            slideInterval = setInterval(goToNextSlide, autoRotateDelay);
        }
    }

    function stopSlideRotation() {
        if (slideInterval) {
            clearInterval(slideInterval);
            slideInterval = null;
        }
    }

    function goToNextSlide() {
        var $active = jQuery('.video-slide.active');
        var $next = $active.next('.video-slide').length ? $active.next('.video-slide') : jQuery('.video-slide:first');
        updateSlideClasses($next);
    }

    function goToPreviousSlide() {
        var $active = jQuery('.video-slide.active');
        var $prev = $active.prev('.video-slide').length ? $active.prev('.video-slide') : jQuery('.video-slide:last');
        updateSlideClasses($prev);
    }

    // Swiping functionality only (touchmove and touchend)
    var startX, endX;
    
    $slides.on('touchmove', function(e) {
        startX = startX || e.originalEvent.touches[0].clientX;
        endX = e.originalEvent.touches[0].clientX;
    });

    $slides.on('touchend', function() {
        var swipeThreshold = 50; // Minimum distance for a swipe

        if (startX - endX > swipeThreshold) {
            goToNextSlide(); // Swipe left: Go to the next slide
        } else if (endX - startX > swipeThreshold) {
            goToPreviousSlide(); // Swipe right: Go to the previous slide
        }

        startX = null; // Reset touch points
        endX = null;
    });

    // Enable clicking on the slides to make them active
    $slides.on('click', function() {
        var $clickedSlide = $(this);
        stopSlideRotation();
        updateSlideClasses($clickedSlide);
        resetSlideRotation(); // Reset the timer after manually clicking a slide
    });

    // Pagination dots
    jQuery('.pagi').on('click', '.dot', function() {
        var index = $(this).attr('data-index');
        var $clickedSlide = $slides.eq(index);
        stopSlideRotation();
        updateSlideClasses($clickedSlide);
        resetSlideRotation();
    });

    // Set up the initial slide
    setupVideoListeners($slides.first());
    resetSlideRotation();
});


</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
// Open lightbox when user clicks on the button
function openLightbox(lightboxId, videoId) {
    var lightbox = document.getElementById(lightboxId);
    lightbox.classList.remove('hidden');
    document.body.classList.add('no-scroll');

    // Re-embed the Wistia video to restart it
    reloadWistiaVideo(lightboxId, videoId);

    // Autoplay the video after it's reloaded
    Wistia.api(videoId).ready(function(video) {
        video.play();
        video.resize(); // Ensure video resizes properly
    });
}

// Close lightbox when user clicks on the close button
function closeLightbox(lightboxId, videoId) {
    var lightbox = document.getElementById(lightboxId);
    lightbox.classList.add('hidden');
    document.body.classList.remove('no-scroll');

    // Pause the video when the lightbox is closed
    Wistia.api(videoId).ready(function(video) {
        video.pause();
    });
    
}


// Re-embed the Wistia video when lightbox is opened
function reloadWistiaVideo(lightboxId, videoId) {
    var wistiaContainer = document.querySelector(`#${lightboxId} .wistia_embed`);
    var wistiaWrapper = wistiaContainer.parentNode;

    // Remove the existing Wistia embed
    wistiaContainer.remove();

    // Create a new embed container and append it to the wrapper
    var newWistiaContainer = document.createElement('div');
    newWistiaContainer.classList.add('wistia_embed', `wistia_async_${videoId}`, 'seo=true', 'videoFoam=true');
    newWistiaContainer.style.cssText = 'height: 100%; position: relative; width: 100%;';
    wistiaWrapper.appendChild(newWistiaContainer);

    // Re-embed the Wistia video script
    var script = document.createElement('script');
    script.src = `https://fast.wistia.com/embed/medias/${videoId}.jsonp`;
    script.async = true;
    document.body.appendChild(script);
}

// Close the lightbox with the 'Escape' key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        var openLightbox = document.querySelector('.lightbox:not(.hidden)');
        if (openLightbox) {
            var videoId = openLightbox.getAttribute('data-video-id');
            closeLightbox(openLightbox.id, videoId);
        }
    }
});

</script>


<style>
    /* Style the video slide container */
.video-slide {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

/* Style the play button */
.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.5); /* Optional background for button */
    border: none;
    border-radius: 50%;
    width: 64px;
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: background 0.3s;
}

/* Hover effect on the play button */
.play-button:hover {
    background: rgba(0, 0, 0, 0.8);
}

/* Play button SVG style */
.play-button svg {
    fill: white;
    width: 64px;
    height: 64px;
}


    /* Pagination styles */
    .pagi {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
    }

    .pagi .dot {
        width: 8px;
        height: 8px;
        background-color: #4F5A7D;
        border-radius: 50%;
        cursor: pointer;
    }

    .pagi .dot.active {
        background-color: #fff;
    }

    /* Slide grid and part styles */
    .slide-grid {
        display: grid;
        grid-template-columns: 1fr;
        justify-items: center;
        grid-row-gap: 0px;
    }

    .slide-part {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Slideshow and video slide styles */
    .slideshow {
        position: relative;
        width: 290px;
        height: 163px;
        overflow: visible;
        margin: 0 auto;
    }

    .video-slide {
        position: absolute;
        background-size: cover;
        background-position: center;
        border-radius: 14.9333px;
    }

    .video-slide img {
        border-radius: 16px;
    }

    .background-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 14.9333px;
    }

    /* Active, previous, and next video slide styles for small screens */
    .video-slide.active {
        width: 290px;
        height: 163px;
        z-index: 2;
    }

    .video-slide.prev {
        max-width: 217px;
        height: 90%;
        left: -7%;
        z-index: 1;
        margin-top: 5%;
        z-index: 1;
    }

    .video-slide.next {
        max-width: 217px;
        height: 90%;
        right: -7%;
        z-index: 1;
        margin-top: 5%;
        z-index: 1;
    }

    /* Media queries */
    @media only screen and (min-width: 668px) {
        .video-slide.active {
            width: 560px;
            height: 315px;
        }

        .slideshow {
            width: 560px;
            height: 315px;
        }

        .video-slide {
            width: 560px;
            height: 315px;
        }

        .video-slide.prev {
            max-width: 470px;
            height: 90%;
            left: -7%;
            z-index: 1;
            margin-top: 5%;
        }

        .video-slide.next {
            max-width: 470px;
            height: 90%;
            right: -7%;
            z-index: 1;
            margin-top: 5%;
        }
    }

    @media only screen and (min-width: 1024px) {
        .video-slide.active {
            width: 400px;
            height: 225px;
        }

        .slideshow {
            width: 400px;
            height: 225px;
        }

        .video-slide {
            width: 400px;
            height: 225px;
        }

        .video-slide.prev {
            max-width: 360px;
            height: 90%;
            left: -7%;
            z-index: 1;
            margin-top: 3%;
            /* transition: all 2s ease; */
        }

        .video-slide.next {
            max-width: 360px;
            height: 90%;
            right: -7%;
            z-index: 1;
            margin-top: 3%;
            /* transition: all 2s ease; */
        }
    }

    @media only screen and (min-width: 1305px) {
        .slideshow {
            width: 560px;
            height: 315px;
            perspective: 1000px;
        }

        .video-slide {
            width: 560px;
            height: 315px;
            /* transition: transform 1s ease-in-out;
            transform-style: preserve-3d; */
            backface-visibility: hidden;
        }

        .video-slide.active {
            /* transform: rotateY(0deg) translateX(0); */
            z-index: 2;
            width: 560px;
            height: 315px;
        }

        .video-slide.prev {
            /* transform: rotateY(0deg) translateX(0); */
            z-index: 1;
            max-width: 470px;
            height: 90%;
            left: -7%;
            margin-top: 5%;
        }

        .video-slide.next {
            /* transform: rotateY(0deg) translateX(0); */
            z-index: 1;
            max-width: 470px;
            height: 90%;
            right: -7%;
            margin-top: 5%;
        }
    }

    /* Active slide styles with box shadow */
    .video-slide.active {
        max-width: 560px;
        height: 100%;
        left: 0;
        z-index: 2;
        opacity: 1;
        box-shadow: 0px 36px 48px -32px rgba(16, 95, 251, 0.20);
    }

    /* Pagination styles */
    .pagination {
        text-align: center;
        margin-top: -35px;
    }

    .dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #4F5A7D;
        cursor: pointer;
    }

    .dot.active {
        background: #fff;
    }

    /* Hover effect for prev and next */
    .prev:hover,
    .next:hover {
        cursor: pointer;
    }

    /* Responsive grid layout for small screens */
    @media screen and (max-width: 1024px) {
        .slide-grid {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: repeat(2, auto);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }
    }
</style>