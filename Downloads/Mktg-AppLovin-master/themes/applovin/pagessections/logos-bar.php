<div class="partners-logos">
  <?php
  $a = get_field('logo_bar_title');
  if (!empty($a)) {  ?>
    <h2 class="logo-bar-title fixed-14">
      <?php the_field('logo_bar_title'); ?>
    </h2>
  <?php } ?>
  <div class="logos-section">
    <div class="brand-logo-slider flex overflow-hidden mx-auto"></div>
  </div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  document.addEventListener("DOMContentLoaded", function() {
    <?php
    $logos = [];
    $current_page_slug = get_post_field('post_name', get_post());

    if ($current_page_slug === 'increase-arpdau') {
      $logos = [
        ["src" => get_template_directory_uri() . "/images/picsart.svg", "width" => "92px"],
        ["src" => get_template_directory_uri() . "/images/bigo.svg", "width" => "76px"],
        ["src" => get_template_directory_uri() . "/images/idea-solutions.svg", "width" => "140px"],
        ["src" => get_template_directory_uri() . "/images/network-studios.svg", "width" => "113px"],
        ["src" => get_template_directory_uri() . "/images/voodoo.svg", "width" => "110px"],
        ["src" => get_template_directory_uri() . "/images/say-games.svg", "width" => "130px"]
      ];
    } elseif ($current_page_slug === 'grow-ad-inventory') {
      $logos = [
        ["src" => get_template_directory_uri() . "/images/warriorgames.svg", "width" => "132px"],
        ["src" => get_template_directory_uri() . "/images/noxjoy.svg", "width" => "108px"],
        ["src" => get_template_directory_uri() . "/images/tapnation.svg", "width" => "176px"],
        ["src" => get_template_directory_uri() . "/images/wildcard.svg", "width" => "75px"],
        ["src" => get_template_directory_uri() . "/images/idea-solutions.svg", "width" => "140px"],
        ["src" => get_template_directory_uri() . "/images/azur-games.svg", "width" => "119px"]
      ];
    } else if ($current_page_slug === 'acquire-app-users') {
      $logos = [
        ["src" => get_template_directory_uri() . "/images/smartnews.svg", "width" => "167px"],
        ["src" => get_template_directory_uri() . "/images/picsart.svg", "width" => "92px"],
        ["src" => get_template_directory_uri() . "/images/onemt.svg", "width" => "180px"],
        ["src" => get_template_directory_uri() . "/images/fastic.svg", "width" => "127px"],
        ["src" => get_template_directory_uri() . "/images/tripledot.svg", "width" => "147px"],
        ["src" => get_template_directory_uri() . "/images/kayac.svg", "width" => "155px"]
      ];
    } else if ($current_page_slug === 'increase-iaps') {
      $logos = [
        ["src" => get_template_directory_uri() . "/images/soundcloud.svg", "width" => "160px"],
        ["src" => get_template_directory_uri() . "/images/yelp.svg", "width" => "85px"],
        ["src" => get_template_directory_uri() . "/images/duolingo.svg", "width" => "119px"],
        ["src" => get_template_directory_uri() . "/images/booking.svg", "width" => "114px"],
        ["src" => get_template_directory_uri() . "/images/network.svg", "width" => "130px"],
        ["src" => get_template_directory_uri() . "/images/fastic.svg", "width" => "127px"]
      ];
    } else if ($current_page_slug === 'expand-your-reach') {
      $logos = [
        ["src" => get_template_directory_uri() . "/images/thetradedesk.svg", "width" => "180px"],
        ["src" => get_template_directory_uri() . "/images/twitter-logo.svg", "width" => "35px"],
        ["src" => get_template_directory_uri() . "/images/linkedin-logo.svg", "width" => "131px"],
        ["src" => get_template_directory_uri() . "/images/criteo.svg", "width" => "103px"],
        ["src" => get_template_directory_uri() . "/images/moloco.svg", "width" => "123px"],
        ["src" => get_template_directory_uri() . "/images/aarki.svg", "width" => "118px"]
      ];
    }
    // Add more conditions here for other pages...
    ?>

    const logos = <?php echo json_encode($logos); ?>;

    // Generate slider items from the logos array
    let scrollerItemsEl = "";
    for (let i = 0; i < logos.length; i++) {
      scrollerItemsEl += `<div class="scrollerItem"><img class="caption mx-auto flex" src="${logos[i].src}" alt="" style="width: ${logos[i].width};"></div>`;
    }
    // Append the first set again for a loop effect
    scrollerItemsEl += scrollerItemsEl;

    // Initialize slider settings based on window width
    let scrollerItemsViewable;
    if (window.innerWidth > 1024) {
      scrollerItemsViewable = 6;
    } else if (window.innerWidth > 765) {
      scrollerItemsViewable = 4;
    } else {
      scrollerItemsViewable = 2;
    }

    var scrollerSpeed = 3; // Scroller speed in seconds
    var scrollerTransitionSpeed = 2; // Transition speed - must be <= scrollerSpeed

    // Insert generated items into the slider container
    $(".brand-logo-slider").html(scrollerItemsEl);
    // Wrap items and set initial configurations
    $(".brand-logo-slider > .scrollerItem").wrapAll('<div class="scrollerGroup flex items-center justify-start transition-all duration-1000" />');
    var scrollerCount = $(".brand-logo-slider .scrollerGroup > .scrollerItem").length;
    var scrollerItemWidth = parseInt($(".brand-logo-slider").css("width")) / scrollerItemsViewable;
    $(".brand-logo-slider .scrollerGroup > .scrollerItem").css("width", scrollerItemWidth + "px");
    $(".brand-logo-slider .scrollerGroup").css("width", scrollerCount * scrollerItemWidth + "px");
    $(".brand-logo-slider .scrollerGroup > .scrollerItem").css("transition", "margin " + scrollerTransitionSpeed + "s");

    // Set starting values for animation
    var scrollerLeftMargin = "-" + scrollerItemWidth + "px";
    var scrollerFirstItem = true;

    // Function to animate the scroller
    function scrollerAnimate(speed) {
      setInterval(scrollerRotate, speed * 1000);
    }

    // Function to rotate the scroller items
    function scrollerRotate() {
      if (scrollerFirstItem) {
        scrollerFirstItem = false;
      } else {
        $(".brand-logo-slider .scrollerGroup").append($(".brand-logo-slider .scrollerGroup .scrollerItem:first-child"));
      }
      $(".brand-logo-slider .scrollerGroup > .scrollerItem").css("margin-left", "0");
      $(".brand-logo-slider .scrollerGroup > .scrollerItem:first-child").css("margin-left", scrollerLeftMargin);
    }

    // Start the animation
    scrollerAnimate(scrollerSpeed);
  });
</script>