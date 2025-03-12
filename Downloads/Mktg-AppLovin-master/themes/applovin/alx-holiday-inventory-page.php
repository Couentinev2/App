<?php
/*
Template Name: ALX Holiday Inventory Page
*/
?>
<?php get_header(); ?>

<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/simple-grid-w-title-w-floating.css' type='text/css' media='' />
  
<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/alx-inventory.css' type='text/css' media='' />

<div class="contentPage">
    
<?php $langDetect = get_language_attributes(); ?> 

<div id=" alx-nventory">
<div class="">

<div class="hero row light-gray">
  <div class="inner-wrap inner-wrap-1200">
    <div class="div1">
   <a href="../../alx/" target="_blank"> <img class="logo-alx" src="/wp-content/themes/applovin/images/alx-logo.svg" alt="ALX" loading="lazy" /></a>
      <h1 class="scale-50-40-28">
        <?php the_field('hero_title'); ?>
      </h1>
      <p class="scale-21-21-18"><?php the_field('hero_text'); ?></a>
    </div>
    <div class="div2">
      <object class="alx-hero-img" data="/wp-content/themes/applovin/images/illo_alx_catalog_header_2024.svg" alt="ALX" loading="lazy"></object>
  </div>
  </div>
</div>  

<div class="get-started-section light-gray">
    <div class="inner-wrap-1200">
  <h2 class="scale-36-30-24"> <?php the_field('started_title'); ?></h2>

<div class="perks-alx">

  <div class="perks">
    <img class="logo-perks" src="/wp-content/themes/applovin/images/icon-alx-seamless-activation-lightbg.svg" alt="Activation icon" loading="lazy" />
    <h4 class="scale-21-21-18"><?php the_field('started_minititle_one'); ?></h4>
    <p class="scale-18-18-16"><?php the_field('started_minitext_one'); ?></p>
  </div>
  <div class="perks">
    <img class="logo-perks" src="/wp-content/themes/applovin/images/icon-alx-custom-curation-lightbg.svg" alt="Inventory icon" loading="lazy" />
     <h4 class="scale-21-21-18"><?php the_field('started_minititle_two'); ?></h4>
    <p class="scale-18-18-16"><?php the_field('started_minitext_two'); ?></p>
  </div>
  <div class="perks">
    <img class="logo-perks" src="/wp-content/themes/applovin/images/icon-alx-instant-scale-lightbg.svg" alt="Scale icon" loading="lazy" />
        <h4 class="scale-21-21-18"><?php the_field('started_minititle_three'); ?></h4>
    <p class="scale-18-18-16"><?php the_field('started_minitext_three'); ?></p>
  </div>

</div>
</div>
 </div>

<div class="section-sort-tab">
  <div class="inner-wrap inner-wrap-1200">
  <h2 class="scale-36-30-24">
<?php the_field('deals_tables_title'); ?>
</h2>

<?php
// Check rows exist
if( have_rows('inventory_tables') ):

    // Loop through rows
    while( have_rows('inventory_tables') ) : the_row();

?>
        
        
<div class="deals-table">
	<div class="deals-table-head">
		<img src="<?php the_sub_field('table_icon'); ?>" alt="icon for the <?php the_sub_field('table_title'); ?> category" /><div><h2 class="scale-24-21-18"><?php the_sub_field('table_title'); ?></h2><p class="scale-18-18-16"><?php the_sub_field('table_intro'); ?></p></div>
	</div>
	<div class="deals-table-apps">
		<h3>Top Incl. Apps</h3>
<?php
// Check rows exist
if( have_rows('included_apps') ):

    // Loop through rows
    while( have_rows('included_apps') ) : the_row();

?>
		<div class="deals-app-row">
			<img src="<?php the_sub_field('app_icon'); ?>" alt="app icon for <?php the_sub_field('app_name'); ?>" /><span class="scale-18-18-16"><?php the_sub_field('app_name'); ?></span>
		</div>
<?php
    endwhile;

else :
echo 'Sorry, nothing to see here.';
endif;

?>
	</div>
	<div class="deals-table-specs">
		<div class="deals-data">
			<div class="deals-data-pod">
				<h3>Number of Apps</h3>
				<span class="scale-21-21-18"><?php the_sub_field('number_of_apps'); ?></span>
			</div>
			<div class="deals-data-pod">
				<h3>Scale</h3>
				<span class="scale-21-21-18"><?php the_sub_field('scale'); ?><em> / imps a week</em></span>
			</div>
		</div>
	</div>
	<div class="deals-table-ids">
		<h3>Deal IDs</h3>
		<div class="deals-id-pods-wrap">
<?php
// Check rows exist
if( have_rows('deal_ids') ):

    // Loop through rows
    while( have_rows('deal_ids') ) : the_row();

?>
			<div class="deals-id-pod clip-link" data-clipboard-text="<?php the_sub_field('deal_id_label'); ?>">
				<span><?php the_sub_field('deal_id_label'); ?></span><img src="/wp-content/themes/applovin/images/icon-copy-text.svg" alt="" />
			</div>
<?php
    endwhile;

else :
echo 'Sorry, nothing to see here.';
endif;

?>
		</div>
	</div>
</div>

        
        
<?php
    endwhile;

else :
echo 'Sorry, nothing to see here.';
endif;

?>

</div>
</div>


<div class="cta">
    <div class="inner-wrap-800">
  <img class="alx-cta-img" src="/wp-content/themes/applovin/images/alx-logov1.svg" alt="ALX" loading="lazy" />
  <h2 class="scale-36-30-24"><?php the_field('cta_title'); ?></h2>
  <a class="btn-standard cta-pop-form" href="<?php the_field('cta_url'); ?>"><?php the_field('cta_label'); ?></a>
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

// initialize clipboard JS
new ClipboardJS('.clip-link');

// click confirmation popups
var clipLinks = document.querySelectorAll('.clip-link');
for (var i = 0; i < clipLinks.length; i++) {
    clipLinks[i].addEventListener('click', showTooltip);
}
function clearTooltip(t) {
    t.classList.remove('clicked');
}
function showTooltip(e) {
    e.currentTarget.classList.add('clicked');
    let myTarget = e.currentTarget;
    setTimeout(function(){clearTooltip(myTarget)}, 2500)
}

</script>


<?php get_footer(); ?>