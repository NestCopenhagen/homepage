<?php
/**
 * @package Nest Copenhagen
 */

get_header(); ?>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php
    $curauth = get_the_author();

    $profileImg = mt_profile_img( $curauth->data->ID , array( 
      'size' => 'frontpage-profile-picture', 'echo' => false
    ));
    preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
    $profileImg = $matches[1];
  ?>


  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php
      $photo = '';
      if (has_post_thumbnail( $post_id )) {
        $photo = get_the_post_thumbnail();
      }
      $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>


    <header class="post-header" style="background-image: url('<?php echo $url ?>')">
      <div class="gradient"></div>
      <div class="content">
        <div class="container">
          <div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3">
            <h2 class="post-title"><?php echo $post->post_title; ?></h2>
          </div>
        </div>
      </div>
    </header>


    <article class="post-entry container">
      <div class="col-md-2 col-sm-3 entry-info hidden-xs">
        <img src="<?php echo $profileImg ?>" class="avatar"
          alt="<?php the_author_meta('display_name'); ?>">

        <div class="date">
          <div class="month"><?php echo get_the_date('M Y'); ?></div>
          <div class="day"><?php echo get_the_date('j'); ?></div>
        </div>

      </div>
      <div class="col-md-8 col-sm-9">
        <h3 class="author-name">By <?php the_author_meta('display_name'); ?></h3>

        <div class="post-content">
          <?php the_content(); ?>
        </div>
      </div>
    </article>

    <div class="content">
      <div class="container">
        <div class="col-sm-9 col-md-offset-2 col-sm-offset-3">
          <h5>About the author</h5>
        </div>
      </div>
    </div>

    <div class="author-widget">
      <div class="container">
        <div class="col-md-2 col-sm-3 picture-col">
          <img src="<?php echo $profileImg ?>" class="picture"
            alt="<?php the_author_meta('display_name'); ?>">
        </div>
        <div class="col-md-10 col-sm-9">
          <h2><?php the_author_meta('display_name'); ?></h2>
          <p class="profile-text">
            <?php the_author_meta('description'); ?>
          </p>
        </div>
      </div>

    </div>

  </article><!-- #post-## -->

  <div class="content">
    <div class="container">
      <div class="col-sm-9 col-md-offset-2 col-sm-offset-3">
        <h5>Also read</h5>
      </div>
    </div>
  </div>

<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
