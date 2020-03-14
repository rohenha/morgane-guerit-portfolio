<?php get_header(); ?>


<div class="page-blog page-search">
  <div class="page-blog__backdrop"></div>
  <div class="container">
      <div class="page-blog__title page-search__title">
        <h1>Recherche</h1>
        <p>Recherche d'articles pour :</p>
        <h4><?php echo get_search_query(); ?></h4>
      </div>

      <hr/>

      <div class="row">
        <div class="page-blog__articles col-md-8">
          <ul class="page-blog__list">
            <?php get_template_part( 'partials/articles-list', 'part' ); ?>
          </ul>
          <div class="page-blog__articles--navigation">
            <?php posts_nav_link(' — ', __('Nouveaux articles'), __('Anciens articles')); ?>
          </div>
        </div>

        <div class="page-blog__separator col-md-1"><hr/></div>

        <div class="page-blog__breadcrumb col-md-3">
          <?php get_template_part( 'partials/blog-aside', 'part' ); ?>
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

<?php get_footer(); ?>
