<?php
/*
Template Name: Studios Page
*/
?>
<?php get_header(); ?>
	<div class="contentPage">
		<div id="page-studios" class="studios-overview">

    <div class="row hero full-height fixed-bg row-full">
<video class="games-bg-video" id="home-bg-video" autoplay muted loop playsinline>
                <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
                if (jQuery(window).width() <= 640) {
                        document.write('<source id="home-video-src" src="/wp-content/themes/applovin/assets/home-video-bg-2020-mobile-v2.mp4" type="video/mp4">');
                } else if (jQuery(window).width() <= 768)  {
                        document.write('<source id="home-video-src" src="/wp-content/themes/applovin/assets/home-video-bg-2020-tablet-v2.mp4" type="video/mp4">');              
                } else {
                        document.write('<source id="home-video-src" src="/wp-content/themes/applovin/assets/home-video-bg-2020-full.mp4" type="video/mp4">');               
                };
                </script>
                </video>
        <div class="inner-wrap">
            <h1>
                <?php the_field('hero_title'); ?>
            </h1>
        </div>
        <img src="/wp-content/themes/applovin/images/home-wave-top.svg" class="home-wave-top" /> 
    </div>
    <div class="row content-row hit-games-row">
        <div class="inner-wrap inner-wrap-800">
            <h4>
                <?php the_field('hero_intro'); ?>
            </h4>
        </div>
        <div id="game-slider-wrap">
        <div class="phone-mask"><div class="phone-notch"></div></div>
        <div style="min-height:500px;background-image:url(/wp-content/themes/applovin/images/home-slider-fade-bg-dark-v2.svg);background-repeat:repeat-x;background-size:contain;z-index:100;" id="home-slider">
        
        <div><img src="/wp-content/themes/applovin/images/ProjectMakeover.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/InkInc.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/GameofWar.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/home-slider-wordscapes.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/bingo-story-main-slider.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/SolotaireCruise.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/home-slider-sweet-escapes.jpg" alt="" class="slider-img" loading="lazy"></div>
        
         <div><img src="/wp-content/themes/applovin/images/tpir-bingo-main-slider.jpg" alt="" class="slider-img" loading="lazy"></div>

        <div><img src="/wp-content/themes/applovin/images/CookingMadness.jpg" alt="" class="slider-img" loading="lazy"></div>
        <div><img src="/wp-content/themes/applovin/images/home-slider-matchington-mansion.jpg" alt="" class="slider-img" loading="lazy"></div>
        
        </div>
        </div>
        <img class="sprite sprite-home-bingo" data-rellax-speed="-1" src="/wp-content/themes/applovin/images/side-asset-clipwire.png"/>
        <img class="sprite sprite-home-piggy" data-rellax-speed="-1" src="/wp-content/themes/applovin/images/studios-sprite-forever9-piggy.png" />
        <img class="sprite sprite-home-fruit" data-rellax-speed="-1" src="/wp-content/themes/applovin/images/sprite-home-fruit.png" />
        <img class="sprite sprite-home-gem" data-rellax-speed="-2" src="/wp-content/themes/applovin/images/sprite-home-gem.png" />
        <img class="sprite sprite-home-sweetesc" data-rellax-speed="-1" src="/wp-content/themes/applovin/images/sprite-home-sweetesc.png" />
    </div>


			<div class="row content-row gradient-bg-ink">
				<div class="inner-wrap inner-wrap-1200">
				<div class="studios-outer-wrapper">
<?php $args = array( 'post_type' => 'studio', 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => -1 );  // retrieve 'studio' category, with default sorting/display options
						
				$mylang = get_field('page_language'); // create a var holding page lang field for use in the Loop
				
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();

					echo '<div class="studios-pod">
					<a href="' . get_permalink() . '">
							<div class="studios-logo-header">';
              $mini_background = get_field('mini_background');
              if( !empty($mini_background) ) { // only render bg image code if asset is present
                echo '<img class="studio-bg-thumb" src="' . esc_url($mini_background) . '" alt="">';
              }
              echo '<img src="' . get_field('studio_mini_logo') . '" alt="' . get_the_title() . '">
						  	</div>
						  </a>
						  <p>' . get_field('studio_short_description') . '</p>
						  </div>
						  ';

				endwhile; ?>
<?php wp_reset_postdata(); ?>
				</div>
				</div>
			</div>
		</div>
</div>






<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">

jQuery(document).ready(function () {

  jQuery('#home-slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        touchMove: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        pauseOnDotsHover: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        responsive: [{
            breakpoint: 1200,
            settings: {slidesToShow: 3, centerMode: true, centerPadding: "50px"}
        }, {breakpoint: 820, settings: {slidesToShow: 3, centerMode: true, centerPadding: "0"}}, {
            breakpoint: 725,
            settings: {slidesToShow: 1, centerMode: false}
        }]
  });

});

</script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var vid = document.getElementById("home-bg-video");
  var source = document.getElementById("home-video-src");
  var initw = jQuery(window).width();
  
window.addEventListener("resize", function(){
  
if (jQuery(window).width() <= 640 && initw > 640) {
    source.src = "/wp-content/themes/applovin/assets/home-video-bg-2020-mobile.mp4";
    vid.load();
  } else if ( ( (jQuery(window).width() > 640) && (jQuery(window).width() <= 768) ) && ( initw <= 640 || initw > 768 ) )  {
    source.src = "/wp-content/themes/applovin/assets/home-video-bg-2020-tablet.mp4";
    vid.load();
  } else if ( jQuery(window).width() > 768 && initw <= 768 ) {
    source.src = "/wp-content/themes/applovin/assets/home-video-bg-2020-full.mp4";
    vid.load();
  }
  initw = jQuery(window).width();
});
</script>

<?php get_footer(); ?>
