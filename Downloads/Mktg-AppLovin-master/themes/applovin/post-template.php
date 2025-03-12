      <div class='article'>

        <article class='articles'>
            <a href='" . esc_url(get_permalink()) . "'>
                <div class='img-holder index-holder'>
                    <picture>
                        <img src='" . esc_url($image_url) .  "' alt='" . esc_attr($alt) . "'>
               <p class='timeCode'>" .  $post_type . "</p>
                    </picture>
                </div>
            </a>
            <div class='text-block'>
                <a href='" . esc_url(get_permalink()) . "'>
                    <h3 class='scale-18-18-16'>" . get_the_title() .  "</h3>
                    <div class='person-detail-block'>
                        <div class='text-holder'>
                            <span><strong>"  . get_the_date('M j, Y') .  "</strong></span>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        </div>