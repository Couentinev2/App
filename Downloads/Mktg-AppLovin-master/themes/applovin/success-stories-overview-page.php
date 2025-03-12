<?php
/*
Template Name: Success Stories Overview Page
*/
?>
<?php get_header(); ?>
<div class="contentPage">
  <div id="page-success" class="overview">
    <div class="row hero">
      <div class="outer-wrap">
        <div class="inner-wrap inner-wrap-1000">
          <h5>
            <?php the_field('hero_title'); ?>
          </h5>
          <h2>
            <?php the_field('main_title'); ?>
          </h2>
        </div>
      </div>
    </div>
    <?php
    global $catquery;
    if (isset($_GET["cat"])) {
      $catquery = htmlspecialchars($_GET["cat"]);
    }
    if ($catquery != 'success_gaming' && $catquery != 'success_media' && $catquery != 'success_fitness'  && $catquery != 'success_utility') {
      $catquery = 'all';
    };
    echo '<!--' . $catquery . '-->';
    ?>
    <?php
    //$actual_link = ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $youtube_link = get_field("youtube_asset_link");
    $youtube_text = get_field("youtube_asset_text");
    $youtube_asset = get_field("youtube_asset_link_text");
    $featured_posts = get_field('featured_success');
    $mycats = array(); // create an array to hold category objects for each post (game type and studio)
    echo '<div class="row featured-success-story">
        <div class="inner-wrap inner-wrap-1200">';
    if ($featured_posts):
      foreach ($featured_posts as $featured_post):
        $slug_field = get_field('partner_slug', $featured_post->ID);
        echo '<!-- slug_field = ' . $slug_field . ' -->';
        $bg_field = get_field('pod_bg_art', $featured_post->ID);
        echo '<!-- bg_field = ' . $bg_field . ' -->';
        $bg_logo = get_field('partner_logo', $featured_post->ID);
        echo '<!-- bg_logo = ' . $bg_logo . ' -->';
        $bg_teasertest = get_field('teaser_text', $featured_post->ID);
        echo '<!-- bg_teasertest = ' . $bg_teasertest . ' -->';
        $idfeat = $featured_post->ID;
        echo '<!-- idfeat = ' . $idfeat . ' -->';
        $mycats = array();
        $taxoname = [];
        foreach (get_the_terms($idfeat, 'success_pods_categories') as $ct) { // loop through
          $cy = get_term($ct); // grab each custom taxonomy category (term) object for the post
          array_push($mycats, $cy->slug); // grab the slug from the object, add that to array
          $taxoname[] = $cy->slug;
          $name = $cy->name;
          // Setup this post for WP functions (variable must be named $post).
          if ($cy->parent == 4895 || $cy->parent ==  4907 || $cy->parent ==  4909 || $cy->parent ==  4911) {
            echo '<a  class="success-story-card-link-wrap" href="' . get_permalink($featured_post->ID) . '">
          <div class="success-story-card">
            <div class="success-card-pod success-card-art" style="background-image:url(' . esc_url($bg_field) . ');">
              <img class="logo-partners-overview" src="' . esc_url($bg_logo) . '" alt="EMPTYALT" />
                <p class="timeCode">'; ?><?php echo pll_e('Success Stories'); ?>
<?php echo '</p>
            </div>
            <div class="success-card-pod success-card-content">
              <div class="text-content">
                <h6 class="sub-cat">' . $name . '</h6>
                <h3>' . $bg_teasertest . '</h3>
              </div>
            </div>
          </div>
        </a>';
          }
        }
      endforeach;
      // Reset the global post object so that the rest of the page works correctly.
      wp_reset_postdata();
    endif;
?>
  </div>
</div>
<div class="inner-wrap inner-wrap-1200">
  <div class="dropdown-wrap">
    <div class="dropdown">
      <button class="dropbtn" id="menu-drop" onclick="myFunction()">
        Filter by
      </button>
      <div class="dropdown-content" id="menu-drop-dontent">
        <div class="input-drop">
          <h3 class="fixed-16"><?php pll_e('Categories') ?></h3>
          <?php
          $termst = get_terms('success_pods_categories');
          foreach ($termst as $termmain):
            if ($termmain->parent == 4895 || $termmain->parent == 4907 || $termmain->parent == 4909 || $termmain->parent == 4911) { ?>
              <label>
                <input type='checkbox'
                  class='checkbox <?php echo esc_attr($termmain->slug); ?> categories-input'
                  value='<?php echo esc_html($termmain->slug); ?>'>
                <span
                  for='<?php echo esc_attr($termmain->slug); ?>'><?php echo esc_html($termmain->name); ?></span>
              </label>
          <?php }
          endforeach; ?>
        </div>
        <?php
