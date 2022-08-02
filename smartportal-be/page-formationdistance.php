<?php
/**
 * Template Name: formationdistance
 */


get_header(); 
include('trad_emploi.php');
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

$date_1_bruxelles_init = $mypod->display('date_1_bruxelles');
$date_2_bruxelles_init  = $mypod->display('date_2_bruxelles');
$date_namur_init  = $mypod->display('date_namur');
$date_liege_init  = $mypod->display('date_liege');
$date_charleroi_init  = $mypod->display('date_charleroi');

$date_1_bruxelles = my_format_date($mypod->display('date_1_bruxelles'));
$date_2_bruxelles = my_format_date($mypod->display('date_2_bruxelles'));
$date_namur = my_format_date($mypod->display('date_namur'));
$date_liege = my_format_date($mypod->display('date_liege'));
$date_charleroi = my_format_date($mypod->display('date_charleroi'));

$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));

?>
<script>
jQuery(document).ready(function(){ 
		//dans le formulaire contact form il faut injecter les valeurs et labels des radio bouton
        jQuery('#date1radiobruxelles').find("input[type='radio']").attr('value','<?php echo $date_1_bruxelles;?>'); //permet de récupérer  la valeur.
		jQuery('span[for=date1bruxelles]').html('<?php echo "le ".$date_1_bruxelles;?>');
		
		jQuery('#date2radiobruxelles').find("input[type='radio']").attr('value','<?php echo $date_2_bruxelles;?>'); // permet de récupérer  le label.
		jQuery('span[for=date2bruxelles]').html('<?php echo "le ".$date_2_bruxelles;?>');
		
		jQuery('#dateradionamur').find("input[type='radio']").attr('value','<?php echo $date_namur;?>'); //permet de récupérer  la valeur.
		jQuery('span[for=datenamur]').html('<?php echo "le ".$date_namur;?>');
		
		jQuery('#dateradioliege').find("input[type='radio']").attr('value','<?php echo $date_liege;?>'); // permet de récupérer  le label.
		jQuery('span[for=dateliege]').html('<?php echo "le ".$date_liege;?>');
		
		jQuery('#dateradiocharleroi').find("input[type='radio']").attr('value','<?php echo $date_charleroi;?>'); //permet de récupérer  la valeur.
		jQuery('span[for=datecharleroi]').html('<?php echo "le ".$date_charleroi;?>');		
		
});
</script>
<style>
	#date_1_bruxelles{display:none;}	
	#date_2_bruxelles{display:none;}
	#date_namur{display:none;}	
	#date_liege{display:none;}	
	#date_charleroi{display:none;}	
</style>
<?php if($date_1_bruxelles_init !='' && strtotime($date_1_bruxelles_init) - $yesterday >= 0){?>	   
		<style type='text/css'>
			#date_1_bruxelles{display:block;}			
		</style>
<?php } ?>
<?php if($date_2_bruxelles_init !='' && strtotime($date_2_bruxelles_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_2_bruxelles{display:block;}			
		</style>
<?php } ?>
<?php if($date_namur_init !='' && strtotime($date_namur_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_namur{display:block;}			
		</style>
<?php } ?>
<?php if($date_liege_init !='' && strtotime($date_liege_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_liege{display:block;}			
		</style>
<?php } ?>
<?php if($date_charleroi_init !='' && strtotime($date_charleroi_init) - $yesterday >= 0){?>	     
		<style type='text/css'>
			#date_charleroi{display:block;}			
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
			<?php if (ICL_LANGUAGE_CODE == 'fr' ) {?>
				  <h2>Services </h2>
					<ul class="">
						<li><a href="/fr/nos-services/formations/">> Formations</a></li>
							<ul>
								<li><a href="/fr/?post_type=formation">Nos formations</a></li>
								<li><a href="/fr/formations-a-distance/">Nos formations à distance</a></li>
								<li><a href="/fr/nos-services/formations/formations-de-nos-partenaires/">Formations de nos partenaires</a></li>
							</ul>
					</ul>   
			<?php }else{ //pour NL et EN pour les formations à distance ?>
				<h2><?php echo $services;?></h2>
				<ul>
					<li><a href="<?php echo $toutes_formations_link;?>">> <?php echo $formations;?></a></li>
				</ul>
			<?php } ?>
		</div>
        <div class="span7"  >
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
			<h2> <?php echo $yourformation;?></h2>
            
          </header>
        
          <div class="article">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php the_content(); ?>
			<div class="clear-both"><br/><br/><br/></div>
			<!--<div class="button-link">
				<a href="/fr/services/formations-renseignements-et-inscriptions/">
					Modalités d'inscription et d'annulation
				</a>
			</div>-->
			<div class="clear-both"></div>
			<div >
			  <a class="" href="<?php echo $toutes_formations_link;?>">&lt; <?php echo $toutes_formations;?></a>
			</div>
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