<?php
  $image = get_field('poster');
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
  $background = wp_get_attachment_image_src( $image, 'full' );
?>
<section class="component-cover section js-section" <?php if ($image) { ?> style="background-image: url(<?php echo $background[0]; ?>);" <?php } ?>>
  <div class="container component-cover__content">
    <div class="row">
      <div class="col-md-5">
        <h1><?php the_title(); ?></h1>
        <?php echo get_the_content(); ?>
      </div>
    </div>
  </div>
  <div class="icon__scroller"></div>
</section>
