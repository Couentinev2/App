<!-- Scale Section Start -->
<?php
// Get the scale_section group field
$scale_section = get_field('scale_section');

if ($scale_section) {
    // Access the h2 field within the scale_section group
    $h2 = $scale_section['h2'];

    // Access the row_one group within the scale_section group
    $row_one = $scale_section['row_one'];

    // Access individual columns within row_one
    $column_one = $row_one['column_one'];
    $column_two = $row_one['column_two'];
    $column_three = $row_one['column_three'];

    // Display the fields
    ?>
    <section class="scale-section" aria-labelledby="scale-section-title">
        <div class="wrapper">
            <div class="max-w-[800px] text-center m-auto pb-[40px]">
                <h2 class="scale-36-30-24 text-black" id="scale-section-title"><?php echo esc_html($h2); ?></h2>
            </div>

            <?php if ($row_one): ?>
                <div class="grid md:grid-cols-4 lg:grid-cols-3 gap-[40px] text-center">
                    
                    <?php if ($column_one): ?>
                        <div class="md:col-[span_2] lg:col-span-1">
                            <?php if ($column_one['image']): ?>
                                <img class="m-auto" src="<?php echo esc_url($column_one['image']); ?>" alt="Scale  Icon">
                            <?php endif; ?>
                            <div class="mt-[32px]">
                                <h3 class="scale-21-21-18 pb-[8px] text-black mx-[25px] md:mx-[30px] mb-0"><?php echo esc_html($column_one['h3']); ?></h3>
                                <p class="scale-18-18-16 mb-0"><?php echo esc_html($column_one['p']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($column_two): ?>
                        <div class="md:col-[span_2] lg:col-span-1">
                            <?php if ($column_two['image']): ?>
                                <img class="m-auto" src="<?php echo esc_url($column_two['image']); ?>" alt="Scale Icon">
                            <?php endif; ?>
                            <div class="mt-[32px]">
                                <h3 class="scale-21-21-18 pb-[8px] text-black mx-[25px] md:mx-[30px] mb-0"><?php echo esc_html($column_two['h3']); ?></h3>
                                <p class="scale-18-18-16 mb-0"><?php echo esc_html($column_two['p']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($column_three): ?>
                        <div class="md:col-[2_/_span_2] lg:col-span-1">
                            <?php if ($column_three['image']): ?>
                                <img class="m-auto" src="<?php echo esc_url($column_three['image']); ?>" alt="Scale Icon">
                            <?php endif; ?>
                            <div class="mt-[32px]">
                                <h3 class="scale-21-21-18 pb-[8px] text-black mx-[25px] md:mx-[30px] mb-0"><?php echo esc_html($column_three['h3']); ?></h3>
                                <p class="scale-18-18-16 mb-0"><?php echo esc_html($column_three['p']); ?></p>
                            </div>
                        </div>  
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php
}
?>
<!-- Scale Section End -->
