<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <script>(function(){document.documentElement.className='js'})();</script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=252798968089727";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<header class="site-header" role="banner">
  <div class="container">
    <?php if ( is_front_page() ) : ?>

      <?php $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) : ?>
        <div class="row">
          <div class="site-description col-sm-8"><?php echo $description; ?></div>
        </div>
      <?php endif; ?>
      <div class="row frontpagehead">
        <div class="col-sm-12">
          <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="Nest Copenhagen">
            </a>
          </h1>
        </div>
      </div>

      <div class="row hero-message">
        <div class="col-sm-12">
          <?php $page = get_page_by_path('frontpage', OBJECT); ?>
          <h4><?php echo get_post_custom($page->ID)['hero_message'][0]; ?>&ensp;</h4>
        </div>
      </div>

    <?php else: ?>

      <div class="row pagehead">
        <div class="col-sm-12">
          <h2 class="page-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" width="230" height="38" alt="Nest Copenhagen">
            </a>
          </h2>
        </div>
      </div>
    <?php endif; ?>

  </div>

</header>



<div class="site-nav-wrapper">
  <nav class="site-navigation">
    <div class="container">
      <div class="row mobile-menu">
        <div class="col-sm-12">
          <img src="<?php bloginfo('template_url'); ?>/images/burger.svg"
            alt="Nest Copenhagen"
            class="burger">
        </div>
      </div>
      <div class="row">
        <?php wp_nav_menu( array(
          'theme_location' => 'header-menu',
          'container_class' => 'col-sm-12'
        ) ); ?>
      </div>
    </div>
  </nav>
</div>
