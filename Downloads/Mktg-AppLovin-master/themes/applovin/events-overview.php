<?php
/*
Template Name: Events Overview Page
*/
?> <?php get_header(); 
global $post;
?>

 <div class="contentPage">
  <div id="page-events" class="overview"> <?php if( $choose_featured_posts_single = get_field( "single_featured_post" ) ) : ?> <div class="featured-post">
      <div class="container inner-wrap inner-wrap-1200">
        <div class="row hero"> <?php foreach( $choose_featured_posts_single as $post ) : ?> <?php setup_postdata( $post ); ?> <div class="hero-grid">
            <div class="image-event">
              <img src="<?php the_field('main_cover_image'); ?>" alt="Logo" class="logo-hero">
            </div>
            <div class="event-info">
              <div class="day-location">
                <p class="day-event fixed-16"> <?php the_field('day_event'); ?> </p> <?php
$event_location = get_field('event_location');

if ($event_location !== 'Virtual') {
    $event_location_copy = get_field('event_location_copy');
    echo '
                  <p class="location-event fixed-16"> &#160;-&#160;' . $event_location_copy . ' </p>';
} else {
    echo '
                  <p class="location-event fixed-16> &#160;-&#160;' . $event_location . ' </p>';
}
?>
              </div>
              <div>
                <h2 class="scale-36-30-24"> <?php the_field('events_title'); ?> </h2>
                <p class="scale-21-21-18"> <?php the_field('events_description'); ?> </p>
              </div>
               <?php    if( have_rows('featured_speakers') ):  ?>

              <div class="speakers-info">
                <div class="img-speaker"> <?php 
        $count = 0;
        $total = count(get_field('featured_speakers'));
        while( have_rows('featured_speakers') ): the_row(); 
            $count++; 
            if($count <= 3) { 
                ?> <img src="
                      <?php the_sub_field('picture_speaker'); ?>" alt="Speaker Image" class="logo-hero"> <?php
            } 
        endwhile;
        
        if($total > 3) {
            echo '
                      <div class="more-images">
                        <p class="fixed-14">+' . ($total - 3) . '</p>
                      </div>';
        }
    ?> </div>
                <div class="name-speaker">
                  <p class="fixed-16">
                    <strong> <?php pll_e('Featured Speakers:');?> </strong> <?php 
                $speaker_names = []; 

      if( have_rows('featured_speakers') ): 
          while( have_rows('featured_speakers') ): the_row();
              $speaker_names[] = get_sub_field('name_speaker'); 
          endwhile;
      endif; 
      echo implode(', ', $speaker_names);

      ?>
                  </p>
                </div>

              </div>
               <?php      endif;  ?>
                              <a class="btn-standard cta-pop-form scale-21-21-18" href="
                      <?php the_field('event_url'); ?>"> <?php the_field('event_btn_text'); ?> </a>
            </div>
          </div> <?php endforeach; ?> <?php wp_reset_postdata(); ?> </div>
      </div>
    </div> <?php endif; ?> 


    <?php if( $choose_featured_posts_duo = get_field( "duo_featured_post" ) ) : ?> <div class="featured-duo-post">
      <div class="inside-featured-duo-post">
      <div class="container inner-wrap inner-wrap-1000">
        <h3 class="scale-32-24-21 duo-f-title"> <?php pll_e('Featured');?> </h3>
        <div class="row duo-featured"> <?php foreach( $choose_featured_posts_duo as $post_duo ) : ?> <?php setup_postdata( $post_duo ); ?> <div class="duo-m-grid">
            <div class="image-event">
              <img src="
                    <?php the_field('main_cover_image', $post_duo->ID); ?>" alt="Logo" class="logo-hero">
            </div>
            <div class="event-info">
              <div class="day-location">
                <p class="day-event fixed-16"> <?php the_field('day_event', $post_duo->ID); ?> </p> <?php
                $event_location_duo = get_field('event_location', $post_duo->ID);
                if ($event_location_duo !== 'Virtual') {
                  $event_location_copy_duo = get_field('event_location_copy', $post_duo->ID);
                  echo '
                      <p class="location-event fixed-16"> &#160;-&#160;' . $event_location_copy_duo . ' </p>';
                } else {
                  echo '
                      <p class="location-event fixed-16"> &#160;-&#160;' . $event_location_duo . ' </p>';
                }
                ?>
              </div>
              <h2 class="scale-24-21-18 "> <?php the_field('events_title', $post_duo->ID); ?> </h2>
              <p class="scale-18-18-16"> <?php the_field('events_description', $post_duo->ID); ?> </p>
         <?php          if( have_rows('featured_speakers', $post_duo->ID) ): ; ?>
              <div class="speakers-info">
                <div class="img-speaker"> <?php 
 
        $count = 0;
        $total = count(get_field('featured_speakers', $post_duo->ID));
        while( have_rows('featured_speakers', $post_duo->ID) ): the_row(); 
            $count++; 
            if($count <= 3) { 
                ?> <img src="
                          <?php the_sub_field('picture_speaker', $post_duo->ID); ?>" alt="Speaker Image" class="logo-speaker"> <?php
            } 
        endwhile;
        
        if($total > 3) {
            echo '
                          <div class="more-images">
                            <p class="fixed-14">+' . ($total - 3) . '</p>
                          </div>';
        }
    ?> </div>
                <div class="name-speaker">
                  <p class="fixed-16">
                    <strong> <?php pll_e('Featured Speakers:');?> </strong>
                  </p>
                  <p class="fixed-16"> <?php 
                $speaker_names_duo = []; 

      if( have_rows('featured_speakers', $post_duo->ID) ): 
          while( have_rows('featured_speakers', $post_duo->ID) ): the_row();
              $speaker_names_duo[] = get_sub_field('name_speaker', $post_duo->ID); 
          endwhile;
      endif; 
      echo implode(', ', $speaker_names_duo);

      ?> </p>
                </div>
              </div>
                <?php   endif;  ?> 
 <a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('event_url', $post_duo->ID); ?>"> <?php the_field('event_btn_text', $post_duo->ID); ?> </a>
            </div>

          </div> <?php endforeach; ?> <?php wp_reset_postdata(); ?> </div>
      </div>
      </div>
    </div> <?php endif; ?> </div>
