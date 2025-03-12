<!-- Leadership Section Start -->
<section id="leaders" class="bg-[#eef0f6]" aria-labelledby="leadership-section-title">
    <div class="wrapper">
        <h3 class="avenir-black text-black mb-[40px] text-center" id="leadership-section-title"><?php the_field('hero_intro'); ?></h3>
        <div class="leaders-pods-inner-wrap">
            <?php $args = array('post_type' => 'leader', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                $my_count = $loop->current_post + 1; ?>
                <a href="#" class="leaders-pod div<?php echo $my_count; ?>" data-id="<?php echo get_the_ID(); ?>">
                    <div class="leaders-pod-image">
                        <picture>
                            <img src="<?php echo get_field('leader_headshot'); ?>" alt="<?php echo get_field('leader_name'); ?>">
                        </picture>
                        <div class="leaders-pod-text max-w-[270px]">
                            <h3 class="scale-21-21-18"><?php echo get_field('leader_name'); ?></h3>
                            <p class="title fixed-16"><?php echo get_field('leader_title'); ?></p>
                        </div>
                    </div>
                </a>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<!-- Leadership Section End -->

<!-- Leadership Popup Modal-->
<div id="leader-popup" class="popup ">
    <div class="popup-content">
        <span class="close">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                <path d="M6.06043 4.99994L9.53043 1.52994C9.82043 1.23994 9.82043 0.759941 9.53043 0.469941C9.24043 0.179941 8.76043 0.179941 8.47043 0.469941L5.00043 3.93994L1.53043 0.469941C1.24043 0.179941 0.76043 0.179941 0.47043 0.469941C0.18043 0.759941 0.18043 1.23994 0.47043 1.52994L3.94043 4.99994L0.47043 8.46994C0.18043 8.75994 0.18043 9.23994 0.47043 9.52994C0.62043 9.67994 0.810428 9.74994 1.00043 9.74994C1.19043 9.74994 1.38043 9.67994 1.53043 9.52994L5.00043 6.05994L8.47043 9.52994C8.62043 9.67994 8.81043 9.74994 9.00043 9.74994C9.19043 9.74994 9.38043 9.67994 9.53043 9.52994C9.82043 9.23994 9.82043 8.75994 9.53043 8.46994L6.06043 4.99994Z" fill="#181625" />
            </svg>
        </span>
        <div id="popup-body">
            <div class="bio-content">
                <?php if (get_field('leader_headshot_secondary')) {
                    echo '<img src="' . get_field('leader_headshot_secondary') . '" alt="' . get_field('leader_name') . '" class="leader-headshot" />';
                }
                ?>
                <div class="bio-copy">
                    <div class="default-bio-text">
                        <h1 class="scale-24-21-18">
                            <?php the_field('leader_name'); ?>
                        </h1>
                        <h5 class="bio-title scale-18-18-16">
                            <?php the_field('leader_title'); ?>
                        </h5>
                    </div>
                    <p class="scale-18-18-16">
                        <?php the_field('leader_bio_text'); ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Leadership Popup Modal End-->