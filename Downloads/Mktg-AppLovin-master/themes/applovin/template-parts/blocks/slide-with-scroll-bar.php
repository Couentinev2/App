<?php
/**
 * Slide with Scroll Bar.
 */
// Load values and handle defaults.
$back_image = get_sub_field('back_image');
$logo_img = get_sub_field('logo_img');
?>



<div class="slide-with-scroll">
  <div class="inner-wrap inner-wrap-1200">

<h2 class="scale-32-24-21"><?php the_field('title_scroll'); ?></h2></div>


<div  class="slide-quote-container hz-scrollable"  id="content-slide">  
  <div class="slide-quote slide-quote-business">
            <?php if( have_rows('business_slideshow') ): ?>
          <?php while( have_rows('business_slideshow') ): the_row();?>


            <div class="change-hand">

            <div class="slide-quote-solo slide-quote-solo-not-hover" style="background: url(<?php the_sub_field('back_image'); ?>), #EEF0F6 ;">
                          <div class="quote-text">

         <!-- <img class="slide-quote-image" src="<?php the_sub_field('logo_img'); ?>" alt="belonging"> -->
          <p class="scale-21-21-18"><?php the_sub_field('slide_text'); ?></p>
            </div>

            </div>

             <a href="<?php the_sub_field('pod_prod_url'); ?>" target="_blank" class="slide-quote-solo slide-quote-solo-hover" style="background: url(<?php the_sub_field('back_image_color'); ?>), <?php the_sub_field('back_color'); ?> ;">


                          <div class="quote-text">

          <img class="slide-quote-image" src="<?php the_sub_field('logo_img'); ?>" alt="belonging">
          <p class="scale-21-21-18"><?php the_sub_field('slide_text'); ?></p>
            </div>

</a>
            </div>

          <?php endwhile; ?>

          <?php endif; ?>

</div></div>

<div class="scrollbar-container" id="myScrollbarContainer">
    <div class="scrollbar"></div>


</div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
var scrollContentV2 = document.querySelector('.slide-quote-business');
var scrollContainerV2 = document.querySelector('#myScrollbarContainer');

scrollContainerV2.style.height = '6px';
scrollContainerV2.style.background = '#ddd'; 
scrollContainerV2.style.width = '95%'; 
scrollContainerV2.style.maxWidth = '1200px'; 
scrollContainerV2.style.margin = '0 auto'; 

if (window.innerWidth <= 765) {
  scrollContainerV2.style.maxWidth = '220px';
}


var scrollbarV2 = document.createElement('div');

scrollbarV2.style.background = 'linear-gradient(270deg, #00B6E0 0%, #6441E2 100%)'; 
scrollbarV2.style.height = '6px';
scrollbarV2.style.position = 'absolute';

scrollContainerV2.appendChild(scrollbarV2);

function updateScrollbarV2() {
    var scrollWidthV2 = scrollContentV2.scrollWidth;
    var scrollLeftV2 = scrollContentV2.scrollLeft;
    var clientWidthV2 = scrollContentV2.clientWidth;
    var scrollbarWidthV2 = clientWidthV2 / scrollWidthV2 * scrollContainerV2.clientWidth;
    var scrollbarLeftV2 = scrollLeftV2 / scrollWidthV2 * scrollContainerV2.clientWidth;

    scrollbarV2.style.width = scrollbarWidthV2 + 'px';
    scrollbarV2.style.left = scrollbarLeftV2 + 'px';
}

scrollContentV2.addEventListener('scroll', updateScrollbarV2);

scrollbarV2.addEventListener('mousedown', function (e) {
    var startXV2 = e.pageX;
    var scrollbarStartXV2 = scrollbarV2.offsetLeft;

    function onMouseMoveV2(e) {
        var currentXV2 = e.pageX;
        var diffXV2 = currentXV2 - startXV2;
        var newScrollLeftV2 = (diffXV2 / scrollContainerV2.clientWidth) * scrollContentV2.scrollWidth;

        scrollContentV2.scrollLeft = newScrollLeftV2 + scrollbarStartXV2 * (scrollContentV2.scrollWidth / scrollContainerV2.clientWidth);
    }

    document.addEventListener('mousemove', onMouseMoveV2);

    document.addEventListener('mouseup', function () {
        document.removeEventListener('mousemove', onMouseMoveV2);
    }, { once: true });
}, { passive: true });

updateScrollbarV2();


</script>
