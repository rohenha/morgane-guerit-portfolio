<?php
$query = new WP_Query(array(
  'post_type' => 'confiance',
  'post_status' => 'publish'
));
$post_index = 0;
if ($query->have_posts()){
?>
  <section class="component-confiance section js-section">
    <div class="container">
      <h2><?php the_field('confiance'); ?></h2>
      <div class="row">
        <?php
        while ($query->have_posts()) {
          $query->the_post();
          $image = get_field('image');
          $size = array('200', ''); // (thumbnail, medium, large, full or custom size)
          if ($image) {
        ?>
            <div class="component-confiance__brand col-6 col-md-4">
              <?php echo wp_get_attachment_image( $image, $size ); ?>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </section>
<?php }
wp_reset_query(); ?>