if (pll_current_language('slug') == 'en') {
?>
  <div class="input-drop input-objective-drop">
    <hr class="hr-top" />
    <h3 class="fixed-16"><?php pll_e('Marketing Objective') ?>
    </h3>
    <?php
    $arrayb = get_terms('success_pods_categories');
    foreach ($arrayb as $objectif) :
      if ($objectif->parent == 4897) {
        if ($objectif->slug == 'web_conversions' || $objectif->slug == 'driving_conversions') {
          continue;
        }
    ?>
        <label>
          <input type='checkbox'
            class='checkbox <?php echo esc_attr($objectif->slug); ?> objectif-input'
            value='<?php echo esc_html($objectif->slug); ?>'>
          <span
            for='<?php echo esc_attr($objectif->slug); ?>'><?php echo esc_html($objectif->name); ?></span>
        </label>
    <?php 
      }
    endforeach; 
    ?>
    <hr class="hr-bottom" />
  </div>
<?php 
} 
?>

        <p id="close-all" class="fixed-14"><?php pll_e('Clear All'); ?>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row main-success first-success">
  <div class="inner-wrap inner-wrap-1200">
    <div class="success-story-cards-wrap " id="successkey">
      <?php
      $args = array(
        'post_type' => 'success_story_pod',
        'posts_per_page' => -1,
      );
      //$posts = get_posts( $args );
      $loop = new WP_Query($args);
      $chillcode = 0;
      $items = array();
      while ($loop->have_posts()): $loop->the_post();
        $post_id = get_the_ID();
        $chillcode++;
        $previous_id = '';
        if (get_field('success_hide', $post_id) === 'True') {
          continue;
        }
        foreach (get_the_terms($post_id, 'success_pods_categories') as $ct) { // loop through
          $post_id = get_the_ID();
          $cy = get_term($ct); // grab each custom taxonomy category (term) object for the post
          $name = $cy->name;
          $testtt = $cy->slug;
          $term_list = get_the_terms($post_id, 'success_pods_categories');
          $types = '';
          foreach ($term_list as $term_single) {
            $types .= $term_single->slug . ' ';
          }
          $typesz = rtrim($types, ' ');
          $post_type_g = get_post_type();
          $post_type = get_post_type_object($post_type_g);
          if ($cy->parent == 4895 || $cy->parent ==  4907 || $cy->parent ==  4909 || $cy->parent ==  4911) {
            if ($post_id != 17241 && $post_id != 19840 && $post_id != 19621 && $post_id != 19913) {
              echo '<a class="success-story-card-link-wrap display ' . $typesz . ' test-item six-item"  href=" ' . get_permalink($post_id) . ' " data-percentage=' . $chillcode . '>
          <div class="success-story-card">
              <div class="success-card-pod success-card-art" style=" background-image: url(' . get_field('pod_bg_art', $post_id) . ');">
 <img class="logo-partners-overview" src="' . get_field('partner_logo', $post_id) . '" alt="" />
  <p class="timeCode">'; ?><?php echo pll_e('Success Stories'); ?> <?php echo '</p>
</div>
          <div class="success-card-pod success-card-content">
            <div class="text-content">
              <h6 class="sub-cat">' . $name . '</h6>
              <h5>
                ' . get_field('teaser_text', $post_id) . '
              </h5>
            </div>
          </div>
        </div>
        </a>';
                                                                    $previous_id = $post_id;
                                                                  }
                                                                }
                                                              }
                                                            endwhile;
                                                            wp_reset_postdata();
                                                                    ?>
    </div>
  </div>
</div>
<!-- -->
</div>
</div>
<?php get_template_part('template-modules/email-signup'); ?>
<?php get_footer(); ?>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var timesClicked = 0;
  var specifiedElement = document.getElementById('menu-drop');
  var insidedrop = document.getElementById('menu-drop-dontent');
  //I'm using "click" but it works with any event
  document.addEventListener('click', function(event) {
    var isClickInside = specifiedElement.contains(event.target);
    var isClickInsidebis = insidedrop.contains(event.target);
    if (!isClickInside && !isClickInsidebis) {
      document.querySelector('#menu-drop-dontent').classList
        .remove('hidden-menu');
      document.querySelector('#menu-drop').classList.remove(
        'drop-after');
      timesClicked = 0;
    }
  });

  function myFunction() {
    if (timesClicked >= 1) {
      document.querySelector('#menu-drop-dontent').classList.remove(
        'hidden-menu');
      document.querySelector('#menu-drop').classList.remove('drop-after');
      timesClicked = 0;
    } else {
      document.querySelector('#menu-drop-dontent').classList.add(
        'hidden-menu');
      document.querySelector('#menu-drop').classList.add('drop-after');
      timesClicked = timesClicked + 1;
    }
  };
