<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Desk_Dog_Development
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">

				<div class="post__page">

					<div class="post__post">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content-post', get_post_type() );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div>



					<?php get_sidebar(); ?>


				</div>



			</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
