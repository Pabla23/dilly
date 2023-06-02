<?php
/**
 * The template for displaying student archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dillys_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->

		<?php
			//WP Query to display all students

			$args = array(
				'post_type' => 'dilly-student',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : ?>

				<section class="student-container">
					<?php while ( $query->have_posts() ) : ?>
						<article class="student">
							<?php $query->the_post(); ?>
							<h2 class="entry-title">
								<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
							</h2>
							<?php the_post_thumbnail('students'); ?>
							<?php the_excerpt(); ?>
							<?php the_terms( $post->ID, 'dilly-student-category', 'Area of expertise: '); ?>
						</article>
					<?php endwhile; ?>
					</section>
				<?php wp_reset_postdata(); 
			endif; ?>

	</main><!-- #main -->

<?php
get_footer();
