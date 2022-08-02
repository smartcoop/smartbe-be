<?php
	/**
		* The Single article
		*
		* This is the most generic template file in a WordPress theme
		* and one of the two required files for a theme (the other being style.css).
		* It is used to display a page when nothing more specific matches a query.
		* E.g., it puts together the home page when no home.php file exists.
		* Learn more: http://codex.wordpress.org/Template_Hierarchy
		*
	*/
include("trad_emploi.php");		
get_header(); ?>
<main class="emploi">
	<div class="span4 hidden-mobile">
		<ul class="post-list nav-latest-emploi">
		<?php 
			$mypod = pods('emploi');	
			$params = array(
			'limit' => -1,
			'orderby' => 'emploi_epingler DESC' ,
			); 
			$mypod->find($params);
			$bureau = '';
			while ($mypod->fetch()) {
				$emploi = [
				'title' => $mypod->display('title'),
				'permalink' => $mypod->display('permalink'),
				'type_doffre_demploi' => $mypod->display('type_doffre_demploi'),
				'offre_permanente' => $mypod->display('offre_permanente'),
				'date_de_fin_de_publication' => $mypod->display('date_de_fin_de_publication'),	
				'bureaux_concernes' => $mypod->display('bureaux_concernes'),
				];
			?>
			<?php if(strtotime('now') - strtotime($emploi['date_de_fin_de_publication'])  < 0 || $emploi['date_de_fin_de_publication'] == ''){ // afficher les sans date de fin de publication et les date de fin de publication ultérieure à la date courante?>
					<li>
						<a href="<?php echo esc_url($emploi['permalink']); ?>"><?php echo $emploi['title'];?></a>		
					</li>
			<?php } ?>	
		<?php } ?>
		</ul>
	</div>
	<div class="span8">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); 
				$postid = get_the_ID();
				global $post;
				// get pods object
				$mypod = pods( $post->post_type, $post->ID );
				$podid = $mypod->id();
				$title = $mypod->display('title');
				$permalink = $mypod->display('permalink');			
				$date_mise_en_ligne = $mypod->display('date_mise_en_ligne');
				$description_smart = $mypod->display('description_smart');		
				$description_poste = $mypod->display('description_poste');		
				$profil_poste = $mypod->display('profil_poste');		
				$nous_offrons = $mypod->display('nous_offrons');		
				$interet = $mypod->display('interesse');		
				
				$offre_permanente = $mypod->display('offre_permanente');
				$bureaux_concernes = $mypod->display('bureaux_concernes');
				if($offre_permanente == 'Oui'){ $offre_permanente = '<div style="display: inline-block;background:#ff4054; color:#fff;padding:2px 5px; font-size:0.8em;width:auto;" >'.$offre_permanente_oui.'</div>';}else{$offre_permanente = '';}
				if($mypod->display('type_doffre_demploi') =='Offre emploi'){$type_doffre_demploi=$offre_emploi;}
				if($mypod->display('type_doffre_demploi') =='Offre de stage'){$type_doffre_demploi=$offre_stage;}
				if($mypod->display('type_doffre_demploi') =='Apprentissage'){$type_doffre_demploi=$apprentissage;}
			?>
			
				<section>
					
							<h1 class="titre1"><strong><?php echo $emploi_titre; ?></strong></h1>
							<p class="ss_titre"><strong><?php echo $title; ?></strong></p>                       
						   
						<div >
							<article >
								<div >

										
										<?php echo $offre_permanente;?>
										<div class="clear"></div>
										<div class="gris_clair">
											[<?php echo $type_doffre_demploi;?>]
										</div>
										<div class="gris_clair">
											<?php if($bureaux_concernes !=''){echo $ville.'  '.str_replace(", and ", " ou ",$bureaux_concernes);}?>
										</div>
										<?php if($date_mise_en_ligne !=''){?>		
											<span class="gris_clair"><?php echo $date_mise_ligne;?> : <?php echo $date_mise_en_ligne;?> </span>
										<?php }?>							
										<br/>
										<br/>
										<?php if($description_smart !=''){?>										
											<?php echo $description_smart;?>
										<?php }?>

										<?php if($description_poste !=''){?>
											<h3><strong><?php echo $description_offre;?></strong></h3>
											<?php echo $description_poste;?>
										<?php }?>									
		
										<?php if($profil_poste !=''){?>
											<h3><strong><?php echo $profil_label;?></strong></h3>
											<?php echo $profil_poste;?>
										<?php }?>	

										<?php if($nous_offrons !=''){?>
											<h3><strong><?php echo $nous_offrons_label;?></strong></h3>
											<?php echo $nous_offrons;?>
										<?php }?>	

										<?php if($interet !=''){?>
											<h3><strong><?php echo $interesse;?> ?</strong></h3>
											<?php echo $interet;?>
										<?php }?>						 						
									<?php include('partage_rezo.php');?>
									<div class="clear"></div>
									<div class="formation_retour"><br/><br/><a  href="/<?php echo ICL_LANGUAGE_CODE;?>/?post_type=emploi">< <?php echo $toutes_offres;?></a></div>
								</div>
							</article>
						
				</section>

			</div>					
		</div>				
		<?php endwhile; ?>
	<?php endif; ?>
</main>		
</script>
<?php get_footer(); ?>		