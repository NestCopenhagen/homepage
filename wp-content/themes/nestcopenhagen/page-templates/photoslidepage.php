<?php
/**
 * Template Name: Photo Slide Page
 */

get_header(); ?>

<div class="container photo-slide-page">
  <div class="row">
    <div class="col-sm-12">
      <?php while ( have_posts() ) : the_post(); ?> 
        <?php get_template_part( 'content', 'page' ); ?> 
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
