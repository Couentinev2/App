<style type="text/css">
@media screen and (max-width: 764px) {
    .cta-inside {
        margin: auto!important;
        text-align: center!important;
        padding-bottom: 270px!important;
    }
        .cta-inside .logo {
        margin: auto!important;
        margin-bottom: 24px!important;
    }

    .btn {
        margin: auto!important;
        margin-top: 24px!important;
    }
    .appd-cta {
    padding: 32px!important;
}
}
</style>


<?php
// Get the selected choice from the ACF Radio field 'product_cta'
$product_cta = get_field('product_cta');

// Define an array that maps each choice to its corresponding HTML structure
$product_cta_html = array(
    'Appdiscovery' => '
<div class="appd-cta" style="background: linear-gradient(0deg, rgba(252, 50, 108, 0.06), rgba(252, 50, 108, 0.06)), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_appdiscovery@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_appdiscovery@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/uploads/2023/09/appdiscovery_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Scale your growth with smart user acquisition.') . '</p>
        <a href="/appdiscovery/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>',

    'Max' => '
<div class="appd-cta" style="background: linear-gradient(0deg, rgba(100, 65, 226, 0.06) 0%, rgba(100, 65, 226, 0.06) 100%), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_max@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_max@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/themes/applovin/images/max_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Maximize your mobile app’s monetization potential.') . '</p>
        <a href="/max/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>',

    'Sparklabs' => '
<div class="appd-cta" style="background: linear-gradient(0deg, rgba(255, 51, 202, 0.06) 0%, rgba(255, 51, 202, 0.06) 100%), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_sparklabs@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_sparklabs@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/themes/applovin/images/sparklabs_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Drive marketing results with top-performing creatives.') . '</p>
        <a href="/sparklabs/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>',

    'Array' => '
<div class="appd-cta" style="background: linear-gradient(0deg, rgba(18, 175, 163, 0.06) 0%, rgba(18, 175, 163, 0.06) 100%), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_array@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_array@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/themes/applovin/images/array_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Create more value across your customers’ lifecycle.') . '</p>
        <a href="/array/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>',

    'ALX' => '
<div class="appd-cta" style="background: linear-gradient(0deg, rgba(0, 182, 224, 0.06) 0%, rgba(0, 182, 224, 0.06) 100%), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_alx@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_alx@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/themes/applovin/images/alx_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Access to the leading programmatic exchange.') . '</p>
        <a href="/alx/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>',

    'Adjust' => '
<div class="appd-cta" style="background: linear-gradient(0deg, rgba(16, 95, 251, 0.10) 0%, rgba(16, 95, 251, 0.10) 100%), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_adjust@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_adjust@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/themes/applovin/images/adjust_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Optimize performance with powerful, unified analytics.') . '</p>
        <a href="/adjust/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>',

    'Wurl' => '
<div class="appd-cta" style="background:  linear-gradient(0deg, rgba(100, 65, 226, 0.06) 0%, rgba(100, 65, 226, 0.06) 100%), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_main_wurl@2x.png\'), url(\'/wp-content/themes/applovin/images/productctas/img_product_cta_bg_wurl@2x.png\')">
    <div class="cta-inside">
        <object class="logo" data="/wp-content/themes/applovin/images/wurl_black.svg" title="ctv-report"></object>
        <p class="scale-24-21-18">' . pll_e('Find and monetize your ideal viewers on CTV.') . '</p>
        <a href="/wurl/" class="btn scale-18-18-16">' . pll_e('Learn more') . '</a>
    </div>
</div>'
);

// Display the HTML structure based on the selected choice
if (isset($product_cta_html[$product_cta])) {
    echo $product_cta_html[$product_cta];
} else {
    // Default fallback content or error handling
    echo '<p>No matching content for the selected choice.</p>';
}
?>
