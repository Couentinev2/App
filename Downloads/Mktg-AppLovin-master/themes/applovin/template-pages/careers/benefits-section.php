<!-- Benefits Section Start -->
<section class="culture-section bg-[#F7F8FC]" aria-labelledby="benefits-section-title">
    <div class="wrapper grid gap-[40px]">
        <?php

        $applovin_benefits_section = get_field('applovin_benefits_section');

        if ($applovin_benefits_section) {
            // Access the left and right fields within the applovin_benefits_section group
            $left_column = $applovin_benefits_section['left_column'];
            $right_column = $applovin_benefits_section['right_column'];

            if ($left_column) {
                // Access the fields within the left_column group
                $h3 = $left_column['h3'];
                $p = $left_column['p'];
            }

            if ($right_column) {
                // Access the image field within the right_column group
                $image = $right_column['image'];
            }

            $benefits_tiles = $applovin_benefits_section['benefits_tiles'];
            $benefits_foot_note = $applovin_benefits_section['benefits_foot_note'];

        ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px]">
                <div class="m-auto grid gap-[12px] gap:mb-[15px] gap:mb-[18px]" id="benefits-section-title">
                    <h3 class="text-center lg:text-left text-black avenir-black m-0"><?php echo esc_html($h3); ?></h3>
                    <p class="scale-21-21-18 text-center lg:text-left mb-0"><?php echo esc_html($p); ?></p>
                </div>

                <div class="m-auto">
                    <img class="rounded-[16px]" src="/wp-content/themes/applovin/images/img-jobs-applovin-benefits.jpg" alt="Careers Hero">
                </div>
            </div>

            <div class="grid md:grid-cols-4 lg:grid-cols-6 gap-[40px] lg:gap-[24px]">
                <?php if (!empty($benefits_tiles)) :
                    $total_items = count($benefits_tiles);
                    $items_in_last_row_lg = $total_items % 3;
                    
                    foreach ($benefits_tiles as $index => $benefits_tile) :
                        $tile_image = $benefits_tile['tile']['image'];
                        $tile_text = $benefits_tile['tile']['text'];
                        
                        // Tablet (md) screen centering
                        $is_last_odd_md = ($index === $total_items - 1 && $total_items % 2 === 1);
                        $md_classes = $is_last_odd_md ? 'md:col-[2_/_span_2]' : 'md:col-span-2';
                        
                        // Desktop (lg) screen centering for incomplete last row
                        $is_last_row_lg = $index >= $total_items - $items_in_last_row_lg;
                        $lg_classes = 'lg:col-span-2'; // Each item takes 2 columns in 6-col grid
                        
                        if ($items_in_last_row_lg === 1 && $index === $total_items - 1) {
                            $lg_classes = 'lg:col-start-3 lg:col-span-2'; // Center single item
                        } elseif ($items_in_last_row_lg === 2 && $is_last_row_lg) {
                            $lg_classes = $index === $total_items - 2 ? 'lg:col-start-2 lg:col-span-2' : 'lg:col-span-2';
                        }
                        
                        $classes = $md_classes . ' ' . $lg_classes;
                ?>
                        <div class="bg-white p-[40px] rounded-[16px] grid gap-[32px] <?php echo $classes; ?>">
                            <img src="<?php echo esc_url($tile_image); ?>" alt="Internship Icon">
                            <p class="scale-18-18-16 mb-0 md:h-[50px] text-black"><?php echo wp_kses_post($tile_text); ?></p>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>

            <p class="max-w-[1000px] text-center m-auto text-[16px]"><?php echo esc_html($benefits_foot_note); ?></p>
        <?php
        }
        ?>
    </div>
</section>
<!-- Benefits Section End -->