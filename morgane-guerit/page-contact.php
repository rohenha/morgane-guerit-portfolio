<?php
  /*
  * Template Name: Contact
  * description: Page de contact
  Page template without sidebar
  */
  get_header();
  while ( have_posts() ) : the_post();
?>

<div class="page-contact section section__screen-height js-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <h1><?php the_field('titre_page'); ?></h1>
        <?php the_content(); ?>
        <a href="<?php the_field('adresse_email'); ?>" class="text__email"><?php the_field('adresse_email'); ?></a>
        <ul>
          <?php $link = get_field('facebook');
            if ($link) { ?>
              <li><a href="<?php echo $link ?>" target="_blank" class="button button__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.png" alt="Facebook"></a></li>
          <?php } ?>
          <?php $link = get_field('twitter');
            if ($link) { ?>
              <li><a href="<?php echo $link ?>" target="_blank" class="button button__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/twitter.png" alt="Twitter"></a></li>
          <?php } ?>
          <?php $link = get_field('instagram');
            if ($link) { ?>
              <li><a href="<?php echo $link ?>" target="_blank" class="button button__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/instagram.png" alt="Instagram"></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
  endwhile; //resetting the page loop
  wp_reset_query(); //resetting the page query
  get_footer();
?>
