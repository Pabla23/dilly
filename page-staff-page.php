<?php
/**
 * The template for displaying the staff page. Changed the slug to "staff-page" to prevent WP from using archive.php
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dillys_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.

		// display administrative staff members
		$args = array(
			'post_type' => 'dilly-staff',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'dilly-staff-category',
					'field' => 'slug',
					'terms' => 'administrative'
				)
			)
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) : ?>
			<section class="administrative">
				<h2>Administrative</h2>
				<?php while ( $query->have_posts() ) : 
					$query->the_post(); ?>
					<article class="administrative-member">
						<h3><?php the_title(); ?></h3>
						<?php
							if ( function_exists('get_field')) :
								if ( get_field('staff_info') ) :
									echo get_field('staff_info');
								endif;
								if ( get_field('staff_courses') ) :
									echo get_field('staff_courses');
								endif;
								if ( get_field('staff_link') ) :
									echo get_field('staff_link');
								endif;
							endif;
						?>
					</article>
				<?php endwhile; ?>
			</section>
		<?php endif; wp_reset_postdata();

		// Display Faculty staff members
		$args = array(
			'post_type' => 'dilly-staff',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'dilly-staff-category',
					'field' => 'slug',
					'terms' => 'faculty'
				)
			)
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) : ?>
			<section class="faculty">
				<h2>Faculty</h2>
				<?php while ( $query->have_posts() ) : 
					$query->the_post(); ?>
					<article class="faculty-member">
						<h3><?php the_title(); ?></h3>
						<?php
							if ( function_exists('get_field')) :
								if ( get_field('staff_info') ) :
									echo get_field('staff_info');
								endif;
								if ( get_field('staff_courses') ) :
									echo get_field('staff_courses');
								endif;
								if ( get_field('staff_link') ) :
									$staffLink = get_field('staff_link');
									echo '<a href="' . $staffLink['url'] . '" target="' . $staffLink['target'] . '">' . $staffLink['title'] . '</a>';
								endif;
							endif;
						?>
					</article>
				<?php endwhile; ?>
			</section>
		<?php endif; wp_reset_postdata(); ?>
	</main><!-- #main -->

<?php
get_footer();
