<section class="component-service component-service--right section section__screen-height js-section">
  <div class="container">
    <div class="row">
      <div class="component-service__image component-service__image--left col-md-6">
        <?php
          $image = get_field('poster_services');
          $size = 'large'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
            echo wp_get_attachment_image( $image, $size );
          }
        ?>
      </div>
      <div class="component-service__content col-md-6 offset-md-6">
        <h2><?php the_field('titre_services'); ?></h2>
        <p><?php the_field('texte_services'); ?></p>
        <ul>
          <?php
          $query = new WP_Query(array(
            'post_type' => 'services',
            'post_status' => 'publish'
          ));

          while ($query->have_posts()) {
            $query->the_post();
          ?>
            <li><p class="text__email"><?php the_title(); ?></p></li>
          <?php
          }
          wp_reset_query();
          ?>
        </ul>
        <a class="button button__secondary button__arrow button__arrow--right" href="<?php echo get_permalink( get_page_by_path( 'services' ) ); ?>">Voir mes services</a>
      </div>
    </div>
  </div>
</section>
