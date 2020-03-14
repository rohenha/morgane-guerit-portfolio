<?php
if ( have_posts() ) {

  // Load posts loop.
  while ( have_posts() ) {
    the_post();
    $image = get_field('poster');
    $size = array('400', ''); // (thumbnail, medium, large, full or custom size)
?>
  <li class="component-more-article row">
    <div class="component-more-article__image col-md-4">
      <?php if ($image) { ?>
        <a href="<?php the_permalink(); ?>">
          <?php echo wp_get_attachment_image( $image, $size ); ?>
        </a>
      <?php } ?>
    </div>
    <div class="component-more-article__content col-md-8">
      <h4><a href="<?php the_permalink(); ?>" class="component-more-article__title"><?php the_title(); ?></a></h4>
      <?php get_template_part( 'partials/post-categories', 'part' ); ?>
      <p class="text__date"><?php echo get_the_date(); ?></p>
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>" class="button">Lire la suite</a>
    </div>
  </li>
<?php
  }
}
?>
