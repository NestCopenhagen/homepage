<?php
/**
 * @package Nest Copenhagen
 */

get_header();

$currentPostId = 0; ?>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php
    $currentPostId = get_the_ID();

    $profileImg = mt_profile_img( get_the_author_meta('ID') , array(
      'size' => 'frontpage-profile-picture', 'echo' => false
    ));
    preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
    $profileImg = $matches[1];
  ?>


  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
      $url = wp_get_attachment_image_src(get_post_thumbnail_id(),
        'single-post-thumbnail')[0];
      $url2x = wp_get_attachment_image_src(get_post_thumbnail_id(),
        'single-post-thumbnail@2x' )[0];
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
        <h3 class="author-name">By
          <a href="/author/<?php the_author_meta('nickname'); ?>">
          <?php the_author_meta('display_name'); ?>
          </a>
        </h3>

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
          <h2>
            <a href="/author/<?php the_author_meta('nickname'); ?>">
              <?php the_author_meta('display_name'); ?>
            </a>
          </h2>
          <p class="profile-text">
            <?php echo short_description(get_the_author_meta('description'), 250); ?>
            <a href="/author/<?php the_author_meta('nickname'); ?>" class="read-more">
              Read the rest
            </a>
          </p>
        </div>
      </div>

    </div>

  </article><!-- #post-## -->


  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

  <div class="content">
    <div class="container">
      <div class="col-sm-9 col-md-offset-2 col-sm-offset-3">
        <h5>Also read</h5>
      </div>
    </div>
  </div>


  <div class="post-list">
    <?php
      $args = array(
        'orderby' => 'post_date',
        'order'   => 'ASC'
      );
      $author_posts=  get_posts( $args );
      if($author_posts){
        foreach ($author_posts as $post) :
          if ($currentPostId != $post->ID) :
            setup_postdata( $post ); ?>

            <div class="post-summary">
              <div class="container">
                <div class="col-sm-3">
                  <?php $url = getPostThumbnail($post->ID); ?>
                  <img src="<?php echo $url; ?>" alt="<?php echo $post->post_title; ?>"
                    class="post-thumbnail">
                </div>
                <div class="col-sm-9">
                  <h3 class="title">
                    <a href="<?php echo get_permalink($post->ID) ?>">
                      <?php echo $post->post_title; ?>
                    </a>
                  </h3>
                  <div class="date">
                    <?php echo get_the_date( 'F j, Y' ); ?>
                  </div>
                  <p>
                    <?php echo get_excerpt($post, 300); ?>
                  </p>
                </div>
              </div>
            </div>

<?        endif;
        endforeach;
      }
    ?>
  </div>

<?php get_footer(); ?>
