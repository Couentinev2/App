<style type="text/css">
.simple-para .title{
    margin-bottom: 40px!important
}

.simple-para .app-subtitle{
    margin-bottom: 40px!important;
        font-family: var(--font-wt-Heavy);
    font-weight: 700;
}

.simple-separation {
  width: 100%;
  border-top: 1px solid #E6E6E6;
  margin: 64px 0;
}
@media screen and (max-width: 760px){

.simple-separation {
  width: 100%;
  border-top: 1px solid #E6E6E6;
  margin: 40px 0;
}

}

</style>

<?php if( get_field('grey_line_separation') == 'Yes' ): ?>
    <div class="simple-separation">
    </div>
<?php endif; ?>

 <div class="simple-para">
    <h2 class="title scale-36-30-24"><?php the_field('para_title'); ?></h2>
<p class="app-subtitle scale-21-21-18"><?php the_field('para_sub_title'); ?></p>
  </div>