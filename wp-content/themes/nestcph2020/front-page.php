<?php
/**
 * @package Nest Copenhagen
 */

get_header();
?>
<div class="hero">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="hero-image-header">Home.</h2>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
<?php
  $page = get_page_by_path('frontpage', OBJECT);
  echo apply_filters('the_content', $page->post_content);
?>
    </div>
  </div>
</div>

<div class="site-spot frontpage-spot">
  <div class="container">
    <div class="row spot">
      <div class="col-sm-12">
        <p>20 ambitious residents as your roommates.</p>
        <p><span class="fat">A house of diverse backgrounds and skills.</span></p>
        <p>Community dinners and social gatherings.</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>About Nest</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <p>Nest is located in the center of Copenhagen across the street from the Central Station. We can literally see it from our windows.</p>
      <p>Nest is spread out over four separate, adjacent apartments, each with room for 4-6 residents and its own shared kitchen. You can get your very own room in one of these apartments, which is where you will share tons of great nights with your fellow residents. However, your key gives you access to all the other three apartments, making the entire place your home.</p>
      <p>Unlike many other collective living places, the unique thing about Nest is that your roommates also happen to be amazing innovators, who are makers — just like you. In Nest, we believe that nothing is impossible, nothing is too crazy, and everything is achievable with the help of a few fellow dreamers and passionate do-ers.</p>
      <p>In Nest, there is always something to look forward to and someone to learn from. That’s what happens when you get 21 genuine, awesome innovative minds together, who really want to be a part of each others lives.</p>
      <p>Does that sound good? Ask yourself: Are you a Nester? Join us.</p>
      <p class="apply"><strong><a href="/apply">Apply now!</a></strong></p>
    </div>
  </div>
</div>

<div id="people" class="people np">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>Who&#8217;s in the Nest?</h2>
        <div class="profile-teaser-container">
<?php
  $users = get_users(array(
    'role__not_in' => array('subscriber'),
    'orderby' => 'name'
  ));
  foreach( $users as $user ) :
    if(in_array('subscriber', $user->roles)):
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
</div>

<div id="map">
  <div id="map-canvas"></div>
  <div class="container">
    <div class="overlay">
      <h2>This is where we&#8217;re located.</h2>
      <p>In central Copenhagen, right next to Copenhagen&#8217;s Main Central Station, Tivoli,
      the Copenhagen lakes and the Meatpacking District &#8212; <em>smack</em> downtown!</p>
    </div>
  </div>
</div>

<?php get_footer(); ?>
