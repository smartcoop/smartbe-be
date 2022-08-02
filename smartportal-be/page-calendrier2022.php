<?php
/*
Template Name: FormationsCalendrier2022
*/

get_header(); ?>
<?php //if(is_page('1680')){?>
	<!--<a href="https://smartbe.be/en/general-assembly-2019/"><img src="https://smartbe.be/wp-content/uploads/2019/05/slider_AG_1200_500.jpg" alt="General Assembly 2019"></a>-->
<?php //}?> 
<?php if (have_posts()): ?>

  <?php if($post->post_parent): ?>
    <div class="visible-phone mobile-nav-bar">
      <a href="<?= get_permalink($post->post_parent) ?>" class="parent-page"><?= ( get_post_meta($post->post_parent, 'wpcf-label-nav-mobile', true) ? : get_the_title( $post->post_parent)) ?></a>
    </div>
  <?php endif; ?>



  <?php while(have_posts()): ?>
    <?php the_post(); ?>
	<div class="row">
		<div class="span4 hidden-phone menu_court">
			<?php include 'components/formation-recherche.php';?>
		</div>
		<div class="span8" style="width:800px">
			<h1 style="color:#ff4054"><?php the_title(); ?></h1>
			<article>
				
				 <?php the_content(); ?>		  
			</article>
		</div>
	</div>
  <?php endwhile; ?>
  
  <?php //get_sidebar('subfooter'); ?>



<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>