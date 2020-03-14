<?php
$query = new WP_Query(array(
  'post_type' => 'temoignages',
  'post_status' => 'publish'
));
$post_index = 0;
if ($query->have_posts()){
?>
  <section class="page-services__testimony section js-section">
    <div class="container">
      <h2><?php the_field('temoignages'); ?></h2>
      <div class="row">
        <?php
        while ($query->have_posts()) {
          $query->the_post();
          $image = get_field('photo');
          $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
        ?>
        <div class="page-services__testimony--single col-md-6">
          <div class="component-testimony">
            <div class="component-testimony__person">
              <div class="component-testimony__person--img">
                <?php echo wp_get_attachment_image( $image, $size ); ?>
              </div>
              <div class="component-testimony__person--title">
                <h4 class="text__testimony"><?php the_title(); ?></h4>
                <p><?php the_field('entreprise'); ?></p>
              </div>
            </div>
            <div class="component-testimony__content">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php }
wp_reset_query(); ?>
