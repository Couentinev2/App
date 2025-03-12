<?php
/*
Template Name: ALX Inventory Page
*/
?>
<?php get_header(); ?>

<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/simple-grid-w-title-w-floating.css' type='text/css' media='' />
  
<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/alx-inventory.css' type='text/css' media='' />

<div class="contentPage">
    
<?php $langDetect = get_language_attributes(); ?> 

<div id=" alx-nventory">
<div class="">

<div class="hero row">
  <div class="inner-wrap inner-wrap-1200">
    <div class="div1">
   <a href="../../alx/" target="_blank"> <img class="logo-alx" src="/wp-content/themes/applovin/images/alx-logo.svg" alt="ALX" loading="lazy" /></a>
      <h1 class="scale-50-40-28">
        <?php the_field('hero_title'); ?>
      </h1>
      <p class="scale-21-21-18"><?php the_field('hero_text'); ?></a>
    </div>
    <div class="div2">
      <img class="alx-hero-img" src="/wp-content/themes/applovin/images/HeaderImage.svg" alt="ALX" loading="lazy" />
  </div>
  </div>
</div>  

<div class="get-started-section">
    <div class="inner-wrap-1200">
  <h2 class="scale-36-30-24"> <?php the_field('started_title'); ?></h2>

<div class="perks-alx">

  <div class="perks">
    <img class="logo-perks" src="/wp-content/themes/applovin/images/icon-alx-seamless-activation.svg" alt="ALX" loading="lazy" />
    <h4 class="scale-21-21-18"><?php the_field('started_minititle_one'); ?></h4>
    <p class="scale-18-18-16"><?php the_field('started_minitext_one'); ?></p>
  </div>
  <div class="perks">
    <img class="logo-perks" src="/wp-content/themes/applovin/images/icon-alx-custom-curation.svg" alt="ALX" loading="lazy" />
     <h4 class="scale-21-21-18"><?php the_field('started_minititle_two'); ?></h4>
    <p class="scale-18-18-16"><?php the_field('started_minitext_two'); ?></p>
  </div>
  <div class="perks">
    <img class="logo-perks" src="/wp-content/themes/applovin/images/icon-alx-instant-scale.svg" alt="ALX" loading="lazy" />
        <h4 class="scale-21-21-18"><?php the_field('started_minititle_three'); ?></h4>
    <p class="scale-18-18-16"><?php the_field('started_minitext_three'); ?></p>
  </div>

</div>
</div>
 </div>


<div class="desktop-sort section-sort-tab">
  <div class="inner-wrap-1200">
  <h2 class="scale-36-30-24">
The best mobile inventory in the industry — at your fingertips, via Deal ID
  </h2>

<table id="myTable">
    <colgroup>
    <col class="main" />
    <col class="des"/>
    <col class=""/>
    <col class="des" />
    <col class=""/>
  </colgroup>

  <tr>
   <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
    <th class="fixed-14 firsttitle" onclick="sortTable(0)">Criteria</th>
    <th class="fixed-14" onclick="sortTable(1)">GEO</th>
    <th style="padding:  0 4px;"></th>
    <th class="fixed-14" onclick="sortTable(3)">Formats</th>
    <th class="fixed-14" onclick="sortTable(4)">Deal ID</th>

  </tr>
 
        <?php if( have_rows('rowtab') ): ?>
        <?php $count = 0; ?>
          <?php while( have_rows('rowtab') ): the_row(); ?>
          <?php $count += 1; ?>
           <tr class="space <?php the_sub_field('highlight'); ?>">
             <td class="fixed-16 crit"><div class="borders-m"><?php the_sub_field('criteria'); ?></div></td>
             <td class="fixed-16 data wbd"><?php the_sub_field('geo'); ?></td>
             <td style="border-bottom: 4px solid #fff; padding: 0 4px"></td>
             <td class="fixed-16 data wbd"><div class="borders-m"><?php the_sub_field('formats'); ?></div></td>
             <td class="fixed-16 data nwbd"><div class="borders-m"><?php the_sub_field('deal'); ?></div></td>
           </tr>

          <?php endwhile; ?>
        <?php endif; ?>

</table>
<p class="footnote fixed-14">* Highlighted fields are Deal IDs that are currently available within TTD’s Premium Marketplace. These deals are searchable with TTD’s UI and immediately available for campaign targeting.</p>
</div>
</div>


<div class="mobile-sort section-sort-tab">
  <div class="inner-wrap-1200">
  <h2 class="scale-36-30-24">
The best mobile inventory in the industry — at your fingertips, via Deal ID
  </h2>

<div id="myTable">

 
        <?php if( have_rows('rowtab') ): ?>
        <?php $count = 0; ?>
          <?php while( have_rows('rowtab') ): the_row(); ?>
          <?php $count += 1; ?>
           <div class="<?php the_sub_field('highlight'); ?>">
            <div class="mobile-row">
             <p class="fixed-16 mobilebtn crit"><?php the_sub_field('criteria'); ?></p>
             <div class="mobile-part">
              <div class="mobile-line">
                <p class="fixed-14 mini-t">GEO</p>

             <p class="fixed-16 data"><?php the_sub_field('geo'); ?></p>
           </div>
                       <div class="mobile-line">
    <p class="fixed-14 mini-t">Formats</p>
             <p class="fixed-16 data"><?php the_sub_field('formats'); ?></p>
           </div>
                       <div class="mobile-line">
    <p class="fixed-14 mini-t">Deal ID</p>
             <p class="fixed-16 data"><?php the_sub_field('deal'); ?></p>
           </div>
           </div>
           </div>
           </div>

          <?php endwhile; ?>
        <?php endif; ?>

</div>
<p class="footnote fixed-14">* Highlighted fields are Deal IDs that are currently available within TTD’s Premium Marketplace. These deals are searchable with TTD’s UI and immediately available for campaign targeting.</p>
</div>
</div>
<?php include('pagessections/simple-grid-w-title-w-floating.php'); ?>

<div class="cta cta-dark">
    <div class="inner-wrap-1200">
  <img class="alx-cta-img" src="/wp-content/themes/applovin/images/primary_white.svg" alt="ALX" loading="lazy" />
  <h2 class="scale-36-30-24"><?php the_field('cta_title'); ?></h2>
  <p class="scale-21-21-18"><?php the_field('cta_text'); ?></p>
</div>
</div>

</div>

</div>
</div>
<!-- -->
</div>
</div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
var accqa = document.getElementsByClassName("mobilebtn");
var f;

for (f = 0; f < accqa.length; f++) {
  accqa[f].addEventListener("click", function() {
    this.classList.toggle("active-qa");
    var panelqa = this.nextElementSibling;
    if (panelqa.style.display === "block") {
      panelqa.style.display = "none";
    } else {
      panelqa.style.display = "block";
    }
  });
}
</script>

<?php get_footer(); ?>