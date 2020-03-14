<?php
  /*
  * Template Name: Accueil
  * description: Page d'accueil
  Page template without sidebar
  */
  get_header();
  while ( have_posts() ) : the_post();
?>

<div class="page-home">
  <?php
    get_template_part( 'partials/header-title', 'part' );
    get_template_part( 'partials/home-service', 'part' );
    get_template_part( 'partials/home-portfolio', 'part' );
    get_template_part( 'partials/home-blog', 'part' );
  ?>
</div>

<?php
  endwhile; //resetting the page loop
  wp_reset_query(); //resetting the page query
  get_footer();
?>
