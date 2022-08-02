<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */
  /*
 
Template Name: InscriptionFormation

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


$complet_s1 = $mypod->display('complet_s1');
$date_s1d1_init = $mypod->display('date_s1d1');
$date_s1d2_init = $mypod->display('date_s1d2');
$date_s1d3_init = $mypod->display('date_s1d3');
if($date_s1d1_init !=''){
	$date_s1d1 = my_format_date($mypod->display('date_s1d1'));
}
if($date_s1d2_init !=''){
	$date_s1d2 = my_format_date($mypod->display('date_s1d2'));
}
if($date_s1d3_init !=''){
	$date_s1d3 = my_format_date($mypod->display('date_s1d3'));
}


$complet_s2 = $mypod->display('complet_s2');
$date_s2d1_init = $mypod->display('date_s2d1');
$date_s2d2_init = $mypod->display('date_s2d2');
$date_s2d3_init = $mypod->display('date_s2d3');
if($date_s2d1_init !=''){
	$date_s2d1 = my_format_date($mypod->display('date_s2d1'));
}
if($date_s2d2_init !=''){
	$date_s2d2 = my_format_date($mypod->display('date_s2d2'));
}
if($date_s2d3_init !=''){
	$date_s2d3 = my_format_date($mypod->display('date_s2d3'));
}


$complet_s3 = $mypod->display('complet_s3');
$date_s3d1_init = $mypod->display('date_s3d1');
$date_s3d2_init = $mypod->display('date_s3d2');
$date_s3d3_init = $mypod->display('date_s3d3');
if($date_s3d1_init !=''){
	$date_s3d1 = my_format_date($mypod->display('date_s3d1'));
}
if($date_s3d2_init !=''){
	$date_s3d2 = my_format_date($mypod->display('date_s3d2'));
}
if($date_s3d3_init !=''){
	$date_s3d3 = my_format_date($mypod->display('date_s3d3'));
}


$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));


?>
<script>
jQuery(document).ready(function(){ 
		//dans le formulaire contact form il faut injecter les valeurs et labels des radio bouton
        jQuery('#date1radiobruxelles').find("input[type='radio']").attr('value','<?php echo $date_s1d1." - ".$date_s1d2." - ".$date_s1d3;?>'); //permet de récupérer  la valeur.
		jQuery('div[for=date1bruxelles]').html('<?php echo "Session 1 : le ".$date_s1d1;?>');
		
		jQuery('#date2radiobruxelles').find("input[type='radio']").attr('value','<?php echo $date_s1d2;?>'); // permet de récupérer  le label.
		jQuery('div[for=date2bruxelles]').html('<?php echo "  & le ".$date_s1d2;?>');
		
		jQuery('#date3radiobruxelles').find("input[type='radio']").attr('value','<?php echo $date_s1d3;?>'); // permet de récupérer  le label.
		jQuery('div[for=date3bruxelles]').html('<?php echo "  & le ".$date_s1d3;?>');			
		
		
		jQuery('#date1radios2').find("input[type='radio']").attr('value','<?php echo $date_s2d1." - ".$date_s2d2." - ".$date_s2d3;?>'); //permet de récupérer  la valeur.
		jQuery('div[for=date1s2]').html('<?php echo "Session 2 : le ".$date_s2d1;?>');
		
		jQuery('#date2radios2').find("input[type='radio']").attr('value','<?php echo $date_s2d2;?>'); // permet de récupérer  le label.
		jQuery('div[for=date2s2]').html('<?php echo "  & le ".$date_s2d2;?>');
		
		jQuery('#date3radios2').find("input[type='radio']").attr('value','<?php echo $date_s2d3;?>'); // permet de récupérer  le label.
		jQuery('div[for=date3s2]').html('<?php echo "  & le ".$date_s2d3;?>');	
		
		
		jQuery('#date1radios3').find("input[type='radio']").attr('value','<?php echo $date_s3d1." - ".$date_s3d2." - ".$date_s3d3;?>'); //permet de récupérer  la valeur.
		jQuery('div[for=date1s3]').html('<?php echo "Session 3 : le ".$date_s3d1;?>');
		
		jQuery('#date2radios3').find("input[type='radio']").attr('value','<?php echo $date_s3d2;?>'); // permet de récupérer  le label.
		jQuery('div[for=date2s3]').html('<?php echo "  & le ".$date_s3d2;?>');
		
		jQuery('#date3radios3').find("input[type='radio']").attr('value','<?php echo $date_s3d3;?>'); // permet de récupérer  le label.
		jQuery('div[for=date3s3]').html('<?php echo "  & le ".$date_s3d3;?>');
});
</script>
<style>
	#date_1_bruxelles{display:none;}	
	#date_2_bruxelles{display:none;}
	#date_3_bruxelles{display:none;}
	
	#date_1_s2{display:none;}	
	#date_2_s2{display:none;}
	#date_3_s2{display:none;}
	
	#date_1_s3{display:none;}	
	#date_2_s3{display:none;}
	#date_3_s3{display:none;}
</style>
<?php if($date_s1d1_init != '' && strtotime($date_s1d1_init) - $yesterday >= 0 && $complet_s1 != 'Oui'){?>	   
		<style type='text/css'>
			#date_1_bruxelles{display:block;}			
		</style>
<?php } ?>
<?php if($date_s1d2_init != '' && strtotime($date_s1d2_init) - $yesterday >= 0 ){?>	     
		<style type='text/css'>
			#date_2_bruxelles{display:inline;}			
		</style>
<?php } ?>
<?php if($date_s1d3_init !=' ' && strtotime($date_s1d3_init) - $yesterday >= 0 ){?>	     
		<style type='text/css'>
			#date_3_bruxelles{display:inline;}			
		</style>
<?php } ?>


<?php if($date_s2d1_init != '' && strtotime($date_s2d1_init) - $yesterday >= 0 && $complet_s2 != 'Oui'){?>	   
		<style type='text/css'>
			#date_1_s2{display:block;}			
		</style>
<?php } ?>
<?php if($date_s2d2_init != '' && strtotime($date_s2d2_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_2_s2{display:inline;}			
		</style>
<?php } ?>
<?php if($date_s2d3_init !=' ' && strtotime($date_s2d3_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_3_s2{display:inline;}			
		</style>
<?php } ?>


<?php if($date_s3d1_init != '' && strtotime($date_s3d1_init) - $yesterday >= 0 && $complet_s3 != 'Oui'){?>	   
		<style type='text/css'>
			#date_1_s3{display:block;}			
		</style>
<?php } ?>
<?php if($date_s3d2_init != '' && strtotime($date_s3d2_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_2_s3{display:inline;}			
		</style>
<?php } ?>
<?php if($date_s3d3_init !=' ' && strtotime($date_s3d3_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_3_s3{display:inline;}			
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
			<?php echo do_shortcode('[cf7form cf7key="inscription-a-une-formation-2018"]');?>
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