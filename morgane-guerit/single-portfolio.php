<?php
  get_header();
  while ( have_posts() ) {
    the_post();
?>

<div class="page-portfolio js-portfolio">
  <h1><?php the_title(); ?> | Portfolio</h1>
  <section class="page-portfolio__filter js-filters">
    <h2>Catégories</h2>
    <ul class="js-categories">
      <li data-category="<?php echo $post->post_name; ?>"><button><?php the_title(); ?></button></li>
    </ul>
  </section>
  <div class="gallery__<?php echo $post->post_name ?>">
    <ul class="component-portfolio__list js-images">
      <?php
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        $slug = $post->post_name;
        $images = acf_photo_gallery('images', $post->ID);
        foreach( $images as $image ) {
          echo '<li class="' . $slug . '" data-sub-html=".caption" data-category="' . $slug . '" data-src="' . $image["full_image_url"] . '">';
            echo wp_get_attachment_image( $image['id'], $size );
            echo '<div class="caption"><h4>' . $image['title'] . '</h4><p>' . $image['caption'] . '</p></div>';
          echo '</li>';
        }
      ?>
    </ul>
  </div>
</div>

<?php
  }
  get_footer();
?>
