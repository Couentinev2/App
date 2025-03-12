<?php
/*
   Template Name: Partners Page
   */
?>
<?php get_header(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!--<link rel="stylesheet" id="basic-page-style-css" href="/wp-content/themes/blankslate-child/css/style-pages-forms.css" type="text/css" media="">-->
<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<div class="contentPage">
   <div id="page-partners">
      <div class="row hero">
         <div class="inner-wrap inner-wrap-1000">
            <h5>
               <?php the_field('hero_title'); ?>
            </h5>
            <h2>
               <?php the_field('hero_intro'); ?>
            </h2>
         </div>
      </div>
      <div class="row content-row partners-row" id="partners-analytics">
         <div class="searchsection">
            <div class="inner-wrap inner-wrap-1200">


               <input type="text" name="keyword" id="keyword" class="searchbox" placeholder="<?php pll_e('Search'); ?>" onkeyup="fetch()"></input>


               <div class="dropdown-wrap">
                  <div class="dropdown">
                     <button class="dropbtn" id="menu-drop" onclick="myFunction()">
                        <?php pll_e('Partner Type'); ?>
                     </button>
                     <div class="dropdown-content" id="menu-drop-dontent">
                        <div class="input-drop">
                           <ul>
                              <?php
                              $args = array(
                                 'orderby' => 'name',
                                 'order' => 'DSC',
                                 'parent' => 0,
                              );

                              $termst = get_terms('partners_pods_categories', $args);

                              foreach ($termst as $termbis):
                                 $taxid = $termbis->term_id;
                                 $termschild = get_term_children($taxid, 'partners_pods_categories');; ?>

                                 <li class="" id="<?php echo esc_attr($termbis->slug); ?>">
                                    <input type='checkbox' class='section-dassault' value='<?php echo esc_html($termbis->slug); ?>' id="input-<?php echo esc_html($termbis->slug); ?>">
                                    <label id="input-<?php echo esc_attr($termbis->slug); ?>" class="allcatmain" for="input-<?php echo esc_html($termbis->slug); ?>">
                                       <span for='<?php echo esc_attr($termbis->slug); ?>'><?php echo esc_html($termbis->name); ?></span>
                                    </label>
                                    <ul>
                                       <?php foreach ($termschild as  $child):
                                          $childinfo = get_term($child);
                                       ?>
                                          <li class="child-check">
                                             <input type='checkbox' class='' value='<?php echo esc_html($childinfo->slug); ?>' id="input-<?php echo esc_html($childinfo->slug); ?>">
                                             <label class="childmenu" id="input-<?php echo esc_attr($childinfo->slug); ?>" for="input-<?php echo esc_html($childinfo->slug); ?>">
                                                <span for='<?php echo esc_attr($childinfo->slug); ?>'> <?php echo esc_attr($childinfo->name);; ?></span>
                                             </label>
                                          </li>
                                       <?php endforeach; ?>
                                    </ul>
                                 </li>
                                 <hr>
                              <?php endforeach; ?>
                              <p id="close-all"><?php pll_e('Clear All'); ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="inner-wrap inner-wrap-1200">
            <div class="partner-pods-header">
            </div>


            <div class="partner-pods-wrap" id="datafetch">
               <?php
               // Debug output
               echo '<!-- Debug Info -->';
               echo '<!-- Post Type Check: ';
               $post_types = get_post_types(['public' => true], 'names');
               print_r($post_types);
               echo ' -->';
               
               // Try to fetch partners directly
               $partners = new WP_Query([
                   'post_type' => 'partners_entry',
                   'posts_per_page' => -1,
                   'orderby' => 'title',
                   'order' => 'ASC'
               ]);
               
               echo '<!-- Partner Query Results: ';
               echo $partners->found_posts . ' partners found';
               echo ' -->';
               ?>
            </div>
         </div>

      </div>
      <div class="row cta">
         <div class="inner-wrap inner-wrap-600">
            <h2>
               <?php the_field('cta_title'); ?>
            </h2>
            <div class="primary-gradient-btn m-auto">
               <a class="scale-21-21-18" href="<?php the_field('cta_button_link'); ?>" target="_blank">
                  <span><?php the_field('cta_button_text'); ?></span>
               </a>
            </div>

         </div>
      </div>
   </div>
</div>



<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
jQuery(document).ready(function() {
   // Initial fetch of partners
   fetchPartners();

   // Setup event handlers
   jQuery('#keyword').on('keyup', function() {
      fetchPartners();
   });

   function fetchPartners() {
      jQuery.ajax({
         url: '<?php echo admin_url('admin-ajax.php'); ?>',
         type: 'post',
         data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
         success: function(data) {
            if (!jQuery.trim(data)){   
               jQuery(".partner-pods-wrap").html("<p class='nofoundsearch'><?php pll_e('No partners match your search. Try removing filters or changing your search terms'); ?>. <span id='clear-all'><?php pll_e('Clear all filters'); ?></span></p>");
               jQuery(".partner-pods-wrap").addClass('gridreset');
            } else {   
               jQuery(".partner-pods-wrap").removeClass("gridreset");
               jQuery('#datafetch').html(data);
            }
         },
         error: function(xhr, status, error) {
            // Keep error handler for debugging but remove console.log
         }
      });
   }

   // Magnific popup setup
   var allpop = [];
   jQuery(".popup").each(function() {
      allpop.push(".c" + jQuery(this).attr("data-id"));
   });
   var allpops = allpop.join(", ");
   jQuery(allpops).magnificPopup({
      type: 'inline',
      midClick: true
   });

   // Clear filters functionality
   jQuery('#clear-all').click(function() {
      jQuery(".searchbox").val('');
      jQuery('li input[type="checkbox"]').prop({
         indeterminate: false,
         checked: false
      });
      jQuery("#menu-drop").html("<?php pll_e('Partner Type'); ?>");
      jQuery(".display").show();
      fetchPartners();
   });
});
</script>

<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
   jQuery(document).ready(function() {
      var getClass;
      jQuery(".mfp-content div").click(function() {
         var getClass = jQuery(this);
         document.getElementsByClassName('invisibleDiv').onclick = function() {
            jQuery('#i' + getClass).addClass("mfp-hide")
         };
      });
   })
</script>

<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
   var timesClicked = 0;
   var specifiedElement = document.getElementById('menu-drop');
   var insidedrop = document.getElementById('menu-drop-dontent');

   document.addEventListener('click', function(event) {
      var isClickInside = specifiedElement.contains(event.target);
      var isClickInsidebis = insidedrop.contains(event.target);

      if (!isClickInside && !isClickInsidebis) {
         document.querySelector('#menu-drop-dontent').classList.remove('hidden-menu');
         document.querySelector('#menu-drop').classList.remove('drop-after');
         timesClicked = 0;
      }
   });

   function myFunction() {
      if (timesClicked >= 1) {
         document.querySelector('#menu-drop-dontent').classList.remove('hidden-menu');
         document.querySelector('#menu-drop').classList.remove('drop-after');
         timesClicked = 0;
      } else {
         document.querySelector('#menu-drop-dontent').classList.add('hidden-menu');
         document.querySelector('#menu-drop').classList.add('drop-after');
         timesClicked = timesClicked + 1;
      }
   };
</script>

<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
   var userLang = jQuery('html')[0].lang;

   jQuery(window).on('load', function() {
      jQuery('input[type="checkbox"]').prop("checked", false);
      jQuery(".searchbox").val('');
   });

   jQuery('input').change(function(e) {
      var supremdail = []

      jQuery(".display").each(function() {
         var failure = jQuery(this).attr('id');
         var stringsuper = "#" + String(failure);
         supremdail.push(stringsuper);
      })

      jQuery(supremdail).each(function() {
         var superextra = String(this)
         jQuery(superextra).hide();
      });

      var checked = jQuery(this).prop("checked"),
         container = jQuery(this).parent(),
         siblings = container.siblings();

      container.find('input[type="checkbox"]').prop({
         indeterminate: false,
         checked: checked
      });

      var test = jQuery(this).val();

      var checkedelement = 0
      jQuery("#menu-drop").html("<?php pll_e('Partner Type'); ?>");

      var testo = [];
      var cardid = [];

      jQuery(".child-check input").each(function() {
         var valeur = jQuery(this).val();
         var test = "." + valeur;
         var supert = "#input-" + valeur

         testo.push(test)

         jQuery(test).each(function() {
            var waaa = jQuery(this).attr('id');

            if (jQuery(supert).is(':checked')) {
               cardid.push(waaa);
            }
         })

         if (!jQuery(supert).is(':checked')) {
         } else {
            checkedelement++;

            jQuery(cardid).each(function() {
               var string = "#" + String(this);
               jQuery(string).show();
               jQuery(string).css(string, 'flex')
               if (userLang == 'zh-CN') {
                  jQuery("#menu-drop").html("已选" + checkedelement + "种")
               } else if (userLang == 'ja') {
                  jQuery("#menu-drop").html("<?php pll_e('partner type selected'); ?>" + checkedelement);
               } else {
                  jQuery("#menu-drop").html(checkedelement + " <?php pll_e('partner types selected'); ?>")
               };
            })
         };
      });

      if (checkedelement == 0) {
         jQuery("#menu-drop").html("<?php pll_e('Partner Type'); ?>");
         jQuery(".display").show();
      } else if (checkedelement == 1) {
         if (userLang == 'zh-CN') {
            jQuery("#menu-drop").html("已选" + checkedelement + "种")
         } else if (userLang == 'ja') {
            jQuery("#menu-drop").html("<?php pll_e('partner type selected'); ?>" + checkedelement);
         } else {
            jQuery("#menu-drop").html(checkedelement + " <?php pll_e('partner type selected'); ?>")
         };
      } else if (jQuery('.section-dassault').is(':checked')) {
         if (userLang == 'zh-CN') {
            jQuery("#menu-drop").html("已选" + checkedelement + "种")
         } else if (userLang == 'ja') {
            jQuery("#menu-drop").html("<?php pll_e('partner type selected'); ?>" + checkedelement);
         } else {
            jQuery("#menu-drop").html(checkedelement + " <?php pll_e('partner types selected'); ?>")
         };
      }

      function checkSiblings(el) {
         var parent = el.parent().parent(),
            all = true;

         el.siblings().each(function() {
            let returnValue = all = (jQuery(this).children('input[type="checkbox"]').prop("checked") === checked);
            return returnValue;
         });

         if (all && checked) {
            parent.children('input[type="checkbox"]').prop({
               indeterminate: false,
               checked: checked
            });
            checkSiblings(parent);
         } else if (all && !checked) {
            parent.children('input[type="checkbox"]').prop("checked", checked);
            parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
            checkSiblings(parent);
         } else {
            el.parents("li").children('input[type="checkbox"]').prop({
               indeterminate: true,
               checked: false
            });
         }
      }

      checkSiblings(container);
   });

   jQuery('#close-all').click(function() {
      jQuery('li input[type="checkbox"]').empty();
      jQuery("li input[type='checkbox']").each(function() {
         jQuery("li input[type='checkbox']").attr("indeterminate", false);
         jQuery("li input[type='checkbox']").attr("checked", false);
         jQuery('li input[type="checkbox"]').empty();
         jQuery('li input[type="checkbox"]').prop({
            indeterminate: false,
            checked: false,
         });

         jQuery("#menu-drop").html("<?php pll_e('Partner Type'); ?>");
         jQuery(".display").show();
      });
   });
</script>


<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
   jQuery("<span id='clear-all'>Clear all filters</span>").insertAfter(".nofoundsearch");
</script>

<?php get_footer(); ?>