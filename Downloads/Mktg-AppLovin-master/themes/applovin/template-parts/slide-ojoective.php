<style type="text/css">.mainslidlink .quote-text h3 {max-width: 160px}

.mainslidlink .quote-text h3:lang(zh-CN) {max-width: 100%;}
</style>


<div class="slide-with-scroll">
	<div class="inner-wrap inner-wrap-1200">
<?php
    $blog_page_id = get_option('page_for_posts');
    $titlec = get_field('title_scroll', $blog_page_id);
    $business_slideshow = get_field('business_slideshow', $blog_page_id);
    ?>
		<h2 class="scale-32-24-21">
<?php pll_e('Browse by business objective'); ?>
		</h2>
	</div>
	<div class="slide-quote-container hz-scrollable" id="content-slide">
		<div class="slide-quote slide-quote-business">

			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/increase-arpdau/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(/wp-content/themes/applovin/images/c5.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('Increase ARPDAU') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Optimize your ad monetization strategy and drive more revenue') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>

			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/acquire-users/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(/wp-content/themes/applovin/images/ct2.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('Acquire Users') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Hit your performance goals and improve scalability of campaigns') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>

			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/360-growth/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(/wp-content/themes/applovin/images/c2.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('360 Growth') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Improve monetization and UA to create 360º growth for your apps') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>

			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/ad-creatives/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(/wp-content/themes/applovin/images/c4.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('Ad Creatives') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Produce engaging, high-impact ad creatives that drive results') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>

<?php if ( pll_current_language('slug') != 'cn' ) { // hide following 2 panels on CN ?>
			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/premium-supply/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background-image: url( /wp-content/themes/applovin/images/c1.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('Premium Supply') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Reach audiences at scale with direct access to premium in-app supply') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>

			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/protect-users/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(/wp-content/themes/applovin/images/c8.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('Protect Users') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Protect brand and user experience with high-quality, verified inventory') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>
<?php }; ?>

			<div class="change-hand">
				<a href="<?php the_lang_base(); ?>/resource-center/activate-ctv/" class="mainslidlink"> 
				<div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(/wp-content/themes/applovin/images/img-business-objective-activate-ctv@2x.png);">
					<div class="quote-text">
						<h3 class="scale-46-42-36">
<?php pll_e('Activate CTV') ; ?>
						</h3>
						<p class="scale-18-18-16">
<?php pll_e('Extend the impact of your mobile performance campaigns to CTV') ; ?>
						</p>
					</div>
				</div>
				</a> 
			</div>
		</div>
	</div>

	<div class="scrollbar-container" id="myScrollbarContainer">
		<div class="scrollbar">
		</div>
	</div>
</div>
