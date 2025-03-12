<?php
/*
Template Name: MAX Page
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script delay src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script delay src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/hero-center-text.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/single-separation.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/results-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/single-grid.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/simple-grid-with-four.css' type='text/css' media='' />

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/section-with-tabs.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/simple-grid-video.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/slide-quote-simple.css' type='text/css' media='' />

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/cta-basic.css' type='text/css' media='' />

<div class="contentPage">

  <?php $langDetect = get_language_attributes(); ?>

  <div id="page-max">


    <?php include('pagessections/hero-center-text.php'); ?>
    <?php include('pagessections/single-separation.php'); ?>
    <?php include('pagessections/result-section-solution.php'); ?>
    <?php include('pagessections/single-grid-local-video.php'); ?>
    <?php include('pagessections/simple-grid.php'); ?>
    <?php include('pagessections/second-single-separation.php'); ?>
    <?php include('pagessections/single-separation-dark-green.php'); ?>
    <?php include('pagessections/section-with-tabs.php'); ?>
    <?php include('pagessections/simple-grid-second.php'); ?>
    <?php /*  include('pagessections/single-grid-with-2clmn-grid.php'); */ ?>
    <?php include('pagessections/single-separation-light-purple.php'); ?>
    <?php include('pagessections/section-with-tabs-two.php'); ?>
    <?php include('pagessections/section-with-tabs-three.php'); ?>
    <?php include('pagessections/single-separation-dark-blue.php'); ?>
    <?php include('pagessections/simple-grid-with-four.php'); ?>
    <?php include('pagessections/simple-grid-third.php'); ?>
    <?php include('pagessections/simple-grid-with-video-second.php'); ?>
    <?php include('pagessections/slide-quote-simple.php'); ?>


    <div class="bg-[#f7f8fc]">
      <div class="wrapper">
        <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
          <img class="h-[25px] m-auto" src="<?php the_field('cta_logo'); ?>" alt="Max Logo">
          <h3 class="scale-36-30-24 m-auto"><?php the_field('footer_cta_headline'); ?></h3>
          <!-- Button Start -->
          <div class="primary-gradient-btn m-auto">
            <a class="scale-21-21-18 avenier-black" href="<?php the_field('cta_url'); ?>" target="_blank">
              <span><?php the_field('btn_cta_text'); ?></span>
            </a>
          </div>
          <!-- Button End -->

        </div>
      </div>
    </div>

    <!-- -->
  </div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(document).ready(function() {

    jQuery('#ads-slider').slick({
      slidesToShow: 1,
      slidesToSlide: 1,
      dots: true,
      centerMode: false

    });

  });
</script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(function() {
    jQuery("#tabs, #tabs2").tabs();
  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  // AppLovin Tab/Panel Slides v1 - 2022
  let activeSlideNumBis = 1;
  let maxSlideNumThree = 3;
  let slideIDBis = 0;

  function cycleQuoteBis(c) {
    clearInterval(slideIDBis);

    let $loop = 0;
    const logoTabs = document.querySelectorAll(".logo-tabb");
    logoTabs.forEach(function(currentIndex) {
      $loop += 1;
      if ($loop == c) {
        currentIndex.classList.add('active');
        activeSlideNumBis = c;
      } else {
        currentIndex.classList.remove('active');
      };
    });
    maxSlideNumThree = $loop;
    $loop = 0;

    const quotePanelsb = document.querySelectorAll(".quote-slideb");
    quotePanelsb.forEach(function(currentIndex) {
      $loop += 1;
      if ($loop == c) {
        currentIndex.classList.add('active');
      } else {
        currentIndex.classList.remove('active');
      };
    });
    slideIDBis = setInterval(advanceSlideBis, 6000);

  }



  function advanceSlideBis() {
    if (activeSlideNumBis < maxSlideNumThree) {
      cycleQuoteBis(activeSlideNumBis + 1);
    } else {
      cycleQuoteBis(1);
      activeSlideNumBis = 1
    }
  }




  if (window.innerWidth > 640) {
    slideIDBis = setInterval(advanceSlideBis, 6000);
  }
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  if (window.innerWidth < 760) {
    var accqa = document.getElementsByClassName("hr-minititle");
    var m;

    for (m = 0; m < accqa.length; m++) {
      accqa[m].addEventListener("click", function() {
        this.classList.toggle("active-qa");
        var panelqa = this.nextElementSibling;
        if (panelqa.style.display === "block") {
          panelqa.style.display = "none";
        } else {
          panelqa.style.display = "block";
        }
      });
    }

  }
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var navshader = document.getElementById("nav-bg-shader");
  var navpanel = document.getElementById("max-nav-panel");
  var navcloser = document.getElementById("nav-panel-closer");
  var navsubs = document.getElementsByClassName("nav-submenu");
  var navlinks = document.querySelectorAll(".menu li a");
  var navscrollheight = 650; // how far to scroll before nav panel appears

  function openMaxNav() {
    navpanel.classList.add("active");
    navshader.classList.add("active");
  }

  function closeSubMenus() {
    for (s = 0; s < navsubs.length; s++) {
      navsubs[s].classList.remove("active");
    }
  }

  function closeMaxNav() {
    navpanel.classList.remove("active");
    navshader.classList.remove("active");
    setTimeout(() => {
      closeSubMenus();
    }, 250)
    if (window.scrollY < navscrollheight) {
      setTimeout(() => {
        navpanel.classList.remove("in-view");
      }, 300)
    }
  }

  navpanel.addEventListener("click", function() {
    if (!navpanel.classList.contains("active")) {
      openMaxNav();
    }
  });

  navshader.addEventListener("click", function() {
    closeMaxNav();
  });

  navcloser.addEventListener("click", function() {
    closeMaxNav();
    event.stopPropagation();
  });

  document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) { // escape key
      closeMaxNav();
    }
  };

  for (s = 0; s < navsubs.length; s++) {
    navsubs[s].addEventListener("click", function() {
      if (this.classList.contains("active")) {
        this.classList.remove("active");
      } else {
        closeSubMenus();
        this.classList.add("active");
      }
    });
  };

  for (l = 0; l < navlinks.length; l++) {
    navlinks[l].addEventListener("click", function() {
      closeMaxNav();
      event.stopPropagation();
    });
  };

  addEventListener('scroll', (event) => {
    if (window.scrollY >= navscrollheight) {
      navpanel.classList.add("in-view");
    } else if (window.scrollY < navscrollheight && !navpanel.classList.contains("active")) {
      navpanel.classList.remove("in-view");
    }
  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  (function(c, p, d, u, id, i) {
    id = ''; // Optional Custom ID for user in your system
    u = 'https://tracking.g2crowd.com/attribution_tracking/conversions/' + c + '.js?p=' + encodeURI(p) + '&e=' + id;
    i = document.createElement('script');
    i.type = 'application/javascript';
    i.async = true;
    i.src = u;
    d.getElementsByTagName('head')[0].appendChild(i);
  }("1009095", document.location.href, document));
</script>


<?php get_footer(); ?>