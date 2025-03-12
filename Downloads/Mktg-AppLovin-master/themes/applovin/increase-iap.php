<?php
/*
Template Name: Increase IAPs
*/
?>
<?php get_header(); ?>

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/hero-header.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/logos-bar.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/results-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/cards-result.css' type='text/css' media='' />

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/accordion.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/double-grid.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/result-quote-solution.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/success-preview.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/q-a-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/cta-basic.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/increase-iaps.css' type='text/css' media='' />


<script type='text/javascript' src='/wp-content/themes/applovin/js/lib/FWDR3DCov.js?ver=5.9.3' id='coverflow-script-js'></script>
<div class="contentPage">



  <?php $langDetect = get_language_attributes(); ?>

  <div id="page-increase-iap">

    <?php include('pagessections/hero-basic.php'); ?>
    <?php include('pagessections/logos-bar.php'); ?>
    <?php include('pagessections/cards-result.php'); ?>

    <?php include('pagessections/double-grid.php'); ?>
    <?php include('pagessections/q-a-section.php'); ?>
    <?php include('pagessections/cta-basic.php'); ?>

    <!-- -->
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
      return;
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

    jQuery('#ads-slider').slick({
      slidesToShow: 1,
      slidesToSlide: 1,
      dots: true,
      centerMode: false

    });

  });
</script>
<?php get_footer(); ?>