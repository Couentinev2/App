<!-- Culture Section Start -->
<section class="culture-section bg-[#F7F8FC]" aria-labelledby="culture-section-title">
    <div class="wrapper">
        <?php 

        // Get the culture_section group field
        $our_culture_section = get_field('our_culture_section');

        if ($our_culture_section) {
           // Access the left and right fields within the hero_section group
           $left_column = $our_culture_section['left_column'];
           $right_column = $our_culture_section['right_column'];

           if ($left_column) {
               // Access the fields within the left_column group
               $h3 = $left_column['h3'];
               $p = $left_column['p'];

               // Access the cta group within the left_column group
               $cta = $left_column['cta'];

               if ($cta) {
                   // Access the fields within the cta group
                   $cta_text = $cta['cta_text'];
                   $cta_url = $cta['cta_url'];
               }
           }

           if ($right_column) {
               // Access the image field within the right_column group
               $image = $right_column['image'];
           }
           ?>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px]">
            <div class="m-auto text-center lg:text-left order-2 lg:order-1">
                <div class="grid gap-[40px]">
                    <div class="grid gap-[12px] md:gap-[15px] lg:gap-[18px]" id="culture-section-title">
                        <h3 class="m-0 text-center lg:text-left text-black avenir-black"><?php echo esc_html($h3); ?></h3>
                        <p class="scale-21-21-18 m-0"><?php echo esc_html($p); ?></p>
                    </div>

                    <div class="flex justify-center lg:justify-start">
                    <?php if ($cta_text && $cta_url) : ?>
                        <div class="blue-link-16">
                            <a href="<?php echo esc_url($cta_url); ?>">
                                <span><?php echo esc_html($cta_text); ?></span>
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="UI icon/arrow_forward">
                                <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                                </g>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="m-auto order-1 lg:order-2">
                <img class="rounded-[16px]" src="<?php echo esc_html($image); ?>" alt="Careers Hero">
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</section>
<!-- Culture Section End -->