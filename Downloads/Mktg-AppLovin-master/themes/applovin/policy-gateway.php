<?php
/*
Template Name: Policy Center Gateway
*/
?>
<?php get_header(); ?>
<div class="policiesPage">
	<div class="title-row gateway-title-row"><?php the_title( '<h1>', '</h1>' ); ?></div>
	<div class="container">
		<div id="content">
			<div class="wrap">
					<div class="main-col">
					<?php the_content(); ?>
					<div class="gateway-menu-wrap">
					<h4>Policies</h4>
					<?php if ( has_nav_menu( 'sidenav-1' ) ) : ?>
					<?php
						$args = array(
						'theme_location'  => 'sidenav-1',
						'container'       => false,
						'menu_id'         => 'sidenav-1',
						);
					?>
					<?php wp_nav_menu( $args ); ?>
					<?php endif; ?>
					</div>
					<div class="gateway-menu-wrap">
					<h4>Terms</h4>
					<?php if ( has_nav_menu( 'sidenav-2' ) ) : ?>
					<?php
						$args = array(
						'theme_location'  => 'sidenav-2',
						'container'       => false,
						'menu_id'         => 'sidenav-2',
						);
					?>
					<?php wp_nav_menu( $args ); ?>
					<?php endif; ?>
					</div>
					</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>