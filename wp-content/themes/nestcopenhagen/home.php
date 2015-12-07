<?php
/**
 * @package Nest Copenhagen
 */

get_header(); ?>


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
