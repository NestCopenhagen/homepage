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

    <?php else: ?>

      <div class="row pagehead">
        <div class="col-sm-12">
          <h2 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" width="230" height="38" alt="Nest Copenhagen">
            </a>
          </h2>
          <h1 class="page-title">
            <img src="<?php bloginfo('template_url'); ?>/images/nest-white.svg" />
            <?php echo $wp_query->post->post_title; ?>
            <?php edit_post_link( 'Edit', '<span class="edit-link">( ', ' )</span>' ); ?>
          </h1>
        </div>
      </div>
    <?php endif; ?>
  </div>

</header>

<nav class="site-navigation">
  <div class="container">
    <div class="row">
      <?php wp_nav_menu( array( 
        'theme_location' => 'header-menu',
        'container_class' => 'col-sm-12'
      ) ); ?>
    </div>
  </div>
</nav>
