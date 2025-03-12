<?php
/*
Template Name: Authors Page
*/
?>

<?php get_header();
global $post;
?>


<style>
    .articles-author,
    .section-pic-info {
        padding: 96px 0
    }

    .section-pic-info {
        background-color: #fff;
    }

    .author-full-info {
        display: grid;
        grid-template-columns: repeat(2, auto);
        grid-template-rows: 1fr;
        grid-column-gap: 64px;
        grid-row-gap: 0;
        width: fit-content;
    }

    .author-full-info .author-picture img {
        border-radius: 50%;
        max-width: 200px;
    }

    .three-cols {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: auto;
        grid-column-gap: 24px;
        grid-row-gap: 24px;
    }

    .article {
        background: #fff;
        border-radius: 16px;
        height: 100%;
        display: flex;
        flex-direction: column;
        max-height: 100%;
        max-width: 100%;
        overflow: hidden;
        z-index: 99;
        position: relative;
        width: 100%;
    }

    .img-holder,
    .text-block {
        flex: 1;
    }

    .img-holder,
    .text-block {
        z-index: 99;
    }

    .img-holder,
    .text-block {
        flex: 1;
    }

    .img-holder img {
        min-width: 100%;
    }


    .author-info {
        align-self: center;
    }

    .author-info p {
        margin-bottom: 0;
    }

    .author-info h1 {
        margin-bottom: 24px
    }

    .text-block {
        padding: 40px;
        color: #000;
        text-align: left;
        margin-bottom: 0 !important;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: #fff;
        border-radius: 0 0 16px 16px;
    }

    .article .text-block {
        padding: 40px;
        height: 100%;
        margin: auto 0;
        display: flex;
        flex-direction: column;
    }

    .title-heading-holder h2 {
        font-family: var(--font-wt-Black);
        font-weight: 750;
        font-size: 20px;
        line-height: 24px;
        margin: 0 0 20px;
        text-transform: none;
    }

    .title-heading-holder h2 a {
        color: #000 !important;
    }

    .post-datestamp {
        color: #999999;
    }

    .timeCode {
        display: block;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: absolute;
        bottom: 16px;
        right: 16px;
        background: rgba(0, 0, 0, 0.5);
        padding: 0.25em 0.5em;
        border-radius: 4px;
        font-size: 10px !important;
        font-family: var(--font-wt-Heavy);
        font-weight: 700;
        margin-bottom: 0;
        color: #fff;
        width: max-content;
    }

    .three-cols .col::after {
        box-shadow: 0px 4px 50px rgba(16, 95, 251, 0.25);
        display: block;
        content: '';
        height: 45%;
        width: 85%;
        position: absolute;
        bottom: 6px;
        left: 7.5%;
        z-index: 0;
        overflow: visible;
    }

    .author-bio {
        color: #666666;
    }

    .col a {
        opacity: 1;
        width: 100%;
    }

    @media screen and (max-width: 1024px) {
        .three-cols {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: auto;
            grid-column-gap: 24px;
            grid-row-gap: 24px;
        }

        .three-cols .col:last-child {
            grid-area: unset;
            width: 100%;
            margin: 0 auto;
        }
    }

    @media screen and (max-width: 764px) {

        .three-cols,
        .author-full-info {
            display: block;

        }

        .author-picture {
            margin-bottom: 30px;
        }

        .three-cols .col {
            margin-bottom: 25px;
        }

        .three-cols .col:last-child {
            margin-bottom: 0;
        }

        .author #main.rc-nav-page {
            padding-top: 130px;
        }

        .section-pic-info {
            padding-bottom: 56px;
        }

        .articles-author {
            padding-top: 56px;
        }

    }
</style>

<?php $current_language = pll_current_language('slug'); ?>

<div id="page-author" class="overview">
    <div class="section-pic-info">

        <div class="container inner-wrap inner-wrap-1200">

            <?php

            $curauth = get_user_by('slug', $author_name);
            $job_title = get_user_meta($curauth->ID, 'job_title', true);


            if ($curauth !== false) {
                echo '<div class="author-full-info">
    <div class="author-picture">';
                echo get_avatar($curauth->ID, 400);
                echo '</div>
<div class="author-info scale-36-30-24"><h1>' . esc_html($curauth->display_name) . '</h1>';



                echo '<p class="author-bio scale-18-18-16">' . esc_html($curauth->description) . '</p>
</div>
</div>
</div>
    ';
            } else {
                echo '<h1>User not found</h1>';
            };


            echo '
</div><div class="articles-author">
      <div class="container inner-wrap inner-wrap-1200">

<h2> Posts by ' . esc_html($curauth->first_name) . '</h2>
<div class="three-cols">';

            $post_types = $current_language == 'CN' ? ['success_story_pod'] : ['post', 'success_story_pod', 'video', 'page'];

            $args = array(
                'author' => $curauth->ID,
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );

            $the_query = new WP_Query($args);




            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {


                    $the_query->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                    $post_id = get_the_ID();
                    $post_type = get_post_type($post_id);

                    if ($post_type == 'post') {
                        $post_type = 'Blog';
                    } elseif ($post_type == 'video') {
                        $min = get_field('timecodevideo', $post_id);
                        $post_type = "$min MIN";
                    } elseif ($post_type === 'page') {
                        $post_type = 'Report';
                    } else {
                        $post_type_object = get_post_type_object($post_type);
                        $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                    };


                    if ($featured_img_url) {
                        echo '<div class="col" style="display: flex;"><a href="' . get_permalink() . '"><article class="article success_story_pod"><div class="img-holder"><img src="' . esc_url($featured_img_url) . '" alt="' . get_the_title() . '" style="width:100px;height:auto;"><p class="timeCode ' .  esc_html($post_id) . '">' .  pll__($post_type) . '</p>
</div>';
                    } else {

                        echo '<div class="col" style="display: flex;"><article class="article success_story_pod"><div class="img-holder"><img src="/wp-content/uploads/2021/10/blog_generic_applovin.jpg" alt="' . get_the_title() . '" style="width:100px;height:auto;"><p class="timeCode">' .  pll__($post_type) . '</p></div>';
                    };

                    echo '<div class="text-block"><div class="title-heading-holder"><h2 class="scale-18-18-16">' . get_the_title() . '</div><div class="person-detail-block"><div class="text-holder"><span class="post-datestamp"><strong class="fixed-12">' . get_the_date() . '</strong></span></div></div></div></article></a></div>';
                }
                echo '';
            } else {
                // No posts found
                echo '<p>No posts found.</p>';
            }

            echo "</div></div>";
            wp_reset_postdata();

            ?>
        </div>
    </div>
    <!-- -->
</div>
</div>
</div>
</div>
</div>
</div>
<?php get_template_part('template-modules/email-signup');?>
<?php get_footer(); ?>