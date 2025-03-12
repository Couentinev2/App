<!-- Reporting Section Start -->
<?php
// Get the reporting_section group field
$reporting_section = get_field('reporting_section');

if ($reporting_section) {
    // Access the left_column and right_column groups within the reporting_section group
    $left_column = $reporting_section['left_column'];
    $right_column = $reporting_section['right_column'];

    // Access individual fields within left_column
    $h2 = $left_column['h2'];
    $performance_metrics = $left_column['performance_metrics'];

    // Access individual fields within performance_metrics
    $list_item_one = $performance_metrics['list_item_one'];
    $list_item_two = $performance_metrics['list_item_two'];
    $list_item_three = $performance_metrics['list_item_three'];

    // Access the image field within right_column
    $image = $right_column['image'];
?>
<section class="reporting-section bg-[#EEF0F6]" aria-labelledby="reporting-section-title">
    <div class="wrapper">
        <div class="grid md:grid-cols-2 md:gap-[40px] lg:gap-[80px]">
            <div class="md:col-[span_2] lg:col-span-1 m-auto order-2 lg:order-1">
                <div class="pb-[40px]">
                    <div class="uppercase text-[14px] pb-[18px] md:pb-[22px] lg:pb-[27px] text-center lg:text-left tracking-[1px] section-title">Reporting</div>
                    <h2 class="scale-36-30-24 pb-[10px] md:pb-[15px] lg:pb-[18px] text-black text-center lg:text-left" id="reporting-section-title mb-0"><?php echo esc_html($h2); ?></h2>
                    <p class="scale-21-21-18 lg:max-w-[500px] text-center lg:text-left mb-0">Track your success with the metrics that matter most to you. Audience+ brings your campaign data to life through dashboard visuals and detailed reports, <strong><em>turning results into insights.</em></strong></p>
                </div>
                <div>
                    <h3 class="text-[18px] pb-[16px] text-black md:text-center lg:text-left mb-0">Performance metrics:</h3>
                    <ul class="scale-18-18-16 md:columns-2 lg:columns-1 m-0">
                        <li><?php echo esc_html($list_item_one); ?></li>
                        <li><?php echo esc_html($list_item_two); ?></li>
                        <li><?php echo esc_html($list_item_three); ?></li>
                    </ul>
                </div>
            </div>

            <div class="md:col-[span_2] lg:col-span-1 order-1 lg:order-2 m-auto">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="Reporting Image">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!-- Reporting Section End -->
