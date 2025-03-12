<div class="accordion-qa-section">
  <div class="inner-wrap-1200">
    <div class="accordion-qa-section-grid">
      <div class="qa-left">
        <h2 class="scale-32-24-21">
          <?php pll_e('Frequently Asked Questions'); ?>
        </h2>
        <hr class="underline-qa" />
      </div>

      <div class="qa-right">
        <?php if (have_rows('qa_part')): ?>
          <?php while (have_rows('qa_part')): the_row(); ?>
            <button class="accordion-qa scale-21-21-18 "><strong> <?php the_sub_field('qa-section-title'); ?></strong></button>
            <div class="panel-qa scale-18-18-16 ">
              <?php the_sub_field('qa-section-text'); ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var accqa = document.getElementsByClassName("accordion-qa");

  for (var f = 0; f < accqa.length; f++) {
    accqa[f].addEventListener("click", function() {
      // Close all other accordions
      for (var i = 0; i < accqa.length; i++) {
        if (accqa[i] !== this) {
          accqa[i].classList.remove("active-qa");
          accqa[i].nextElementSibling.style.maxHeight = null;
          accqa[i].nextElementSibling.style.marginBottom = null;
        }
      }
      // Toggle the current accordion
      this.classList.toggle("active-qa");
      var panelqa = this.nextElementSibling;

      if (panelqa.style.maxHeight) {
        panelqa.style.maxHeight = null;
        panelqa.style.marginBottom = null;
      } else {
        panelqa.style.maxHeight = panelqa.scrollHeight + "px";
        panelqa.style.marginBottom = "32px";
      }
    });
  }
</script>
