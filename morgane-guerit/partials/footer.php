<?php set_page('contact'); ?>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-5 footer__infos">
        <h4><?php the_field('titre_footer'); ?></h4>
        <p><?php the_field('texte_footer'); ?></p>
        <a href="<?php the_field('adresse_email'); ?>" class="text__email"><?php the_field('adresse_email'); ?></a>
      </div>
      <div class="col-md-5 offset-md-2 footer__blog">
        <h4>Derniers articles</h4>
        <ul>
          <?php
          $query = new WP_Query(array(
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'order'=>'DESC',
            'orderby'=>'ID',
          ));

          while ($query->have_posts()) {
            $query->the_post();
          ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><p><?php echo get_the_date('', $post); ?></p></li>
          <?php
          }
          wp_reset_query();
          set_page('contact');
          ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 footer__socials">
        <ul>
          <?php $link = get_field('facebook');
            if ($link) { ?>
              <li><a href="<?php echo $link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook--white.png" alt="Facebook"></a></li>
          <?php } ?>
          <?php $link = get_field('twitter');
            if ($link) { ?>
              <li><a href="<?php echo $link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/twitter--white.png" alt="Twitter"></a></li>
          <?php } ?>
          <?php $link = get_field('instagram');
            if ($link) { ?>
              <li><a href="<?php echo $link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/instagram--white.png" alt="Instagram"></a></li>
          <?php } ?>              <li>
            <p>@2020</p>
          </li>
        </ul>
      </div>
      <div class="col-md-6 footer__creator">
        <p>Créé et développé par <a href="<?php the_field('lien_developpeur'); ?>" target="_blank"><?php the_field('nom_developpeur'); ?></a></p>
      </div>
    </div>
  </div>
</footer>
<?php wp_reset_query(); ?>
