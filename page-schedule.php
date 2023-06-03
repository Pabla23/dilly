<?php
/**
 * The template for displaying the schedule page
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

		//display acf repeater field to display schedule as a table.. 
		if ( function_exists('get_field')) :
			$repeater = get_field('course_schedule');
			if ( $repeater ) :
				echo '<table class="schedule">';
				foreach ( $repeater as $row ) :
					echo '<tr>';
					echo '<td>' . $row['date'] . '</td>';
					echo '<td>' . $row['course'] . '</td>';
					echo '<td>' . $row['instructor'] . '</td>';
					echo '</tr>';
				endforeach;
				echo '</table>';
			endif;
		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
