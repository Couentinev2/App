<!-- Awards Section Start -->
<section class="awards-section" aria-labelledby="awards-section-title">
    <div class="wrapper">
        <div class="grid gap-[40px] lg:gap-[48px]">
            <h3 class="avenir-black text-black m-0 text-center" id="hero-section-title">Recent Awards</h3>
            <div id="awards-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[40px] lg:gap-[48px] max-w-[1000px] m-auto">
                <?php
                $args = array(
                    'post_type' => 'award',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => 3,
                    'paged' => 1,
                );

                $awards_query = new WP_Query($args);

                if ($awards_query->have_posts()) :
                    while ($awards_query->have_posts()) : $awards_query->the_post(); ?>
                        <div class="m-auto grid gap-[35px]">
                            <a href="<?php echo esc_url(get_field('award_url')); ?>" target="_blank">
                                <img class="max-w-[215px] h-[120px] m-auto" src="<?php echo esc_url(get_field('award_image')); ?>" alt="<?php the_title(); ?>">
                            </a>
                            <div class="text-[18px] text-center avenir-heavy">
                                <a href="<?php echo esc_url(get_field('award_url')); ?>" target="_blank">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                        </div>
                <?php endwhile;
                endif;

                wp_reset_postdata();
                ?>
            </div>


            <div class="m-auto w-fit">
                <button id="load-more" data-page="1" class="secondary-slate-btn">
                    <span>Show More</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                        <path d="M14.0304 7.47C13.7404 7.18 13.2604 7.18 12.9704 7.47L9.25043 11.19V3C9.25043 2.59 8.91043 2.25 8.50043 2.25C8.09043 2.25 7.75043 2.59 7.75043 3V11.19L4.03043 7.47C3.74043 7.18 3.26043 7.18 2.97043 7.47C2.68043 7.76 2.68043 8.24 2.97043 8.53L7.97043 13.53C8.12043 13.68 8.31043 13.75 8.50043 13.75C8.69043 13.75 8.88043 13.68 9.03043 13.53L14.0304 8.53C14.3204 8.24 14.3204 7.76 14.0304 7.47Z" fill="#181625" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Awards Section Start -->