<?php
/*
Template Name: Press Releases Page
*/
?>
<?php get_header(); ?>
	<div class="contentPage">
	<div id="pressPage" class="releasesPage">
		<div class="hero">
		<div class="inner-wrap">
				<h5>
					<?php the_field('hero_title'); ?>
				</h5>
				<h2>
					<?php the_field('hero_intro'); ?>
				</h2>
		</div>
		</div>
		<div id="stories" class="news-list row">
				<div class="inner-wrap inner-wrap-1200">
<?php 
echo do_shortcode( '[ajax_load_more repeater="template_2" post_type="press_release" posts_per_page="10" scroll="false" transition_container_classes="press-releases-container" button_label="' . pll__('Show more') . '" button_loading_label="' . pll__('Show more') . '"]' ); 
?>
		</div>
		</div>
	<div class="row cta">
		<div class="inner-wrap">
			<h2>
				<?php pll_e('Get in touch.') ?>
			</h2>
			<a class="btn-standard mailto" href="mailto:press@applovin.com">press@applovin.com</a> 
		</div>
	</div>
	</div>
</div> <!-- -->
</div>
</div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>
