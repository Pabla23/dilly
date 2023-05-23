<?php
/**
 * The template for displaying all pages
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

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<section>
			<h2>Recent News</h2>
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
			);
			$query = new WP_Query( $args );
			?>
			<?php if ( $query->have_posts() ) : ?>
				<div class="news">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="news-item">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<!-- add a link to see all news -->
			<a href="<?php echo esc_url(get_post_type_archive_link( 'post' )); ?>">See all news</a>
		</section>

	</main><!-- #main -->

<?php
get_footer();
