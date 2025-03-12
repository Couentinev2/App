      <div class="ads-section">
      <div class="inner-wrap-1200">
      <div class="ads-grid">
     <div class="div1-ads">
      <h1 class="scale-36-30-24">
        <?php the_field('ads_title'); ?>
      </h1>
      <p class="scale-21-21-18">
        <?php the_field('ads_text'); ?>
      </p>
    </div>
    <div class="div2-ads">
      <div class="sides-image">
      <img src="<?php the_field('ads_image_right'); ?>" alt="MAX - How it Works"> 
    </div>
    </div>
          </div>


        <div class="repeter-ads" id="repeter-ads">
          <?php 
          if( have_rows('ads_advantage') ): 
            $counter = 0;
            while( have_rows('ads_advantage') ): the_row();
            $counter++;
          ?>
         <div class="ads-repeater" id="adsrepet" <?php echo $counter > 2 ? 'style="display: block;"' : ''; ?>>    
          <h2 class="scale-18-18-16"><?php the_sub_field('ads_advantage_title'); ?>    
            <?php
              $new = get_sub_field('solution_new');
              if ($new == 1) {
                  echo "<span class='ads-new'>NEW</span>";
              }
            ?>
          </h2>
          <p class="fixed-16"><?php the_sub_field('ads_advantage_text'); ?></p>
          </div>    
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

  </div>
</div>
