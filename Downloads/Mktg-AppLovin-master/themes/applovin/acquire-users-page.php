<?php
/*
Template Name: Solution Acquire Users Page
*/
?>
<?php get_header(); ?>

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/hero-header.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/logos-bar.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/slidquote-section.css' type='text/css' media='' />

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/results-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/accordion.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/single-grid.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/four-grid.css' type='text/css' media='' />

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/result-quote-solution.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/success-preview.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/ads-supported.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/quote-section-hz.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/q-a-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/cta-basic.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/acquire-users.css' type='text/css' media='' />

<style type="text/css">
  .slide-quote-section {

    background-size: contain;
    background-repeat: no-repeat;
  }

  .slide-quote-section .promo-link {
    display: none;
  }
</style>

<div class="contentPage">


  <?php $langDetect = get_language_attributes(); ?>

  <div id="page-increase-apdau" onload="move()">

    <?php include('pagessections/hero-basic.php'); ?>
    <?php include('pagessections/logos-bar.php'); ?>
    <?php include('pagessections/slide-quote-section-legacy.php'); ?>



    <div class="row content-row row-white section-slides-row" data-scroll="centerVertical">
      <div class="inner-wrap inner-wrap-1200">
        <div class="slide-grid">
          <div class="section-slides-accordion">

            <h2 class="main-title-four scale-36-30-24"><?php the_field('accordion_title'); ?></h2>

            <p class="scale-21-21-18 main-text-four" id="">
              <?php the_field('accordion_text'); ?></p>
            <div class="accordion-item">
              <div class="accordion-title" id="title1">
                <div class="loading-bar">
                  <div class="progress"></div>
                </div>
                <h3 class="scale-21-21-18"><?php the_field('accordion_title_one'); ?></h3>
              </div>
              <div class="accordion-content">
                <p class="scale-18-18-16"><?php the_field('accordion_text_one'); ?>
                </p>
              </div>
            </div>


            <div class="accordion-item">
              <div class="accordion-title" id="title2">
                <div class="loading-bar">
                  <div class="progress"></div>
                </div>
                <h3 class="scale-21-21-18"><?php the_field('accordion_title_two'); ?></h3>
              </div>
              <div class="accordion-content">
                <p class="scale-18-18-16"><?php the_field('accordion_text_two'); ?></p>
              </div>
            </div>



          </div>
          <div class="slideshow">
            <img id="one" src=" <?php the_field('slde_image_one'); ?>" alt="MAX - How it Works">
            <img id="two" src=" <?php the_field('slde_image_two'); ?>" alt="MAX - How it Works">

            <div class="slide-shadow"></div>
          </div>

        </div>
      </div>
    </div>








    <?php include('pagessections/quadriple-grid.php'); ?>
    <?php include('pagessections/q-a-section.php'); ?>
    <?php include('pagessections/cta-basic.php'); ?>

    <!-- -->
  </div>
</div>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var x = 0;
  var y = 0;
  var check = 0;
  var checkbis = 0;

  var elemone = document.getElementById("myBar");
  var elemtwo = document.getElementById("myBarv2");

  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        elemone.style.width = "0%";
        elemtwo.style.width = "0%";
        var x = 0;
        var y = 0;
      }
    });
  };

  function move() {

    if (check == 0) {
      check++;
      if (x == 0) {
        x = 0;
        var width = 0;
        var id = setInterval(frame, 100);

        function frame() {
          if (width >= 100) {
            clearInterval(id);
            x = 0;
            document.getElementById('panel-1').click();
            document.getElementById('panel-2').click();
            return;
          } else {
            width++;
            elemone.style.width = width + "%";
          }
        }
      }
    } else {
      check = 0;
    };
  };

  function movebis() {
    if (checkbis == 0) {
      checkbis++;
      if (y == 0) {
        y = 1;
        var width = 0;
        var id = setInterval(frame, 100);

        function frame() {
          if (width >= 100) {
            clearInterval(id);
            y = 0;
            document.getElementById('panel-2').click();
            document.getElementById('panel-1').click();
          } else {
            width++;
            elemtwo.style.width = width + "%";
          }
        }
      }
    } else {
      return;
      checkbis = 0;
    };
  };
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  const collection = document.getElementsByClassName("ads-repeater");
  const repeter = document.getElementById("repeter-ads");
  const btn = document.getElementById("adsmyBtn");

  function showmore() {
    for (let i = 0; i < collection.length; i++) {
      collection[i].style.display = "block";
    }
    btn.style.display = "none";
    repeter.classList.add("repeter-open");
  }
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(document).ready(function() {
    jQuery('.accordion-content').hide();

    jQuery('#one, #two').hide();

    var currentInterval;

    function startLoading(bar, callback) {
      clearInterval(currentInterval);
      var width = 0;
      bar.parent().show();
      currentInterval = setInterval(frame, 80);

      function frame() {
        if (width >= 100) {
          clearInterval(currentInterval);
          bar.parent().hide();
          if (callback) callback();
        } else {
          width++;
          bar.width(width + '%');
        }
      }
    }

    jQuery('.accordion-title').click(function() {
      jQuery('.loading-bar').hide();

      jQuery('.accordion-title').removeClass('active-title').css('border-top', '1px solid #ddd');
      jQuery(this).addClass('active-title').css('border-top', 'none');

      var content = jQuery(this).next('.accordion-content');

      jQuery('.accordion-content').not(content).slideUp();
      content.slideToggle();

      //reset and start loading bar
      jQuery('.loading-bar .progress').width('0');
      startLoading(jQuery(this).find('.progress'), jQuery(this).attr('id') === 'title1' ? function() {
        jQuery('#title2').click();
      } : function() {
        jQuery('#title1').click();
      });

      var img = jQuery(this).attr('id') === 'title1' ? jQuery('#one') : jQuery('#two');
      jQuery('#one, #two').hide();
      img.show();
    });

    jQuery('#title1').click();
  });
</script>
<?php get_footer(); ?>