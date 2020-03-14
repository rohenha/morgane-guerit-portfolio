<header id="header" class="">
  <div class="container">
    <div class="row">
      <div class="header__logo col-10 col-md-3">
        <a href="<?php echo home_url() ?>" class="logo">Morgane<span>Guerit</span></a>
      </div>
      <div class="header__button col-2">
        <div class="icon__hamburger js-header-hamburger"><span></span></div>
      </div>
      <nav class="col-12 col-md-9 js-header-nav">
        <?php
          wp_nav_menu( array(
            'menu' => 'header',
            'container' => false));
        ?>
      </nav>
      <div class="header__backdrop"></div>
    </div>
  </div>
</header>
