<?php				
	$count = '0';

	 
	/* Start the Pods Loop */
	while ($mypod->fetch()) {
		$condition_css = 'style="display:block;position:relative;"';
		$offre_permanente ='';		
		$bureaux_concernes = '';
		$emploi = [
			'title' => $mypod->display('title'),
			'permalink' => $mypod->display('permalink'),
			'type_doffre_demploi' => $mypod->display('type_doffre_demploi'),
			'offre_permanente' => $mypod->display('offre_permanente'),
			'date_de_fin_de_publication' => $mypod->display('date_de_fin_de_publication'),	
			'bureaux_concernes' => $mypod->display('bureaux_concernes'),
		];
							
		$divisible="";
		if($count & 1){ // si impair et mobile
			$divisible="pair";
		}else{
			$divisible="impair";
		}
		if($emploi['offre_permanente'] == 'Oui'){ $offre_permanente= $offre_permanente_oui;}
		$bureaux_concernes = $emploi['bureaux_concernes'];
		if($emploi['type_doffre_demploi'] =='Offre emploi'){$type_doffre_demploi=$offre_emploi;}
		if($emploi['type_doffre_demploi'] =='Offre de stage'){$type_doffre_demploi=$offre_stage;}
		if($emploi['type_doffre_demploi'] =='Apprentissage'){$type_doffre_demploi=$apprentissage;}
?>
	<?php 
		
		
			if(strtotime('now') - strtotime($emploi['date_de_fin_de_publication'])  < 0 || $emploi['date_de_fin_de_publication'] == ''){ // afficher les sans date de fin de publication et les date de fin de publication ultérieure à la date courante?>
			 <?php //if($bureau !='' && strpos($bureaux_concernes ,$bureau) === false ){$condition_css = 'style="display:none;position:relative;"';}?>
			<div class="emploi-item col<?php echo $divisible;?>" <?php echo $condition_css;?> >
				<?php if($emploi['offre_permanente'] == 'Oui'){?>
					<div class="offre_permanente"><?php echo $offre_permanente;?></div>
				<?php } ?>
				<div class="emploi_type">
					[<?php echo $type_doffre_demploi;?>]
				</div>
				<div class=" emploi_base">
					<?php if($bureaux_concernes  !=''){ echo $ville.'   '.str_replace(", and ", " ou ",$bureaux_concernes) ;}?>
				</div>
				<div class="emploi_titre emploi_lien">
					<a href="<?php echo esc_url($emploi['permalink']); ?>"><?php echo $emploi['title'];?></a>
					<br>
				</div>
				<div class="emploi_detail_lien"  >
					<a href="<?php echo esc_url($emploi['permalink']); ?>"><?php echo $details_offre;?></a> 
				</div>		
			</div>
		
	<?php $count++;	} ?>
<?php  }
	if($count == 0){
		echo "Il n'y a pas d'offres d'emploi pour le moment.";
	}

?>	
<div class="clear"></div>