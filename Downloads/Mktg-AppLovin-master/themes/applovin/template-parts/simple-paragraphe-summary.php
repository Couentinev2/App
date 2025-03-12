<style type="text/css">

.simple-para-summary {
    padding-top: 40px;
}
.simple-para .title{
    margin-bottom: 40px!important
}

.simple-para .subtitle{
    margin-bottom: 40px!important
}

.sub-grid-two .four:first-child {
    margin-left: 1.9em;
}
.sub-grid-two .four {

    margin-left: 1.9em;
}



.grid-four-title {
    font-family: var(--font-wt-Heavy);
        font-weight: 700;
    margin-bottom: 10px!important;
}

.grid-four-title::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 24px;
    height: 24px;
    background-size: contain !important;
    background: url(../../../wp-content/themes/applovin/images/blue-tcheck_filled.svg) no-repeat;
    left: -2.1em;
    top: 3px;
    transition: all .2s;
}

.audience .grid-four-title::before {
    background: url(../../../wp-content/themes/applovin/images/orange-tcheck_filled.svg) no-repeat;
}

</style>

 <div class="simple-para simple-para-summary">

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


<div class="sub-grid-two <?php echo trim($products_classes); ?>">
<?php if( have_rows('grid_sections') ): ?>
    <?php while( have_rows('grid_sections') ): the_row(); ?>
        <div class="four">
            <p class="grid-four-title scale-18-18-16"><?php the_sub_field('title'); ?></p>
            <p class="grid-four-text scale-18-18-16"><?php the_sub_field('text'); ?></p>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
    </div>  </div>