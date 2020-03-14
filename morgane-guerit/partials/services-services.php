<?php
$query = new WP_Query(array(
  'post_type' => 'services',
  'post_status' => 'publish'
));
$post_index = 0;

while ($query->have_posts()) {
  $query->the_post();
  $isRight = $post_index % 2;
?>
<section class="component-service <?php if ($isRight) { ?> component-service--right <?php } ?> section section__screen-height js-section">
  <div class="container">
    <div class="row">
      <div class="component-service__image <?php if ($isRight) { ?> component-service__image--left <?php } ?> col-md-6">
        <?php
          $image = get_field('image');
          $size = 'large'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
            echo wp_get_attachment_image( $image, $size );
          }
        ?>
      </div>
      <div class="component-service__content col-md-6 <?php if ($isRight) { ?> offset-md-6 <?php } ?>">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <?php
        $link = get_field('lien_page');
        if ($link) {
        ?>
          <a class="button button__arrow button__arrow--right" href="<?php echo $link ?>">Découvrir</a>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php
  $post_index += 1;
}
wp_reset_query();
?>
