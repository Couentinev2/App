<?php
/*
Template Name: Glossary Page
*/
?>
<?php get_header(); ?>
<div class="contentPage">
	<div id="page-glossary" class="glossary-index">
		<div class="row hero">
			<div class="inner-wrap inner-wrap-1000 grid gap-[40px]">
				<div>
					<div class="scale-24-21-18"><?php the_field('hero_title'); ?></div>
					<h2><?php the_field('hero_intro'); ?></h2>
				</div>

				<div class="primary-slate-btn m-auto">
					<a class="scale-21-21-18" href="#A">
						<span>Explore the Glossary</span>
					</a>
				</div>
			</div>
		</div>
		<?php

		$active_letters = array(); // array to hold list of index letters we have entries for			
		$args = array(
			'post_type' => 	'glossary_entry',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title',
			'meta_key' => 'glossary_term', // this meta key is set in functions.php; contains the first letter of each post's title
		);
		$loop = new WP_Query($args);
		while ($loop->have_posts()) : $loop->the_post();

			$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true); // return the glossary term index letter for this post
			$active_letters[] = $get_letter; // add index letter to array

		endwhile;
		/* Restore original Post Data */
		wp_reset_postdata();

		?>
		<div class="content-row glossary-alphabet-wrap">
			<div class="inner-wrap inner-wrap-1200 glossary-alphabet" id="glossary-alphabet">
				<ul>
					<?php

					if (in_array("a", $active_letters)) { // is this letter in our array of active letters?
						$letter_a = "a"; // set a local var to mark that we have this letter, don't need to hit db again
						echo "<li class=\"alphabet-link link-a active\"><a href=\"#A\">A</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-a\">A</li>";
					}

					if (in_array("b", $active_letters)) {
						$letter_b = "b";
						echo "<li class=\"alphabet-link link-b active\"><a href=\"#B\">B</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-b\">B</li>";
					}
					if (in_array("c", $active_letters)) {
						$letter_c = "c";
						echo "<li class=\"alphabet-link link-c active\"><a href=\"#C\">C</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-c\">C</li>";
					}
					if (in_array("d", $active_letters)) {
						$letter_d = "d";
						echo "<li class=\"alphabet-link link-d active\"><a href=\"#D\">D</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-d\">D</li>";
					}
					if (in_array("e", $active_letters)) {
						$letter_e = "e";
						echo "<li class=\"alphabet-link link-e active\"><a href=\"#E\">E</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-e\">E</li>";
					}
					if (in_array("f", $active_letters)) {
						$letter_f = "f";
						echo "<li class=\"alphabet-link link-f active\"><a href=\"#F\">F</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-f\">F</li>";
					}
					if (in_array("g", $active_letters)) {
						$letter_g = "g";
						echo "<li class=\"alphabet-link link-g active\"><a href=\"#G\">G</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-g\">G</li>";
					}
					if (in_array("h", $active_letters)) {
						$letter_h = "h";
						echo "<li class=\"alphabet-link link-h active\"><a href=\"#H\">H</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-h\">H</li>";
					}
					if (in_array("i", $active_letters)) {
						$letter_i = "i";
						echo "<li class=\"alphabet-link link-i active\"><a href=\"#I\">I</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-i\">I</li>";
					}
					if (in_array("j", $active_letters)) {
						$letter_j = "j";
						echo "<li class=\"alphabet-link link-j active\"><a href=\"#J\">J</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-j\">J</li>";
					}
					if (in_array("k", $active_letters)) {
						$letter_k = "k";
						echo "<li class=\"alphabet-link link-k active\"><a href=\"#K\">K</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-k\">K</li>";
					}
					if (in_array("l", $active_letters)) {
						$letter_l = "l";
						echo "<li class=\"alphabet-link link-l active\"><a href=\"#L\">L</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-l\">L</li>";
					}
					if (in_array("m", $active_letters)) {
						$letter_m = "m";
						echo "<li class=\"alphabet-link link-m active\"><a href=\"#M\">M</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-m\">M</li>";
					}
					echo '<br>';
					if (in_array("n", $active_letters)) {
						$letter_n = "n";
						echo "<li class=\"alphabet-link link-n active\"><a href=\"#N\">N</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-n\">N</li>";
					}
					if (in_array("o", $active_letters)) {
						$letter_o = "o";
						echo "<li class=\"alphabet-link link-o active\"><a href=\"#O\">O</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-o\">O</li>";
					}
					if (in_array("p", $active_letters)) {
						$letter_p = "p";
						echo "<li class=\"alphabet-link link-p active\"><a href=\"#P\">P</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-p\">P</li>";
					}
					if (in_array("q", $active_letters)) {
						$letter_q = "q";
						echo "<li class=\"alphabet-link link-q active\"><a href=\"#Q\">Q</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-q\">Q</li>";
					}
					if (in_array("r", $active_letters)) {
						$letter_r = "r";
						echo "<li class=\"alphabet-link link-r active\"><a href=\"#R\">R</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-r\">R</li>";
					}
					if (in_array("s", $active_letters)) {
						$letter_s = "s";
						echo "<li class=\"alphabet-link link-s active\"><a href=\"#S\">S</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-s\">S</li>";
					}
					if (in_array("t", $active_letters)) {
						$letter_t = "t";
						echo "<li class=\"alphabet-link link-t active\"><a href=\"#T\">T</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-t\">T</li>";
					}
					if (in_array("u", $active_letters)) {
						$letter_u = "u";
						echo "<li class=\"alphabet-link link-u active\"><a href=\"#U\">U</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-u\">U</li>";
					}
					if (in_array("v", $active_letters)) {
						$letter_v = "v";
						echo "<li class=\"alphabet-link link-v active\"><a href=\"#V\">V</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-v\">V</li>";
					}
					if (in_array("w", $active_letters)) {
						$letter_w = "w";
						echo "<li class=\"alphabet-link link-w active\"><a href=\"#W\">W</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-w\">W</li>";
					}
					if (in_array("x", $active_letters)) {
						$letter_x = "x";
						echo "<li class=\"alphabet-link link-x active\"><a href=\"#X\">X</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-x\">X</li>";
					}
					if (in_array("y", $active_letters)) {
						$letter_y = "y";
						echo "<li class=\"alphabet-link link-y active\"><a href=\"#Y\">Y</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-y\">Y</li>";
					}
					if (in_array("z", $active_letters)) {
						$letter_z = "z";
						echo "<li class=\"alphabet-link link-z active\"><a href=\"#Z\">Z</a></li>";
					} else {
						echo "<li class=\"alphabet-link link-z\">Z</li>";
					}
					?>
				</ul>
			</div>
		</div>
		<?php if (isset($letter_a)) {
			echo '<!-- A -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="A">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							A 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'a',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_b)) {
			echo '<!-- B -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="B">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							B 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'b',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_c)) {
			echo '<!-- C -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="C">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							C 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'c',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_d)) {
			echo '<!-- D -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="D">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							D 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'd',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_e)) {
			echo '<!-- E -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="E">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							E 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'e',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_f)) {
			echo '<!-- F -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="F">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							F 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'f',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_g)) {
			echo '<!-- G -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="G">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							G 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'g',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_h)) {
			echo '<!-- H -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="H">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							H 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'h',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_i)) {
			echo '<!-- I -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="I">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							I 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'i',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_j)) {
			echo '<!-- J -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="J">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							J 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'j',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_k)) {
			echo '<!-- K -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="K">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							K 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'k',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_l)) {
			echo '<!-- L -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="L">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							L 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'l',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_m)) {
			echo '<!-- M -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="M">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							M 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'm',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_n)) {
			echo '<!-- N -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="N">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							N 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'n',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_o)) {
			echo '<!-- O -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="O">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							O 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'o',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_p)) {
			echo '<!-- P -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="P">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							P 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'p',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_q)) {
			echo '<!-- Q -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="Q">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							Q 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'q',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_r)) {
			echo '<!-- R -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="R">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							R 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'r',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_s)) {
			echo '<!-- S -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="S">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							S 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 's',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_t)) {
			echo '<!-- T -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="T">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							T 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 't',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_u)) {
			echo '<!-- U -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="U">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							U 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'u',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_v)) {
			echo '<!-- V -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="V">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							V 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'v',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_w)) {
			echo '<!-- W -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="W">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							W 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'w',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_x)) {
			echo '<!-- X -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="X">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							X 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'x',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_y)) {
			echo '<!-- Y -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="Y">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							Y 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'y',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<?php if (isset($letter_z)) {
			echo '<!-- Z -->
			<div class="row content-row row-modern-gray-200 glossary-list-letters" id="Z">
				<div class="inner-wrap inner-wrap-1000 flex-inner-wrap">
					<div class="glossary-letters-left">
						<h2>
							Z 
						</h2>
					</div>
					<div class="glossary-words">
						<div class="glossary-column">';
			$args = array(
				'post_type' => 	'glossary_entry',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'meta_key' => 'glossary_term',
				'meta_value' => 'z',
			);
			$loop = new WP_Query($args);
			while ($loop->have_posts()) : $loop->the_post();

				$get_title = get_the_title();
				$get_id = get_the_ID();
				$get_letter = get_post_meta(get_the_ID(), 'glossary_term', true);

				echo '<a href="' . get_permalink() . '" class="' . $get_letter . ' ' . $get_id . '">' . $get_title . '</a>';

			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
			echo '
						</div>
					</div>
				</div>
			</div>';
		}
		?>
		<div class="row cta 
<?php if (get_field('cta_style') == 'dark') : ?>
 cta-dark
<?php endif; ?>
 ">
			<div class="m-auto text-center max-w-[800px]">
				<h2>Interested in learning more?</h2>
				<p>Keep up with the latest mobile gaming trends.</p>
				<div class="primary-gradient-btn m-auto">
					<a class="scale-21-21-18" href="/blog/">
						<span>Visit our blog</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>






<?php get_footer(); ?>