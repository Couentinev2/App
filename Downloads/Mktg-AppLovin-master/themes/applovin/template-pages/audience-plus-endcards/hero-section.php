<?php

$hero_section = get_field('hero_section');

if($hero_section) {
    // Access the left_column and right_column groups within the hero_section group
    $left_column = $hero_section['left_column'];
    $right_column = $hero_section['right_column'];

    // Access individual fields within left_column
    $page_title = $left_column['page_title'];
    $h1 = $left_column['h1'];
    $p = $left_column['p'];

    $hero_image = $right_column['hero_image'];
?>

    <!-- Hero Section Start -->
    <section class="end-card-hero">
        <div class="wrapper !pt-[120px] !pb-[80px] md:!py-[120px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[50px]">
                <div class="grid gap-[42px] my-auto">
                    <div class="flex gap-[12px] m-auto md:m-0">
                        <span class="text-[18px] avenir-heavy"><?php echo esc_html($page_title); ?></span>
                    </div>

                    <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px] text-center md:text-left">
                        <h1 class="text-[28px] md:text-[40px] lg:text-[60px] mb-0 avenir-heavy"><?php echo esc_html($h1); ?></h1>
                        <p class="scale-21-21-18"><?php echo esc_html($p); ?></p>
                    </div>
                </div>

                <div>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="">
                </div>
            </div>
        </div>
<?php } ?>

<?php

$video_section = get_field('video_section');

