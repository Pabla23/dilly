<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dillys_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<h3>Credits</h3>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'dilly' ), 'dilly', '<a href="https://dillyp.com/">Dilraj Pabla</a>' );
			?>
		</div><!-- .site-info -->
		<div class="footer-nav">
			<h3>Links</h3>
			<?php
				wp_nav_menu(array("theme_location" => "footer-nav"));
			?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
