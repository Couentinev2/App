<?php
/*
 * Template Name: Glossary Entry
 * Template Post Type: post
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
    $get_title =  get_the_title(); 
    $parent_letter = substr($get_title, 0, 1);
?>
<div id="page-glossary" class="glossary-individual">
	<div class="row hero">
		<div class="inner-wrap inner-wrap-1000">
			<h1>
				<?php the_title(); ?>
			</h1>
		</div>
	</div>
	<div>
		<div class="inner-wrap inner-wrap-800 glossary-return-wrap">
			<ul>
				<li><a href="/glossary#<?php echo $parent_letter; ?>" class="glossary-return-link">MOBILE GLOSSARY</a></li>
				<li class="glossary-letter-back"><?php echo $parent_letter; ?></li>
			</ul>
		</div>
	</div>
	<div class="row content-row glossary-text-row">
		<div class="inner-wrap inner-wrap-800 glossary-text">
		<?php the_content(); ?>
		</div>
		
		<?php 
$posts = get_field('related_posts');
if( $posts ): ?>
		<div class="row content-row related-box">
			<div class="inner-wrap inner-wrap-800">
				<h6>
					RELATED TERMS 
				</h6>
				<div class="glossary-term-list">			
					<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
					<a href="<?php echo get_permalink( $p->ID ); ?>" class="btn-standard glossary-rel-terms"><?php echo get_the_title( $p->ID ); ?></a>
					<?php endforeach; ?>			
				</div>
			</div>
		</div>
<?php endif; ?>
		
			</div>
	<div class="row cta cta-dark">
		<div class="inner-wrap">
			<h2>
				Interested in learning more?
			</h2>
			<p>Keep up with the latest mobile gaming trends.</p>
			<a class="btn-standard" href="/blog/">Visit our blog </a> 
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
