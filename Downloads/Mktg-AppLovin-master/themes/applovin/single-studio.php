<?php
/*
 * Template Name: Studio Page
 * Template Post Type: post
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
			$mylang = 'lang-en'; // default page lang
        	$langDetect = get_language_attributes();

			$mylangraw = get_query_var( 'cc', '' ); // check for query string requesting alt page lang (assumes 2-char code)
			$mylang = sanitize_text_field( 'lang-' . $mylangraw );
			echo '<!-- My Lang = ' . $mylang .  ' -->';
			
            $studiophoto = get_field('studio_photo');
            $studiodata = get_field('employee_number');
            $studiomap = get_field('city_description');
            $studioshort = get_field('studio_main_title_description');
            $studiocity = get_field('image_city');
            $studiophototitle = get_field('studio_main_title_description');
            $studiosideasset = get_field('game_side_image');

			// defaults for global text and link path setups
			$labelemps = pll__('Employees');
			$labelhq = pll__('Headquarters');
			$labelyear =  pll__('Founding year');
			$labelgames =  pll__('See more games');
			$labelstudios = pll__('Back to Studios');
			$labelmore = pll__('Learn more about') . ' ' .get_the_title();
			$langpath = ''; // appended to on-site page links
			
			if ( str_contains($langDetect, "ko-KR") || str_contains($langDetect, "ja")) {
			$labelmore = get_the_title() . ' ' . pll__('Learn more about') ;

			}
			
            ?>

<div class="studioPage <?php echo get_the_title(); ?>">
<?php 
$main_background = get_field('main_background');
?>

<div class="row hero hero-main" 
     <?php if( !empty($main_background) )  : // only render bg image code if asset is present ?> 
         style="background-image: url('<?php echo esc_url($main_background); ?>');"
     <?php endif; ?>
>

     <div class="wrap">
        <div class="studio-inner-wrap">
                <div class="bio-copy">
                    <div class="default-logo">
                        <img src="<?php the_field('studio_mini_logo'); ?>" alt="<?php echo get_the_title(); ?> logo">
                    </div>
                </div>
        </div>
    </div>
</div>

<?php 
    if (empty($studiodata)) {?>
<div class="row hero studio-description no-stats">
<? } else { ?>
<div class="row hero studio-description">
     <?php } ?>
     <div class="wrap">
        <div class="studio-inner-wrap inner-wrap inner-wrap-1000">
            <div class="content">
<?php 
    if (!empty($studiophototitle)) {?>
    <div class="bio-studio">
 <?php } ?>

<?php 
    if (empty($studiophototitle)) {?>
    <div class="bio-studio  small-hero">
<?php } ?>
								<h3>
<?php the_field('studio_main_title'); ?>
								</h3>
								<h6>
<?php the_field('studio_main_subtitle'); ?>
								</h6>
							</div>
						</div>
					</div>
				</div>
<?php {?>

<?php 
    if (empty($studiophototitle)) {?>
				<div class="hero-photo minimal" style="min-height: 0;">
					<a href="<?php the_field('studio_info_link'); ?>" target="_blank" rel="noreferrer"><?php echo $labelmore ?>
					</a> 
				</div>
				<div>
					<hr class="line1" style="border-color: <?php the_field('stripe'); ?>; background-color: <?php the_field('stripe'); ?>;">
				</div>
<?php } ?>
<? if (!empty($studiodata) && !empty($studiophoto)): ?>
  <img src="<?php the_field('game_side_image'); ?>" alt="<?php echo get_the_title(); ?> game art">
<? elseif (empty($studiophoto) && !empty($studiosideasset)): ?>
<img src="<?php the_field('game_side_image'); ?>" alt="<?php echo get_the_title(); ?> game art" style="bottom: 0px;">
<? endif; ?>

 <?php } ?>


</div>

<?php 

    if (!empty($studiodata)) {?>
			<div class="inner-wrap studio studio-data" style="background-color: <?php the_field('background_color_data'); ?>;">
				<div class="wrap">
					<div class="content">
						<div class="studio-inner-wrap">
							<div class="nb-studio">
								<span> 
								<h2>

<?php the_field('employee_number'); ?>
								</h2>
								<p>
<?php echo $labelemps ?>
								</p>
								</span> <span> 
								<h3 class="mobile-studio hq">

<?php the_field('headquarters'); ?>
								</h3>
								<p class="mobile-studio hq-title">
<?php echo $labelhq ?>
								</p>
								</span><span> 
								<h2>

<?php the_field('founding_year'); ?>
								</h2>
								<p>
<?php echo $labelyear ?>
								</p>
								</span> 
							</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>
<?php 
    if (!empty($studiomap)) {?>
			<div class="desktop studio hero-map inner-wrap" style="background-image: url('<?php the_field('world_map'); ?>');">
				<div class="wrap">
					<div class="inner-wrap studio-inner-wrap">
						<div class="bio-copy">
							<div class="default-city-description">
								<p>
<?php the_field('city_description'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="iphone studio hero-map inner-wrap" style="background-image: url('<?php the_field('world_map_small'); ?>');">
				<div class="wrap">
					<div class="studio-inner-wrap">
						<div class="bio-copy">
							<div class="default-city-description">
								<p>
<?php the_field('city_description'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>
<?php 
    if (!empty($studiocity)) {?>
<div id="container-bis">
    <div class="row studio studio-description-bis" style="background-image: url('<?php the_field('image_city'); ?>');">
     <div class="wrap">
        <div class="studio-inner-wrap">
        </div>
  </div>  
</div>
<?php } ?>

<?php 
    if (!empty($studiophototitle)) {?>
				<div class="studio studio-short" style="background-color: <?php the_field('background_color_short'); ?>;">
					<div class="inner-wrap inner-wrap-600 studio-inner-wrap">
						<div class="history-studio">
							<h3>
<?php the_field('studio_main_title_description'); ?>
							</h3>
							<p>
<?php the_field('studio_sub_description'); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="inner-wrap inner-wrap-1200 studio hero-photo">
<?php 
            if (!empty($studiophoto)) {?>
					<img class="desktop-studio-photo" src="<?php the_field('studio_photo'); ?>');" alt="<?php echo get_the_title(); ?>"> <img class="iphone-studio-photo" src="<?php the_field('studio_photo_small'); ?>');" alt="<?php echo get_the_title(); ?>"> 
<?php } ?>
					<div class="wrap">
						<div class="studio-inner-wrap">
							<div class="bio-copy">
<?php 
            if (!empty($studiophoto)) {?>
								<a href="<?php the_field('studio_info_link'); ?>" target="_blank" rel="noreferrer"><?php echo $labelmore ?>
								</a> 
<?php } ?>
<?php 

            if (empty($studiophoto)) {?>
								<a class="link-small-studio" href="<?php the_field('studio_info_link'); ?>" target="_blank" rel="noreferrer"><?php echo $labelmore ?>
								</a> 
<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>
<?php 
    if (empty($studiophototitle)) {?>
			<div class="row content-row-short studio studio-games" style="top: 0em">
<?php } ?>
<?php 
    if (!empty($studiophototitle)) {?>
				<div class="row content-row-short studio studio-games">
<?php } ?>
					<div class="wrap">
						<div class="studio-inner-wrap inner-wrap inner-wrap-800">
							<div class="game-list">
								<h3>
<?php the_field('games_section_main_title'); ?>
								</h3>
								<p>
<?php the_field('games_section_description'); ?>
								</p>
								<div class="games-outer-wrapper">
<?php 

                $posts = get_field('highlighted_games');

                if( $posts ): ?>
<?php foreach( $posts as $p ): ?>
<?php 

    echo '
    <!-- ' . get_the_title($p->ID) . ' -->
    <div class="game-pod all-games all-studios ';
    echo '">
    <img class="game-icon" src="'; 
    echo the_field('game_icon', $p->ID);
    echo '" alt="' . get_the_title($p->ID) . '" loading="lazy">
    <div class="game-shader">';


	echo '<h6>';
				if ( $mylang == "lang-kr" && get_field('title_kr', $p->ID) ) :
					echo the_field('title_kr', $p->ID);
				elseif ( $mylang == "lang-jp" && get_field('title_jp', $p->ID) ) :
					echo the_field('title_jp', $p->ID);
				elseif ( $mylang == "lang-cn" && get_field('title_cn', $p->ID) ) :
					echo the_field('title_cn', $p->ID);
				else : 					
					echo get_the_title($p->ID);
				endif;


    echo '</h6>
    <div class="game-details-wrap">
    <div class="app-button-wrap">';

                $iosbtn = "/wp-content/themes/applovin/images/btn-app-store.svg";
                $gpbtn = "/wp-content/themes/applovin/images/btn-google-play.svg";
                $iosalt = "Download on the App Store";
                $gpalt = "Get it on Google Play";

                    if ( $mylang == "lang-kr" && get_field('app_store_url_kr', $p->ID) ) : 
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('app_store_url_kr', $p->ID);
                        echo '"><img src="' . $iosbtn . '" alt="' . $iosalt . '" /></a>';
                    elseif ( $mylang == "lang-jp" && get_field('app_store_url_jp', $p->ID) ) :
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('app_store_url_jp', $p->ID);
                        echo '"><img src="' . $iosbtn . '" alt="' . $iosalt . '" /></a>';
                    elseif ( $mylang == "lang-cn" && get_field('app_store_url_cn', $p->ID) ) :
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('app_store_url_cn', $p->ID);
                        echo '"><img src="' . $iosbtn . '" alt="' . $iosalt . '" /></a>';
                    elseif ( get_field('app_store_url', $p->ID) ) :
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('app_store_url', $p->ID);
                        echo '"><img src="' . $iosbtn . '" alt="' . $iosalt . '" /></a>';
                    endif;

                    if ( $mylang == "lang-kr" && get_field('google_play_url_kr', $p->ID) ) : // check for App Store links
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('google_play_url_kr', $p->ID);
                        echo '"><img src="' . $gpbtn . '" alt="' . $gpalt . '" /></a>';
                    elseif ( $mylang == "lang-jp" && get_field('google_play_url_jp', $p->ID) ) :
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('google_play_url_jp', $p->ID);
                        echo '"><img src="' . $gpbtn . '" alt="' . $gpalt . '" /></a>';
                    elseif ( get_field('google_play_url', $p->ID) ) :
                        echo '<a target="_blank" rel="noreferrer" href="';
                        echo the_field('google_play_url', $p->ID);
                        echo '"><img src="' . $gpbtn . '" alt="' . $gpalt . '" /></a>';
                    endif;
                       echo '</div></div></div>';
                    ?>
								</div>
<?php endforeach; ?>
<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>
