<?php
/*
Template Name:Reports Overview Page
*/
?>


<?php get_header(); ?>
<style>
    .slide-quote {
        padding-bottom: 0!important;
        padding-top: 0!important;
    }
.guide-section {
    padding-bottom: 60px;
}

.report-section {
    padding-top: 60px;
    padding-bottom: 120px;
}

.hz-scrollable  .slide-quote-business {
    padding-bottom: 40px!important;
}

.date-rg {
    color: #999;
    text-transform: uppercase;
    font-family: var(--font-wt-Heavy);
    font-weight: 700;
}

@media screen and (max-width: 1024px) {
.report-section {
    padding-top: 40px;
    padding-bottom: 80px;
}
.guide-section {
    padding-bottom: 40px;
}
}

@media screen and (max-width: 764px) {
    .guide-section {
    padding-bottom: 32px;
}

.report-section {
    padding-top: 32px;
    padding-bottom: 64px;
}
.reportspage h2 {
    margin-bottom: 32px;
}
.slide-with-scroll h2 {
    margin-bottom: 40px!important;
}
}

</style>

<?php 

// Assuming ACF is installed and active
$current_language = pll_current_language();
$base_url_one = get_home_url();
$url_one = $base_url_one . '/ctv-report';

$page_id_one = url_to_postid($url_one);

$hero_title_one = get_field("hero_title", $page_id_one);

$base_url_two = get_home_url();
$url_two = $base_url_two . '/sparklabs/creative-trends/';

$page_id_two = url_to_postid($url_two); 

$hero_title_two = get_field("hero_title", $page_id_two);

$base_url_three = get_home_url();
$url_three = $base_url_three . '/sparklabs/creative-trends-2023/';

$page_id_three = url_to_postid($url_three); 

$hero_title_three = get_field("hero_title", $page_id_three);


?>
<div class="reportspage row-modern-gray-200">

<div class="guide-section">
    <div class="inner-wrap inner-wrap-1200">
        <h2 class="scale-32-24-21">
        <?php pll_e('Guides') ; ?>
        </h2>
    </div>


<div class="reportslisting slide-quote-container hz-scrollable" id="content-slide">
    <div class="slide-quote">
        <?php
        $args = array(
            'post_type' => 'guide_pod',
            'posts_per_page' => -1
        );
        $custom_posts = new WP_Query($args);

if ($custom_posts->have_posts()) :
    while ($custom_posts->have_posts()) : $custom_posts->the_post();

        // Start output buffering and capture the value of 'ext_link'
        ob_start();
        the_field('ext_link');
        $ext_link = ob_get_clean();
        ?>
        <div class="change-hand">
<a href="<?php echo !empty(get_field('ext_link')) ? esc_url(get_field('ext_link')) : get_permalink(); ?>" class="" <?php echo !empty(get_field('ext_link')) ? 'target="_blank"' : ''; ?>>
                        <div class="slide-quote-solo slide-quote-solo-not-hover" style="background: <?php the_field( 'background_color'); ?>;">
                            <div class="quote-text">
                                <h3 class="scale-24-21-18" style="color: <?php the_field( 'text_color'); ?>;">
                                    <?php the_title(); ?>
                                </h3>
                                <!-- <p class='date-rg fixed-12'><?php the_date('F j, Y' ); ?></p> -->

                            </div>
                            <div class="report-img">
                                    <img src="<?php the_field( 'pod_bg_art'); ?>" alt="">
                                                <p class='timeCode <?php echo !empty($ext_link) ? 'timeCode-out' : ''; ?>'><?php pll_e('Guide'); ?>
</p>
            <?php if (!empty($ext_link)) : ?>
                <p class='timeCode'>&#x2197;</p>
            <?php endif; ?>

                            </div>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>' . pll__('No guides found') . '</p>';
        endif;
        ?>
    </div>
</div>

</div>


<div class="report-section">

    <div class="inner-wrap inner-wrap-1200">
        <h2 class="scale-32-24-21">
        <?php pll_e('Reports') ; ?>
        </h2>
    </div>
    <div class="reportslisting slide-quote-container hz-scrollable" id="content-slide">
        <div class="slide-quote">
        <?php
        $args = array(
            'post_type' => 'report_pod',
            'posts_per_page' => -1
        );
        $custom_posts = new WP_Query($args);

if ($custom_posts->have_posts()) :
    while ($custom_posts->have_posts()) : $custom_posts->the_post();

        // Start output buffering and capture the value of 'ext_link'
        ob_start();
        the_field('ext_link');
        $ext_link = ob_get_clean();
        ?>
        <div class="change-hand">
<a href="<?php echo !empty(get_field('ext_link')) ? esc_url(get_field('ext_link')) : get_permalink(); ?>" class="" <?php echo !empty(get_field('ext_link')) ? 'target="_blank"' : ''; ?>>
                        <div class="slide-quote-solo slide-quote-solo-not-hover" style="background: <?php the_field( 'background_color'); ?>;">
                            <div class="quote-text">
                                <h3 class="scale-24-21-18" style="color: <?php the_field( 'text_color'); ?>;">
                                    <?php the_title(); ?>
                                </h3>
                             <!--  <p class='date-rg fixed-12'><?php the_date('F j, Y' ); ?></p> -->
                            </div>
                            <div class="report-img">
                                    <img src="<?php the_field( 'pod_bg_art'); ?>" alt="">
                                                <p class='timeCode <?php echo !empty($ext_link) ? 'timeCode-out' : ''; ?>'><?php pll_e('Report'); ?>
