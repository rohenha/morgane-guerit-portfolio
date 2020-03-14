<?php
  get_header();
  while ( have_posts() ) : the_post();
  $author_id = get_the_author_meta( 'ID' );
  $image = get_field('poster');
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
  $categories = get_the_category();
?>

<div class="page-article js-article">
  <div class="page-article__backdrop"></div>
  <div class="container">
    <div class="row">
      <div class="page-article__title col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <h1><?php the_title(); ?></h1>
        <p><span class="text__date"><?php the_date(); ?></span> par <?php echo get_the_author_meta( 'display_name', $author_id ); ?></p>
      </div>
      <?php if ($image) { ?>
        <div class="page-article__cover">
          <?php echo wp_get_attachment_image( $image, $size ); ?>
        </div>
    <?php } ?>
      <div class="page-article__content col-10 offset-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <?php the_content(); ?>
      </div>
      <div class="component-share col-md-12 col-lg-10 offset-lg-1">
        <?php
        if ( ! empty( $categories ) ) {
        ?>
          <ul class="component-share__categories">
            <?php foreach( $categories as $category ) { ?>
              <li><a href="<?php echo get_category_link($category); ?>" class="button"><?php echo $category->name ?></a></li>
            <?php } ?>
          </ul>
        <?php } ?>
        <ul class="component-share__share">
          <li><p>Partager sur :</p></li>
          <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" class="button button__icon" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.png" alt="Cover"></a></li>
          <li><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="button button__icon" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/twitter.png" alt="Cover"></a></li>
        </ul>
      </div>
    </div>

    <div class="component-more-article__container">
      <h2>Plus d'articles</h2>
      <ul class="row component-more-article__list">
        <?php get_template_part( 'partials/more-articles', 'part' ); ?>
      </ul>
    </div>
  </div>
</div>

<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
get_footer(); ?>
