<style>
    .cta .inner-wrap{
  max-width: 900px;
}

.cta-logo {
  
  margin-bottom: 40px!important;
}

@media screen and (max-width: 1000px) {
.cta {
  padding: 80px 56px;
}
}

@media screen and (max-width: 760px) {
.cta {
  padding: 64px 32px;
}
}
    
</style>


<div class="row cta 
<?php if ( get_field('cta_style') == 'dark' ) : ?>
 cta-dark
<?php endif; ?>
 ">
<div class="inner-wrap inner-wrap-600">
          <img class="cta-logo" src="<?php the_field('cta_logo'); ?>" alt="<?php the_field('cta_partner'); ?>" />

        <h2 class="scale-36-30-24">
          <?php the_field('footer_cta_headline'); ?>
        </h2>
        <p>
          <?php the_field('footer_cta_text'); ?>
        </p>
        <a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('cta_url'); ?>"><?php the_field('btn_cta_text'); ?></a> 
</div>
</div>