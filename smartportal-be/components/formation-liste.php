<?php //if($mypod->display('date_s1d1') != '' ){ 
	$formationx = [
							'title' => $mypod->display('title'),
							'permalink' => $mypod->display('permalink'),
							'picture' => pods_image_url(
								$mypod->field('photo_de_la_formation'),
								$size = 'thumbnail',
								$default = 0,
								$force = false
							),
							'type_de_la_formation2' => $mypod->display('type_de_la_formation2'),
							
							'complet_s1' => $mypod->display('complet_s1'),
							'date_s1d1' => $mypod->display('date_s1d1'),
							'date_s1d2' => $mypod->display('date_s1d2'),
							'date_s1d3' => $mypod->display('date_s1d3'),
							
							'complet_s2' => $mypod->display('complet_s2'),
							'date_s2d1' => $mypod->display('date_s2d1'),
							'date_s2d2' => $mypod->display('date_s2d2'),
							'date_s2d3' => $mypod->display('date_s2d3'),
							
							'complet_s3' => $mypod->display('complet_s3'),							
							'date_s3d1' => $mypod->display('date_s3d1'),
							'date_s3d2' => $mypod->display('date_s3d2'),
							'date_s3d3' => $mypod->display('date_s3d3'),
							
							
							'mode_s1m1' => $mypod->display('mode_s1m1'),
							'mode_s1m2' => $mypod->display('mode_s1m2'),
							'mode_s1m3' => $mypod->display('mode_s1m3'),
							'ville' => $mypod->display('ville'),
							
						];	
?>
	<div class="formation"  >
		<div class="formation__picture"  >
			<img src="<?php echo $formationx['picture'];?>"  >
		</div>
		<div class="formation__info">
			<a href="<?php echo esc_url($formationx['permalink']);?>">
				<h2><?php echo $formationx['title'];?></h2>
			</a>
			
				<div>			
					<div>Programmée le(s) : </div>
					<?php 
						/* SESSION 1*/
						$date_s1d1 = my_format_date($formationx['date_s1d1']);
						$date_s1d2 = my_format_date($formationx['date_s1d2']);
						$date_s1d3 = my_format_date($formationx['date_s1d3']);	
						if(strtotime($formationx['date_s1d1']) - $yesterday >= 0){ 
							echo '<div>';
								if($formationx['mode_s1m1'] == 'Oui'){
									$s1m1 = '<b class="formation_mode">À distance</b>';
								} else{
									$s1m1 = '<b class="formation_mode">En présentiel</b>';
								}	
								if($formationx['mode_s1m2'] == 'Oui'){
									$s1m2 = '<b class="formation_mode">À distance</b>';
								} else{
									$s1m2 = '<b class="formation_mode">En présentiel</b>';
								}	
								if($formationx['mode_s1m3'] == 'Oui'){
									$s1m3 = '<b class="formation_mode">À distance</b>';
								} else{
									$s1m3 = '<b class="formation_mode">En présentiel</b>';
								}	
								echo '<span class="formation_session_label" >';
									if($date_s1d1 != '' || $date_s1d2 != '' || $date_s1d3 != '' ){
										echo '<b>Session 1 : </b>';
									}	
								echo '</span>';
								if($date_s1d1 != ''){
									echo  '<span><b class="formation_date">'.$date_s1d1.'</b></span>';
								}
								if($date_s1d2 != ''){
									echo  '<span> & <b class="formation_date">'.$date_s1d2.'</b></span>';
								}
								if($date_s1d3 != ''){
									echo  '<span> & <b class="formation_date">'.$date_s1d3.'</b></span>';
								}
								if($formationx['complet_s1'] == 'Oui'){ 
									echo '<span class="formation_liste_complet"> COMPLET</span>';
								}
							echo '</div>';
						}
						
						/* SESSION 2*/
						$date_s2d1 = my_format_date($formationx['date_s2d1']);
						$date_s2d2 = my_format_date($formationx['date_s2d2']);
						$date_s2d3 = my_format_date($formationx['date_s2d3']);	
						
						if(strtotime($formationx['date_s2d1']) - $yesterday >= 0){
							echo '<div>';	
								echo '<span class="formation_session_label" >';
									if($date_s2d1 != '' || $date_s2d2 != '' || $date_s2d3 != '' ){
										echo '<b>Session 2 : </b>';
									}	
								echo '</span>';
								if($date_s2d1 != ''){
									echo  '<span><b class="formation_date">'.$date_s2d1.'</b></span>';
								}
								if($date_s2d2 != ''){
									echo  '<span> & <b class="formation_date">'.$date_s2d2.'</b></span>';
								}
								if($date_s2d3 != ''){
									echo  '<span> & <b class="formation_date">'.$date_s2d3.'</b></span>';
								}
								if($formationx['complet_s2'] == 'Oui'){ 
									echo '<span class="formation_liste_complet"> COMPLET</span>';
								}
							echo '</div>';
						}
						
						/* SESSION 3*/
						$date_s3d1 = my_format_date($formationx['date_s3d1']);
						$date_s3d2 = my_format_date($formationx['date_s3d2']);
						$date_s3d3 = my_format_date($formationx['date_s3d3']);	
						if(strtotime($formationx['date_s3d1']) - $yesterday >= 0){ 
							echo '<div>';	
								echo '<span class="formation_session_label" >';
									if($date_s3d1 != '' || $date_s3d2 != '' || $date_s3d3 != '' ){
										echo '<b>Session 3 : </b>';
									}	
								echo '</span>';
								if($date_s3d1 != ''){
									echo  '<span><b class="formation_date">'.$date_s3d1.'</b></span>';
								}
								if($date_s3d2 != ''){
									echo  '<span> & <b class="formation_date">'.$date_s3d2.'</b></span>';
								}
								if($date_s3d3 != ''){
									echo  '<span> & <b class="formation_date">'.$date_s3d3.'</b></span>';
								}
								if($formationx['complet_s3'] == 'Oui'){ 
									echo '<span class="formation_liste_complet"> COMPLET</span>';
								}
							echo '</div>';
						}
					?>
					
					<br/>
				</div>	
			
			<div>
				<div class="formation_detail_lien"  >
					<a href="<?php echo esc_url($formationx['permalink']); ?>" >Détail de la formation</a>
				</div>
				
			</div>
			<div class="type_formation">
				<?php 
					echo $formationx['type_de_la_formation2'];					
				?>
			</div>
		</div>
	</div>
<?php //} ?>