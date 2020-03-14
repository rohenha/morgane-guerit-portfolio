<?php
  $query = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'post_count' => 5,
    'meta_key'		=> 'is_slider',
    'meta_value'	=> true
  ));
?>
<div class="page-blog__slider component-slider__container js-slider" data-arrows="true">
  <?php
  while ($query->have_posts()) {
    $query->the_post();
    $image = get_field('poster');
    $size = 'large'; // (thumbnail, medium, large, full or custom size)
  ?>
  <div class="component-more-article__content js-slide">
    <?php if ($image) { ?>
      <div class="page-blog__slider--image">
        <?php echo wp_get_attachment_image( $image, $size ); ?>
      </div>
    <?php } ?>
    <h4><a href="<?php the_permalink(); ?>" class="component-more-article__title"><?php the_title(); ?></a></h4>
    <?php get_template_part( 'partials/post-categories', 'part' ); ?>
    <p class="text__date"><?php echo get_the_date(); ?></p>
    <div class="page-blog__slider--text">
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>" class="button">Lire la suite</a>
    </div>
  </div>
  <?php
  }
  wp_reset_query();
  ?>
</div>
