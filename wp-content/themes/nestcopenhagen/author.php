<?php
/**
 * @package Nest Copenhagen
 */

  $curauth = (isset($_GET['author_name'])) ?
    get_user_by('slug', $author_name) : get_userdata(intval($author));

  $profileImg = mt_profile_img( $curauth->data->ID , array(
    'size' => 'frontpage-profile-picture', 'echo' => false
  ));
  preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
  $profileImg = $matches[1];

  $linkedInUrl = get_the_author_meta('linkedin_profile', $curauth->ID);

  get_header();
?>

<div class="author-widget">
  <div class="container">
    <div class="col-md-2 col-sm-3 picture-col">
<?php
  if ($profileImg) {
?>
      <img src="<?php echo $profileImg ?>" class="picture"
        alt="Picture of <?php echo $curauth->display_name; ?>">
<?php
  }
?>
    </div>
    <div class="col-md-10 col-sm-9">
      <h2><?php echo $curauth->display_name; ?></h2>
      <div class="profile-text">
<?php
  if ($curauth->description) {
    echo apply_filters('the_content', $curauth->description);
  }

  else {
?>
        <p>Sadly, this wonderful person hasn&#8217;t written a bio yet!</p>
<?php
  }
?>
      </div>

<?php
  if ($linkedInUrl) {
?>
      <p>
        <strong>
          <a href="<?php echo esc_url($linkedInUrl); ?>"
            class="btn-linkedin" target="_blank">
            LinkedIn Profile
          </a>
        </strong>
      </p>
<?php
  }
?>

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
