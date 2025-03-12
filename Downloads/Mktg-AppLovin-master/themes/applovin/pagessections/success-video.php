<?php  echo '</div></div></div><div class="section-video" id="videopart"><div class="section-title inner-wrap inner-wrap-1200 inner-wrap-max-right"><h4  class="scale-24-21-18">Video Testimonials</h4></div><div class="video-cards-wrap hz-scrollable">';

          $argsbis = array( 
            'post_type' => 'video', 
            'posts_per_page' => -1,

               );
 
        //$posts = get_posts( $args );

        $loopbis = new WP_Query( $argsbis );
        while ( $loopbis->have_posts() ): $loopbis->the_post();
        $post_idbis = get_the_ID();
    //    if ( $post_id != $featured_post->ID ) { // delete first post 
          foreach ( get_the_terms( $post_idbis, 'video_categories' ) as $ctbis ) { // loop through
            $cybis = get_term( $ctbis ); // grab each custom taxonomy category (term) object for the post
            $namebis = $cybis->name;
            if ($namebis == "Success Stories"){

            echo '<a class="video-card-link-wrap display display-video"  href=" '. get_permalink() .'"><div class="video-card"><div class="video-card-art"><img class="video-overview-image" src="' . get_field( 'video_thumbnail' ) . '" alt="" /><p class="timeCode">' . get_field( 'timecodevideo' ) . ' MIN</p></div>';

            echo '</div><div class="video-card-content"><div class="card-content"><h5 class="scale-21-21-18">' . get_field('video_title',$post_idbis ) . '</h5></div></div></a>';
    //      }
        }
        }
        endwhile;
  echo '</div></div></div>'; ?>