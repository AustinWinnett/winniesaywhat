<div <?php echo $component_info; ?> style="background-image: url(<?php echo $data['image']; ?>)">
  <div class="container">
    <h1 class="large-bold-title"><?php echo $data['title']; ?></h1>
    <?php if ( $data['subtitle'] ) : ?>
      <p><?php echo $data['subtitle']; ?></p>
    <?php endif; ?>
  </div> <!-- /.container -->
</div> <!-- /.ddd-<?php echo $component; ?>  -->