</script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(window).on('unload', function() {});
  jQuery(window).on('load', function() {
    jQuery(".checkbox").attr("checked", false);
  });
  // uncheck all the box when the page is loading
  jQuery(window).on('load', function() {
    jQuery(".allcat").attr("checked", true);
  }); // precheck all cat
  jQuery(document).ready(function() {
    if ('input[type=checkbox]:checked') {
      jQuery()
    }
    const checked = [];
    const categories = [];
    jQuery('.checkbox').each(function() {
      categories.push(this.value);
      console.log(categories)
    });
    // if checkbox is checked, show corresponding text with option to X out and delete text and uncheck checkbox
    jQuery('input[type="checkbox"]').change(function() {
      var checkedtime = jQuery(
        'input[type="checkbox"]:checked').length;
      var nochecked = jQuery(
        'input[type="checkbox"]:disabled').length;
      if (jQuery(this).hasClass("categories-input") &&
        jQuery(this).is(":checked")) {
        jQuery(".objectif-input").attr("disabled", true)
      } else if (jQuery(this).hasClass(
          "objectif-input") && jQuery(this).is(":checked")) {
        jQuery(".categories-input").attr("disabled",
          true)
      } else if (checkedtime == 3) {
        jQuery('.checkbox').removeAttr("disabled");
      }
      var checkboxname = jQuery(this).val();
      if (jQuery(".display").hasClass(checkboxname)) {
        console.log()
        if (jQuery(this).is(":checked") && !jQuery(this)
          .hasClass('.allcat')) {
          jQuery(".allcat").prop("indeterminate",
            true);
          checked.push(this.value);
          jQuery('.display').addClass("nodisplay");
          jQuery(".display").hide();
          if (checked.length == 1) {
            jQuery("#menu-drop").html(checked
              .length + " filter selected");
            jQuery(".allcat").attr("checked",
              false);
            jQuery(".allcat").prop("indeterminate",
              true);
          } else if (checked.length == categories
            .length) {
            jQuery("#menu-drop").html(checked
              .length + " filters selected");
            jQuery(".allcat").prop("indeterminate",
              false);
            jQuery(".allcat").attr("checked", true);
          } else {
            jQuery("#menu-drop").html(checked
              .length + " filters selected");
            jQuery(".allcat").attr("checked",
              false);
            jQuery(".allcat").prop("indeterminate",
              true);
          }
          jQuery(checked).each(function() {
            jQuery(".display." + this)
              .show();
            jQuery(".display." + this).css(
              'display', 'flex');
            if (checked.length == 1) {
              jQuery("#menu-drop").html(
                checked.length +
                " filter selected");
              jQuery(".allcat").attr(
                "checked", false);
              jQuery(".allcat").prop(
                "indeterminate",
                true);
            } else if (checked.length ==
              categories.length) {
              jQuery("#menu-drop").html(
                checked.length +
                " filters selected");
              jQuery(".allcat").prop(
                "indeterminate",
                false);
              jQuery(".allcat").attr(
                "checked", true);
            } else {
              jQuery("#menu-drop").html(
                checked.length +
                " filters selected");
              jQuery(".allcat").attr(
                "checked", false);
              jQuery(".allcat").prop(
                "indeterminate",
                true);
            }
          });
        } else {
          jQuery(".display." + this.value)
            .removeClass("nodisplay");
          jQuery(".display." + checkboxname).hide();
          checked.splice(checked.indexOf(this.value),
            1);
          jQuery(".checkbox").removeAttr("disabled");
          if (checked.length == 0) {
            jQuery(".allcat").prop("indeterminate",
              false);
            jQuery(".allcat").attr("checked", true);
            jQuery(categories).each(function() {
              jQuery("#menu-drop").html(
                "Filter by");
              jQuery(".display." + this)
                .removeClass(
                  "nodisplay");
              jQuery(".display." + this)
                .show();
              jQuery(".display." + this)
                .css('display', 'flex')
            });
          } else if (checked.length == 1) {
            jQuery("#menu-drop").html(checked
              .length + " filter selected");
            jQuery(".allcat").attr("checked",
              false);
            jQuery(".allcat").prop("indeterminate",
              true);
          } else if (checked.length == categories
            .length) {
            jQuery("#menu-drop").html(checked
              .length + " filters selected");
            jQuery(".allcat").prop("indeterminate",
              false);
            jQuery(".allcat").attr("checked", true);
          } else {
            jQuery(".allcat").attr("checked",
              false);
            jQuery(".allcat").prop("indeterminate",
              true);
            jQuery("#menu-drop").html(checked
              .length + " filters selected");
          }
        }
      }
      jQuery('#close-all').click(function() {
        jQuery("#menu-drop").html("Filter by");
        // jQuery('input[type="checkbox"]').empty();
        jQuery('.checkbox').each(function() {
          this.checked = false;
          jQuery(this).removeAttr(
            "disabled");
          jQuery(this).attr("checked",
            false);
        });
        jQuery(".allcat").prop("indeterminate",
          false);
        jQuery(".allcat").attr("checked", true);
        jQuery(categories).each(function() {
          jQuery('.display').addClass(
            "nodisplay");
          jQuery(".display." + this)
            .show();
          jQuery(".display." + this)
            .css('display', 'flex')
          checked.length = 0
        });
      });
      jQuery('#close-all-main').click(function() {
        jQuery("#menu-drop").html("Filter by");
        // jQuery('input[type="checkbox"]').empty();
        jQuery('.checkbox').each(function() {
          this.checked = false;
        });
        jQuery(".allcat").prop("indeterminate",
          false);
        jQuery(".allcat").attr("checked", true);
        jQuery(categories).each(function() {
          jQuery('.display').addClass(
            "nodisplay");
          jQuery(".display." + this)
            .show();
          jQuery(".display." + this)
            .css('display', 'flex')
          checked.length = 0
        });
      });
    });
  })
