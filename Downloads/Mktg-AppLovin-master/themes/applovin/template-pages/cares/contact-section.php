<!-- Contact Section Start -->
<div class="contact" id="form-scroll-top" aria-labelledby="contact-section-title">
    <div class="wrapper">
        <div class="grid gap-40px]">
        <div class="grid gap-[18px] md:gap-[22px] lg:gap-[25px] max-w-[800px] m-auto">
            <div class="text-center uppercase text-[#929BBA] avenir-black"><?php the_field('contact_title'); ?></div>
            <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
            <h3 class="scale-36-30-24 avenir-black text-center m-0" id="contact-section-title"><?php the_field('contact_subtitle'); ?></h3>
            <p class="scale-21-21-18"><?php the_field('contact_dark_text'); ?></p>
            </div>
        </div>

        <?php get_template_part('template-modules/cares-form');?>
        </div>
    </div>
</div>
<!-- Contact Section End -->