<?php
/*
Template Name: AppLovin Home Page
*/
?>
<?php get_header(); ?>

<div class="contentPage">

  <div id="page-home">
    <div class="hero-vid-bg">
      <div class="hero row">
        <div class="inner-wrap inner-wrap-1200">
          <div class="hero-content">
            <div class="main-content" fetchpriority="high">
              <?php 
                // Get the hero content early
                $hero_title = get_field('hero_title');
                $hero_intro = get_field('hero_intro_text');
                
                // Preload the text content
                printf(
                  '<link rel="preload" href="data:text/plain;charset=UTF-8,%s" as="fetch" crossorigin>',
                  rawurlencode($hero_intro)
                );
              ?>
              <h1 class="scale-60-50-32" fetchpriority="high"><?php echo wp_kses($hero_title, array(
                'br' => array(),
                'span' => array('class' => array())
              )); ?></h1>
              <p class="scale-24-21-18" fetchpriority="high"><?php echo esc_html($hero_intro); ?></p>
              <div class="primary-slate-btn m-auto">
                <a class="scale-21-21-18" href="<?php echo esc_url(get_field('cta_button_url')); ?>" target="_blank">
                  <span><?php echo esc_html(get_field('hero_cta')); ?></span>
                </a>
              </div>
              <div class="mainshadow">
                <div class="shadow"></div>
                <div class="inside"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="video-container">
        <div class="video-foreground">
          <video autoplay loop muted playsinline aria-hidden="true" class="sticky-vid" id="background-video">
            <source data-src="https://storage.googleapis.com/applovin_assets_us/videos/home-page-header.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="scale-50-40-28 centered-text fade"><?php the_field('home_video_text'); ?></div>
        <div class="scale-50-40-28 centered-text centered-text-second fade"><?php the_field('home_video_text_second'); ?></div>

      </div>
    </div>
    <div class="access-section">
      <div class="inner-wrap inner-wrap-1200 grid-gal">
        <div class="access-header">
          <h2 class="scale-50-40-28"><?php the_field('access_title'); ?></h2>
          <p class="scale-24-21-18"><?php the_field('access_text'); ?></p>
        </div>

        <div class="grid-acc gallery">
          <img src=" <?php the_field('slde_image_one'); ?>" loading="lazy" alt="MAX - How it Works" class="lazyload">
        </div>
      </div>
    </div>

    <div class="business-section">
      <div class="inner-wrap inner-wrap-1200">
        <div class="business-header">
          <h2 class="scale-50-40-28 avenir-black"><?php the_field('business_title'); ?></h2>
          <p class="scale-21-21-18"><?php the_field('business_text'); ?></p>
        </div>
      </div>
      <div class="slide-quote-container hz-scrollable" id="content-slide">
        <div class="slide-quote slide-quote-business">
          <?php if (have_rows('business_slideshow')): ?>
            <?php while (have_rows('business_slideshow')): the_row(); ?>
              <div class="change-hand">
                <div class="slide-quote-solo slide-quote-solo-not-hover lazyload" style="background: url(<?php the_sub_field('back_image'); ?>), #EEF0F6 ;">
                  <div class="quote-text">
                    <img class="slide-quote-image lazyload" src="<?php the_sub_field('logo_img'); ?>" loading="lazy" alt="belonging">
                    <p class="scale-21-21-18"><?php the_sub_field('slide_text'); ?></p>
                  </div>
                </div>
                <a href="<?php the_sub_field('pod_prod_url'); ?>" target="_blank" class="slide-quote-solo slide-quote-solo-hover" style="background: url(<?php the_sub_field('back_image_color'); ?>), <?php the_sub_field('back_color'); ?> ;">
                  <div class="quote-text">
                    <img class="slide-quote-image lazyload" src="<?php the_sub_field('logo_img'); ?>" loading="lazy" alt="belonging">
                    <p class="scale-21-21-18"><?php the_sub_field('slide_text'); ?></p>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="scrollbar-container" id="myScrollbarContainer">
        <div class="scrollbar"></div>
      </div>

      <div class="grid md:flex text-center gap-[8px] m-auto mt-[80px] justify-center items-center">
        <p class="scale-18-18-16 mb-0"><?php the_field('slide_cta'); ?></p>
        <div class="blue-link-16 m-auto w-full md:w-auto md:m-0">
          <?php 
            // Set the default URL
            $signup_cta_url = 'https://dash.applovin.com/signup';
            
            // Check the current language using Polylang and assign the URL accordingly
            if (pll_current_language() == 'ja') {
              $signup_cta_url = 'https://dash.applovin.com/signup?cc=jp';
            } elseif (pll_current_language() == 'ko') {
              $signup_cta_url = 'https://dash.applovin.com/signup?cc=kr';
            } elseif (pll_current_language() == 'cn') {
              $signup_cta_url = 'https://dash.applovin.com/signup?cc=cn';
            }
          ?>
          
          <a class="!text-[18px]" href="<?php echo esc_url($signup_cta_url); ?>" target="_blank">
            <span class="!pr-[0.5rem] !p-0"><?php pll_e('Create an account') ?></span>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="UI icon/arrow_forward">
                <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
              </g>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <div class="innov-section">
      <div class="inner-wrap inner-wrap-1000">
        <div class="header-innov">
          <h2 class="scale-50-40-28 avenir-black"><?php the_field('innove_title'); ?></h2>
          <p class="scale-24-21-18"><?php the_field('innove_text'); ?></p>
        </div>
        <video autoplay loop muted controls preload="none" class="video-innov" id="innov-video">
          <source data-src="https://storage.googleapis.com/applovin_assets_us/videos/Al-Amplify-Sf-Aitest-Pocketgems-Pat-64S.mp4" type="video/mp4">
          Your browser does not support the video tag.
          <track label="<?php the_field('innov_sub_title_lang'); ?>" kind="subtitles" srclang="<?php the_field('innov_sub_title_lang_code'); ?>" src="<?php the_field('innov_sub_title'); ?>" default>
        </video>

        <div class="grid-innov-one">
          <div class="two-grid-inn">
            <img class="two-grid-inn-img lazyload" src="<?php the_field('two_g_image_one'); ?>" loading="lazy" alt="belonging">
            <p class="scale-21-21-18"><?php the_field('two_g_text_one'); ?></p>
          </div>
          <div class="two-grid-inn">
            <img class="two-grid-inn-img lazyload" src="<?php the_field('two_g_image_two'); ?>" loading="lazy" alt="belonging">
            <p class="scale-21-21-18"><?php the_field('two_g_text_two'); ?></p>
          </div>
        </div>

        <div class="video-lib">
          <a href="<?php the_field('video_lib_link'); ?>" target="_blank">
            <div class="video-text-part">
              <p class="fixed-16 video-lib-title"><?php the_field('video_lib_title'); ?></p>
              <p class="fixed-14"><?php the_field('video_lib_text'); ?></p>
            </div>
            <img class="video-libimg lazyload" src="<?php the_field('video_lib_img'); ?>" loading="lazy" alt="video image">
          </a>

        </div>

        <!--  
    <div class="grid-innov-two">
        <div class="three-grid-inn">
          <p class="scale-32-24-21  nb-grid"><?php the_field('three_g_nb_one'); ?></p>
          <p class="scale-21-21-18"><?php the_field('three_g_text_one'); ?></p>

        </div>
                <div class="three-grid-inn">
          <p class="scale-32-24-21  nb-grid"><?php the_field('three_g_nb_two'); ?></p>
          <p class="scale-21-21-18"><?php the_field('three_g_text_two'); ?></p>

        </div>
                <div class="three-grid-inn">
          <p class="scale-32-24-21 nb-grid"><?php the_field('three_g_nb_three'); ?></p>
          <p class="scale-21-21-18"><?php the_field('three_g_text_three'); ?></p>
        </div>
