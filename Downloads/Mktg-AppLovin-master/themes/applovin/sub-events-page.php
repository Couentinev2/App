<?php
/*
Template Name: Sub-Events Page
*/
?> 

<?php get_header(); 
global $post;
?>



<div class="sub-events main-events-rows">
      <div class="container inner-wrap inner-wrap-1000">

<div class="back-arow fixed-14">
  
  <a href="../" class="back-arrow-link"><?php pll_e('Events & WEBINARS') ;?></a>
</div>

    <div class="row past-events"> 
    <?php
$current_page_title = get_the_title();

if ($current_page_title == 'Upcoming Events') {
      echo '<div class="titles-section-event"><h3 class="scale-32-24-21 past-title">' . pll__('All upcoming events') . '</h3></div><div class="row past-events">';
      $today = date('Ymd');

      $args = array(
          'post_type' => 'event',
          'posts_per_page' => -1,
          'meta_key' => 'day_event', 
          'orderby' => 'meta_value_num', 
          'order' => 'ASC', 
          'meta_query' => array(
              array(
                  'key' => 'day_event',
                  'value' => $today,
                  'compare' => '>=', 
                  'type' => 'DATE' 
              ),
                          array(
                  'key' => 'event_location',
                  'value' => 'Virtual',
                  'compare' => '!=', 
              )
          )
      );
} elseif ($current_page_title == 'Webinars') {
      echo '<div class="titles-section-event"><h3 class="scale-32-24-21 past-title">' . pll__('All webinars') . '</h3></div><div class="row past-events">';

   $args = array(
    'post_type' => 'event',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'event_location',
            'value' => 'Virtual',
            'compare' => '=',
        )
    )
);
}


      $event_query = new WP_Query($args);

      if ($event_query->have_posts()) : 
          while($event_query->have_posts()) : $event_query->the_post(); ?>
              <div class="main-page-grid past-grid">
                <div class="image-event">
                  <img src="<?php the_field('main_cover_image'); ?>" alt="Logo" class="logo-hero">
                </div>
                <div class="event-info">
                  <div class="day-location">
                    <p class="day-event fixed-16"><?php the_field('day_event'); ?></p>
                    <?php
                    $event_location = get_field('event_location');
                    if ($event_location !== 'Virtual') {
                      $event_location_copy = get_field('event_location_copy');
                      echo '<p class="location-event fixed-16""> &#160;-&#160;' . $event_location_copy . '</p>';
                    } else {
                      echo '<p class="location-event fixed-16""> &#160;-&#160;' . $event_location . '</p>';
                    }
                    ?>
                  </div>
                  <h2 class="scale-24-21-18"><?php the_field('events_title'); ?></h2>
                  <p class="scale-18-18-16"><?php the_field('events_description'); ?></p>
                    <?php   if(have_rows('featured_speakers')): ?>
                  <div class="speakers-info">
                    <div class="img-speaker">
                      <?php 
                          $count = 0;
                          $total = count(get_field('featured_speakers'));
                          while(have_rows('featured_speakers')): the_row(); 
                              $count++; 
                              if($count <= 3) { 
                                  ?><img src="<?php the_sub_field('picture_speaker'); ?>" alt="Speaker Image" class="logo-speaker"><?php
                              } 
                          endwhile;
                          
                          if($total > 3) {
                              echo '<div class="more-images"><p class="fixed-14">+' . ($total - 3) . '</p></div>';
                          }
                      ?>
                    </div>

                    <div class="name-speaker">
                      <p class="fixed-16">
                        <strong><?php pll_e('Featured Speakers:');?></strong>
                      </p>
                      <p class="fixed-16">
                        <?php 
                        $speaker_names = []; 

                            while(have_rows('featured_speakers')): the_row();
                                $speaker_names[] = get_sub_field('name_speaker'); 
                            endwhile;
                        echo implode(', ', $speaker_names);
                        ?>
                      </p>
                    </div>
                  </div>
                  <?php endif; ?>

                </div>
<a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('event_url'); ?>">
    <?php 
    if ($current_page_title == 'Upcoming Events') {
        echo pll_e('RSVP');
    } elseif ($current_page_title == 'Webinars') {
        echo pll_e('Watch');
    }
    ?>
</a>


              </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php endif; ?> 
    </div>
  </div>
  </div>
</div>

</div>
<!-- -->
</div>
</div>
</div>
</div>
</div>
</div>
<?php get_template_part('template-modules/email-signup');?>
<?php get_footer(); ?>
