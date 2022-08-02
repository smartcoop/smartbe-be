<?php
/*
Template Name: Emploi Archive
*/
include("trad_emploi.php");
?>
<?php
	$mypod = pods('emploi');

	
	
	$params = array(
	'limit' => -1,	
	'orderby' => 'emploi_epingler DESC' ,	
	); 
	$mypod->find($params);
	$bureau = '';
?>
<?php get_header(); ?>
<main class="emploi">
	
		<section >
			
					<h1 class="titre1"><strong><?php echo $emploi_titre; ?></strong></h1>
					<p class="ss_titre"><strong><?php echo $toutes_les_offres; ?></strong></p>					
							
			<div >
				<?php 
					
					include(locate_template('components/liste-emploi.php')); ?>						
			</div>			
		</section>
	
</main>

<?php get_footer(); ?>