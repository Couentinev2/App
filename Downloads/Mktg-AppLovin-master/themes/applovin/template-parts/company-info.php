<style type="text/css">
   .info-success p {
      margin-bottom: 0;      
   }

   .success-text-pod {
      margin-top: 40px;
   }
@media screen and (max-width: 760px){
   .success-text-pod .partner-logo {
      margin: unset;
      margin-bottom: 32px;
   }

   .info-success  {
      display: block;
      text-align: left;
   }
   .success-text-pod p {
      text-align: left;
   }
   .info-success div {
      margin-top: 20px;
   }
}
</style>

               <div class="success-text-pod">
                  <img src="<?php the_field('partner_logo_with_color'); ?> " alt="<?php the_field('page_slug'); ?> logo" class="partner-logo">

                  <p class="scale-18-18-16">
                     <?php the_field('background'); ?> 
                  </p>
                  <div class="info-success">
                     <div>
                  <p class="mini-title">
                      <?php pll_e('Location') ?>   

                  </p>
                  <p class="scale-18-18-16">
                     <?php the_field('location'); ?> 
                  </p></div><div>
                  <p class="mini-title">
                    <?php pll_e('Company Size') ?>

                  </p>
                  <p class="scale-18-18-16">
                     <?php the_field('company_size'); ?> 
                  </p></div><div>
                  <p class="mini-title">
                     <?php pll_e('Founded') ?> 

                  </p>
                  <p class="scale-18-18-16">
                     <?php the_field('year_founded'); ?> 
                  </p></div>
                  </div>
               </div>