</div>

<div class="main-page-events">
<div class="upcoming-events main-events-rows">
      <div class="container inner-wrap inner-wrap-1000">
                <div class="titles-section-event">
    <h3 class="scale-32-24-21 past-title"><?php pll_e('Upcoming events');?> </h3>
    <a href="./upcoming-events/" class="fixed-16"><?php pll_e('Browse all upcoming events');?></a>
    </div>
    <div class="row futur-events"> 
    <?php
      $today = date('Ymd');

      $args = array(
          'post_type' => 'event',
          'posts_per_page' => 3,
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
      $event_query = new WP_Query($args);

      if ($event_query->have_posts()) : 
          while($event_query->have_posts()) : $event_query->the_post(); ?>
              <div class="main-page-grid future-grid">
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
                      echo '<p class="location-event fixed-16"> &#160;-&#160;' . $event_location_copy . '</p>';
                    } else {
                      echo '<p class="location-event fixed-16"> &#160;-&#160;' . $event_location . '</p>';
                    }
                    ?>
                  </div>
                  <h2 class="scale-24-21-18"><?php the_field('events_title'); ?></h2>
                  <p class="scale-18-18-16"><?php the_field('events_description'); ?></p>
              <?php 
               if(have_rows('featured_speakers')): ?>
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
<?php 
$event_btn_text = get_field('event_btn_text');
?>

<a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('event_url'); ?>">
    <?php 
    if (empty($event_btn_text)) {
        pll_e('RSVP');
    } else {
        echo $event_btn_text;
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

<div class="webinar-events main-events-rows">
      <div class="container inner-wrap inner-wrap-1000">
        <div class="titles-section-event">
    <h3 class="scale-32-24-21 past-title"><?php pll_e('Webinars');?> </h3>
 <a href="./webinars/" class="fixed-16"><?php pll_e('Browse all webinars');?></a>
    </div>
    <div class="row webinar-events"> 
    <?php
 $args = array(
    'post_type' => 'event',
    'posts_per_page' => 3,
    'meta_query' => array(
        array(
            'key' => 'event_location',
            'value' => 'Virtual',
            'compare' => '=',
        )
    )
);
$event_query = new WP_Query($args);

      if ($event_query->have_posts()) : 
          while($event_query->have_posts()) : $event_query->the_post(); ?>
              <div class="main-page-grid webinar-grid">
                <div class="image-event">
                  <img src="<?php the_field('main_cover_image'); ?>" alt="Logo" class="logo-hero">
                </div>
                <div class="event-info">
                  <div class="day-location">
                    <p class="day-event fixed-16"><?php pll_e('ON DEMAND'); ?></p>
                    <?php
                    $event_location = get_field('event_location');
                    if ($event_location !== 'Virtual') {
                      $event_location_copy = get_field('event_location_copy');
                      echo '<p class="location-event fixed-16"> &#160;-&#160;' . $event_location_copy . '</p>';
                    } else {
                      echo '<p class="location-event fixed-16"> &#160;-&#160;' . $event_location . '</p>';
                    }
                    ?>
                  </div>
                  <h2 class="scale-24-21-18"><?php the_field('events_title'); ?></h2>
                  <p class="scale-18-18-16"><?php the_field('events_description'); ?></p>
              <?php 
               if(have_rows('featured_speakers')): ?>
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
                   <a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('event_url'); ?>"><?php pll_e('Watch');?></a>

              </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php endif; ?> 
    </div>
  </div>
</div>


<div class="past-events main-events-rows">
      <div class="container inner-wrap inner-wrap-1000">
<div class="titles-section-event">
    <h3 class="scale-32-24-21 past-title"><?php pll_e('Previous events');?> </h3>

    </div>
    <div class="row past-events"> 
    <?php
      $today = date('Ymd');
      $args = array(
          'post_type' => 'event',
          'posts_per_page' => -1, 
          'meta_key' => 'day_event', 
          'orderby' => 'meta_value_num', 
          'order' => 'DESC', 
          'meta_query' => array(
              array(
                  'key' => 'day_event',
                  'value' => $today,
                  'compare' => '<', 
                  'type' => 'DATE'
              ),
                          array(
                  'key' => 'event_location',
                  'value' => 'Virtual',
                  'compare' => '!=',
              )
          )
      );
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
              <?php 
               if(have_rows('featured_speakers')): ?>
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
                  <a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('event_url'); ?>"><?php pll_e('Revisit');?></a>

              </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php endif; ?> 
    </div>
  </div>
</div>


</div>

<?php get_template_part('template-modules/email-signup');?>
<?php get_footer(); ?>