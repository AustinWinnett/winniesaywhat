<?php

$featured_args = array(
  'post_type'  => 'post',
  'post_status'  => 'publish',
  'post__in'  => array(9, 21, 25)
);

$featured_query = new WP_Query( $featured_args );

?>

<div <?php echo $component_info; ?>>

  <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

    <div class="featured-posts__post" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'Full' ) ?>)">

      <div class="featured-posts__post-box">

        <h3 class="featured-posts__post-title"><?php the_title(); ?></h3>
        <p class="featured-posts__post-date"><?php echo get_the_date(); ?></p>

      </div> <!-- /.featured-posts__post-box -->

    </div> <!-- /.featured-posts__post -->

  <?php endwhile; ?>

</div> <!-- /.ddd-<?php echo $component; ?>  -->
