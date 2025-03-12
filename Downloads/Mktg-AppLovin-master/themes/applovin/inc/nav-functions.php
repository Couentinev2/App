<?php

if ( ! function_exists( 'get_lang_base' ) ) {
    function get_lang_base() {
        // Use Polylang function to get the language base URL
        $current_lang = pll_current_language();
        
        $base_url = home_url(); // Base URL of your website
        return $base_url . '/' . $current_lang; // Append the language code (e.g., /ja, /cn)
    }
}



function add_custom_link_to_menu( $items, $args ) {
    // Check if it's the right menu
    if ( $args->theme_location == 'responsive-primary' ) {
        
        // Use get_lang_base() to get the language base URL
        $custom_link = '
            <li class="border-b-[1px] border-b-[#EEF0F6] w-full pb-[20px] mb-[8px] pt-[8px]">
                <div class="slate-link-12 uppercase">
                    <a class="!text-[10px] avenir-black !pl-0" href="' . get_lang_base() . '/resource-center/">
                        <span class="!pt-[0.15rem] !pr-[0.5rem]">' . pll__('View all resources') . '</span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="UI icon/arrow_forward">
                                <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </li>';

        
        // Create the <h6> More about us heading
        $more_about_us_heading = '<li class="about-us-title"><div>' . pll__('More about us') . '</div></li>';

        // Convert the items into an array
        $items_array = explode('</li>', $items);

        // Determine current language and adjust array position
        $current_language = pll_current_language();
        switch ($current_language) {
            case 'cn':
                $custom_link_position = 17; // Array position for Chinese menu
                $heading_position = 18;
                break;
            case 'ja':
                $custom_link_position = 17; // Array position for Japanese menu
                $heading_position = 18;
                break;
            case 'ko':
                $custom_link_position = 17; // Array position for Korean menu
                $heading_position = 18;
                break;
            default:
                $custom_link_position = 20; // Array position for English menu
                $heading_position = 21;
                break;
        }

        // Insert the custom link and heading at the respective positions
        array_splice( $items_array, $custom_link_position, 0, $custom_link );
        array_splice( $items_array, $heading_position, 0, $more_about_us_heading );

        // Join the array back into a string
        $items = implode('</li>', $items_array);
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_custom_link_to_menu', 10, 2 );


function inject_custom_html_into_menu($items, $args) {
    // Get the current language
    $current_language = pll_current_language();

    // Loop through each menu item
    foreach ($items as &$item) {
        // Check if the menu item has the class 'new-item-tag'
        if (in_array('new-item-tag', $item->classes)) {
            // Get the original link
            $original_link = $item->title;

            // Check if the current language is Chinese (CN)
            if ($current_language === 'cn' || $current_language === 'ja') {
                // Add HTML with specific padding for Chinese language
                $item->title = $original_link . '</a><div class="new-item" style="padding: 3px 4px 4px 4px;">' . pll__('NEW') . '</div>';
            } else {
                // Add HTML with default padding for other languages
                $item->title = $original_link . '</a><div class="new-item" style="padding: 4px 4px 4px 4px;">' . pll__('NEW') . '</div>';
            }

            // Ensure the <a> tag is closed before the injected div
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'inject_custom_html_into_menu', 10, 2);

