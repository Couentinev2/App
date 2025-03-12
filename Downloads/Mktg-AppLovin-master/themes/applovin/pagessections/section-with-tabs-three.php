      <div class="tabs-section tab-third">
      <div class="inner-wrap-1200">

       <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_tabs_three'); ?>">
        <?php the_field('mini_title_section_tabs_three'); ?>
      </p>
     <h1 class="scale-36-30-24 tab-main-title">
        <?php the_field('simple_title_tabs_three'); ?>
      </h1>

<div id="tabs2">
<div class="tabs-wrap hz-scrollable ">
  <ul>

  <?php $num = 1 ;?>
              <?php if( have_rows('tabs_wrap_three') ): ?> 
                <?php while( have_rows('tabs_wrap_three') ): the_row();?>
    <li><a class="fixed-14 tabs-title" href="#tabs-3-<?php echo $num;?>"><?php the_sub_field('tab_menu_title_three'); ?></a></li>
      <?php $num += 1 ;?>
                        <?php endwhile; ?>
              <?php endif; ?>
  </ul>
  </div>
    <?php $numnbis = 1 ;?>
                    <?php if( have_rows('tabs_wrap_three') ): ?> 
                <?php while( have_rows('tabs_wrap_three') ): the_row();?>
  <div id="tabs-3-<?php echo $numnbis ;?>" class="tab-grid main-second-part-tab main-second-part-tab-bis">
     <div class= "left-text">
        <p class="scale-21-21-18 tabs-rep-title"><?php the_sub_field('tab_title_three'); ?></p>
        <p class="scale-18-18-16"><?php the_sub_field('tab_text_three'); ?></p>
        <div class="sub-tabs-repeater small-inside-grid">
            <div class="sub-tabs-repeater-one">
                <p class="scale-18-18-16 minititle-rep-tab"><?php the_sub_field('mini_title_rep_three'); ?></p>
                 <p class="scale-18-18-16 "><?php the_sub_field('mini_text_rep_three'); ?></p>

            </div>
            <div class="sub-tabs-repeater-two">
                            <p class="scale-18-18-16 minititle-rep-tab"><?php the_sub_field('mini_title_rep_two_three'); ?></p>
                 <p class="scale-18-18-16 "><?php the_sub_field('mini_text_rep_two_three'); ?></p></div>
            <div class="sub-tabs-repeater-three">
                            <p class="scale-18-18-16 minititle-rep-tab"><?php the_sub_field('mini_title_rep_three_three'); ?></p>
                 <p class="scale-18-18-16 "><?php the_sub_field('mini_text_rep_three_three'); ?></p></div>

        </div></div>
     <div class= "right-img">
        <object data="<?php the_sub_field('tab_img_three'); ?>"  ></object>
    </div>
  </div>
        <?php $numnbis += 1 ;?>
  
       <?php endwhile; ?>
       <?php endif; ?>

  </div>
</div>

</div>

