<?php

$args = array(
  'post_type'        => 'post',
  'post_status'      => 'publish',
  'posts_per_page'   => $data['posts_per_page'],
  'orderby'          => 'date',
  'order'            => 'DESC'
);

$blog_posts = new WP_Query( $args );

?>

<div <?php echo $component_info; ?>>

  <div class="container">

    <div class="ddd-blog-roll__flex">

      <div class="ddd-blog-roll__roll">

        <?php while( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>

          <div class="ddd-blog-roll__post">

            <?php if ( get_post_thumbnail_id() ) : ?>

              <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'Full') ?>" alt="<?php echo get_the_title(); ?>">

            <?php endif; ?>

            <h2 class="ddd-blog-roll__post-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p class="ddd-blog-roll__post-date"><?php the_date(); ?></p>

            <?php the_excerpt(); ?>

          </div> <!-- /.ddd-blog-roll__post -->

        <?php endwhile; ?>

      </div> <!-- /.ddd-blog-roll__roll -->

      <?php if ( $data['sidebar'] ) : ?>

        <div class="ddd-blog-roll__sidebar">

          <?php get_sidebar(); ?>

        </div> <!-- /.ddd-blog-roll__sidebar -->

      <?php endif; ?>

    </div> <!-- /.ddd-blog-roll__flex -->

  </div> <!-- /.container -->

</div> <!-- .ddd-<?php echo $component; ?>  -->
