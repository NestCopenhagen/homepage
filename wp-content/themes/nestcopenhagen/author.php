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
    <div class="col-sm-3">
      <img src="<?php echo $profileImg ?>" class="picture"
        alt="<?php echo $curauth->display_name; ?>">
    </div>
    <div class="col-sm-9">
      <h2><?php echo $curauth->display_name; ?></h2>
      <p class="profile-text">
        <?php echo $curauth->description; ?>
      </p>
    </div>
  </div>
  

</div>


<?php get_footer(); ?>
