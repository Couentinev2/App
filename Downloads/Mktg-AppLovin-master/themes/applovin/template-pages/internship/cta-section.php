<!-- CTA Section Start -->
<section class="cta-section" aria-labelledby="cta-section-title">
    <?php 

    $cta_section = get_field('cta_section');

    if ($cta_section) {

        $h3 = $cta_section['h3'];
        $p = $cta_section['p'];

        $cta = $cta_section['cta'];

        if ($cta) {
            // Access the fields within the cta group
            $cta_text = $cta['cta_text'];
            $cta_url = $cta['cta_url'];
        }

    ?>
    <div class="wrapper">
        <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
            <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
                <h3 class="text-black m-auto avenir-black max-w-[550px]" id="cta-section-title"><?php echo esc_html($h3); ?></h3>
                <p class="scale-21-21-18 m-0 text-black"><?php echo esc_html($p); ?></p>
            </div>

            <?php if ($cta_text && $cta_url) : ?>
            <!-- Button Start     -->
            <div class="primary-gradient-btn m-auto">
                <a href="<?php echo esc_url($cta_url); ?>"><span><?php echo esc_html($cta_text); ?></span></a>
            </div>
            <!-- Button End -->
            <?php endif; ?>

        </div>
    </div>
    <?php
    }
    ?>
</section>
<!-- CTA Section End -->