<form role="search" method="get" id="searchform" class="component-search" action="<?php echo home_url( '/' ); ?>" >
  <label class="screen-reader-text" for="s"><?php echo __('Search for:'); ?></label>
  <input type="text" value="<?php get_search_query(); ?>" name="s" id="s" class="button" placeholder="Rechercher" />
  <input type="submit" id="searchsubmit" value="Rechercher" class="button button__secondary" />
</form>
