<?php
// Add the shortcode
function social_share_buttons_shortcode($atts) {
    // Get current page URL
    $current_url = urlencode(get_permalink());
    
    // Get current page title
    $current_title = urlencode(get_the_title());
    
    // Construct sharing URLs
    $twitter_url = "https://twitter.com/intent/tweet?text={$current_title}&url={$current_url}";
    $facebook_url = "https://www.facebook.com/sharer/sharer.php?u={$current_url}";
    $linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url={$current_url}&title={$current_title}";
    
    // Generate short URL using WordPress's built-in shortlink
    $short_url = wp_get_shortlink();
    
    // Build HTML output
    $html = '<div class="social-share-container">';
    
    // Twitter
    $html .= '<a href="' . $twitter_url . '" target="_blank" rel="noopener noreferrer" class="social-share-button twitter">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.6666 10.6609L20.1824 3.25H18.6389L12.9788 9.68345L8.4615 3.25H3.25L10.0826 12.9794L3.25 20.7499H4.7935L10.7668 13.9545L15.5385 20.7499H20.75M5.35058 4.38888H7.72183L18.6378 19.667H16.2659" fill="#666666"/>
        </svg>
    </a>';
    
    // Facebook
    $html .= '<a href="' . $facebook_url . '" target="_blank" rel="noopener noreferrer" class="social-share-button facebook">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.6064 5.59653C17.2207 5.59653 17.7153 5.61149 18 5.64141V2.29967C17.4605 2.14959 16.1417 2 15.3773 2C11.346 2 9.48761 3.90322 9.48761 8.00934V9.59794H7V13.2847H9.48761V21.662H13.8635V13.2847H17.127L17.8041 9.59794H13.8635V8.29406C13.8635 6.34595 14.6279 5.59653 16.6059 5.59653H16.6064Z" fill="#666666"/>
        </svg>
    </a>';
    
    // LinkedIn
    $html .= '<a href="' . $linkedin_url . '" target="_blank" rel="noopener noreferrer" class="social-share-button linkedin">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.26481 20.5V8.34843H3.23519V20.5H7.26481ZM5.25784 6.70209C6.66899 6.70209 7.54704 5.777 7.54704 4.60105C7.51568 3.40941 6.66899 2.5 5.2892 2.5C3.90941 2.5 3 3.40941 3 4.60105C3 5.79268 3.87805 6.70209 5.22648 6.70209H5.25784V6.70209ZM9.50697 20.5H13.5366V13.7108C13.5366 13.3502 13.5679 12.9895 13.662 12.723C13.9599 12.0017 14.6185 11.2491 15.7317 11.2491C17.1899 11.2491 17.77 12.3624 17.77 13.993V20.4843H21.7997V13.5226C21.7997 9.79094 19.8084 8.05052 17.1585 8.05052C14.9791 8.05052 14.0226 9.27352 13.4895 10.1045H13.5209V8.34843H9.49129C9.53833 9.49303 9.49129 20.5 9.49129 20.5H9.50697Z" fill="#666666"/>
        </svg>
    </a>';
    
    // Copy Link Button
    $html .= '<button class="copy-link-button" onclick="copyShortUrl(\'' . $short_url . '\')" title="Copy short URL">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30">
            <path d="M 23 3 A 4 4 0 0 0 19 7 A 4 4 0 0 0 19.09375 7.8359375 L 10.011719 12.376953 A 4 4 0 0 0 7 11 A 4 4 0 0 0 3 15 A 4 4 0 0 0 7 19 A 4 4 0 0 0 10.013672 17.625 L 19.089844 22.164062 A 4 4 0 0 0 19 23 A 4 4 0 0 0 23 27 A 4 4 0 0 0 27 23 A 4 4 0 0 0 23 19 A 4 4 0 0 0 19.986328 20.375 L 10.910156 15.835938 A 4 4 0 0 0 11 15 A 4 4 0 0 0 10.90625 14.166016 L 19.988281 9.625 A 4 4 0 0 0 23 11 A 4 4 0 0 0 27 7 A 4 4 0 0 0 23 3 z" fill="#666666"></path>
        </svg>
    </button>';
    
    $html .= '</div>';
    
    // Add necessary JavaScript
    $html .= '<script>
    function copyShortUrl(url) {
        navigator.clipboard.writeText(url).then(function() {
            // Create notification container
            var notification = document.createElement("div");
            notification.className = "bg-[#EEF0F6] p-4 copy-notification";
            notification.innerHTML = `
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="size-5 text-[#666666] viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-[#666666] m-0">URL copied to clipboard!</p>
                    </div>
                </div>
            `;
            document.body.appendChild(notification);
            
            // Remove notification after 5 seconds
            setTimeout(function() {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 5000);
        }).catch(function(err) {
            console.error("Failed to copy URL: ", err);
        });
    }
    </script>';
    
    // Add CSS styles
    $html .= '<style>
    .social-share-container {
        display: flex;
        gap: 10px;
        align-items: center;
        margin: 0 0 20px 0;
    }

    #mobile-share .addthis_toolbox a {
        margin: 0 !important;
    }
    
    .social-share-button:hover,
    .copy-link-button:hover {
        opacity: .8;
    }

    .social-share-button,
    .copy-link-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        transition: transform 0.2s;
        padding: 8px;
    }
    
    
    .social-share-button svg,
    .copy-link-button svg {
        fill: none;
        stroke-width: 1;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    
    .copy-notification {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        animation: fadeInOut 0.3s ease-in-out;
        border-radius: 99px;
        width: max-content;
    }

    .size-5 {
        width: 1.25rem;
        height: 1.25rem;
    }

    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateX(-50%) translateY(20px); }
        100% { opacity: 1; transform: translateX(-50%) translateY(0); }
    }
    
    </style>';
    
    return $html;
}
add_shortcode('social_share', 'social_share_buttons_shortcode');