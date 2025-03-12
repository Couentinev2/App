<?php
/*
Template Name: ESG Page
*/
?>


<?php get_header(); ?>
<script delay src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script delay src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/section-with-tabs.css' type='text/css' media='' />


<div class="esg-page">
  <div class="hero-center row" style="background-image :url('<?php the_field('hero_pod_image'); ?>'),url('<?php the_field('hero_center_blur'); ?>');  ;">
    <div class="inner-wrap inner-wrap-1200">
      <div class="hero-grid">
        <div class="hero-text-wrap">
          <p class="mini-title fixed-14"><?php the_field('main_mini_title'); ?></p>
          <h1 class="scale-60-50-32 main-hero-title"><?php the_field('header_title'); ?></h1>
          <p class="scale-21-21-18  main-hero-text"><?php the_field('header_text'); ?></p>

          <div class="hero-report">
            <div class="report-image">
              <img src="<?php the_field('hero_report_image'); ?>" alt="<?php the_field('hero_report_alt'); ?> Image">
            </div>
            <div class="report-text">
              <h3 class="fixed-16"><?php the_field('hero_report_title'); ?></h3>
              <p class="fixed-14"><?php the_field('hero_report_text'); ?></p>
            </div>
          </div>

        </div>
        <div class="hero-image">
        </div>
      </div>
    </div>
  </div>

  <div class="social-intro">
    <div class="inner-wrap inner-wrap-1200">
      <p class="mini-title scale-18-18-16"><?php the_field('social_title'); ?></p>
      <h2 class="scale-36-30-24"><?php the_field('social_text'); ?></h2>

    </div>
  </div>

  <div class="dei-section">
    <div class="inner-wrap inner-wrap-1200">
      <div class="dei-grid">
        <div class="dei-image">
          <img class="dei-image" src="<?php the_field('dei_image'); ?>" alt="<?php the_field('dei_alt'); ?> Image">

        </div>
        <div class="deit-text">
          <h2 class="scale-32-24-21"><?php the_field('dei_text'); ?></h2>

          <p class="scale-18-18-16"><?php the_field('dei_title'); ?></p>
          <div class="slate-link-16">
            <a href="<?php the_field('dei_url_link'); ?>" target="_blank">
              <span><?php the_field('dei_url_text'); ?></span>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="UI icon/arrow_forward">
                  <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                </g>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="culture-section">
    <div class="inner-wrap inner-wrap-1200">
      <div class="culture-grid">

        <div class="culture-text">
          <h2 class="scale-32-24-21">Our Culture</h2>
          <p class="scale-18-18-16">We foster a culture of innovation and collaboration.</p>
          <a class="promo-link scale-18-18-16" href="/careers">Join our team</a>
        </div>

        <div class="culture-images">
          <?php
          require_once get_template_directory() . '/template-modules/icon-text-item.php';
          render_icon_text_items('culture');
          ?>
        </div>
      </div>
    </div>
  </div>




  <div class="row content-row esg-slide">
    <div class="inner-wrap inner-wrap-1200">
      <div class="slide-grid">

        <div class="slide-part">
          <div class="slideshow">
            <?php if (have_rows('image_slideshow')): ?>
              <?php while (have_rows('image_slideshow')): the_row(); ?>
                <img class="slide" src="<?php the_sub_field('pod_image'); ?>" alt="<?php the_sub_field('pod_title'); ?> Image">

              <?php endwhile; ?>

            <?php endif; ?>

          </div>
          <div class="pagi">
            <!-- Dots will be added here with jQuery -->
          </div>
        </div>
        <div class="text-part">
          <h3 class=" scale-32-24-21"><?php the_field('slide_title'); ?></h3>
          <p class="scale-18-18-16"><?php the_field('slide_text'); ?></p>

          <div class="list-section">
            <div class="first-list">
              <p class="scale-21-21-18 title-ul"><?php the_field('first_list_title'); ?></p>
              <ul>
                <?php if (have_rows('first_list_slideshow')): ?>
                  <?php while (have_rows('first_list_slideshow')): the_row(); ?>
                    <li> <a class="scale-18-18-16" href="<?php the_sub_field('list_one_url'); ?>"><?php the_sub_field('list_one'); ?></a></li>

                  <?php endwhile; ?>

                <?php endif; ?>

              </ul>
            </div>
            <div class="second-list">
              <p class="scale-21-21-18 title-ul"><?php the_field('second_list_title'); ?></p>
              <ul>
                <?php if (have_rows('second_list_slideshow')): ?>
                  <?php while (have_rows('second_list_slideshow')): the_row(); ?>
                    <li> <a class="scale-18-18-16" href="<?php the_sub_field('list_two_url'); ?>"><?php the_sub_field('list_two'); ?></a></li>

                  <?php endwhile; ?>

                <?php endif; ?>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="community-section">
    <div class="inner-wrap inner-wrap-1200">
      <div class="community-grid">

        <div class="community-text">

          <h2 class="scale-21-21-18"><?php the_field('community_title'); ?></h2>

          <p class="scale-18-18-16"><?php the_field('community_text'); ?></p>
        </div>

        <div class="community-image">

          <?php if (have_rows('community_part')): ?>
            <?php while (have_rows('community_part')): the_row(); ?>
              <div class="community">
                <img class="community-image" src="<?php the_sub_field('community_image'); ?>" alt="<?php the_sub_field('community_alt'); ?> Image">
                <div>
                  <h3 class="scale-21-21-18"><?php the_sub_field('community_list_title'); ?></h3>
                  <p class="fixed-16"><?php the_sub_field('community_text'); ?></p>
                </div>
              </div>


            <?php endwhile; ?>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <div class="partners-logos">
    <div class="logos-section">
      <picture>
        <source class="partner-logos-bar" srcset="<?php the_field('logo_bar_mobile'); ?>" media="(max-width: 640px)">
        <source class="partner-logos-bar" srcset="<?php the_field('logo_bar_tablet'); ?>" media="(max-width: 1000px)">
        <img class="partner-logos-bar" src="<?php the_field('logo_bar_desktop'); ?>" alt="Results stats">
      </picture>
    </div>
  </div>

  <div class="simple-quote-section">
    <div class="quote-grid">

      <div class="quote-image">
        <img src="<?php the_field('quote_image'); ?>">
      </div>
      <div class="text-white max-w-[600px] mr-auto p-[32px]">
        <p class="scale-24-21-18 pt-[24px]"><?php the_field('quote_text'); ?></p>
        <div class="quote-info">
          <div>
            <p class="scale-18-18-16 quote-name"><?php the_field('quote_speaker'); ?></p>
            <p class="fixed-14 quote-title"><?php the_field('quote_speaker_title'); ?></p>

          </div>
          <img src="<?php the_field('quote_logo'); ?>">
        </div>
      </div>
    </div>

  </div>

  <div class="row content-row row-modern-gray-200 resources-row">
    <div class="inner-wrap inner-wrap-1200 ">
      <p class="mini-title scale-18-18-16"><?php the_field('community_mini_title'); ?></p>

      <h3 class="scale-36-30-24"><?php the_field('ressources_text'); ?></h3>
    </div>
    <div class="inner-wrap inner-wrap-1200 hz-scrollable">
      <div class="pods-wrap">

        <a href="<?php the_field('pod_link_one'); ?>" class="home_resources_link_wrap">
          <div class="home_resources_pod">
            <img class="home_resources_image" src="<?php the_field('pod_img_one'); ?>" loading="lazy" alt="thumbnail image">
            <div class="home_resources_text_cell">
              <h6 class="fixed-12"><?php the_field('pod_title_one'); ?></h6>
              <p class="scale-18-18-16"><?php the_field('pod_text_one'); ?></p>
            </div>
          </div>
        </a>


        <a href="<?php the_field('pod_link_two'); ?>" class="home_resources_link_wrap">
          <div class="home_resources_pod">
            <img class="home_resources_image" src="<?php the_field('pod_img_two'); ?>" loading="lazy" alt="thumbnail image">
            <div class="home_resources_text_cell">
              <h6 class="fixed-12"><?php the_field('pod_title_two'); ?></h6>
              <p class="scale-18-18-16"><?php the_field('pod_text_two'); ?></p>
            </div>
          </div>
        </a>



        <a href="<?php the_field('pod_link_three'); ?>" class="home_resources_link_wrap">
          <div class="home_resources_pod home_resources_pod_last">
            <img class="home_resources_image" src="<?php the_field('pod_img_three'); ?>" loading="lazy" alt="thumbnail image">
            <div class="home_resources_text_cell">
              <h6 class="fixed-12"><?php the_field('pod_title_three'); ?></h6>
              <p class="scale-18-18-16"><?php the_field('pod_text_three'); ?></p>
            </div>
          </div>
        </a>



      </div>
    </div>

  </div>


  <div class="tabs-section">
    <div class="inner-wrap inner-wrap-1200 intro-tabs">
      <p class="scale-18-18-16 mini-title-section" id="<?php the_field('anchor_link_tabs'); ?>">
        <?php the_field('mini_title_section_tabs'); ?>
      </p>
      <h1 class="scale-36-30-24 tab-main-title">
        <?php the_field('simple_title_tabs'); ?>
      </h1>
      <p class="scale-21-21-1 tab-main-text">
        <?php the_field('simple_text_tabs'); ?>
      </p>

    </div>
    <div id="tabs2">
      <div class="inner-wrap inner-wrap-1200 tabs-wrap hz-scrollable">
        <ul>
          <?php $num = 1; ?>
          <?php if (have_rows('tabs_wrap')): ?>
            <?php while (have_rows('tabs_wrap')): the_row(); ?>
              <li><a class="fixed-14 tabs-title" href="#tabs2-<?php echo $num; ?>">
                  <?php the_sub_field('tab_menu_title'); ?>
                </a></li>
              <?php $num += 1; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="inner-wrap inner-wrap-1200">

        <?php $numnbis = 1; ?>
        <?php if (have_rows('tabs_wrap')): ?>
          <?php while (have_rows('tabs_wrap')): the_row(); ?>
            <div id="tabs2-<?php echo $numnbis; ?>" class="tab-grid main-second-part-tab">
              <div class="left-text ">
                <p class="scale-21-21-18 tabs-rep-title"><?php the_sub_field('tab_title'); ?></p>
                <p class="scale-18-18-16 tabs-rep-text"><?php the_sub_field('tab_text'); ?></p>
              </div>
              <div class="right-img">
                <img class="right-image" src="<?php the_sub_field('tab_img'); ?>" alt="<?php the_sub_field('tab_alt'); ?> Image">
              </div>
            </div>
            <?php $numnbis += 1; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>


  <div class="tabs-section tab-second">
    <div class="inner-wrap-1200">
      <div class="intro-tabs">
        <p class="scale-18-18-16 mini-title-section" id="<?php the_field('anchor_link_tabs_two'); ?>">
          <?php the_field('mini_title_section_tabs_two'); ?>
        </p>
        <h1 class="scale-36-30-24 tab-main-title">
          <?php the_field('simple_title_tabs_two'); ?>
        </h1>
        <p class="scale-21-21-1 tab-main-text">
          <?php the_field('simple_text_tabs_two'); ?>
        </p>
      </div>
      <div id="tabs2">
        <div class="tabs-wrap hz-scrollable">
          <ul>

            <?php $num = 1; ?>
            <?php if (have_rows('tabs_wrap_two')): ?>
              <?php while (have_rows('tabs_wrap_two')): the_row(); ?>
                <li><a class="fixed-14 tabs-title" href="#tabs-2-<?php echo $num; ?>"><?php the_sub_field('tab_menu_title_two'); ?></a></li>
                <?php $num += 1; ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
        <?php $numnbis = 1; ?>
        <?php if (have_rows('tabs_wrap_two')): ?>
          <?php while (have_rows('tabs_wrap_two')): the_row(); ?>
            <div id="tabs-2-<?php echo $numnbis; ?>" class="tab-grid main-second-part-tab main-second-part-tab-bis">
              <div class="left-text">
                <p class="scale-21-21-18 tabs-rep-title"><?php the_sub_field('tab_title_two'); ?></p>
                <p class="scale-18-18-16"><?php the_sub_field('tab_text_two'); ?></p>
                <?php if (get_sub_field('tab_title_two') === 'LEED Rating') : ?>
                <div class="slate-link-16">
                  <a href="/wp-content/uploads/2022/01/1100-Page-Mill-Palo-Alto-B2-Final-Scorecard.pdf" target="_blank">
                    <span>View LEED Rating Report</span>
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="UI icon/arrow_forward">
                        <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                      </g>
                    </svg>
                  </a>
                </div>
                <?php endif; ?>
              </div>
              <div class="right-img">

                <img class="right-image" src="<?php the_sub_field('tab_img_two'); ?>" alt="<?php the_sub_field('tab_two_alt'); ?> Image">

              </div>
            </div>
            <?php $numnbis += 1; ?>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>

  </div>



