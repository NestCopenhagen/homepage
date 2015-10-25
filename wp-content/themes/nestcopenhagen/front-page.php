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
        <p>20 ambitious entrepreneurs as your roommates.</p>
        <p><span class="fat">A house of diverse backgrounds and skills.</span></p>
        <p>Community dinners and social gatherings.</p>
      </div>
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
  $users = get_users(array('orderby' => 'name'));
  foreach( $users as $user ) :
            $profileImg = mt_profile_img( $user->data->ID , array( 
              'size' => 'frontpage-profile-picture', 'echo' => false
            ));
            preg_match("/src=\"(.+?)\"/i", $profileImg, $matches);
            $profileImg = $matches[1]; ?>
              <!--<a href=""-->
              <span
                class="user-profile-teaser"
                style="background-image: url('<?php echo $profileImg ?>')">
                <div class="overlay">
                  <div>
                    <h4><?php echo $user->data->display_name ?></h4>
                  </div>
                </div>
              <!--</a>-->
              </span>
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
      <p>At Reventlowsgade 10, 1651 Copenhagen V. Right next to Copenhagen&#8217;s Main Central Station, Tivoli,
      the Copenhagen lakes and the Meatpacking District &#8212; <em>smack</em> downtown!</p>
    </div>
  </div>
</div>

<?php get_footer(); ?>
