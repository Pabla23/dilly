<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dillys_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			//display links to the other posts in the same taxonomy term (* Look for a WordPress function that lets you “retrieve the terms of the taxonomy that are attached to the post” and use WP_Query() within that loop.)
			$terms = get_the_terms( $post->ID, 'dilly-student-category' );

			if ($terms && !is_wp_error( $terms )) :
				foreach ($terms as $term) :
					$args = array(
						'post_type' => 'dilly-student',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'title',
						'post__not_in' => array( $post->ID ),
						'tax_query' => array(
							array(
								'taxonomy' => 'dilly-student-category',
								'field' => 'slug',
								'terms' => $term->slug,
							),
						),
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : ?>
						<div class="other-student-posts">
							<h2>Meet Other Student <?php echo $term->name; ?></h2>
								<?php while ( $query->have_posts() ) :
									$query->the_post(); ?>
									<p>
										<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
									</p>
								<?php endwhile; ?>					
						</div>
						<?php wp_reset_postdata(); 
					endif;
				endforeach;
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
