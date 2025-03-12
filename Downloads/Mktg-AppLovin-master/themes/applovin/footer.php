</main> <!-- /#main -->
<?php $is_dark = (get_field('footer_style') == 'dark' || is_singular('glossary_entry') || is_singular('video')|| is_tax('videos-series')|| is_tax('video-categories')); // is this page using a dark footer? assign true/false value directly to var ?>
<footer id="footer" <?php echo $is_dark ? 'class="footer-dark"' : ''; ?>>
    <div class="inner-wrap inner-wrap-1200 flex-inner-wrap">
        <div class="row menus-row">
            <div class="footer-logo">
            <?php $icon_color_name = $is_dark ? 'icon_applovin_white' : 'icon_applovin_black'; ?>
            <img src="/wp-content/themes/applovin/images/<?php echo $icon_color_name; ?>.svg" alt="AppLovin icon" class="footer-icon" />
            </div>
            <div class="footer-nav-holder">
                <div>
                    <h6 class="submenu-title"><?php pll_e('PRODUCTS'); ?></h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-submenu-1',
                        'container' => false,
                        'menu_class' => 'footer-submenu',
                    )); ?>
                </div>
                <div>
                    <h6 class="submenu-title"><?php pll_e('SOLUTIONS'); ?></h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-submenu-2',
                        'container' => false,
                        'menu_class' => 'footer-submenu',
                    )); ?>
                </div>
                <div>
                    <h6 class="submenu-title"><?php pll_e('RESOURCES'); ?></h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-submenu-4',
                        'container' => false,
                        'menu_class' => 'footer-submenu',
                    )); ?>
                </div>
                <div>
                    <h6 class="submenu-title"><?php pll_e('ABOUT US'); ?></h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-submenu-3',
                        'container' => false,
                        'menu_class' => 'footer-submenu',
                    )); ?>
                </div>
                <div>
                    <h6 class="submenu-title"><?php pll_e('INSIDE APPLOVIN'); ?></h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-submenu-5',
                        'container' => false,
                        'menu_class' => 'footer-submenu',
                    )); ?>
                </div>
            </div>

            <div class="lang-switcher">
                <ul>
                    <li class="lang-en <?php if (pll_current_language('slug') == 'en') echo 'active'; ?>"><a href="/">ENG</a></li>
                    <li class="lang-cn <?php if (pll_current_language('slug') == 'cn') echo 'active'; ?>"><a href="/cn">中文</a></li>
                    <li class="lang-jp <?php if (pll_current_language('slug') == 'ja') echo 'active'; ?>"><a href="/ja">日本語</a></li>
                    <li class="lang-kr <?php if (pll_current_language('slug') == 'ko') echo 'active'; ?>"><a href="/ko">한국어</a></li>
                </ul>
            </div>
        </div>

        <div class="row copyright-row">
            <div>
                <div class="copyright-text">
                    Copyright &copy; <?php echo date('Y'); ?> AppLovin. All rights reserved.
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'terms-list',
                )); ?>
                <span class="cookies-list">
                    <a id="do-not-sell-btn" href="/multistate-privacy-notice/">Your Privacy Choices</a>
                    <a id="ot-sdk-btn" class="ot-sdk-show-settings">Cookie Settings</a>
                </span>
            </div>

            <ul class="social-icons footer-social-icons">
                <li><a href="https://twitter.com/AppLovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-x-2023.svg" alt="X" /></a></li>
                <li><a href="https://www.facebook.com/AppLovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-fb-2023.svg" alt="Facebook" /></a></li>
                <li><a href="https://www.linkedin.com/company/applovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-li-2023.svg" alt="LinkedIn" /></a></li>
                <li><a href="https://www.instagram.com/applovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-ig-2023.svg" alt="Instagram" /></a></li>
            </ul>
        </div>
    </div>
</footer> <!-- /#footer -->
</div> <!-- /.content-wrapper -->

<script>
    jQuery(document).ready(function() {
        jQuery(".animsition").animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 800,
            outDuration: 400,
            linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([href*="mailto"]):not([href*="tel"]):not(.animsition)',
            loading: true,
            loadingParentElement: 'body',
            timeout: true,
            timeoutCountdown: 2000,
            loadingClass: 'animsition-loading',
            unSupportCss: ['animation-duration', '-webkit-animation-duration', '-o-animation-duration'],
            overlay: false
        });
    });
</script>
<?php wp_footer(); ?>
</body>
<!-- CF check -->
</html>