</div>

              <a class="fixed-16 innov-cta promo-link" href="<?php the_field('innov_cta_url'); ?>" target="_blank"><?php the_field('innov_cta'); ?></a>
-->
      </div>
    </div>

    <div class="row content-row row-modern-gray-200 resources-row new-home">
      <div class="inner-wrap inner-wrap-1200">
        <h3 class="scale-36-30-24 text-center md:text-left avenir-black"><?php the_field('new_main_title'); ?></h3>
      </div>
      <div class="inner-wrap inner-wrap-1200 hz-scrollable">
        <div class="pods-wrap">
          <a href="<?php the_field('new_pod_url_one'); ?>" class="home_resources_link_wrap">
            <div class="home_resources_pod">
              <img class="home_resources_image lazyload" src="<?php the_field('new_pod_img_one'); ?>" loading="lazy" alt="Blog thumbnail image">
              <div class="home_resources_text_cell">
                <p class="fixed-16"><?php the_field('new_pod_title_one'); ?></p>
                <div class="fixed-12 text-[#999] avenir-heavy"><?php the_field('new_pod_cat_one'); ?></div>
              </div>
            </div>
          </a>


          <a href="<?php the_field('new_pod_url_two'); ?>" class="home_resources_link_wrap">
            <div class="home_resources_pod">
              <img class="home_resources_image lazyload" src="<?php the_field('new_pod_img_two'); ?>" loading="lazy" alt="Blog thumbnail image">
              <div class="home_resources_text_cell">
                <p class="fixed-16"><?php the_field('new_pod_title_two'); ?></p>
                <div class="fixed-12 text-[#999] avenir-heavy"><?php the_field('new_pod_cat_two'); ?></div>

              </div>
            </div>
          </a>


          <a href="<?php the_field('new_pod_url_three'); ?>" class="home_resources_link_wrap">
            <div class="home_resources_pod">
              <img class="home_resources_image lazyload" src="<?php the_field('new_pod_img_three'); ?>" loading="lazy" alt="Blog thumbnail image">
              <div class="home_resources_text_cell">
                <p class="fixed-16"><?php the_field('new_pod_title_three'); ?></p>
                <div class="fixed-12 text-[#999] avenir-heavy"><?php the_field('new_pod_cat_three'); ?></div>

              </div>
            </div>
          </a>

        </div>
      </div>

    </div>

    <div class="impact-section">
      <div class="inner-wrap inner-wrap-1200">
        <div class="header-impact">

          <h2 class="scale-50-40-28 avenir-black max-w-[580px] m-auto mb-[18px]"><?php the_field('impact_title'); ?></h2>
          <p class="scale-24-21-18"><?php the_field('impact_text'); ?></p>

          <div class="blue-link-16 m-auto">
            <a href="<?php the_field('impact_cta_url'); ?>" target="_blank">
              <span><?php the_field('impact_cta'); ?></span>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="UI icon/arrow_forward">
                  <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                </g>
              </svg>
            </a>
          </div>

        </div>
      </div>
      <div class="main-carousel">
        <div class="carousel-container">
          <div class="slide-impact carousel" id="home-slider">
            <?php if (have_rows('pods_wrap')):
              $i = 1;
              $x = 0;
            ?>

              <?php while (have_rows('pods_wrap')): the_row();

              ?>

                <?php
                $id = get_sub_field('pod_url');
                ?>

                <a href="<?php echo get_permalink($id); ?>" target="_blank" class="pod-impact slick-slide">


                  <div class="toppod">
                    <p class="mini-pod-title fixed-14"><?php the_sub_field('pod_title'); ?></p>
                    <img class="home_resources_image lazyload" src="<?php the_sub_field('pod_logo'); ?>" loading="lazy" alt="Blog thumbnail image">
                    <p class="pod-text fixed-14"><?php the_sub_field('pod_text'); ?></p>
                  </div>
                  <div class="pod-bt" style="background-image: url('')">
                    <img src="<?php the_sub_field("pod_bg_image"); ?>" loading="lazy" alt="Product cover thumbnail" class="lazyload">
                  </div>
                </a>
              <?php $i++;
                $x++;
              endwhile; ?>
            <?php endif; ?>
          </div>
        </div>


      </div>

    </div>

    <div class="row cta cta-dark">
      <div class="inner-wrap inner-wrap-800">

        <h2 class="scale-50-40-28"><?php the_field('cta_title'); ?></h2>
        <p class="scale-21-21-18"><?php the_field('cta_text'); ?></p>

        <div class="primary-gradient-btn m-auto">
          <a class="scale-21-21-18" href="<?php the_field('cta_url'); ?>" target="_blank">
            <span><?php the_field('cta_btn'); ?></span>
          </a>
        </div>

      </div>
      <?php get_footer(); ?>

    </div>
    <!-- -->
  </div>
