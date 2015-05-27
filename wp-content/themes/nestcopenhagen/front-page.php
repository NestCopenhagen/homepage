<?php
/**
 * @package Nest Copenhagen
 */

get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>What is Nest?</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 columns-2">


      <?php $page = get_page_by_path('frontpage', OBJECT); ?>
      <?php echo apply_filters('the_content', $page->post_content); ?>

    </div>
  </div>


</div>

<div class="site-spot frontpage-spot">
  <div class="container">
    <div class="row spot">
      <div class="col-sm-12">
        20 entrepreneurs as your housemates.<br />
        Weekly social gatherings.<br />
        <span class="fat">
          300 meters from the lakes <br />
          in Copenhagen City.
        </span>
      </div>
    </div>
  </div>
</div>

<div class="container">

  <div class="row">
    <div class="col-sm-12">
      <h2>Who lives in Nest?</h2>

      <?php $users = get_users(array('orderby' => 'name')); ?>
      <ul class="profile-teaser-container">
        <?php foreach( $users as $user ) :
          $profileImg = mt_profile_img( $user->data->ID , array( 
            'size' => 'frontpage-profile-picture', 'echo' => false
          ));
          preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
          $profileImg = $matches[1]; ?>
            <li class="user-profile-teaser"
              style="background-image: url('<?php echo $profileImg ?>')">
              <a href="">
                <div class="overlay">
                  <div>
                    <h4><?php echo $user->data->display_name ?></h4>
                  </div>
                </div>
              </a>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>





<?php get_footer(); ?>
