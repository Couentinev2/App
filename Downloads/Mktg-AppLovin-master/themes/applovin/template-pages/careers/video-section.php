<!-- Video Section Start -->
<section class="video-section relative w-[100%] h-[722px] md:h-[780px] lg:h-full overflow-hidden" aria-labelledby="video-section-title">
    <video id="backgroundVideo" playsinline autoplay muted loop class="absolute top-0 left-0  w-full h-[320px] md:h-[480px] lg:h-full object-cover z-[1]">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/careerspage-cut-down.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="overlay flex items-end text-white relative z-10 h-[100%]">
        <div class="wrapper">
            <?php 
            // Get the video_section group field
            $video_section = get_field('video_section');

            if ($video_section) {
                // Access the fields within the video_section group
                $h3 = $video_section['h3'];
                $p = $video_section['p'];
                $cta_text = $video_section['cta_text'];

            ?>
            <div class="grid grid-cols-1">
                <div class="max-w-[800px]">
                    <div class="grid gap-[40px]">
                        <div class="grid gap-[12px] md:gap-[15px] lg:gap-[18px]">
                            <h3 class="avenir-black m-0" id="video-section-title"><?php echo esc_html($h3); ?></h3>
                            <p class="scale-21-21-18 m-0"><?php echo esc_html($p); ?></p>
                        </div>

                        <?php if ($cta_text) : ?>
                        <button onclick="openLightbox()" class="secondary-white-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8C0 12.42 3.58 16 8 16C12.42 16 16 12.42 16 8C16 3.58 12.42 0 8 0ZM10.7 8.43L7 10.57C6.67 10.76 6.25 10.52 6.25 10.13V5.87C6.25 5.48 6.67 5.24 7 5.43L10.7 7.57C11.03 7.76 11.03 8.24 10.7 8.43Z" fill="white" />
                            </svg>
                            <span><?php echo esc_html($cta_text); ?></span>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>

    <?php get_template_part('template-modules/applovin-lightbox');?>
    
</section>
<!-- Video Section End -->

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.getElementById('backgroundVideo');
        video.play();
    });
</script>