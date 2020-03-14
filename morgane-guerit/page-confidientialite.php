<?php
  /*
  * Template Name: Confidentialité
  * description: Page de politique de confidentialité
  Page template without sidebar
  */
  get_header();
  while ( have_posts() ) : the_post();
?>

<div class="page-article">
  <div class="page-article__backdrop"></div>
  <div class="container">
    <div class="row">
      <div class="page-article__title col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="col-10 offset-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>

<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
get_footer(); ?>
