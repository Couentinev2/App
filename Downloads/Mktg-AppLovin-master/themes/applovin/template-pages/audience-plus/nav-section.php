<?php
// Get the nav_section group field
$nav_menu = get_field('nav_menu');

if ($nav_menu) {
    // Access the seller_success and targeting groups within the nav_section group
    $nav_title = $nav_menu['nav_title'];
    $nav_item_one = $nav_menu['nav_item_one'];
    $nav_item_two = $nav_menu['nav_item_two'];
    $nav_item_three = $nav_menu['nav_item_three'];
    $nav_item_four = $nav_menu['nav_item_four'];

?>
<!-- Nav Menu Start -->
<section class="mt-[-136px] lg:mt-[-44px]">
    <div class="mx-auto max-w-[1264px] md:max-w-[1312px] px-[32px] md:px-[56px] z-10">
        <div class="max-w-[1200px] py-[32px] px-[24px] min-[926px]:px-[48px] m-auto bg-white shadow-tech-blue rounded-[12px] mb-[-180px] min-[926px]:mb-[-44px]">
            <div class="flex flex-col min-[926px]:flex-row justify-between items-center gap-[40px] min-[926px]:gap-0">
                <div class="uppercase text-[#AFB7CF] fixed-14 tracking-[1px] avenir-black w-full min-[926px]:w-auto"><?php echo esc_html($nav_title); ?></div>
                <div class="flex flex-col min-[926px]:flex-row nav-bar w-full min-[926px]:w-auto justify-between min-[926px]:min-w-[600px] min-[1026px]:min-w-[700px] min-[1200px]:min-w-[872px]">
                    <div class="text-[#4F5A7D] pb-[16px] min-[926px]:pb-0 text-[16px] avenir-medium">
                        <a class="text-[#4F5A7D]" href="#seller-success"><?php echo esc_html($nav_item_one); ?></a>
                    </div>
                    <div class="relative">
                        <span class="absolute left-0 bottom-0 h-[16px] w-[24px] border-b-[1px] border-b-[#E3E7F2] min-[926px]:h-full min-[926px]:w-[1px] min-[926px]:right-0 min-[926px]:top-0 min-[926px]:bottom-0 min-[926px]:border-b-0 min-[926px]:border-r-[1px] min-[926px]:border-r-[#E3E7F2]"></span>
                    </div>
                    <div class="text-[#4F5A7D] py-[16px] min-[926px]:py-0 text-[16px] avenir-medium">
                        <a class="text-[#4F5A7D]" href="#targeting"><?php echo esc_html($nav_item_two); ?></a>
                    </div>
                    <div class="relative">
                        <span class="absolute left-0 bottom-0 h-[16px] w-[24px] border-b-[1px] border-b-[#E3E7F2] min-[926px]:h-full min-[926px]:w-[1px] min-[926px]:right-0 min-[926px]:top-0 min-[926px]:bottom-0 min-[926px]:border-b-0 min-[926px]:border-r-[1px] min-[926px]:border-r-[#E3E7F2]"></span>
                    </div>
                    <div class="text-[#4F5A7D] py-[16px] min-[926px]:py-0 text-[16px] avenir-medium">
                        <a class="text-[#4F5A7D]" href="#creatives"><?php echo esc_html($nav_item_three); ?></a>
                    </div>
                    <div class="relative">
                        <span class="absolute left-0 bottom-0 h-[16px] w-[24px] border-b-[1px] border-b-[#E3E7F2] min-[926px]:h-full min-[926px]:w-[1px] min-[926px]:right-0 min-[926px]:top-0 min-[926px]:bottom-0 min-[926px]:border-b-0 min-[926px]:border-r-[1px] min-[926px]:border-r-[#E3E7F2]"></span>
                    </div>
                    <div class="text-[#4F5A7D] py-[16px] min-[926px]:py-0 text-[16px] pb-0 avenir-medium">
                        <a class="text-[#4F5A7D]" href="#getting-started"><?php echo esc_html($nav_item_four); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!-- Nav Menu End -->