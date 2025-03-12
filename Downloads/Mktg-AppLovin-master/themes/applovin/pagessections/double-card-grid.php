<div class="card-section">
      <div class="inner-wrap inner-wrap-1200 success-row-header">
            <div class="header-card-part">
            <h2 class="scale-36-30-24">
                  <?php the_field('cards_title'); ?>
            </h2>
            <p class="scale-21-21-18"> <?php the_field('cards_text'); ?></p>
</div>

     <div class="div-cards-flex">
  <?php if( have_rows('result_cards_part') ): ?>
        <?php while( have_rows('result_cards_part') ): the_row(); ?>
            <div class="description-result-cards">
                  <img src="<?php the_sub_field('result_cards_part_logo'); ?>" alt="MAX Testimonials Video"> 
            <h2 class="scale-32-24-21"><?php the_sub_field('result_cards_part_title'); ?></h2>
            <p class="scale-18-18-16"><?php the_sub_field('result_cards_part_mini_text'); ?></p>
    </div>
            <?php endwhile; ?>
    <?php endif; ?>
        </div>
      </div>
            </div>