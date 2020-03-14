<?php get_header(); ?>

<div class="page-blog">
  <div class="page-blog__backdrop"></div>
  <div class="container">
      <div class="page-blog__title">
        <h1>Le blog</h1>
        <?php get_template_part( 'partials/blog-slider', 'part' ); ?>
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

  </div>
</div>

<?php get_footer(); ?>
