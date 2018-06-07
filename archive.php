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

$author = get_user_by( 'slug', get_query_var( 'author_name' ) );

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">

				<h2 class="heading-bar heading-bar--center">Filters</h2>

				<div class="blog__authors-wrapper">

					<?php if (! empty( $user_query ) ) : foreach ( $user_query as $user ) : ?>
						<?php $user_data = $user->data; ?>

						<?php
							$author_array = explode(' ', $_GET['author']);
							if ( $user_data->ID == $author->ID ) {
								$author_checked = 'checked';
							} else {
								$author_checked = '';
							}
						?>

						<div class="blog__author">

							<div class="blog__author-image <?php echo $author_checked; ?>" style="background-image: url(<?php echo get_avatar_url($user->ID); ?>);" data-author="<?php echo $user_data->ID; ?>"></div>

							<h3 class="h2 blog__author-name"><?php echo $user_data->display_name; ?><h3>

							<input type="checkbox" name="blog-filter" value="<?php echo $user_data->ID; ?>" <?php echo $author_checked; ?>>

						</div> <!-- /.blog__author -->

					<?php endforeach; endif; ?>

				</div> <!-- /.blog__authors-wrapper -->

				<div class="blog__date-filter">

					<label class="serif blog__date-filter__title" for="date-filter">Select a Date</label>

					<select class="blog__date-filter__box" name="date-filter">
						<option>Select a Date</option>
						<?php foreach ( ddd_get_archives() as $key => $date ) : ?>
							<?php
								if ( $_GET['month'] ) {
									if ( $_GET['month'] == $date['month'] && $_GET['year'] == $date['year'] ) {
										$selected_month = 'selected';
									} else {
										$selected_month = '';
									}
								} else if ( date('Y') == $date['month'] && date('j') == $date['year'] ) {
									$selected_month = 'selected';
								}
							?>
							<option value="<?php echo $date['month']; ?> <?php echo $date['year']; ?>" data-month="<?php echo $date['month']; ?>" data-year="<?php echo $date['year']; ?>" <?php echo $selected_month; ?>><?php echo $date['month_name'] . ' ' . $date['year'];  ?> </option>
						<?php endforeach; ?>
					</select>

				</div> <!-- /.blog__date-filter -->

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
