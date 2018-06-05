<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Desk_Dog_Development
 */

get_header();

$args = array();

// The Query
$user_query = get_users();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">

				<h2 class="heading-bar heading-bar--center">Filters</h2>

				<div class="blog__authors-wrapper">

					<?php if (! empty( $user_query ) ) : foreach ( $user_query as $user ) : ?>
						<?php $user_data = $user->data; ?>

						<div class="blog__author">

							<div class="blog__author-image" style="background-image: url(<?php echo get_avatar_url($user->ID); ?>);" data-author="<?php echo $user_data->display_name; ?>"></div>

							<h3 class="h2 blog__author-name"><?php echo $user_data->display_name; ?><h3>

							<input type="checkbox" name="blog-filter" value="<?php echo $user_data->display_name; ?>">

						</div> <!-- /.blog__author -->

					<?php endforeach; endif; ?>

				</div> <!-- /.blog__authors-wrapper -->

				<div class="blog__date-filter">

					<label class="heading-font blog__date-filter__title" for="Date Filter">Select a Date</label>

					<select class="blog__date-filter__box" name="Date Filter">
						<option value="January 2018">January 2018</option>
						<option value="February 2018">February 2018</option>
					</select>

				</div>

				<div class="page__wrapper">

					<div class="page__content">

						<h2 class="heading-bar">Posts</h2>

						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'entry' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>

					</div> <!-- /.page__content -->

					<?php get_sidebar(); ?>

				</div> <!-- /.page__wrapper -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