</script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  < ? php
  ob_start();
  include("pagessections/success-video.php");
  $videoSection = ob_get_clean();
  $videoSection = addslashes($videoSection);
  echo "var videoSection = '$videoSection';"; ?
  >
  var elements = jQuery(
    '.success-story-cards-wrap > .test-item:nth-child(6)');
  var elementsbid = "";
  jQuery(videoSection).insertAfter(elements);
  var boundary = jQuery(".section-video");
  jQuery("<div class='success-story-cards-wrap'>").insertAfter(boundary
    .parent().parent().parent()).append(boundary.nextAll().addBack());
  jQuery(boundary).unwrap();
  jQuery('.overview > .test-item').wrapAll(
    '<div class="row main-success extra-main"><div class="inner-wrap inner-wrap-1200"><div class="success-story-cards-wrap">'
  );
  jQuery('input[type="checkbox"]').change(function() {
    const myTimeout = setTimeout(test, 50);

    function test() {
      jQuery(".test-item").sort(function(a, b) {
        return +jQuery(b).attr('data-percentage') - +
          jQuery(a).attr('data-percentage');
      }).each(function() {
        jQuery("#successkey").prepend(this);
      })
      jQuery(".section-video").remove();
      jQuery(".extra-main").remove();
      jQuery('.test-item:visible').prependTo('#successkey');
      var elementsB = jQuery(
        '.success-story-cards-wrap > .test-item:nth-child(6)'
      );
      jQuery(videoSection).insertAfter(elementsB);
      var boundary = jQuery(".section-video");
      jQuery("<div class='success-story-cards-wrap'>")
        .insertAfter(boundary.parent().parent().parent())
        .append(boundary.nextAll().addBack());
      jQuery(boundary).unwrap();
      jQuery('.overview > .test-item').wrapAll(
        '<div class="row main-success extra-main"><div class="inner-wrap inner-wrap-1200"><div class="success-story-cards-wrap" id="movingsec">'
      );
      if (jQuery('#movingsec').children(':visible').length == 0) {
        jQuery('#movingsec').hide()
      } else {
        jQuery('#movingsec').show()
      }
    };
  });
  jQuery('#close-all').click(function() {
    const myTimeout = setTimeout(test, 50);

    function test() {
      jQuery(".six-item").sort(function(a, b) {
        return +jQuery(b).attr('data-percentage') - +
          jQuery(a).attr('data-percentage');
      }).each(function() {
        jQuery("#successkey").prepend(this);
      })
      jQuery(".section-video").remove();
      jQuery(".extra-main").remove();
      var elements = jQuery(
        '.success-story-cards-wrap > .test-item:nth-child(6)'
      );
      jQuery(videoSection).insertAfter(elements);
      var boundary = jQuery(".section-video");
      jQuery("<div class='success-story-cards-wrap'>")
        .insertAfter(boundary.parent().parent().parent())
        .append(boundary.nextAll().addBack());
      jQuery(boundary).unwrap();
      jQuery('.overview > .test-item').wrapAll(
        '<div class="row main-success extra-main"><div class="inner-wrap inner-wrap-1200"><div class="success-story-cards-wrap" id="movingsec">'
      );
    }
  })
</script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(window).on('pageshow', function() {
    jQuery(':checkbox').prop('checked', false);
  });
</script>