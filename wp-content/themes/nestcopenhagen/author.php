<?php
/**
 * @package Nest Copenhagen
 */

get_header(); ?>

<?php
  $curauth = (isset($_GET['author_name'])) ?
    get_user_by('slug', $author_name) : get_userdata(intval($author));

  $profileImg = mt_profile_img( $curauth->data->ID , array(
    'size' => 'frontpage-profile-picture', 'echo' => false
  ));
  preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
  $profileImg = $matches[1];
?>

<div class="author-widget">
  <div class="container">
    <div class="col-md-2 col-sm-3 picture-col">
      <img src="<?php echo $profileImg ?>" class="picture"
        alt="<?php echo $curauth->display_name; ?>">
    </div>
    <div class="col-md-10 col-sm-9">
      <h2><?php echo $curauth->display_name; ?></h2>
      <p class="profile-text">
        <?php echo $curauth->description; ?>
      </p>

      <a href="<?php esc_url(the_author_meta('linkedin_profile', $curauth->ID)); ?>"
        class="btn-linkedin" target="_blank">
        Linkedin Profile
      </a>

    </div>
  </div>

</div>


<div class="post-list">
  <?php
    $args = array(
      'author'  => $curauth->ID,
      'orderby' => 'post_date',
      'order'   => 'ASC'
    );
    $author_posts=  get_posts( $args );
    if($author_posts){
      foreach ($author_posts as $post) :
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

      <? endforeach;
    }
  ?>
</div>

<?php get_footer(); ?>
