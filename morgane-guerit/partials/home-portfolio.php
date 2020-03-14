<section class="page-home__portfolio section section__screen-height js-section">
  <div class="page-home__portfolio--list">
    <ul class="component-portfolio__list">
      <?php
      $query = new WP_Query(array(
        'post_type' => 'portfolio',
        'post_status' => 'publish'
      ));

      while ($query->have_posts()) {
        $query->the_post();
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        $images = acf_photo_gallery('images', $post->ID);
        foreach( $images as $image ) {
          echo '<li>' . wp_get_attachment_image( $image['id'], $size ) . '</li>';
        }
      }
      wp_reset_query();
      ?>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h2><?php the_field('titre_portfolio'); ?></h2>
        <p><?php the_field('texte_portfolio'); ?></p>
        <a class="button button__secondary button__arrow button__arrow--right" href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">Aller au portfolio</a>
      </div>
    </div>
  </div>
</section>
