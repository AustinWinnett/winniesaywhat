
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

  array(
    'text'  => 'hello'
  )
)
?>

<div class="container">

  <div class="page__wrapper">

    <div class="page__content">

      <h1 class="heading-bar">Recent Posts</h2>

      <?php while($query->have_posts()) : $query->the_post();  ?>

        <div class="entry">

          <?php if ( get_post_thumbnail_id() ) : ?>

            <div class="entry__image" style="background-image: url(<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'medium'); ?>)">

              <a href="<?php echo get_permalink(); ?>" class="overlay-link"></a>

            </div> <!-- /.entry__image -->

          <?php endif; ?>

          <div class="entry__content">

            <h2 class="entry__title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>

            <date class="entry__date"><?php echo get_the_date(); ?></date>

            <div class="entry__excerpt">

              <?php the_excerpt(); ?>

            </div> <!-- /.entry__excerpt -->

          </div> <!-- /.entry__content -->

        </div> <!-- /.entry -->

      <?php endwhile; ?>

    </div> <!-- /.page__content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.page__wrapper -->

</div> <!-- /.container -->
