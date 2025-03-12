<style type="text/css">
.repeater-analyze {
    margin-top: 40px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
    grid-column-gap: 32px;
    grid-row-gap: 0px;
    height: 100%;
}

.repeater-analyze h2, .repeater-analyze sup {
color: #00B6E0;
}

.appdiscovery .analyze-repeater-stats h2{
color: #FC326C;
}

.max .analyze-repeater-stats h2 {
color: #7B32CD;
}

.sparklabs .analyze-repeater-stats h2 {
color: #F04DC6;
}

.axon .analyze-repeater-stats h2 {
color: #105FFB;
}

.array .analyze-repeater-stats h2 {
color: #00B6E0;
}

.audience .analyze-repeater-stats h2 {
color: #FF9E1D;
}

.repeater-analyze h2 {
    margin-bottom: 0.25em;
}

.multiple .analyze-repeater-stats h2 {
    color: #00B6E0;
}

.analyze-repeater-stats sup {
    font-family: var(--font-wt-Heavy);
    font-weight: 700;
}

.repeater-analyze p {

}

.last-rp {
margin-bottom: 0;
}

.analyze-repeater-stats {
    padding: 40px;
    border-radius: 16px;
    background: #F7F8FC
}

@media screen and (max-width: 760px){
.repeater-analyze {
    margin-top: 40px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
    grid-column-gap: 32px;
    grid-row-gap: 32px;
    height: 100%;
}

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


<div class="repeater-analyze <?php echo trim($products_classes); ?>">

<?php if( have_rows('stats_repeater') ): ?> 
                <?php while( have_rows('stats_repeater') ): the_row();?>
    <div class="analyze-repeater-stats">    
          <h2 class="scale-32-24-21"><?php the_sub_field('number_data'); ?></h2>
          <p class="last-rp scale-18-18-16"><?php the_sub_field('data_text'); ?><sup><?php the_sub_field('number_sup'); ?></sup></p>
          </div>    
            <?php endwhile; ?>
        <?php endif; ?>

</div>