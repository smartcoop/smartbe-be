<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */
  /*
 
Template Name: InscriptionParcours

*/

get_header(); 
$date_du_debut_de_la_formation ='';
$seconde_date = '';
$yourformation=$_GET['your-formation'];
$podid = $_GET['podid'];
global $post;
// get pods object
$mypod = pods( 'formation', $podid );
$podid = $mypod->id();
$title = $mypod->display('title');

function my_format_date($input_date) {
	return date("d-m-Y", strtotime($input_date));         
};

$parcours_session1_dates = $mypod->field('parcours_session1_dates');
$parcours_session2_dates = $mypod->field('parcours_session2_dates');
$parcours_complet_s1 = $mypod->field('parcours_complet_s1');
$parcours_complet_s2 = $mypod->field('parcours_complet_s2');
$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));
echo $parcours_complet_s1;
?>
<script>
jQuery(document).ready(function(){ 
		//dans le formulaire contact form il faut injecter les valeurs et labels des radio bouton
        jQuery('#datesession1radio').find("input[type='radio']").attr('value','<?php echo "Session1 : " .$parcours_session1_dates;?>'); //permet de récupérer  la valeur.
		jQuery('div[for=datesession1]').html('<?php echo "Session 1 :  ".$parcours_session1_dates;?>');
		
		jQuery('#datesession2radio').find("input[type='radio']").attr('value','<?php echo "Session2 : " .$parcours_session2_dates;?>'); // permet de récupérer  le label.
		jQuery('div[for=datesession2]').html('<?php echo "Session 2 :  ".$parcours_session2_dates;?>');
	});
</script>
<style>
	#date_session1{display:none;}	
	#date_session2{display:none;}
</style>
<?php if($parcours_session1_dates != ''  && $parcours_complet_s1 != '1'){?>	   
		<style type='text/css'>
			#date_session1{display:block;}			
		</style>
<?php } ?>
<?php if($parcours_session2_dates != ''  && $parcours_complet_s2 != '1'){?>	   
		<style type='text/css'>
			#date_session2{display:block;}			
		</style>
<?php } ?>
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
        <div class="span7"  >
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
			<h2> <?php echo $yourformation;?></h2>
            
          </header>
        
          <div class="article">
          <?php the_content(); ?>
				<?php echo do_shortcode( '[cf7form cf7key="inscription-a-une-formation-2022_copy"]' ); ?>
			
			<div class="clear-both"></div>
			
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