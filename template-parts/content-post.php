<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Desk_Dog_Development
 */


$image = wp_get_attachment_image_url(get_post_thumbnail_id(), 'Full');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $image ): ?>

		<img src="<?php echo $image; ?>" alt="<?php echo get_the_title(); ?>" class="post__image">

	<?php endif; ?>

	<header class="post__header">

		<?php the_title( '<h1 class="post__title">', '</h1>' ); ?>

		<p class="post__date"><?php echo get_the_date(); ?></p>

		<div class="post__author">

			<p class="post__author-title">Written by <?php echo get_the_author_posts_link(); ?></p>

			<div class="post__author-image" style="background-image: url('<?php echo get_avatar_url(get_the_author_ID()); ?>')"></div>

		</div> <!-- /.post__author -->

	</header><!-- /.post__header -->

	<div class="post__content">

		<?php the_content(); ?>

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'desk-dog-development' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div> <!-- /.post__content -->

</article><!-- #post-<?php the_ID(); ?> -->
