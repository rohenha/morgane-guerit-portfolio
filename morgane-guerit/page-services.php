<?php
  /*
  * Template Name: Services
  * description: Page des services
  Page template without sidebar
  */
  get_header();
  while ( have_posts() ) : the_post();
?>

<div class="page-services">
  <?php
    get_template_part( 'partials/header-title', 'part' );
    get_template_part( 'partials/services-services', 'part' );
    get_template_part( 'partials/services-confiance', 'part' );
    get_template_part( 'partials/services-temoignages', 'part' );
  ?>
</div>

<?php
  endwhile; //resetting the page loop
  wp_reset_query(); //resetting the page query
  get_footer();
?>
