<?php //get_search_form(); ?>
<?php get_template_part( 'partials/searchform', 'part' ); ?>
<hr>
<h2>Catégories</h2>
<ul>
  <?php
    $categories = get_categories();
    foreach( $categories as $category ) {
  ?>
    <li><a class="page-blog__breadcrumb--link" href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a></li>
  <?php } ?>
</ul>

<hr>

<h2>Années</h2>
<ul>
  <?php
    $years = get_posts_years_array();
    foreach( $years as $year ) {
  ?>
  <li><a class="page-blog__breadcrumb--link" href="<?php echo get_year_link($year); ?>"><?php echo $year ?></a></li>
  <?php } ?>
</ul>
