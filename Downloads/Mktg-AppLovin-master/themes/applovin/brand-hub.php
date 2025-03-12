<?php
/*
Template Name: Brand Hub
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/brand-hub.css">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/brand-hub.js"></script>

<main>
    <section class="brand-hub wrapper">
        <div class="title-con">
            <div class="title">Brand Hub</div>
            <h1>Connect with our brands</h1>
            <div class="sub-header">Discover how we deliver unique yet consistent experiences across our global, industry-leading solutions.</div>
        </div>
    
        <div class="cards-con">
            <div class="card active applovin">
                <div class="logo"><img src="/wp-content/uploads/2024/04/logo_applovin_primary_black.svg" alt=""></div>
    
                <div class="content">
                    <p>Market-leading technologies that help businesses connect to their ideal customers.</p>
                    <div class="btn-con">
                        <a href="https://brand.applovin.com" target="_blank"><span>View brand resources</span></a>
                    </div>
                </div>
            </div>

            <div class="card adjust">
                <div class="logo"><img src="/wp-content/uploads/2024/04/logo_adjust_primary.svg" alt=""></div>
    
                <div class="content">
                    <p>Efficient measurement and analytics delivered on a global scale.</p>
                    <div class="btn-con">
                        <a href="https://brand.adjust.com" target="_blank"><span>View brand resources</span></a>
                    </div>
                </div>
            </div>

            <div class="card wurl">
                <div class="logo"><img src="/wp-content/uploads/2024/04/logo_wurl_primary.svg" alt=""></div>
    
                <div class="content">
                    <p>Powerful monetization, marketing, and distribution for streaming TV.</p>
                    <div class="btn-con">
                        <a href="https://brand.wurl.com" target="_blank"><span>View brand resources</span></a>
                    </div>
                </div>
            </div>
    </section>

</main>

<?php get_footer(); ?>