</div>
</div>
</div>
</div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var scrollContentV2 = document.querySelector('.slide-quote-business');
  var scrollContainerV2 = document.querySelector('#myScrollbarContainer');

  scrollContainerV2.style.height = '6px';
  scrollContainerV2.style.background = '#ddd';
  scrollContainerV2.style.width = '95%';
  scrollContainerV2.style.maxWidth = '1200px';
  scrollContainerV2.style.margin = '0 auto';

  if (window.innerWidth <= 1024) {
    scrollContainerV2.style.maxWidth = '90%';
    scrollContainerV2.style.margin = '0 56px';
    scrollContainerV2.style.width = 'auto!important';


  }


  if (window.innerWidth <= 765) {
    scrollContainerV2.style.maxWidth = '90%';
    scrollContainerV2.style.margin = '0 56px';
    scrollContainerV2.style.width = 'auto!important';


  }


  if (window.innerWidth <= 640) {
    scrollContainerV2.style.maxWidth = '90%';
    scrollContainerV2.style.margin = '0 32px';
    scrollContainerV2.style.width = 'auto!important';

  }

  var scrollbarV2 = document.createElement('div');

  scrollbarV2.style.background = 'linear-gradient(270deg, #105FFB 0.16%, #A15AF0 99.82%)';
  scrollbarV2.style.height = '6px';
  scrollbarV2.style.position = 'absolute';

  scrollContainerV2.appendChild(scrollbarV2);

  function updateScrollbarV2() {
    var scrollWidthV2 = scrollContentV2.scrollWidth;
    var scrollLeftV2 = scrollContentV2.scrollLeft;
    var clientWidthV2 = scrollContentV2.clientWidth;
    var scrollbarWidthV2 = clientWidthV2 / scrollWidthV2 * scrollContainerV2.clientWidth;
    var scrollbarLeftV2 = scrollLeftV2 / scrollWidthV2 * scrollContainerV2.clientWidth;

    scrollbarV2.style.width = scrollbarWidthV2 + 'px';
    scrollbarV2.style.left = scrollbarLeftV2 + 'px';
  }

  scrollContentV2.addEventListener('scroll', updateScrollbarV2);

  scrollbarV2.addEventListener('mousedown', function(e) {
    var startXV2 = e.pageX;
    var scrollbarStartXV2 = scrollbarV2.offsetLeft;

    function onMouseMoveV2(e) {
      var currentXV2 = e.pageX;
      var diffXV2 = currentXV2 - startXV2;
      var newScrollLeftV2 = (diffXV2 / scrollContainerV2.clientWidth) * scrollContentV2.scrollWidth;

      scrollContentV2.scrollLeft = newScrollLeftV2 + scrollbarStartXV2 * (scrollContentV2.scrollWidth / scrollContainerV2.clientWidth);
    }

    document.addEventListener('mousemove', onMouseMoveV2);

    document.addEventListener('mouseup', function() {
      document.removeEventListener('mousemove', onMouseMoveV2);
    }, {
      once: true
    });
  }, {
    passive: true
  });

  updateScrollbarV2();
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  function handleTickInit(e) {
    var a = Tick.helper.duration(1, "seconds"),
      n = Tick.helper.date("2024-06-01");
    Tick.helper.interval(function() {
      var r = (Date.now() - n) / a;
      r = Math.floor(r);
      var t = Math.round(10 * Math.random());
      e.value = 2.175e10 + 210 * r + t
    }, 1e3)
  }
