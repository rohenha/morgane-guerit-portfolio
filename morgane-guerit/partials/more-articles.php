<?php
$query = new WP_Query(array(
  'posts_per_page' => 3,
  'post_status' => 'publish',
  'order'=>'DESC',
  'orderby'=>'ID',
));

while ($query->have_posts()) {
  $query->the_post();
  $categories = get_the_category();
  $image = get_field('poster');
  $size = array('400', ''); // (thumbnail, medium, large, full or custom size)
?>
  <li class="component-more-article col-8 offset-2 col-md-4 offset-md-0">
    <div class="component-more-article__image">
      <?php if ($image) { ?>
        <a href="<?php the_permalink(); ?>">
          <?php echo wp_get_attachment_image( $image, $size ); ?>
        </a>
      <?php } ?>
    </div>
    <div class="component-more-article__content">
      <h4><a href="<?php the_permalink(); ?>" class="component-more-article__title"><?php the_title(); ?></a></h4>
      <ul>
        <?php
        if ( ! empty( $categories ) ) {
          foreach( $categories as $category ) {
        ?>
        <li><a href="<?php echo get_category_link($category); ?>" class="text__category"><?php echo $category->name ?></a></li>
        <?php
          }
        } ?>
      </ul>
      <p class="text__date"><?php echo get_the_date(); ?></p>
    </div>
  </li>
<?php
}
wp_reset_query();
?>
