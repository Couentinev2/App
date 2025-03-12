<?php
/*
Template Name: Solution Increase ARPDAU Page
*/
?>

<?php get_header(); ?>

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/hero-header.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/logos-bar.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/results-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/accordio-v2.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/double-grid.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/result-quote-solution.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/success-preview.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/ads-supported.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/quote-section-hz.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/q-a-section.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/cta-basic.css' type='text/css' media='' />


<div class="contentPage">


  <?php $langDetect = get_language_attributes(); ?>

  <div id="page-increase-apdau" onload="move()">

    <?php include('pagessections/hero-basic.php'); ?>
    <?php include('pagessections/logos-bar.php'); ?>
    <?php include('pagessections/result-section-solution.php'); ?>
    <?php include('pagessections/result-quote-solution.php'); ?>
    <?php include('pagessections/ads-supported.php'); ?>
    <?php /* include('pagessections/double-grid.php'); */ ?>
    <?php include('pagessections/success-preview.php'); ?>
    <?php include('pagessections/simple-acct-rt.php'); ?>
    <?php include('pagessections/quote-section-hz.php'); ?>
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

  // var elemone = document.getElementById("myBar");
  // var elemtwo = document.getElementById("myBarv2");

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


  document.getElementById("panel-1").onload = function() {
    move()
  };

  function move() {

    if (check == 0) {
      check++;
      if (x == 0) {
        x = 0;
        // var width = 0;
        //  var id = setInterval(frame, 100);
        //  function frame() {
        //     if (width >= 100) {
        //       clearInterval(id);
        x = 0;
        document.getElementById('panel-1').click();
        document.getElementById('panel-2').click();
        return;
        //    } else {
        //      width++;
        //      elemone.style.width = width + "%";
        //    }
      }
    }
  } //else{
  //  check = 0;
  // };
  //}; 

  function movebis() {
    if (checkbis == 0) {
      checkbis++;
      if (y == 0) {
        y = 1;
        var width = 0;
        //  var id = setInterval(frame, 100);
        //  function frame() {
        //     if (width >= 100) {
        clearInterval(id);
        y = 0;
        document.getElementById('panel-2').click();
        document.getElementById('panel-1').click();
        //    } else {
        //      width++;
        //       elemtwo.style.width = width + "%";
        //    }
      }
    }
  } //else{
  //  return;
  //  checkbis = 0;
  // };
  //};

  //onload="move()"
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

<script defer type="text/javascript">
  window.onload = function() {
    document.getElementById('panel-1').click();
  };
</script>

<?php get_footer(); ?>