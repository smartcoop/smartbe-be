<?php 
	include 'traductions.php';
	get_header();
	//supprimer le header et le footer de l'iframe dans le site français
	$lienframe='';
	//$lien_page_ag="/$lg/assemblee-generale-2019/?req=$lienframe";
	if($_GET['req'] == 'lienframe'){
		echo '<style>
		header,  #masterfooter {display:none !important;}	 
		header,  #masterfooter {display:none !important;}	 
		#cookie-notice{display:none;}
		</style>';
		$lienframe='lienframe';
		$lien_page_ag="";
	}
?>
<section id="content" role="main" class="ag2019">
	<div class="span3 ag_menu_conteneur" >
		<ul class="ag_menu" >
			<li ><a href="<?php echo $lien_page_ag;?>" target="_parent"><b><?php echo $assemblee;?></b></a>
				<ul>
					<li ><a href="/<?php echo $lg;?>/news/workshop-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $programme;?></a></li>
					<li ><a href="/<?php echo $lg;?>/news/intervenant-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $intervenants;?></a></li>
					<?php if(strstr($date_et_lieu, '17')){ ?>
						<!--<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-assemblee-generale-smart-1706-lille-62206407038"><?php //echo $sinscrire_lille;?></a></li>-->
					<?php } else { ?>
						<!--<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-18062019-bruxelles-62193747172"><?php //echo $sinscrire_bxl;?></a></li>-->
					<?php }?>
				</ul>
			</li>
		</ul>        
	</div> 
	<div class="span10 ag_content">

		<?php if (have_posts()): ?>
			<?php
				while(have_posts()):
					the_post();
					$postid = get_the_ID();	
					global $post;
					// get pods object
					$mypod = pods( $post->post_type, $post->ID );			
					// set our variables
					$title = $mypod->display('title');
					$permalink = $mypod->display('permalink');
					$permalink = $mypod->display('permalink');
					$heure_debut_workshop = $mypod->field('heure_debut_workshop');
					$heure_fin_workshop = $mypod->field('heure_fin_workshop');
					$salle_workshop = $mypod->field('salle_workshop');
					$description_du_workshop = $mypod->field('description_du_workshop');
					$intervenants_workshop = $mypod->field('intervenants_workshop');
					$co_intervenants = $mypod->field('co-intervenants');
					$date_et_lieu = $mypod->field('date_et_lieu');
					$langues_workshop = $mypod->field('langue_workshop');
					
				?>
				
					<div>		
						<div class="ag_col_gauche" >						
							<h1><?php echo $title; ?></h1>
							<div class="ag_descriptif">
								<?php 
									if ( is_array($langues_workshop) ) {
										foreach ( $langues_workshop as $langue ) {
											
											echo '<b>'.$langue.'</b> ';			
										}
									}else{ echo '<b>'.$langues_workshop.'</b> ';}?>		
									<br/>
								<?php echo $description_du_workshop; ?>							
							</div>							
							<div  class="ag_infos">
								<?php	echo '<b>'.substr($heure_debut_workshop,0,5).' - '.substr($heure_fin_workshop,0,5).'&nbsp;&nbsp;&nbsp; '.$date_et_lieu.'</b>';?>
								<br/>
								<?php	echo $salle_workshop.'<br/>';?>			
								<br/>
								<b><?php	echo $avec;?>	 </b><br/>
								<?php 
									if ( ! empty( $intervenants_workshop ) ) {
										foreach ( $intervenants_workshop as $rel ) { 
											$id = $rel[ 'ID' ];
											$entite_representee = get_post_meta( $id, 'entite_representee', true );
											echo '<a href="'.esc_url( get_permalink( $id ) ).'/?req='.$lienframe.'">'.get_the_title( $id ).'</a> ('.$entite_representee.')<br/> ';
											
										} 
									} //endif ! empty 
									echo $co_intervenants.'<br/>';
								?>			
							</div>	
						</div>
						<div class="ag_col_droite">	
							<?php if(strstr($date_et_lieu, '17')){ ?>
									<!--<div class="ag_frame_event_brite" ><iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62206407038" frameborder="0" height="414" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe></div>-->
							<?php } else { ?>
								<!--<div class="ag_frame_event_brite" ><div class="ag_frame_event_brite" ><iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62193747172" frameborder="0" height="394" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe></div></div>-->
							<?php } ?>
			</div>					
							
					
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>			