<style type="text/css">
.repeater-analyze-assets {
    padding-top: 40px;
    padding-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
    grid-column-gap: 32px;
    grid-row-gap: 0px;
    height: 100%;
}

.repeater-analyze-assets h2, .repeater-analyze-assets sup {
color: #00B6E0;
}

.repeater-analyze-assets h2 {
    margin-bottom: 0.25em;
}

.analyze-repeater-stats-assets {
    margin: auto;
    width: fit-content;
    height: 100%;
    max-height: 475px;
}

.analyze-repeater-stats-assets sup {
    font-family: var(--font-wt-Heavy);
    font-weight: 700;
}

.analyze-repeater-stats-assets video {
    width: 100%;
    height: 100%;
    max-width: 240px;
    margin: auto;
    border-radius: 16px;
border: 8px solid #EEF0F6;
max-height: max-content;
max-height: 426px;
}

.analyze-repeater-stats-assets iframe {
    width: 100%;
    height: 100%;
    max-width: 240px!important;
    margin: auto;
    border-radius: 16px;
    border: 8px solid #EEF0F6;
    max-height: 426px;

}
.analyze-repeater-stats-assets img {
    width: 100%;
    height: 100%;
    max-width: 240px;
    margin: auto;
    border-radius: 16px;
    border: 8px solid #EEF0F6;
    max-height: 426px;
}



.repeater-analyze-assets p {
    text-align: center;
color: #808080;
padding-top: 16px;

}

.last-rp-assets  {
margin-bottom: 0;
}


@media screen and (max-width: 760px){
    .repeater-analyze-assets {
        padding-top: 40px;
        padding-bottom: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
        grid-column-gap: 32px;
        grid-row-gap: 32px;
        height: 100%;
    }

    .analyze-repeater-stats-assets {
        display: contents;
    }

    .analyze-repeater-stats-assets iframe {
        height: 457px;
    }

    .repeater-analyze-assets p {
    padding-top: 0;

    }

}
</style>

<?php
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


<div class="repeater-analyze-assets <?php echo trim($products_classes); ?>">

<?php if( have_rows('stats_repeater-assets') ): ?> 
                <?php while( have_rows('stats_repeater-assets') ): the_row();?>

<?php if(get_sub_field('type_of_assets') === 'image'): ?>
    <div class="analyze-repeater-stats-assets">    
<img src="<?php the_sub_field('number_sup-assets'); ?>" alt="">
<p class="fixed-16"><?php the_sub_field('caption_asset'); ?></p>
          </div> 
          
          <?php elseif(get_sub_field('type_of_assets') === 'video'): ?>

          <div class="analyze-repeater-stats-assets">    
          <video controls>
  <source src="<?php the_sub_field('number_sup-assets'); ?>" type="video/mp4">
Your browser does not support the video tag.
</video>
<p class="fixed-16"><?php the_sub_field('caption_asset'); ?></p>
          </div>    
          <?php else: ?>
            <div class="analyze-repeater-stats-assets">    

            <iframe class="phone-intro-pb-img" style="max-width:100%; position: relative;" src="<?php the_sub_field('number_sup-assets'); ?>"></iframe>
            <p class="fixed-16"><?php the_sub_field('caption_asset'); ?></p>
            </div>    
          <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

</div>