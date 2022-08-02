<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */
  /*
 
Template Name: InteretFormation

*/

get_header(); 

global $post;
// get pods object
$mypod = pods( 'formation', $podid );
$podid = $mypod->id();
$title = $mypod->display('title');
$yourformation=$_GET['your-formation'];


?>
<style type='text/css'>
			
			input{width:300px}
			
			
		</style>


<?php if (have_posts()): ?>

  <?php if($post->post_parent): ?>
    <div class="visible-phone mobile-nav-bar">
      <a href="<?= get_permalink($post->post_parent) ?>" class="parent-page"><?= ( get_post_meta($post->post_parent, 'wpcf-label-nav-mobile', true) ? : get_the_title( $post->post_parent)) ?></a>
    </div>
  <?php endif; ?>

<div id="content" role="main" class="container">

  <?php while(have_posts()): ?>
    <?php the_post(); ?>
  
    <article>
      <div class="row">
		<div class="span4">
			<?php include 'components/formation-recherche.php';?> 
		  
		</div>
        <div class="span7">
          <header class="page-leader" id="overview">
            <h1><?php // the_title(); ?></h1>
			<h2> <?php echo $yourformation;?></h2>
            
          </header>
        
          <div class="article">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php the_content(); ?>
		<div style="clear:both;"><br/><br/><br/></div>
			
          </div>
        </div>
      </div>
      
    </article>
  
  <?php endwhile; ?>
  
  <?php //get_sidebar('subfooter'); ?>

</div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>