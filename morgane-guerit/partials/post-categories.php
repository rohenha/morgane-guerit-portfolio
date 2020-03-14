<ul>
  <?php
  $categories = get_the_category();
  if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
  ?>
  <li><a href="<?php echo get_category_link($category); ?>" class="text__category"><?php echo $category->name ?></a></li>
  <?php
    }
  } ?>
</ul>
