<section class="page-home__blog section js-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-home__blog--title">
        <h2><?php the_field('titre_blog'); ?></h2>
        <a class="button button__secondary button__arrow button__arrow--right" href="<?php echo get_permalink( get_page_by_path( 'blog' ) ); ?>">Aller au blog</a>
      </div>
      <div class="col-md-12">
        <p><?php the_field('texte_blog'); ?></p>
      </div>
    </div>
    <ul class="row component-more-article__list page-home__blog--articles">
      <?php get_template_part( 'partials/more-articles', 'part' ); ?>
    </ul>
  </div>
</section>
