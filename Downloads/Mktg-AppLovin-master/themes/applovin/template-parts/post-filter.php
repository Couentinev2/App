<article class="article">
                    <a href="<?php the_permalink();?>"> 

                <div class="img-holder index-holder">
                    <picture>
                      <?php
                      $thumb_id = get_post_thumbnail_id( get_the_ID() );
                      $alt = get_post_meta( $thumb_id, "_wp_attachment_image_alt", true );
                      $image_src = wp_get_attachment_image_src( $thumb_id, "thumbnail_768x432" );
                      ?>

                      <img src="<?php echo $image_src[0]; ?>">
                    </picture>
                </div>
                  </a>
              <div class="text-block">
                                    <a href="<?php the_permalink();?>"> 

                <h3 class="scale-18-18-16"><?php the_title(); ?></h3>
                <div class="person-detail-block">
                  <div class="text-holder">
                    <span><strong><?php echo get_the_date( "M j, Y" ); ?></strong></span>
                  </div>
                </div>
                                                </a>
              </div>


            </article>
