<div class="tabs-section">
  <div class="inner-wrap inner-wrap-1200">
    <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_tabs'); ?>">
      <?php the_field('mini_title_section_tabs'); ?>
    </p>
    <h1 class="scale-36-30-24 tab-main-title">
      <?php the_field('simple_title_tabs'); ?>
    </h1>
    </div>
    <div id="tabs2">
      <div class="inner-wrap inner-wrap-1200 tabs-wrap hz-scrollable">
        <ul>
          <?php $num = 1 ;?>
          <?php if( have_rows('tabs_wrap') ): ?>
          <?php while( have_rows('tabs_wrap') ): the_row();?>
          <li><a class="fixed-14 tabs-title" href="#tabs2-<?php echo $num;?>">
            <?php the_sub_field('tab_menu_title'); ?>
            </a></li>
          <?php $num += 1 ;?>
          <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
        <div class="inner-wrap inner-wrap-1200 main-second-part-tab">

      <?php $numnbis = 1 ;?>
      <?php if( have_rows('tabs_wrap') ): ?>
      <?php while( have_rows('tabs_wrap') ): the_row();?>
      <div id="tabs2-<?php echo $numnbis ;?>" class="tab-grid">
        <div class= "left-text">
          <p class="scale-21-21-18 tabs-rep-title">
            <?php the_sub_field('tab_title'); ?>
          </p>
          <p class="scale-18-18-16 tabs-rep-text">
            <?php the_sub_field('tab_text'); ?>
          </p>
          <div class="sub-tabs-repeater">
            <div class="sub-tabs-repeater-one ">
              <p class="scale-18-18-16 minititle-rep-tab"><?php the_sub_field('mini_title_rep'); ?></p>
              <p class="scale-18-18-16 <?php the_sub_field('mini_title_rep'); ?>"><?php the_sub_field('mini_text_rep'); ?></p>
            </div>
            <div class="sub-tabs-repeater-two">
              <p class="scale-18-18-16 minititle-rep-tab">
                <?php the_sub_field('mini_title_rep_two'); ?>
              </p>
              <p class="scale-18-18-16 ">
                <?php the_sub_field('mini_text_rep_two'); ?>
              </p>
            </div>
            <div class="sub-tabs-repeater-three">
              <p class="scale-18-18-16 minititle-rep-tab <?php the_sub_field('mini_title_rep'); ?>">
                <?php the_sub_field('mini_title_rep_three'); ?>
              </p>
              <p class="scale-18-18-16 <?php the_sub_field('mini_title_rep'); ?>">
                <?php the_sub_field('mini_text_rep_three'); ?>
              </p>
            </div>
          </div>
        </div>
        <div class= "right-img"> <object data="<?php the_sub_field('tab_img'); ?>"></object> </div>
      </div>
      <?php $numnbis += 1 ;?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
