<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Desk_Dog_Development
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<a href="<?php echo site_url('/'); ?>" class="footer-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/winnie-logo.png" alt="<?php echo get_bloginfo('name'); ?>"></a>
			<div class="footer__credits">
				<p>&copy; 2018 | Website by Desk Dog Development</p>
			</div> <!-- /.footer__credits -->
		</div> <!-- /.container -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
