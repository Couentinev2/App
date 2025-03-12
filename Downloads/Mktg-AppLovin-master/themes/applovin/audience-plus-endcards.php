<?php
/*
Template Name: Audience Plus Endcards
*/
// X-Robots-Tag header to noindex this template
header("X-Robots-Tag: noindex, nofollow", true);

// Define meta tags
$page_title = "DTC Creative Best Practices";
$page_description = "";
$page_url = "https://applovin.com/dtc-creative-best-practices/";
$page_image = get_template_directory_uri() . "/images/open-graph-generic.jpg";
$page_image_alt = "AppLovin OpenGraph Image";

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
    if (locate_template("template-pages/audience-plus-endcards/{$section}.php")) {
        get_template_part("template-pages/audience-plus-endcards/{$section}");
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

<div id="audience-plus-endcards">
    <?php
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'faq-section',
        'endcards-section',
        //'cta-section',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
jQuery(document).ready(function () {
    jQuery('.faq-section').each(function () {
        var $section = jQuery(this);
        var $accordionContent = $section.find('.accordion-content');
        var $images = $section.find('#one, #two, #three, #four'); // Include new images
        var currentInterval;

        // Initially hide content and images
        $accordionContent.hide();
        $images.hide();

        function startLoading(bar, callback) {
            clearInterval(currentInterval);
            var width = 0;
            bar.parent().show();
            currentInterval = setInterval(frame, 80);

            function frame() {
                if (width >= 100) {
                    clearInterval(currentInterval);
                    bar.parent().hide();
                    if (callback) callback();
                } else {
                    width++;
                    bar.width(width + '%');
                }
            }
        }

        $section.find('.accordion-title').click(function () {
            $section.find('.loading-bar').hide();

            // Determine the border color based on the section ID
            var borderColor = $section.closest('#accordian-dark').length ? '#333' : '#ddd';

            // Reset styles for all titles
            $section.find('.accordion-title').removeClass('active-title').css('border-top', `1px solid ${borderColor}`);

            // Apply active styles to the clicked title
            jQuery(this).addClass('active-title').css('border-top', 'none');

            var content = jQuery(this).next('.accordion-content');
            $accordionContent.not(content).slideUp();
            content.slideToggle();

            // Reset and start loading bar
            $section.find('.loading-bar .progress').width('0');
            startLoading(
                jQuery(this).find('.progress'),
                jQuery(this).attr('id') === 'title1'
                    ? function () {
                          $section.find('#title2').click();
                      }
                    : jQuery(this).attr('id') === 'title2'
                    ? function () {
                          $section.find('#title3').click();
                      }
                    : jQuery(this).attr('id') === 'title3'
                    ? function () {
                          $section.find('#title4').click();
                      }
                    : function () {
                          $section.find('#title1').click();
                      }
            );

            // Show the corresponding image
            var img;
            switch (jQuery(this).attr('id')) {
                case 'title1':
                    img = $section.find('#one');
                    break;
                case 'title2':
                    img = $section.find('#two');
                    break;
                case 'title3':
                    img = $section.find('#three');
                    break;
                case 'title4':
                    img = $section.find('#four');
                    break;
            }
            $images.hide();
            img.show();
        });

        // Trigger initial click
        $section.find('#title1').click();
    });
});

</script>


<style>
    .div1-double {
        grid-area: 2 / 2 / 1 / 3;
        padding-right: 0;
    }

    .div2-double {
        grid-area: 1 / 1 / 2 / 2;
        padding-right: 60px;

    }

    .double-image img {
        margin: auto;
    }

    .grid-text ul li {
        font-family: var(--font-wt-Heavy);
        font-weight: 750;
    }

    .container {
        opacity: 0.5;
    }

    .section-slides-row .inner-wrap-1200 {
        padding: 0 32px;
    }

    .slide-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 80px;
        grid-row-gap: 0px;
    }


    /* Style for loading bar */
    .loading-bar {
        width: 100%;
        background-color: rgba(229, 147, 37, 0.25);
        border-radius: 2px;
        overflow: hidden;
    }

    /* Style for loading bars */
    #title2 .loading-bar {
        background-color: rgba(229, 147, 37, 0.25);
    }

    #title3 .loading-bar {
        background-color: rgba(229, 147, 37, 0.25);
    }

    #title4 .loading-bar {
        background-color: rgba(229, 147, 37, 0.25);
    }

    /* Different colors for each progress bar */
    #title1 .progress {
        height: 4px;
        width: 0;
        background-color: #FF9E1D;
        opacity: 1;
        border-radius: 2px;

    }

    #title2 .progress {
        height: 4px;
        width: 0;
        background-color: #FF9E1D;
        opacity: 1;
        border-radius: 2px;

    }

    #title3 .progress {
        height: 4px;
        width: 0;
        background-color: #FF9E1D;
        opacity: 1;
        border-radius: 2px;

    }

    #title4 .progress {
        height: 4px;
        width: 0;
        background-color: #FF9E1D;
        opacity: 1;
        border-radius: 2px;

    }

    .asterix {
        color: #999999
    }

    .accordion-title h3::after {
        content: '';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
        width: 12px;
        height: 12px;
        background-size: contain !important;
        background: url(/wp-content/themes/applovin/images/chevron_up.svg) no-repeat;
        background-size: auto;
        transition: all .2s;
    }

    #accordian-dark .accordion-title h3::after {
        content: '';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
        width: 12px;
        height: 12px;
        background-size: contain !important;
        background: url(/wp-content/themes/applovin/images/chevron_up_white.svg) no-repeat;
        background-size: auto;
        transition: all .2s;
    }


    .active-title h3::after {
        transform: rotate(180deg);
        margin-right: 0px;
        margin-left: 5px;
    }

    .accordion-title h3 {
        margin: 32px 0;
    }

    .active-title h3 {
        margin-bottom: 12px;
    }

    .section-slides-accordion {
        text-align: left;
    }

    .accordion-content ul {
        column-count: 2;
    }


    .accordion-title {
        border-top: 1px solid #CCC;
    }

    .accordion-title.active-title {
        border-top: none;
    }

    .slideshow img {
        margin: auto;
    }

    .main-text-four {
        margin-bottom: 40px;
    }

    .asterix {
        margin-bottom: 32px;
    }

    .accordion-content ul {
        padding-left: 12px;
    }

    .section-slides-row {
        height: 839px;
    }

    .accordion-title h3 {
        cursor: pointer;
    }

    @media screen and (max-width: 1000px) {
        .div1-double {
            grid-area: 2 / 2 / 1 / 3;
            padding-right: 0;
        }

        .section-slides-row {
            height: initial;
        }

        .main-title-four,
        .main-text-four {
            text-align: center;
        }

        .div2-double {
            grid-area: 1 / 1 / 2 / 2;
            padding-right: 60px;

        }

        .div1-double {
            padding-right: 0;
        }

        .double-two .div2-double {
            padding-right: 0;

        }

        .slide-grid {
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: repeat(2, auto);
            grid-row-gap: 40px;
        }


        .slideshow {
            grid-area: 1 / 1 / 2 / 2;
        }

        .section-slides-accordion {
            grid-area: 2 / 1 / 3 / 2;
        }

        .div2-double {
            padding-right: 0;
        }



        .section-slides-row .inner-wrap-1200 {
            padding: 0 56px;
        }
    }

    @media screen and (max-width: 760px) {


        .grid-image {
            grid-area: 1 / 1 / 2 / 2 !important;
        }

        .grid-text {
            grid-area: 2/2/2/1 !important;
        }

        .section-slides-row .inner-wrap-1200 {
            padding: 0 32px;
        }

        .accordion-content ul {
            padding-left: 12px;
        }
    }
</style>

<?php
// Get the footer
get_footer(); ?>