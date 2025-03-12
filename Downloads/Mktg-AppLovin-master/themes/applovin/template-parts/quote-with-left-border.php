<style type="text/css">
.slide-with-scroll {
    padding-top: 40px;
}

    .mainslidlink .quote-text h3 {max-width: 160px}

    .quote-ctv {
    margin: 24px 0;
    padding-left: 40px;
}

object {
    width: 100%;
    margin: 0 auto;
    display: block;
}

.c-quote {
    width: 35px;
    height: 24px;
    margin-left: 0;
    margin-bottom: 32px;
        transform: rotate(180deg) scaleX(-1);
}

.speaker-info {
    margin-top: 32px;
}

.sparker-ctv {
    font-family: var(--font-wt-Heavy);
    font-weight: 700;
    margin-bottom: 0;
}

.speaker-info:after {
    content: '';
    display: block;
    position: absolute;
    width: 35px;
    height: 24px;
    background-image: url(/wp-content/themes/applovin/images/icon_quotation.svg);
    background-size: contain;
    background-repeat: no-repeat;
}

.speaker-info:after {
    transform: rotate(360deg);
    right: 5%;
    bottom: 6px;
    transform: scaleX(-1);
}

.logo-success {
    width: auto;
    height: 24px;
    margin-left: 0;
    margin-top: 16px;
}

.main-quto {
    margin-bottom: 32px;
}

.quote-ctv {
    border-left: 4px solid #00B6E0;
}

.appdiscovery .quote-ctv {
    border-left: 4px solid #FC326C;
}

.max .quote-ctv {
    border-left: 4px solid #7B32CD;
}
.sparklabs .quote-ctv {
    border-left: 4px solid #F04DC6;
}

.audience .quote-ctv {
    border-left: 4px solid #FF9E1D;
}

.axon .quote-ctv {
    border-left: 4px solid #105FFB;
}

.array .quote-ctv {
    border-left: 4px solid #00B6E0;
}


.multiple .quote-ctv {
    border-left: 4px solid #00B6E0;
}

</style>
<?php
    // Fetch terms and initialize class variables
    $products_terms = get_the_terms(get_the_ID(), 'products');
    $products_classes = '';
    $add_white_class = false;
    $specific_terms = ['MAX', 'Array', 'AppDiscovery', 'Axon', 'Audience+'];

    if ($products_terms && !is_wp_error($products_terms)) {
        if (count($products_terms) === 1 && in_array($products_terms[0]->name, $specific_terms)) {
            $add_white_class = true;
        } else {
            $products_classes .= 'multiple ';
        }

        foreach ($products_terms as $term) {
            $products_classes .= esc_attr($term->slug) . ' ';
        }

        if ($add_white_class) {
            $products_classes .= 'white ';
        }
    }
    ?>

<div class="slide-with-scroll <?php echo trim($products_classes); ?>" > 
	<div class="inner-wrap-1200">
<div class="quote-ctv">
    <object class="c-quote" data="/wp-content/themes/applovin/images/icon_quotation.svg" title="ctv-report"></object>

  <p class="scale-21-21-18 main-quto"><?php the_field('quote_ctv_one'); ?></p>
  <div class="speaker-info">
  <p class="fixed-16 sparker-ctv"><?php the_field('quote_speaker_ctv_one'); ?></p>
  <p class="fixed-16"><?php the_field('quote_s_job_ctv_one'); ?></p></div>
  <object class="logo-success" data="<?php the_field('logo_quote_one'); ?>" title="ctv-report"></object>

</div>

	</div>
</div>
