<?php get_header(); ?>
	<section class="articles-block">
		<div class="container">
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<div class="three-cols">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts( ) ) : the_post(); ?>
						<div class="col">
							<article class="article">
								<?php if( has_post_thumbnail() ) : ?>
									<div class="img-holder">
										<a href="<?php the_permalink(); ?>">
											<picture>
												<?php
													$thumb_id = get_post_thumbnail_id( get_the_ID() );
													$alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
													$image_src = wp_get_attachment_image_src( $thumb_id, 'thumbnail_768x432' );
												?>
												<img src="<?php echo $image_src[0]; ?>" alt="<?php echo $alt; ?>">
											</picture>
										</a>
									</div>
								<?php endif; ?>
								<div class="text-block">
									<div class="title-heading-holder">
										<?php if( has_term( '', 'category' ) ) : ?>
											<span class="title"><?php the_category( ', ' ); ?></span>
										<?php endif; ?>
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="person-detail-block">
										<div class="img-block">
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
										<picture>
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?>
										</picture>
									</a>
										</div>
										<div class="text-holder">
											<span><?php _e( 'by ', 'applovin' ); ?><strong><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></strong><?php _e( ' on ', 'applovin' ); ?><strong><?php echo get_the_date( 'M j, Y' ); ?></strong></span>
										</div>
									</div>
								</div>
							</article>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part( 'blocks/not_found' ); ?>
				<?php endif; ?>
			</div>
			<?php get_template_part( 'blocks/pager' ); ?>
		</div>
	</section>

<?php get_footer(); ?>
