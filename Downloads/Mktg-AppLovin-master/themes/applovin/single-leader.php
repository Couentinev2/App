<?php
/*
 * Template Name: Leader Bio
 * Template Post Type: post
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="pressPage" class="bioPage">
<div class="row">
	<div class="wrap">
		<div class="leader-bio-inner-wrap">
			<div class="bio-content">
				<div class="bio-copy">
					<div class="default-bio-text"><h5 class="bio-title">
<?php the_field('leader_title'); ?>
					</h5>
					<h1>
<?php the_field('leader_name'); ?>
					</h1></div>
					<p>
<?php the_field('leader_bio_text'); ?>
					</p>
				</div>
				<div class="bio-image">
				<div class="mobile-bio-text">
				<h5 class="bio-title">
<?php the_field('leader_title'); ?>
					</h5>
					<h1>
<?php the_field('leader_name'); ?>
					</h1>
				</div>
				<?php if ( get_field('leader_headshot_secondary') ) {
					echo '<img src="' . get_field('leader_headshot_secondary') . '" alt="' . get_field('leader_name') . '" class="leader-headshot" />';
				}
				else {
					echo '<img src="' . get_field('leader_headshot') . '" alt="' . get_field('leader_name') . '" class="leader-headshot" />';
				}
				?>
				</div>
			</div>
			<a href="<?php the_lang_base(); ?>/leadership/#leaders" class="promo-link back-link"><?php pll_e('See all AppLovin Leadership') ?></a>
		</div>
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
<?php endwhile; ?>
<?php get_footer(); ?>
