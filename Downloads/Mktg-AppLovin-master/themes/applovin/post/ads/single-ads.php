<?php
// Get the header
get_header(); ?>

    <main id="main" class="site-main" role="main">

        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'ads' );

            // If comments are open or there's at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->

<?php
// Get the footer
get_footer();