</p>
            <?php if (!empty($ext_link)) : ?>
                <p class='timeCode'>&#x2197;</p>
            <?php endif; ?>

                            </div>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>


            <div class="change-hand">
                <a href="<?php the_lang_base(); ?>/ctv-report/" class=""> 
                <div class="slide-quote-solo slide-quote-solo-not-hover" style="background: linear-gradient(180deg, #F7F8FC 0%, #E0DFF4 100%);">
                    <div class="quote-text">
                        <h3 class="scale-24-21-18" style="color: #000">
<?php echo $hero_title_one ; ?>
                        </h3>
                    </div>
                    <div class="report-img">
                        <img src="/wp-content/themes/applovin/images/ctvwrapper.svg"> 
                        <p class='timeCode'>
<?php pll_e('Report') ; ?>
                        </p>
                    </div>
                </div>
                </a> 
            </div>
            <div class="change-hand">
                <a href="<?php the_lang_base(); ?>/sparklabs/creative-trends/" class=""> 
                <div class="slide-quote-solo slide-quote-solo-not-hover" style="background-color: #FCF6ED;">
                    <div class="quote-text">
                        <h3 class="scale-24-21-18" style="color: #000;">
<?php echo $hero_title_two ; ?>
                        </h3>
                    </div>
                    <div class="report-img">
                        <img src="/wp-content/themes/applovin/images/CTR2024_Report_Thumbnail@2x.png"> 
                        <p class='timeCode'>
<?php pll_e('Report') ; ?>
                        </p>
                    </div>
                </div>
                </a> 
            </div>

                        <div class="change-hand">
                <a href="<?php the_lang_base(); ?>/sparklabs/creative-trends-2023/" class=""> 
                <div class="slide-quote-solo slide-quote-solo-not-hover" style="background: linear-gradient(180deg, #181625 25.52%, #AE0E91 100%);;">
                    <div class="quote-text">
                        <h3 class="scale-24-21-18" style="color: #fff;">
<?php echo $hero_title_three ; ?>
                        </h3>
                    </div>
                    <div class="report-img">
                        <img src="/wp-content/themes/applovin/images/performancewrapper.svg"> 
                        <p class='timeCode'>
<?php pll_e('Report') ; ?>
                        </p>
                    </div>
                </div>
                </a> 
            </div>

        </div>
    </div>
        </div>

<?php include('template-parts/slide-ojoective.php'); ?>
<?php get_template_part('template-modules/email-signup');?>
<?php get_footer(); ?>
    <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
        var scrollContentV2 = document.querySelector('.slide-quote-business');
        var scrollContainerV2 = document.querySelector('#myScrollbarContainer');
        
        scrollContainerV2.style.height = '6px';
        scrollContainerV2.style.background = '#ddd'; 
        scrollContainerV2.style.width = '95%'; 
        scrollContainerV2.style.maxWidth = '1200px'; 
        scrollContainerV2.style.margin = '0 auto'; 
        
        if (window.innerWidth <= 765) {
          scrollContainerV2.style.maxWidth = '220px';
        }
        
        
        var scrollbarV2 = document.createElement('div');
        
        scrollbarV2.style.background = 'linear-gradient(270deg, #F73371 13.35%, #6841E0 146.46%)'; 
        scrollbarV2.style.height = '6px';
        scrollbarV2.style.position = 'absolute';
        
        scrollContainerV2.appendChild(scrollbarV2);
        
        function updateScrollbarV2() {
            var scrollWidthV2 = scrollContentV2.scrollWidth;
            var scrollLeftV2 = scrollContentV2.scrollLeft;
            var clientWidthV2 = scrollContentV2.clientWidth;
            var scrollbarWidthV2 = clientWidthV2 / scrollWidthV2 * scrollContainerV2.clientWidth;
            var scrollbarLeftV2 = scrollLeftV2 / scrollWidthV2 * scrollContainerV2.clientWidth;
        
            scrollbarV2.style.width = scrollbarWidthV2 + 'px';
            scrollbarV2.style.left = scrollbarLeftV2 + 'px';
        }
        
        scrollContentV2.addEventListener('scroll', updateScrollbarV2);
        
        scrollbarV2.addEventListener('mousedown', function (e) {
            var startXV2 = e.pageX;
            var scrollbarStartXV2 = scrollbarV2.offsetLeft;
        
            function onMouseMoveV2(e) {
                var currentXV2 = e.pageX;
                var diffXV2 = currentXV2 - startXV2;
                var newScrollLeftV2 = (diffXV2 / scrollContainerV2.clientWidth) * scrollContentV2.scrollWidth;
        
                scrollContentV2.scrollLeft = newScrollLeftV2 + scrollbarStartXV2 * (scrollContentV2.scrollWidth / scrollContainerV2.clientWidth);
            }
        
            document.addEventListener('mousemove', onMouseMoveV2);
        
            document.addEventListener('mouseup', function () {
                document.removeEventListener('mousemove', onMouseMoveV2);
            }, { once: true });
        }, { passive: true });
        
        updateScrollbarV2();
    </script>