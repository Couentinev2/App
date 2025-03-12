      <div class="results-section">
      <div class="inner-wrap-1200">
              <div class="results-grid">

     <div class="div1-results">
          <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_result'); ?>">
        <?php the_field('mini_title_section_one'); ?>
      </p>
    <h1 class="scale-36-30-24">
        <?php the_field('product_title'); ?>
      </h1>
      <p class="scale-21-21-18" style="margin-bottom: 0;">
        <?php the_field('product_text'); ?>
      </p>
    </div>
    <div class="div2-results">
      <div class="results-image">
      <img src="<?php the_field('product_image_right'); ?>" alt="MAX - How it Works"> 
    </div>
    </div>
          </div>


   <!--     <div class="repeter-results">
          <?php if( have_rows('solution_advantage') ): ?> 
                <?php while( have_rows('solution_advantage') ): the_row();?>
         <div class="solution-repeater">    
          <h2 class="scale-32-24-21"><?php the_sub_field('solution_advantage_title'); ?>

        </h2>
          <p class="scale-18-18-16"><?php the_sub_field('solution_advantage_text'); ?></p>
          </div>    
                        <?php endwhile; ?>
              <?php endif; ?>
    </div>-->
  </div>
    </div>
