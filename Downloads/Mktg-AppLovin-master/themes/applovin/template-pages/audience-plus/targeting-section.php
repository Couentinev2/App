<!-- Targeting Section Start -->
<?php
// Get the targeting_section group field
$targeting_section = get_field('targeting_section');

if ($targeting_section) {
    // Access the h2 and p fields within the targeting_section group
    $section_title = $targeting_section['section_title'];
    $h2 = $targeting_section['h2'];
    $p = $targeting_section['p'];
    
    // Access the row_one group within the targeting_section group
    $row_one = $targeting_section['row_one'];

    // Access individual columns within row_one
    $column_one = $row_one['column_one'];
    $column_two = $row_one['column_two'];
    $column_three = $row_one['column_three'];

    // Display the fields
    ?>
    <section class="targeting-section" aria-labelledby="targeting-section-title" id="targeting">
        <div class="wrapper">
            <div class="max-w-[800px] text-center m-auto pb-[40px] lg:pb-[48px]">
                <div class="section-title uppercase text-[14px] pb-[18px] md:pb-[22px] lg:pb-[27px] tracking-[1px] section-title"><?php echo esc_html($section_title); ?></div>
                <h2 class="scale-36-30-24 pb-[10px] md:pb-[15px] lg:pb-[18px] text-black mb-0" id="targeting-section-title"><?php echo esc_html($h2); ?></h2>
                <p class="scale-21-21-18 mb-0"><?php echo esc_html($p); ?></p>
            </div>

            <!-- Row Start -->
            <?php if ($row_one): ?>
                <div class="grid md:grid-cols-4 lg:grid-cols-3 gap-[40px] lg:gap-[48px] text-center">
                    <!-- Blurb One Start -->
                    <?php if ($column_one): ?>
                        <div class="md:col-[span_2] lg:col-span-1">
                            <?php if ($column_one['image']): ?>
                                <img class="m-auto" src="<?php echo esc_url($column_one['image']); ?>" alt="Audience Icon">
                            <?php endif; ?>
                            <div class="mt-[32px]">
                                <h3 class="text-[18px] pb-[8px] text-black mb-0"><?php echo esc_html($column_one['h3']); ?></h3>
                                <p class="scale-18-18-16 mb-0"><?php echo esc_html($column_one['p']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Blurb One End -->

                    <!-- Blurb Two Start -->
                    <?php if ($column_two): ?>
                        <div class="md:col-[span_2] lg:col-span-1">
                            <?php if ($column_two['image']): ?>
                                <img class="m-auto" src="<?php echo esc_url($column_two['image']); ?>" alt="Audience Icon">
                            <?php endif; ?>
                            <div class="mt-[32px]">
                                <h3 class="text-[18px] pb-[8px] text-black mb-0"><?php echo esc_html($column_two['h3']); ?></h3>
                                <p class="scale-18-18-16 mb-0"><?php echo esc_html($column_two['p']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Blurb Two End -->

                    <!-- Blurb Three Start -->
                    <?php if ($column_three): ?>
                        <div class="md:col-[2_/_span_2] lg:col-span-1">
                            <?php if ($column_three['image']): ?>
                                <img class="m-auto" src="<?php echo esc_url($column_three['image']); ?>" alt="Audience Icon">
                            <?php endif; ?>
                            <div class="mt-[32px]">
                                <h3 class="text-[18px] pb-[8px] text-black mb-0"><?php echo esc_html($column_three['h3']); ?></h3>
                                <p class="scale-18-18-16 mb-0"><?php echo esc_html($column_three['p']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Blurb Three End -->
                </div>
            <?php endif; ?>
            <!-- Row End -->
        </div>
    </section>
    <?php
}
?>

<!-- Targeting Section End -->