<?php
/**
 * Template Name: Alumni List Page
 */

get_header(); ?>

  <div class="container support-page">
    <div class="row">
      <div class="col-sm-12">
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>
<?php endwhile; ?>
      <div class="profile-teaser-container alumni-list">
<?php
    $users = get_users(array(
      'role__in' => array('subscriber'),
      'orderby' => 'name'
    ));
    foreach( $users as $user ) :
      if(!in_array('subscriber', $user->roles)):
        continue;
      endif;
              $profileImg = mt_profile_img( $user->data->ID , array(
                'size' => 'frontpage-profile-picture', 'echo' => false
              ));
              preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
              $profileImg = $matches[1];
?>
                <a class="user-profile-teaser<?php

              if(empty($profileImg)):
                ?> no-image<?php
              endif;

                ?>"
                  href="/author/<?php echo str_replace(' ', '-', $user->nickname); ?>"
<?php
              if(!empty($profileImg)):
?>
                  style="background-image: url('<?php echo $profileImg ?>')"
<?php
              endif;
                ?>>
                  <div class="overlay">
                    <h4><?php echo $user->data->display_name ?></h4>
                  </div>
                </a>
<?php
    endforeach;
?>
          </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
