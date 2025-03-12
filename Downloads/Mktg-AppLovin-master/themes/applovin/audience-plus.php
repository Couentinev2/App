<?php
$current_language = pll_current_language();
/*
Template Name: Audience Plus
*/
// X-Robots-Tag header to noindex this template
header("X-Robots-Tag: noindex, nofollow", true);

// Define meta tags
$page_title = "Audience+: Targeted In-App Advertising for E-Commerce Brands";
$page_description = "Audience+ by AppLovin uses AI-powered targeting to deliver shopping ads to over 1.4 billion daily users across 140,000 mobile apps.";
$page_url = "https://applovin.com/audience-plus/";
$page_image = get_template_directory_uri() . "/images/open-graph-audience-plus.jpg";
$page_image_alt = "Audience+ OpenGraph Image";

// Define any extra meta tags
$extra_meta = [
    '<meta property="og:site_name" content="AppLovin">',
    '<meta name="twitter:site" content="@AppLovin">'
];

// Output the meta tags
applovin_meta_tags($page_title, $page_description, $page_url, $page_image, $page_image_alt, $extra_meta);

get_header();

// Define a reusable function to include a template part
function include_template_part($section)
{
    // Check if the section exists in the page-specific directory
    if (locate_template("template-pages/audience-plus/{$section}.php")) {
        get_template_part("template-pages/audience-plus/{$section}");
    }
    // If not found, check the reusable modules directory
    elseif (locate_template("template-modules/{$section}.php")) {
        get_template_part("template-modules/{$section}");
    }
    // If the section is not found in either location, output a missing section comment
    else {
        echo "<!-- Missing section: {$section} -->";
    }
}
?>

<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    jQuery(document).ready(function() {
        jQuery('.cta-pop-form').magnificPopup({
            type: 'inline',
            midClick: true
        });
    });
</script>

<div id="cta-form" class="mfp-hide">
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
    <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
        hbspt.forms.create({
            region: "na1",
            portalId: "5209470",
            formId: <?php 
                if ($current_language == 'en') {
                    echo '"9b0e3a21-3c87-429c-b727-172879b441dc"';
                } else if ($current_language == 'cn') {
                    echo '"d2b059e0-697e-4265-a522-a6c6c2b8c03c"';
                } else if ($current_language == 'ja') {
                    echo '"0be5880d-7b43-4cfc-99be-32bd737ce109"';
                } else if ($current_language == 'ko') {
                    echo '"e9d23e32-67d0-4608-b01c-54400b97f95f"';
                }
                
            ?>,
            onFormSubmit: function($form) {
                let scrollPosition = window.scrollY; // Capture scroll position

                // Lock the scroll position only during form submission
                function lockScroll() {
                    window.scrollTo(0, scrollPosition);
                }

                window.addEventListener('scroll', lockScroll);

                // Allow scrolling again after form submission
                setTimeout(function() {
                    window.removeEventListener('scroll', lockScroll);
                }, 1000); // Adjust the timeout if needed
            },

            onFormSubmitted: function($form) {
                // Hide the default form container and thank-you message
                let formContainer = document.querySelector('.hbspt-form');
                let defaultThankYouMessage = formContainer.querySelector('.submitted-message');
                let currentLanguage = '<?php echo $current_language; ?>';

                if (defaultThankYouMessage) {
                    defaultThankYouMessage.style.display = 'none'; // Hide the default thank-you message
                }

                formContainer.style.display = 'none'; // Hide the form after submission

                // Create and display the thank-you-message-container
                let thankYouContainer = document.createElement('div');
                thankYouContainer.classList.add('thank-you-message-container');

                // Create and display the thank-you message
                let thankYouMessage = document.createElement('div');
                thankYouMessage.classList.add('thank-you-message');

                // Create a grid for the SVG and content
                let innerGrid = document.createElement('div');
                innerGrid.classList.add('inner-grid');

                // SVG Element
                let svgIcon = `
                  <svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M48 24.5C48 37.7548 37.2548 48.5 24 48.5C10.7452 48.5 0 37.7548 0 24.5C0 11.2452 10.7452 0.5 24 0.5C37.2548 0.5 48 11.2452 48 24.5ZM20.97 32.3898C20.98 32.39 20.99 32.39 21 32.39H20.94C20.95 32.39 20.96 32.39 20.97 32.3898ZM19.68 31.85C20.0325 32.2025 20.5001 32.3825 20.97 32.3898C21.4399 32.3825 21.9075 32.2025 22.26 31.85L35.4 18.71C35.73 18.35 35.94 17.9 35.94 17.39C35.94 16.37 35.13 15.53 34.08 15.53C33.6 15.53 33.12 15.71 32.76 16.07L20.97 27.86L15.18 22.07C14.82 21.74 14.37 21.53 13.86 21.53C12.84 21.53 12 22.34 12 23.39C12 23.87 12.18 24.35 12.54 24.71L19.68 31.85Z" fill="#30C087"/>
                  </svg>
                `;

                // Create a grid for h2 and p elements based on language
                let textContent = '';
                if (currentLanguage === 'en') {
                    textContent = `
                        <h4 class="scale-32-24-21 avenier-heavy">Thanks for providing your information</h4>
                        <p>A member of our team will be in touch shortly.</p>
                    `;
                } else if (currentLanguage === 'cn') {
                    textContent = `
                        <h4 class="scale-32-24-21 avenier-heavy">感谢您提供的信息</h4>
                        <p>我们将很快与您联系</p>
                    `;
                } else if (currentLanguage === 'ko') {
                    textContent = `
                        <h4 class="scale-32-24-21 avenier-heavy">문의해 주셔서 감사합니다</h4>
                        <p>담당팀에서 곧 연락드리겠습니다.</p>
                    `;
                } else if (currentLanguage === 'ja') {
                    textContent = `
                        <h4 class="scale-32-24-21 avenier-heavy">お問い合わせありがとうございます</h4>
                        <p>近日中に担当者よりご連絡差し上げます。</p>
                    `;
                }

                let textGrid = `
                  <div class="text-grid">
                    ${textContent}
                  </div>
                `;

                // Append SVG and text grids to the inner grid
                innerGrid.innerHTML = svgIcon + textGrid;
                thankYouMessage.appendChild(innerGrid);
                thankYouContainer.appendChild(thankYouMessage);

                // Append the custom message to the container
                formContainer.parentElement.appendChild(thankYouContainer);
            }
        });
    </script>