</div>
<div class="row content-row-short esg-bottom">
  <div class="inner-wrap-1200">
    <p class="fixed-12"><?php the_field('bottom_text'); ?></p>
  </div>
</div>




<?php get_footer(); ?>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(function() {
    // Initially set up the slides
    var $slides = jQuery('.slide');
    $slides.first().addClass('active');
    $slides.last().addClass('prev');
    $slides.eq(1).addClass('next');

    // Set up the dots
    $slides.each(function(i) {
      var $dot = jQuery('<div>').addClass('dot').attr('data-index', i);
      jQuery('.pagi').append($dot);
    });

    jQuery('.dot').first().addClass('active');

    var slideInterval;

    function setSlides() {
      var $active = jQuery('.slide.active');
      var $next = $active.next('.slide').length ? $active.next('.slide') : jQuery('.slide:first');
      var $prev = $active.prev('.slide').length ? $active.prev('.slide') : jQuery('.slide:last');

      $slides.removeClass('active prev next');
      $active.addClass('prev');
      $next.addClass('active');

      var $next2 = $next.next('.slide').length ? $next.next('.slide') : jQuery('.slide:first');

      $next2.addClass('next');

      jQuery('.dot').removeClass('active').eq($next.index()).addClass('active');
    }


    function prevSlide() {
      var $active = jQuery('.slide.active');
      var $next = $active.next('.slide').length ? $active.next('.slide') : jQuery('.slide:first');
      var $prev = $active.prev('.slide').length ? $active.prev('.slide') : jQuery('.slide:last');

      $slides.removeClass('active prev next');
      $active.addClass('next');
      $prev.addClass('active');

      var $prev2 = $prev.prev('.slide').length ? $prev.prev('.slide') : jQuery('.slide:last');

      $prev2.addClass('prev');

      jQuery('.dot').removeClass('active').eq($prev.index()).addClass('active');
    }


    function resetInterval() {
      clearInterval(slideInterval);
      slideInterval = setInterval(setSlides, 5000);
    }

    // Click event handlers
    jQuery('.slideshow').on('click', '.next', function() {
      setSlides();
      resetInterval();
    });

    jQuery('.slideshow').on('click', '.prev', function() {
      prevSlide();
      resetInterval();
    });

    jQuery('.pagi').on('click', '.dot', function() {
      var index = $(this).attr('data-index');
      $slides.removeClass('active prev next');
      $slides.eq(index).addClass('active');
      $slides.eq((index - 1 + $slides.length) % $slides.length).addClass('prev');
      $slides.eq((index + 1) % $slides.length).addClass('next');
      jQuery('.dot').removeClass('active');
      jQuery(this).addClass('active');
      resetInterval();
    });

    // Start slide rotation
    resetInterval();
  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(function() {
    jQuery("#tabs, #tabs2").tabs();
  });
</script>