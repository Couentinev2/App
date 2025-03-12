<?php
// Get the header
get_header(); ?>

    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
        </header><!-- .page-header -->

        <?php if ( have_posts() ) : ?>

            <?php
            // Start the Loop
            while ( have_posts() ) : the_post();

                // Include the Post-Type-specific template for the content.
                get_template_part( 'template-parts/content', 'revisions' );

            endwhile;

            // Include the pagination component
            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>

    </main><!-- #main -->

<?php
// Get the footer
get_footer();
