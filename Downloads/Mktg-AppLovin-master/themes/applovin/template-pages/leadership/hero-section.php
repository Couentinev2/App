<!-- Hero Section Start -->
<section class="hero-section" aria-labelledby="hero-section-title">
    <div class="wrapper !pt-[120px] !pb-[80px] md:!py-[120px] lg:!py-[140px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px]">
            <div class="m-auto lg:my-auto lg:ml-0 max-w-[450px]">
                <div class="avenir-black label-14 uppercase !tracking-[1px] text-center lg:text-left text-black mb-[8px] md:mb-[12px] lg:mb-[15px]"><?php the_field('hero_title'); ?></div>
                <h1 class="text-center lg:text-left scale-60-50-32 mb-[8px] md:mb-[12px] lg:mb-[15px] text-black" id="hero-section-title"><?php the_field('leadership_title'); ?></h1>
                <p class="text-center lg:text-left cale-21-21-18 m-0 text-black"><?php the_field('leadership_text'); ?></p>
            </div>
            <img src="/wp-content/themes/applovin/images/illo-leadership-header.png" alt="AppLovin team members">
        </div>
    </div>
</section>
<!-- Hero Section End -->