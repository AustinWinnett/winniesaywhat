
<?php
  $args = array(
    'post_type'  => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 5
  );

  $query = new WP_Query($args);
?>

<?php
ddd_component(
  'featured-posts',

  array()
)
?>

<div class="container">

  <div class="page__wrapper">

    <div class="page__content blog-roll">

      <h1 class="heading-bar">Recent Posts</h2>

      <?php while($query->have_posts()) : $query->the_post();  ?>

        <?php get_template_part( 'template-parts/content', 'entry' ); ?>

      <?php endwhile; ?>

    </div> <!-- /.page__content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.page__wrapper -->

</div> <!-- /.container -->
