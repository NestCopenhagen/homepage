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

<header class="site-header" role="banner">
  <div class="container">
    <?php if ( is_front_page() && is_home() ) : ?>

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
              <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" width="351" height="56" alt="Nest Copenhagen">
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
      <div class="row">
        <div class="col-sm-12">
          <div class="fb-like" data-href="https://www.facebook.com/NestCopenhagen" 
            data-send="false" data-layout="button_count" data-width="80" 
            data-show-faces="true" data-font="verdana" 
            style="margin-right: 20px; width: 75px;"></div>

          <?php wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'container_class' => ''
          ) ); ?>
        </div>
      </div>
    </div>
  </nav>
</div>
