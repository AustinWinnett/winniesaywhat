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
