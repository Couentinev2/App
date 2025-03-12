<?php
/*
Template Name: DEI Page
*/
?>
<?php get_header(); ?>


<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/dei-page.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/simple-grid-video.css' type='text/css' media='' />

<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script delay src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script delay src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="dei-page">
  <div class="hero-center row" style="background-image :linear-gradient(90deg, #099AC6 0%, rgba(37, 42, 58, 0.08) 100%), url('<?php the_field('hero_center_image'); ?>');">
    <div class="inner-wrap inner-wrap-1200">
      <div class="hero-div1">

        <h1 class="scale-60-50-32"><?php the_field('hero_title'); ?></h1>
        <p class="scale-21-21-18"><?php the_field('hero_text'); ?></p>
        <div class="left-hero">
        </div>
      </div>
    </div>
  </div>

  <div class="workplace-section">
    <div class="inner-wrap inner-wrap-1200">
      <div class="workplace-header">
        <h2 class="scale-36-30-24"><?php the_field('workplace_title'); ?></h2>
        <p class="scale-21-21-18"><?php the_field('workplace_text'); ?></p>
      </div>
      <div class="workplace-grid">
        <div class="img-grid">
          <img src="<?php the_field('workplace_grid_img'); ?>" alt="">
        </div>
        <div class="txt-grid">
          <h3 class="scale-32-24-21"><?php the_field('workplace_grid_title'); ?></h3>
          <p class="scale-18-18-16"><?php the_field('workplace_grid_text'); ?></p>
        </div>
      </div>
    </div>
  </div>



  <div class="belonging-section">
    <div class="inner-wrap inner-wrap-1200">
      <h2 class="scale-36-30-24"><?php the_field('belonging_title'); ?></h2>
    </div>

    <div class="slide-part">
      <img class="img-responsive belonging-1" src="<?php the_field('belonging_grid_img_one'); ?>" alt="belonging">
      <img class="img-responsive belonging-2" src="<?php the_field('belonging_grid_img_two'); ?>" alt="belonging">
      <img class="img-responsive belonging-3" src="<?php the_field('belonging_grid_img_three'); ?>" alt="belonging">
      <img class="img-responsive belonging-4" src="<?php the_field('belonging_grid_img_four'); ?>" alt="belonging">

    </div>
    <div class="inner-wrap inner-wrap-1200">

      <div class="belong-grid">
        <div class="belonging-stat">
          <h3 class="scale-18-18-16"><?php the_field('belonging_grid_title_one'); ?></h3>
          <p class="fixed-16"><?php the_field('belonging_grid_text_one'); ?></p>
        </div>
        <div class="belonging-stat">
          <h3 class="scale-18-18-16"><?php the_field('belonging_grid_title_two'); ?></h3>
          <p class="fixed-16"><?php the_field('belonging_grid_text_two'); ?></p>
        </div>
        <div class="belonging-stat">
          <h3 class="scale-18-18-16"><?php the_field('belonging_grid_title_three'); ?></h3>
          <p class="fixed-16"><?php the_field('belonging_grid_text_three'); ?></p>
        </div>
      </div>

    </div>
  </div>
  <div class="section-break" style="background-image: url('../wp-content/themes/applovin/images/img_dei_best_talent.jpg');">>
  </div>

  <div class="business-section">
    <div class="inner-wrap inner-wrap-1200">
      <div class="business-header">

        <h2 class="scale-36-30-24"><?php the_field('business_title'); ?></h2>
        <p class="scale-21-21-18"><?php the_field('business_text'); ?></p>
      </div>
    </div>
    <div class="slide-quote-container" id="content-slide">
      <div class="slide-quote slide-quote-business inner-wrap inner-wrap-1200">
        <?php if (have_rows('business_slideshow')): ?>
          <?php while (have_rows('business_slideshow')): the_row(); ?>

            <div class="slide-quote-solo">
              <img class="slide-quote-image" src="<?php the_sub_field('quote_img'); ?>" alt="belonging">
              <div class="quote-text">
                <p class="scale-21-21-18 quote-title"><?php the_sub_field('quote_title'); ?></p>
                <p class="scale-18-18-16 q-description"><?php the_sub_field('quote_text'); ?></p>
              </div>
            </div>

          <?php endwhile; ?>

        <?php endif; ?>

      </div>
    </div>
  </div>



  <div class="community-section" style="background-image : url('<?php the_field('community_center_image_grad'); ?>') ;">

    <div class="community-section-bg" style="background-image : linear-gradient(180deg, rgba(24, 22, 37, 0.25) 0%, #181625 85%), url('<?php the_field('community_center_image'); ?>')">
      <div class="inner-wrap inner-wrap-1200">
        <div class="community-header">

          <h2 class="scale-36-30-24"><?php the_field('community_title'); ?></h2>
          <p class="scale-21-21-18"><?php the_field('community_text'); ?></p>

          <a href="../esg?_gl=1*172zvrs*_ga*MTI4ODk3NzYyNS4xNjk3NjUwMzkz*_ga_0JQJREV5DQ*MTY5NzY3MTQ3My4zLjEuMTY5NzY3MTQ5MS40Mi4wLjA." class="promo-link scale-18-18-16" target="_blank">Learn about our ESG commitment</a>
        </div>
      </div>
    </div>

    <div class="inner-wrap inner-wrap-1200">
      <div class="video-grid">
        <div class="grid-text">

          <h3 class="scale-32-24-21"><?php the_field('community_grid_title'); ?></h3>
          <p class="scale-21-21-18"><?php the_field('community_grid_text'); ?></p>
          <a href="../cares?_gl=1*172zvrs*_ga*MTI4ODk3NzYyNS4xNjk3NjUwMzkz*_ga_0JQJREV5DQ*MTY5NzY3MTQ3My4zLjEuMTY5NzY3MTQ5MS40Mi4wLjA." class="promo-link scale-18-18-16" target="_blank">Explore AppLovin Cares</a>

        </div>
        <div class="grid-video">
          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/<?php the_field('youtube_video_number'); ?>?autoplay=1&rel=0&enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          </iframe>
        </div>
      </div>
    </div>

    <div class="community-pictures">

      <?php if (have_rows('community_slideshow')): ?>
        <?php while (have_rows('community_slideshow')): the_row(); ?>
          <img class="community-image" src="<?php the_sub_field('community_img'); ?>" alt="belonging">

        <?php endwhile; ?>

      <?php endif; ?>
    </div>

  </div>


  <div class="ressource-section">
    <div class="inner-wrap inner-wrap-1200">
      <p class="mini-title fixed-14"><?php the_field('ressource_mini_title'); ?></p>

      <h2 class="scale-36-30-24 resource-main"><?php the_field('ressource_title'); ?></h2>
    </div>

    <div class="inner-wrap inner-wrap-1200 hz-scrollable">
      <div class="inside-al-grid">
        <a href="<?php the_field('ressource_pod_link_one'); ?>" class="inside-al-pod-link" target="_blank">
          <div class="inside-al-pod" style="background-image:url('<?php the_field('ressource_pod_img_one'); ?>');">
            <div>
              <p class="fixed-12"><?php the_field('ressource_pod_title_one'); ?></p>
              <p class="scale-18-18-16"><?php the_field('ressource_pod_txt_one'); ?></p>
            </div>
          </div>
        </a>
        <a href="<?php the_field('ressource_pod_link_two'); ?>" class="inside-al-pod-link" target="_blank">
          <div class="inside-al-pod" style="background-image:url('<?php the_field('ressource_pod_img_two'); ?>');">
            <div>
              <p class="fixed-12"><?php the_field('ressource_pod_title_two'); ?></p>
              <p class="scale-18-18-16"><?php the_field('ressource_pod_txt_two'); ?></p>
            </div>
          </div>
        </a>
        <a href="<?php the_field('ressource_pod_link_three'); ?>" class="inside-al-pod-link" target="_blank">
          <div class="inside-al-pod last-inside-al" style="background-image:url('<?php the_field('ressource_pod_img_three'); ?>');">
            <div>
              <p class="fixed-12"><?php the_field('ressource_pod_title_three'); ?></p>
              <p class="scale-18-18-16"><?php the_field('ressource_pod_txt_three'); ?></p>
            </div>
          </div>
        </a>
      </div>


    </div>

  </div>

  <div class="row cta">
    <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
      <svg class="m-auto" width="176" height="32" viewBox="0 0 176 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M61.2449 25.6189L59.8833 21.5969H52.3665C52.1594 22.2181 51.9398 22.8957 51.7139 23.6236L51.0928 25.6189H47.4473L54.1798 6.97729H58.0888L64.6457 25.6189H61.2449ZM56.1124 11.0306C55.6606 12.2981 55.2214 13.5216 54.8073 14.7138C54.3931 15.9059 53.9351 17.1671 53.4457 18.5098H58.8041L56.1124 11.0306Z" fill="black" />
        <path d="M75.5826 7.04004H68.7246V25.6628H71.8932V19.3193H75.5826C79.3411 19.3193 81.167 17.7381 81.167 14.4816V11.8463C81.167 8.60867 79.3411 7.04004 75.5826 7.04004ZM71.8932 9.97023H75.5074C77.6532 9.97023 77.9983 10.5349 77.9983 11.8777V14.4879C77.9983 15.8055 77.6407 16.3953 75.5074 16.3953H71.8932V9.97023Z" fill="black" />
        <path d="M91.6891 7.04004H84.8311V25.6628H87.9997V19.3193H91.6891C95.4475 19.3193 97.2734 17.7381 97.2734 14.4816V11.8463C97.2734 8.60867 95.4475 7.04004 91.6891 7.04004ZM87.9997 9.97023H91.6138C93.7597 9.97023 94.1048 10.5349 94.1048 11.8777V14.4879C94.1048 15.8055 93.7471 16.3953 91.6138 16.3953H87.9997V9.97023Z" fill="black" />
        <path d="M106.648 23.7992H115.25V25.6628H104.771V7.05884H106.648V23.7992Z" fill="black" />
        <path d="M131.727 20.2478C131.727 23.3474 129.801 25.8949 124.994 25.8949C120.188 25.8949 118.262 23.3537 118.262 20.2478V12.367C118.262 9.26742 120.188 6.71997 124.994 6.71997C129.801 6.71997 131.727 9.26115 131.727 12.367V20.2478ZM120.006 20.2729C120.006 22.9459 121.637 24.4455 125.063 24.4455C128.489 24.4455 130.114 22.9459 130.114 20.2729V12.3419C130.114 9.66899 128.483 8.16938 125.063 8.16938C121.637 8.16938 120.006 9.66899 120.006 12.3419V20.2729Z" fill="black" />
        <path d="M134.582 7.05884H136.446L142.463 23.7992L148.493 7.05884H150.4L143.711 25.669H141.239L134.582 7.05884Z" fill="black" />
        <path d="M156.172 25.669H154.296V7.05884H156.172V25.669Z" fill="black" />
        <path d="M165.164 9.29884V25.669H163.4V7.05884H166.167L174.268 22.9835V7.05884H176.031V25.669H173.791L165.164 9.29884Z" fill="black" />
        <path d="M33.3927 23.2095C31.0648 23.2095 29.1699 25.1044 29.1699 27.4322C29.1699 29.7601 31.0648 31.655 33.3927 31.655C35.7205 31.655 37.6154 29.7601 37.6154 27.4322C37.6154 25.1106 35.7205 23.2095 33.3927 23.2095ZM35.8899 27.4385C35.8899 28.8189 34.7668 29.9357 33.3927 29.9357C32.0123 29.9357 30.8954 28.8126 30.8954 27.4385C30.8954 26.0581 32.0185 24.9412 33.3927 24.9412C34.7668 24.9412 35.8899 26.0581 35.8899 27.4385Z" fill="black" />
        <path d="M4.7872 23.2095C2.45935 23.2095 0.564453 25.1044 0.564453 27.4322C0.564453 29.7601 2.45935 31.655 4.7872 31.655C7.11504 31.655 9.00994 29.7601 9.00994 27.4322C9.00994 25.1106 7.11504 23.2095 4.7872 23.2095ZM7.28445 27.4385C7.28445 28.8189 6.16132 29.9357 4.7872 29.9357C3.40681 29.9357 2.28994 28.8126 2.28994 27.4385C2.28994 26.0581 3.41308 24.9412 4.7872 24.9412C6.16132 24.9412 7.28445 26.0581 7.28445 27.4385Z" fill="black" />
        <path d="M19.087 0.0690918C16.7592 0.0690918 14.8643 1.96399 14.8643 4.29184C14.8643 6.61968 16.7592 8.51458 19.087 8.51458C21.4148 8.51458 23.3097 6.61968 23.3097 4.29184C23.3097 1.96399 21.4148 0.0690918 19.087 0.0690918ZM21.5843 4.29811C21.5843 5.6785 20.4611 6.79537 19.087 6.79537C17.7066 6.79537 16.5897 5.67223 16.5897 4.29811C16.5897 2.91772 17.7129 1.80083 19.087 1.80083C20.4674 1.79458 21.5843 2.91772 21.5843 4.29811Z" fill="black" />
        <path d="M31.8303 23.68L22.5001 6.88311L22.4123 6.71997L22.2931 6.86428C21.9731 7.26585 21.5778 7.58585 21.1323 7.83056L21.0193 7.8933L21.0821 8.00625L29.3393 22.8768C26.4593 22.2306 22.8766 21.8792 19.206 21.8792C15.159 21.8792 11.5637 22.2243 8.77777 22.8706L17.035 8.00625L17.0978 7.8933L16.9848 7.83056C16.5331 7.59213 16.144 7.26585 15.824 6.86428L15.7048 6.71997L15.617 6.88311L6.29307 23.68L6.21777 23.8117L6.35581 23.8619C6.81385 24.0188 7.23424 24.5898 7.60444 24.916L7.66719 24.9725L7.74248 24.9349L7.77385 24.9286C10.748 24.1066 14.7072 23.6674 19.2123 23.6674C23.2656 23.6674 27.1997 24.1129 30.2993 24.9223L30.3621 25.0415L30.4813 24.9474L30.5064 24.9286C30.8829 24.5961 31.3033 24.0251 31.7613 23.8682L31.8993 23.818L31.8303 23.68Z" fill="black" />
      </svg>

      <h3 class="scale-36-30-24"><?php the_field('cta_title'); ?></h3>
      <div class="primary-gradient-btn m-auto">
        <a class="scale-21-21-18" href="<?php the_field('cta_btn_link'); ?>" target="_blank">
          <span><?php the_field('cta_btn'); ?></span>
        </a>
      </div>
    </div>
  </div>



</div>



<?php get_footer(); ?>