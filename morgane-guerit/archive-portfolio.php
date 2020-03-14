<?php
  get_header();
  $query = new WP_Query(array(
    'post_type' => 'portfolio',
    'post_status' => 'publish',
    'post_count' => -1
  ));
?>

<div class="page-portfolio js-portfolio">
  <h1>Portfolio</h1>
  <section class="page-portfolio__filter js-filters">
    <h2>Catégories</h2>
    <ul class="js-categories">
      <?php
      while ($query->have_posts()) {
        $query->the_post();
      ?>
        <li data-category="<?php echo $post->post_name; ?>"><button><?php the_title(); ?></button></li>
      <?php
      }
      wp_reset_query();
      ?>
      <li data-category=""><button>Réinitialiser</button></li>
    </ul>
  </section>
  <button class="button js-toggle"><span class="filters">Filtres</span><span class="close">Fermer</span></button>
  <?php
  while ($query->have_posts()) {
    $query->the_post();
    echo '<div class="gallery__' . $post->post_name . '">';
  }
  wp_reset_query();
  ?>
    <ul class="component-portfolio__list js-images">
      <?php
      while ($query->have_posts()) {
        $query->the_post();
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        $slug = $post->post_name;
        $images = acf_photo_gallery('images', $post->ID);
        foreach( $images as $image ) {
          echo '<li class="' . $slug . '" data-sub-html=".caption" data-category="' . $slug . '" data-src="' . $image["full_image_url"] . '">';
            echo wp_get_attachment_image( $image['id'], $size );
            echo '<div class="caption"><h4>' . $image['title'] . '</h4><p>' . $image['caption'] . '</p></div>';
          echo '</li>';
        }
      }
      wp_reset_query();
      ?>
    </ul>
  <?php
  while ($query->have_posts()) {
    $query->the_post();
    echo '</div>';
  }
  wp_reset_query();
  ?>
</div>

<?php get_footer(); ?>