</div>


<div id="audience-plus">
    <?php
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'nav-section',
        'brand-shopping-section',
        'testimonials-section',
        'targeting-section',
        'creatives-section',
        'sticky-image-section',
        'footer-cta-section',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>


<?php
// Enqueue scripts
if (locate_template("template-pages/audience-plus/brand-shopping-section.php")) {
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js', [], '3.10.4', false);
    wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js', ['gsap'], '3.10.4', false);
}

get_footer();
?>


<style>
    form {
        margin: 0;
    }

    /* Lightbox style custom popup form */
    .hbspt-form {
        text-align: left;
    }

    .hs-form .input {
        margin-bottom: 16px;
    }

    .mfp-content {
        max-width: 600px;
        background-color: #fff;
        padding: 0;
        border-radius: 16px;
    }

    #cta-form {
        padding: 40px;
        position: relative;
        width: 100%;
        max-width: 950px;
        margin: auto;
    }

    #cta-form iframe {
        width: 100%;
        height: 85vh;
        max-height: 75em;
        margin: auto;
        border: none;
    }

    .form-title {
        margin-bottom: 32px;
        font-size: 21px;
        font-family: var(--font-wt-Heavy);
        margin-top: 0
    }

    @media screen and (max-width: 480px) {
        #cta-form {
            padding: 24px;
        }
    }

    input[type=email],
    input[type=text],
    select {
        width: 100% !important;
    }

    .hs-button {
        font-family: var(--font-wt-Black);
        font-size: 24px;
        display: block;
        width: 25% !important;
        min-width: 180px;
        color: #FFF;
        text-decoration: none;
        border-radius: 8px;
        border: none;
        padding: 12px 16px;
        margin: auto !important;
        text-align: center;
        background: linear-gradient(104deg, #105ffb 0%, #6c58fb 50%, #a15af0 100%);
        transition: .2s all linear;
        cursor: pointer;
    }

    .hs_submit {
        margin-top: 0
    }

    .hs-button:hover {
        opacity: 0.8;
    }

    .hs-form-field label {
        font-family: var(--font-wt-Heavy);
        font-size: 10px;
        color: #4F5A7D;
        margin: 0 0 0.75em;
        padding: 0;
        display: inline-block;
        letter-spacing: 2px;
        padding-top: 8px;
    }

    .hs-form-required {
        color: #FF0000;
    }

    .hs-form-checkbox label {
        font-size: 18px;
        letter-spacing: normal;
        color: #232323;
        font-family: var(--font-wt-Light);
        text-transform: none;
    }

    .hs-form-booleancheckbox {
        list-style-type: none;
        padding: 0;
    }

    .hs-form-booleancheckbox label {
        font-family: var(--font-wt-Medium);
        font-size: 12px;
        line-height: 1.5em;
        width: 100%;
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 10px;
        align-items: center;
        letter-spacing: 0px;
        color: #999;
    }

    .hs-form-booleancheckbox-display span a {
        color: #3B5EF8;
        font-family: var(--font-wt-Heavy);
    }

    .legal-consent-container {
        border-top: 2px solid #ebebeb;
        padding-top: 0.5em;
    }

    .legal-consent-container .hs-form-booleancheckbox-display p {
        font-size: 18px;
        letter-spacing: normal;
        color: #232323;
        font-family: var(--font-wt-Light);
        text-transform: none;
        margin-left: 0.75em !important;
        display: block !important;
    }

    .legal-consent-container .hs-form-booleancheckbox-display>span {
        margin-left: 25px !important;
        margin-top: .15em;
    }

    .legal-consent-container .hs-form-booleancheckbox-display span.hs-form-required {
        display: none;
        /* suppress default asterisk and add directly to label text; solves for wonky span/p layout in HS */
    }

    .legal-consent-container .hs-richtext {
        /* bottom text area used for privacy notes, etc. */
        font-size: 12px;
        color: #a7a6a6;
        text-align: center;
        letter-spacing: 0.5px;
        width: 260px;
        margin-left: auto;
        margin-right: auto;
    }


    .hs-form .input input[type=number],
    .hs-form .input input[type=text],
    .hs-form .input input[type=email],
    .hs-form-field textarea,
    .input input[type=tel] {
        font-family: var(--font-wt-Medium);
        padding: 12px 16px;
        font-size: 16px;
        border: 1px solid #E3E7F2;
        width: 100%;
        border-radius: 0;
        background-color: #fff;
        line-height: 24px;
        border-radius: 4px;
    }

    .hs-form select {
        font-family: var(--font-wt-Medium);
        font-size: 18px;
        padding: 12px 16px;
        min-width: 50%;
        max-width: 100%;
        background-image: url("https://cdn2.hubspot.net/hubfs/5209470/ui_elements/form-ui-select-arrow.svg");
        background-repeat: no-repeat;
        background-size: 16px;
        background-position: 98% center;
        border: 1px solid #E3E7F2;
        border-radius: 0;
        background-color: #fff;
        color: #AFB7CF;
        border-radius: 4px;
    }


    .hs-form .input input[type=text],
    .hs-form .input input[type=email],
    .hs-form input[type=submit],
    .hs-form .input textarea,
    .hs-form select,
    .hs-form .hs-button {
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    .hs-form .input input[type=checkbox] {
        font-size: 18px;
        margin: 0 .50em 0 0.25em;
        position: relative;
    }

    .legal-consent-container .hs-form-booleancheckbox-display input[type=checkbox] {
        top: 0.25em;
        margin-right: 0.75em;
    }

    .hs-form-field input.invalid,
    .hs-form-field input.error,
    .hs-form-field textarea.invalid,
    .hs-form-field textarea.error {
        border: 1px solid #FC326C !important;
    }


    .hs-form .legal-consent-container .input {
        margin-bottom: 18px;
    }

    .hs-form ul {
        padding: 0;
    }

    .hs-form ul.inputs-list {
        margin: 0;
        list-style-type: none;
    }


    .hs-form ul.inputs-list.multi-container {
        margin-top: 0.25em;
    }


    .hs-form .hs_error_rollup {
        display: none;
    }

    .hs-error-msgs li {
        list-style-type: none;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .hs-error-msgs label {
        color: #FC326C;
        position: relative;
        top: -1em;
        font-weight: normal;
    }

    .hs_cos_wrapper_type_form h3 {
        text-align: center
    }


    .hs-button {
        font-size: 18px;
        padding: 1em 0;
        line-height: 1em;
        width: 100% !important
    }


    .form-columns-1,
    .form-columns-2 {
        max-width: initial !important;
    }

    .hs_firstname input,
    .hs_lastname input {
        max-width: 94% !important
    }

    .hs_firstname input {
        margin-right: 16px;
    }

    .hs_lastname input,
    .hs_lastname label {
        margin-left: 16px;
    }

    .input {
        margin-right: 0 !important
    }

    /* Mobile form resets */
    @media screen and (max-width: 480px) {
        .hs-form select {
            width: 100%;
        }

        .form-title {
            margin-bottom: 32px;
            font-size: 18px
        }

        .hs_firstname input,
        .hs_lastname input {
            max-width: 100% !important
        }

        .hs_firstname input {
            margin-right: 0;
        }

        .hs_lastname input,
        .hs_lastname label {
            margin-left: 0;
        }

    }

    .submitted-message strong {
        font-family: var(--font-wt-Heavy);
        padding-bottom: 16px
    }

    .submitted-message a {
        text-decoration: none;
        font-family: var(--font-wt-Heavy);

    }


    a {
        color: #00b0cd;
    }


    #hs_form_target_Form_to_use {
        max-width: 700px;
        margin: auto;
    }

    .title {
        text-align: center;
    }

    .hs-form-72a8016d-be23-446c-9f60-6fe503b0f76a_c156ac6c-a2a1-46c7-be2e-215d7b8dce0d fieldset.form-columns-1 .hs-input {
        width: 100%
    }

    .submitted-message {
        font-size: 18px
    }

    @media screen and (max-width: 640px) {

        .submitted-message {
            font-size: 16px
        }
    }

    .legal-consent-container .hs-form-booleancheckbox-display p {
        color: #165e7a !important;
        font-weight: bold;
    }

    .mfp-close {
        width: 44px;
        height: 44px;
        line-height: 44px;
        position: absolute;
        right: 0 !important;
        top: 0 !important;
        text-decoration: none;
        text-align: center;
        opacity: 0.65;
        color: #FFF;
        font-style: normal;
        font-size: 28px !important;
        font-family: Arial, Baskerville, monospace !important;
    }

    .mfp-close-btn-in .mfp-close {
        color: #333 !important;
    }

    .submitted-message p {
        font-size: 18px;
        margin: 0;
        padding: 0;
    }

    .thank-you-message-container {
        height: 700px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .thank-you-message {
        text-align: center;
        padding: 20px;
        width: 100%;
        margin: auto 0;
    }


    .inner-grid {
        display: grid;
        grid-template-rows: auto auto;
        gap: 40px;
        /* 40px gap between the SVG and the rest of the content */
    }

    .inner-grid svg {
        margin: auto;
    }

    .text-grid {
        display: grid;
        gap: 24px;
        max-width: 370px;
        margin: auto;
    }

    .hs-form .input input[type=number]:focus,
    .hs-form .input input[type=text]:focus,
    .hs-form .input input[type=email]:focus,
    .hs-form-field textarea:focus,
    .input input[type=tel]:focus {
        outline: none;
        border: 1px solid #3B5EF8 !important;
        background-color: #ffffff;
        border-radius: 4px;
    }

    * {
        outline: none !important;
    }

    #by_clicking_here_entering_my_email_address_and_clicking_submit_i_am_providing_applovin_with_express-9b0e3a21-3c87-429c-b727-172879b441dc {
        width: 14px;
        height: 14px;
        appearance: none;
        border: 1px solid #E3E7F2;
        border-radius: 4px;
        cursor: pointer;
        margin: auto;
    }

    #by_clicking_here_entering_my_email_address_and_clicking_submit_i_am_providing_applovin_with_express-9b0e3a21-3c87-429c-b727-172879b441dc:checked {
        background-color: #3B5EF8;
        border-color: #3B5EF8;
    }

    #by_clicking_here_entering_my_email_address_and_clicking_submit_i_am_providing_applovin_with_express-9b0e3a21-3c87-429c-b727-172879b441dc:checked::after {
        content: "✔";
        color: white;
        font-size: 9px;
        display: block;
        text-align: center;
    }
</style>