</script>



<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(document).ready(function() {

    jQuery('#home-slider').slick({

      autoplay: true,
      autoplaySpeed: 4000,
      touchMove: false,
      pauseOnHover: true,
      pauseOnFocus: false,
      pauseOnDotsHover: false,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: false,
      centerMode: true,
      variableWidth: true,

      responsive: [

        {
          breakpoint: 1300,
          settings: {
            slidesToShow: 3,
            centerMode: true
          }
        }, {
          breakpoint: 820,
          settings: {
            slidesToShow: 3,
            centerMode: true,
            centerPadding: "0"
          }
        }, {
          breakpoint: 725,
          settings: {
            slidesToShow: 1,
            centerMode: true
          }
        }
      ]


    });


  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.intersectionRatio > 0) {
          entry.target.classList.add('animate-in');
        }
      });
    }, {
      threshold: 0
    });

    // Observe les éléments avec les classes gauche, droite, et bottom
    document.querySelectorAll('.gauche, .droite, .bottom-main').forEach((element) => {
      observer.observe(element);
    });
  });
</script>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  window.addEventListener("scroll", function() {
    var minWidth;
    var scroll = window.pageYOffset || document.documentElement.scrollTop;
    var videoContainer = document.querySelector('.video-foreground');
    var videoradius = document.querySelector('.sticky-vid');

    // Check the window's width and set minWidth accordingly
    if (window.innerWidth < 1024) {
      minWidth = 92;
    } else {
      minWidth = 80;
    }

    // Adjust the calculation as needed.
    var newWidth = Math.min(100, minWidth + scroll * 0.05);

    videoContainer.style.width = newWidth + 'vw';
    videoContainer.style.left = ((100 - newWidth) / 2) + 'vw'; // To keep the video centered with the new width

    if (newWidth === 100) {
      videoradius.style.borderRadius = 'unset';
      videoContainer.classList.add('changed-radius');
      videoContainer.classList.remove('rounded');
    } else {
      videoradius.style.borderRadius = '40px';
      videoContainer.classList.add('rounded');
      videoContainer.classList.remove('changed-radius');
    }


  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(document).ready(function() {
    function checkIfInView() {
      const navbarHeight = 56;
      const windowHeight = jQuery(window).height();
      const windowTopPosition = jQuery(window).scrollTop() + navbarHeight;
      const windowBottomPosition = (windowTopPosition + windowHeight - navbarHeight);

      jQuery('.fade').each(function() {
        const element = jQuery(this);
        const elementHeight = jQuery(this).outerHeight();
        const elementTopPosition = jQuery(this).offset().top;
        const elementBottomPosition = (elementTopPosition + elementHeight);

        if ((elementBottomPosition >= windowTopPosition) &&
          (elementTopPosition <= windowBottomPosition)) {
          element.addClass('is-visible');
        } else {
          element.removeClass('is-visible');
        }
      });
    }

    jQuery(window).on('scroll', checkIfInView);
    jQuery(window).on('resize', checkIfInView);
    checkIfInView();
  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  document.addEventListener("scroll", function() {
    const content = document.querySelectorAll('.fade');

    const startTransitionPoint = window.innerHeight * 0.35; // 35vh
    const endTransitionPoint = window.innerHeight * 0.65; // 65vh
    const holdDistance = window.innerHeight * 0.1; // 10vh

    const midStart = startTransitionPoint + ((endTransitionPoint - startTransitionPoint) - holdDistance) / 2;
    const midEnd = midStart + holdDistance;

    content.forEach((contentItem) => {

      const bounding = contentItem.getBoundingClientRect();
      const elementCenter = bounding.top + (bounding.height / 2);

      let opacity = 0;

      if (elementCenter >= startTransitionPoint && elementCenter < midStart) {
        // Fade in phase
        opacity = (elementCenter - startTransitionPoint) / (midStart - startTransitionPoint);
      } else if (elementCenter >= midStart && elementCenter <= midEnd) {
        // Hold phase
        opacity = 1;
      } else if (elementCenter > midEnd && elementCenter <= endTransitionPoint) {
        // Fade out phase
        opacity = 1 - (elementCenter - midEnd) / (endTransitionPoint - midEnd);
      }

      opacity = Math.min(Math.max(opacity, 0), 1);

      contentItem.style.opacity = opacity;

    });


  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  let container = document.querySelector(".business-section");
  let hzScrollSection = document.querySelector("#content-slide");
  let isHorizontalScrollFinished = false;

  container.addEventListener("wheel", function(e) {
    if (!isHorizontalScrollFinished) {
      // If the horizontal scroll is not finished, scroll horizontally
      hzScrollSection.scrollLeft += e.deltaY;

      let contentWidth = hzScrollSection.scrollWidth - hzScrollSection.clientWidth;

      // Check if horizontal scroll reached the end
      if (hzScrollSection.scrollLeft >= contentWidth) {
        isHorizontalScrollFinished = true;
      }
      // Prevent default vertical scroll
      e.preventDefault();
    }
  }, {
    passive: false
  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
	document.addEventListener("DOMContentLoaded", function () {
	const navPlaceholder = document.getElementById("render-delay-content");
	if (navPlaceholder) {
		navPlaceholder.style.display = "block";
	}
});
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.addEventListener("DOMContentLoaded", function() {
    const video = document.getElementById('innov-video');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const source = video.querySelector('source');
                video.src = source.dataset.src;
                video.load();
                observer.unobserve(video);
            }
        });
    }, { rootMargin: '50px' });

    observer.observe(video);
});
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  document.addEventListener("DOMContentLoaded", function() {
    const video = document.getElementById('background-video');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const source = video.querySelector('source');
                video.src = source.dataset.src;
                video.load();
                observer.unobserve(video);
            }
        });
    }, { rootMargin: '50px' });

    observer.observe(video);
  });
</script>