if ($video_section) {
    // Access the h2 subfield
    $h2 = $video_section['h2'];
    if ($h2) {
        $allowed_tags = [
            'h2' => ['class' => []],
            'span' => ['class' => []],
        ];
    }

    $p = $video_section['p'];
    $disclaimer_text = $video_section['disclaimer_text'];

    $blurbs = $video_section['blurbs'];

    $blurb_one = $blurbs['blurb_one'];
    $blurb_two = $blurbs['blurb_two'];
    $blurb_three = $blurbs['blurb_three'];

    $blurb_one_h3 = $blurb_one['h3'];
    $blurb_one_p = $blurb_one['p'];

    $blurb_two_h3 = $blurb_two['h3'];
    $blurb_two_p = $blurb_two['p'];

    $blurb_three_h3 = $blurb_three['h3'];
    $blurb_three_p = $blurb_three['p'];

    $row = $video_section['row'];

    $left_column = $row['left_column'];
    $right_column = $row['right_column'];

    $left_column_h3 = $left_column['h3'];
    $left_column_blurb_one = $left_column['blurb_one'];
    $left_column_blurb_two = $left_column['blurb_two'];
    $left_column_blurb_two_highlight = $left_column['blurb_two_highlight'];
    $left_column_video_ad = $left_column['video_ad'];

    $right_column_h3 = $right_column['h3'];
    $right_column_blurb_one = $right_column['blurb_one'];
    $right_column_blurb_two = $right_column['blurb_two'];
    $right_column_blurb_two_highlight = $right_column['blurb_two_highlight'];
    $right_column_video_ad = $right_column['video_ad'];


?>

        <div class="wrapper lg:py-[120px]">
            <div class="max-w-[1000px] m-auto">
                <div class="grid gap-[80px]">
              
                        <div class="grid gap-[40px]">
                            <div class="text-center max-w-[800px] m-auto grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
                                <?php echo wp_kses($h2, $allowed_tags); ?>
                                <p class="mb-0 scale-21-21-18"><?php echo esc_html($p); ?></p>
                            </div>

                            <div class="grid md:grid-cols-4 lg:grid-cols-3 gap-[48px]">
                                <div class="grid md:col-[span_2] lg:col-span-1 gap-[16px] h-fit">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="url(#paint0_linear_3500_3151)" />
                                        <path d="M17.912 10.047V21.375H15.608V12.735L13.336 14.735L11.976 13.167L15.672 10.047H17.912Z" fill="white" />
                                        <defs>
                                            <linearGradient id="paint0_linear_3500_3151" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E59325" />
                                                <stop offset="1" stop-color="#CF2556" />
                                            </linearGradient>
                                        </defs>
                                    </svg>


                                    <div class="grid gap-[8px]">
                                        <p class="scale-18-18-16 avenir-heavy m-0"><?php echo esc_html($blurb_one_h3); ?></p>
                                        <p class="scale-18-18-16 m-0"><?php echo esc_html($blurb_one_p); ?></p>
                                    </div>
                                </div>

                                <div class="grid md:col-[span_2] lg:col-span-1 gap-[16px] h-fit">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333008 16C0.333008 7.16344 7.49645 0 16.333 0C25.1696 0 32.333 7.16344 32.333 16C32.333 24.8366 25.1696 32 16.333 32C7.49645 32 0.333008 24.8366 0.333008 16Z" fill="url(#paint0_linear_3522_3874)" />
                                        <path d="M16.261 9.855C17.3703 9.855 18.2557 10.1643 18.917 10.783C19.589 11.391 19.925 12.2177 19.925 13.263C19.925 13.9243 19.8077 14.479 19.573 14.927C19.349 15.3643 18.8903 15.8923 18.197 16.511L14.997 19.263H20.021V21.375H12.117V18.831L16.517 14.879C16.9117 14.5163 17.1783 14.223 17.317 13.999C17.4557 13.775 17.525 13.5403 17.525 13.295C17.525 12.9217 17.3863 12.623 17.109 12.399C16.8317 12.175 16.5063 12.063 16.133 12.063C15.7277 12.063 15.3917 12.191 15.125 12.447C14.8583 12.703 14.7037 13.055 14.661 13.503L12.261 13.327C12.3357 12.1963 12.725 11.3377 13.429 10.751C14.1437 10.1537 15.0877 9.855 16.261 9.855Z" fill="white" />
                                        <defs>
                                            <linearGradient id="paint0_linear_3522_3874" x1="0.333008" y1="0" x2="32.333" y2="32" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E59325" />
                                                <stop offset="1" stop-color="#CF2556" />
                                            </linearGradient>
                                        </defs>
                                    </svg>

                                    <div class="grid gap-[8px]">
                                        <p class="scale-18-18-16 avenir-heavy m-0"><?php echo esc_html($blurb_two_h3); ?></p>
                                        <p class="scale-18-18-16 m-0"><?php echo esc_html($blurb_two_p); ?></p>
                                    </div>

                                </div>

                                <div class="grid md:col-[2_/_span_2] lg:col-span-1 gap-[16px] h-fit">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.666992 16C0.666992 7.16344 7.83044 0 16.667 0C25.5035 0 32.667 7.16344 32.667 16C32.667 24.8366 25.5035 32 16.667 32C7.83044 32 0.666992 24.8366 0.666992 16Z" fill="url(#paint0_linear_3522_3877)" />
                                        <path d="M16.307 9.855C17.459 9.855 18.3817 10.1377 19.075 10.703C19.779 11.2577 20.131 12.0257 20.131 13.007C20.131 13.6577 19.9603 14.2017 19.619 14.639C19.2777 15.0763 18.803 15.359 18.195 15.487V15.535C18.8457 15.6203 19.363 15.9137 19.747 16.415C20.131 16.9057 20.323 17.4923 20.323 18.175C20.323 19.2097 19.9497 20.0363 19.203 20.655C18.467 21.263 17.4803 21.567 16.243 21.567C15.1443 21.567 14.243 21.3163 13.539 20.815C12.8457 20.303 12.3923 19.5777 12.179 18.639L14.707 18.047C14.8883 18.9217 15.4483 19.359 16.387 19.359C16.8777 19.359 17.2563 19.231 17.523 18.975C17.7897 18.719 17.923 18.3617 17.923 17.903C17.923 17.4657 17.7737 17.1403 17.475 16.927C17.1763 16.703 16.6003 16.591 15.747 16.591H15.123V14.511H15.859C16.4883 14.511 16.9577 14.415 17.267 14.223C17.5763 14.0203 17.731 13.695 17.731 13.247C17.731 12.8843 17.5923 12.5963 17.315 12.383C17.0377 12.1697 16.707 12.063 16.323 12.063C15.9817 12.063 15.683 12.1537 15.427 12.335C15.171 12.5163 15.0003 12.7777 14.915 13.119L12.275 12.575C12.755 10.7617 14.099 9.855 16.307 9.855Z" fill="white" />
                                        <defs>
                                            <linearGradient id="paint0_linear_3522_3877" x1="0.666992" y1="0" x2="32.667" y2="32" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E59325" />
                                                <stop offset="1" stop-color="#CF2556" />
                                            </linearGradient>
                                        </defs>
                                    </svg>

                                    <div class="grid gap-[8px]">
                                        <p class="scale-18-18-16 avenir-heavy m-0"><?php echo esc_html($blurb_three_h3); ?></p>
                                        <p class="scale-18-18-16 m-0"><?php echo esc_html($blurb_three_p); ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="grid gap-[40px]">

                        <div class="bg-gradient-to-b from-[#E3E7F2] to-[#EEF0F6] px-[24px] py-[80px] rounded-t-[16px]">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-[40px]">
                                <div class="grid grid-cols-1 md:grid-cols-2">
                                    <div class="lg:m-auto">
                                        <div class="p-[24px] bg-[#FCDB9B] rounded-[16px] lg:rounded-l-[16px] lg:rounded-r-[0px]">
                                            <div class="uppercase backwards-bold text-[24px]"><?php echo esc_html($left_column_h3); ?></div>
                                        </div>
                                        <div class="p-[24px] bg-[#252A3A] rounded-[16px] lg:rounded-l-[16px] lg:rounded-r-[0px]">
                                            <div class="grid gap-[48px]">
                                                <div class="grid gap-[12px]">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.60614" width="24" height="24" rx="8" fill="#FCDB9B" />
                                                        <mask id="mask0_3531_4083" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="16" height="17">
                                                            <rect x="4" y="4.60614" width="16" height="16" fill="#D9D9D9" />
                                                        </mask>
                                                        <g mask="url(#mask0_3531_4083)">
                                                            <path d="M5.33301 12.6062C5.33301 11.0062 5.82467 9.60618 6.80801 8.40618C7.79134 7.20618 9.03301 6.43951 10.533 6.10618C10.7552 6.05062 10.9441 6.07284 11.0997 6.17284C11.2552 6.27284 11.333 6.4284 11.333 6.63951C11.333 6.86173 11.2608 7.03673 11.1163 7.16451C10.9719 7.29229 10.7886 7.38951 10.5663 7.45618C9.4219 7.76729 8.48579 8.39229 7.75801 9.33118C7.03023 10.2701 6.66634 11.3617 6.66634 12.6062C6.66634 13.0951 6.72745 13.5645 6.84967 14.0145C6.9719 14.4645 7.14412 14.884 7.36634 15.2728C7.47745 15.4617 7.53023 15.6506 7.52467 15.8395C7.51912 16.0284 7.43856 16.2006 7.28301 16.3562C7.13856 16.5006 6.98301 16.5617 6.81634 16.5395C6.64967 16.5173 6.51079 16.4173 6.39967 16.2395C6.05523 15.7062 5.79134 15.1367 5.60801 14.5312C5.42467 13.9256 5.33301 13.284 5.33301 12.6062ZM11.9997 19.2728C11.3219 19.2728 10.6747 19.1784 10.058 18.9895C9.44134 18.8006 8.86634 18.534 8.33301 18.1895C8.16634 18.0784 8.0719 17.9367 8.04967 17.7645C8.02745 17.5923 8.08301 17.434 8.21634 17.2895C8.36079 17.134 8.52745 17.0562 8.71634 17.0562C8.90523 17.0562 9.09412 17.1117 9.28301 17.2228C9.68301 17.4562 10.1108 17.634 10.5663 17.7562C11.0219 17.8784 11.4997 17.9395 11.9997 17.9395C12.4997 17.9395 12.9775 17.8784 13.433 17.7562C13.8886 17.634 14.3163 17.4562 14.7163 17.2228C14.9052 17.1117 15.0941 17.0534 15.283 17.0478C15.4719 17.0423 15.6386 17.1173 15.783 17.2728C15.9163 17.4173 15.9719 17.5784 15.9497 17.7562C15.9275 17.934 15.833 18.0784 15.6663 18.1895C15.133 18.534 14.558 18.8006 13.9413 18.9895C13.3247 19.1784 12.6775 19.2728 11.9997 19.2728ZM18.6663 12.6062C18.6663 13.284 18.5747 13.9256 18.3913 14.5312C18.208 15.1367 17.9441 15.7062 17.5997 16.2395C17.4886 16.4173 17.3497 16.5173 17.183 16.5395C17.0163 16.5617 16.8608 16.5006 16.7163 16.3562C16.5608 16.2006 16.4802 16.0284 16.4747 15.8395C16.4691 15.6506 16.5219 15.4617 16.633 15.2728C16.8552 14.884 17.0275 14.4645 17.1497 14.0145C17.2719 13.5645 17.333 13.0951 17.333 12.6062C17.333 11.3617 16.9691 10.2701 16.2413 9.33118C15.5136 8.39229 14.5775 7.76729 13.433 7.45618C13.2108 7.38951 13.0275 7.29229 12.883 7.16451C12.7386 7.03673 12.6663 6.86173 12.6663 6.63951C12.6663 6.4284 12.7441 6.27284 12.8997 6.17284C13.0552 6.07284 13.2441 6.05062 13.4663 6.10618C14.9663 6.43951 16.208 7.20618 17.1913 8.40618C18.1747 9.60618 18.6663 11.0062 18.6663 12.6062ZM10.333 14.9895V10.2228C10.333 10.0895 10.3913 9.98951 10.508 9.92284C10.6247 9.85618 10.7386 9.86173 10.8497 9.93951L14.5663 12.3228C14.6663 12.3895 14.7163 12.484 14.7163 12.6062C14.7163 12.7284 14.6663 12.8228 14.5663 12.8895L10.8497 15.2728C10.7386 15.3506 10.6247 15.3562 10.508 15.2895C10.3913 15.2228 10.333 15.1228 10.333 14.9895Z" fill="#252A3A" />
                                                        </g>
                                                    </svg>

                                                    <p class="text-[12px] m-0 text-white"><?php echo esc_html($left_column_blurb_one); ?></p>
                                                </div>
                                                <div class="grid gap-[12px]">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.262573" width="24" height="24" rx="8" fill="#FCDB9B" />
                                                        <mask id="mask0_3531_4091" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="16" height="17">
                                                            <rect x="4" y="4.26257" width="16" height="16" fill="#D9D9D9" />
                                                        </mask>
                                                        <g mask="url(#mask0_3531_4091)">
                                                            <path d="M15.0003 15.5959V8.92924C15.0003 8.74035 15.0642 8.58202 15.192 8.45424C15.3198 8.32646 15.4781 8.26257 15.667 8.26257C15.8559 8.26257 16.0142 8.32646 16.142 8.45424C16.2698 8.58202 16.3337 8.74035 16.3337 8.92924V15.5959C16.3337 15.7848 16.2698 15.9431 16.142 16.0709C16.0142 16.1987 15.8559 16.2626 15.667 16.2626C15.4781 16.2626 15.3198 16.1987 15.192 16.0709C15.0642 15.9431 15.0003 15.7848 15.0003 15.5959ZM7.66699 15.0126V9.51257C7.66699 9.31257 7.73366 9.15146 7.86699 9.02924C8.00033 8.90702 8.15588 8.84591 8.33366 8.84591C8.38921 8.84591 8.45033 8.85146 8.51699 8.86257C8.58366 8.87368 8.64477 8.90146 8.70033 8.94591L12.8337 11.7126C12.9337 11.7792 13.0087 11.8598 13.0587 11.9542C13.1087 12.0487 13.1337 12.1515 13.1337 12.2626C13.1337 12.3737 13.1087 12.4765 13.0587 12.5709C13.0087 12.6654 12.9337 12.7459 12.8337 12.8126L8.70033 15.5792C8.64477 15.6237 8.58366 15.6515 8.51699 15.6626C8.45033 15.6737 8.38921 15.6792 8.33366 15.6792C8.15588 15.6792 8.00033 15.6181 7.86699 15.4959C7.73366 15.3737 7.66699 15.2126 7.66699 15.0126Z" fill="#252A3A" />
                                                        </g>
                                                    </svg>

                                                    <div>
                                                        <p class="text-[12px] m-0 text-white"><?php echo esc_html($left_column_blurb_two); ?></p>
                                                        <p class="text-[16px] m-0 text-white avenir-heavy"><?php echo esc_html($left_column_blurb_two_highlight); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <video id="video1" playsinline autoplay muted loop controls class="rounded-[16px] border-[3px] border-[#EEF0F6]">
                                        <source src="<?php echo esc_html($left_column_video_ad); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2">
                                    <video id="video2" playsinline autoplay muted loop controls class="rounded-[16px] border-[3px] border-[#EEF0F6] order-2 lg:order-1">
                                        <source src="<?php echo esc_html($right_column_video_ad); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                    <div class="lg:m-auto order-1 lg:order-2">
                                        <div class="p-[24px] bg-[#FBAD9E] rounded-[16px] lg:rounded-r-[16px] lg:rounded-l-[0px]">
                                            <div class="uppercase backwards-bold text-[24px]"><?php echo esc_html($right_column_h3); ?></div>
                                        </div>
                                        <div class="p-[24px] bg-[#252A3A] rounded-[16px] lg:rounded-r-[16px] lg:rounded-l-[0px]">
                                            <div class="grid gap-[48px]">
                                                <div class="grid gap-[12px]">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.60614" width="24" height="24" rx="8" fill="#FBAD9E" />
                                                        <mask id="mask0_3531_4106" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="16" height="17">
                                                            <rect x="4" y="4.60614" width="16" height="16" fill="#D9D9D9" />
                                                        </mask>
                                                        <g mask="url(#mask0_3531_4106)">
                                                            <path d="M5.33301 12.6062C5.33301 11.0062 5.82467 9.60618 6.80801 8.40618C7.79134 7.20618 9.03301 6.43951 10.533 6.10618C10.7552 6.05062 10.9441 6.07284 11.0997 6.17284C11.2552 6.27284 11.333 6.4284 11.333 6.63951C11.333 6.86173 11.2608 7.03673 11.1163 7.16451C10.9719 7.29229 10.7886 7.38951 10.5663 7.45618C9.4219 7.76729 8.48579 8.39229 7.75801 9.33118C7.03023 10.2701 6.66634 11.3617 6.66634 12.6062C6.66634 13.0951 6.72745 13.5645 6.84967 14.0145C6.9719 14.4645 7.14412 14.884 7.36634 15.2728C7.47745 15.4617 7.53023 15.6506 7.52467 15.8395C7.51912 16.0284 7.43856 16.2006 7.28301 16.3562C7.13856 16.5006 6.98301 16.5617 6.81634 16.5395C6.64967 16.5173 6.51079 16.4173 6.39967 16.2395C6.05523 15.7062 5.79134 15.1367 5.60801 14.5312C5.42467 13.9256 5.33301 13.284 5.33301 12.6062ZM11.9997 19.2728C11.3219 19.2728 10.6747 19.1784 10.058 18.9895C9.44134 18.8006 8.86634 18.534 8.33301 18.1895C8.16634 18.0784 8.0719 17.9367 8.04967 17.7645C8.02745 17.5923 8.08301 17.434 8.21634 17.2895C8.36079 17.134 8.52745 17.0562 8.71634 17.0562C8.90523 17.0562 9.09412 17.1117 9.28301 17.2228C9.68301 17.4562 10.1108 17.634 10.5663 17.7562C11.0219 17.8784 11.4997 17.9395 11.9997 17.9395C12.4997 17.9395 12.9775 17.8784 13.433 17.7562C13.8886 17.634 14.3163 17.4562 14.7163 17.2228C14.9052 17.1117 15.0941 17.0534 15.283 17.0478C15.4719 17.0423 15.6386 17.1173 15.783 17.2728C15.9163 17.4173 15.9719 17.5784 15.9497 17.7562C15.9275 17.934 15.833 18.0784 15.6663 18.1895C15.133 18.534 14.558 18.8006 13.9413 18.9895C13.3247 19.1784 12.6775 19.2728 11.9997 19.2728ZM18.6663 12.6062C18.6663 13.284 18.5747 13.9256 18.3913 14.5312C18.208 15.1367 17.9441 15.7062 17.5997 16.2395C17.4886 16.4173 17.3497 16.5173 17.183 16.5395C17.0163 16.5617 16.8608 16.5006 16.7163 16.3562C16.5608 16.2006 16.4802 16.0284 16.4747 15.8395C16.4691 15.6506 16.5219 15.4617 16.633 15.2728C16.8552 14.884 17.0275 14.4645 17.1497 14.0145C17.2719 13.5645 17.333 13.0951 17.333 12.6062C17.333 11.3617 16.9691 10.2701 16.2413 9.33118C15.5136 8.39229 14.5775 7.76729 13.433 7.45618C13.2108 7.38951 13.0275 7.29229 12.883 7.16451C12.7386 7.03673 12.6663 6.86173 12.6663 6.63951C12.6663 6.4284 12.7441 6.27284 12.8997 6.17284C13.0552 6.07284 13.2441 6.05062 13.4663 6.10618C14.9663 6.43951 16.208 7.20618 17.1913 8.40618C18.1747 9.60618 18.6663 11.0062 18.6663 12.6062ZM10.333 14.9895V10.2228C10.333 10.0895 10.3913 9.98951 10.508 9.92284C10.6247 9.85618 10.7386 9.86173 10.8497 9.93951L14.5663 12.3228C14.6663 12.3895 14.7163 12.484 14.7163 12.6062C14.7163 12.7284 14.6663 12.8228 14.5663 12.8895L10.8497 15.2728C10.7386 15.3506 10.6247 15.3562 10.508 15.2895C10.3913 15.2228 10.333 15.1228 10.333 14.9895Z" fill="#252A3A" />
                                                        </g>
                                                    </svg>

                                                    <p class="text-[12px] m-0 text-white"><?php echo esc_html($right_column_blurb_one); ?></p>
                                                </div>
                                                <div class="grid gap-[12px]">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.262573" width="24" height="24" rx="8" fill="#FBAD9E" />
                                                        <mask id="mask0_3531_4114" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="16" height="17">
                                                            <rect x="4" y="4.26257" width="16" height="16" fill="#D9D9D9" />
                                                        </mask>
                                                        <g mask="url(#mask0_3531_4114)">
                                                            <path d="M15.0003 15.5959V8.92924C15.0003 8.74035 15.0642 8.58202 15.192 8.45424C15.3198 8.32646 15.4781 8.26257 15.667 8.26257C15.8559 8.26257 16.0142 8.32646 16.142 8.45424C16.2698 8.58202 16.3337 8.74035 16.3337 8.92924V15.5959C16.3337 15.7848 16.2698 15.9431 16.142 16.0709C16.0142 16.1987 15.8559 16.2626 15.667 16.2626C15.4781 16.2626 15.3198 16.1987 15.192 16.0709C15.0642 15.9431 15.0003 15.7848 15.0003 15.5959ZM7.66699 15.0126V9.51257C7.66699 9.31257 7.73366 9.15146 7.86699 9.02924C8.00033 8.90702 8.15588 8.84591 8.33366 8.84591C8.38921 8.84591 8.45033 8.85146 8.51699 8.86257C8.58366 8.87368 8.64477 8.90146 8.70033 8.94591L12.8337 11.7126C12.9337 11.7792 13.0087 11.8598 13.0587 11.9542C13.1087 12.0487 13.1337 12.1515 13.1337 12.2626C13.1337 12.3737 13.1087 12.4765 13.0587 12.5709C13.0087 12.6654 12.9337 12.7459 12.8337 12.8126L8.70033 15.5792C8.64477 15.6237 8.58366 15.6515 8.51699 15.6626C8.45033 15.6737 8.38921 15.6792 8.33366 15.6792C8.15588 15.6792 8.00033 15.6181 7.86699 15.4959C7.73366 15.3737 7.66699 15.2126 7.66699 15.0126Z" fill="#252A3A" />
                                                        </g>
                                                    </svg>

                                                    <div>
                                                        <p class="text-[12px] m-0 text-white"><?php echo esc_html($right_column_blurb_two); ?></p>
                                                        <p class="text-[16px] m-0 text-white avenir-heavy"><?php echo esc_html($right_column_blurb_two_highlight); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="mb-0 text-[16px] m-auto text-[#666666] text-center"><?php echo esc_html($disclaimer_text); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <!-- Hero Section End -->


    <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    // Get video elements
    const video1 = document.getElementById('video1');
    const video2 = document.getElementById('video2');

    // Threshold to determine if sync is needed
    const syncThreshold = 0.1;

    // Flag to prevent infinite sync loop
    let isSyncing = false;

    // Function to sync videos
    const syncVideos = (source, target) => {
        if (!isSyncing && Math.abs(source.currentTime - target.currentTime) > syncThreshold) {
            isSyncing = true;
            target.currentTime = source.currentTime; // Sync target to source
            isSyncing = false;
        }
    };

    // Add event listeners for timeupdate to sync videos
    video1.addEventListener('timeupdate', () => syncVideos(video1, video2));
    video2.addEventListener('timeupdate', () => syncVideos(video2, video1));

    // Play both videos together
    const playVideos = () => {
        if (!isSyncing) {
            video1.play();
            video2.play();
        }
    };

    // Pause both videos together
    const pauseVideos = () => {
        if (!isSyncing) {
            video1.pause();
            video2.pause();
        }
    };

    // Add event listeners for play/pause
    video1.addEventListener('play', playVideos);
    video1.addEventListener('pause', pauseVideos);
    video2.addEventListener('play', playVideos);
    video2.addEventListener('pause', pauseVideos);

    // Ensure both videos loop at the same time
    video1.addEventListener('ended', () => {
        video2.currentTime = 0;
        video2.play();
    });

    video2.addEventListener('ended', () => {
        video1.currentTime = 0;
        video1.play();
    });
</script>

