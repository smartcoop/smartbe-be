<?php
/*
Template Name: formationAdistance Archive
*/
?>
<?php

include('trad_emploi.php');
$mypod = pods('formation');
	
$ordre_affichage = $mypod->field('ordre_affichage');
$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));
function my_format_date($input_date) {
	if($input_date !=''){
		return date("d-m-Y", strtotime($input_date));
	}else{
		return false;
	}
} 


$params = array(
'where'=>'type_de_la_formation2.meta_value LIKE "Formation à distance"',
'orderby' => 'date_1_bruxelles ASC',
'limit' => -1,		
);
$axe_visibility ='tous_invisibles';

	
$mypod->find($params);
?>

<?php get_header(); ?>

<article id="content" class="container ">

	<!-- Row for main content area -->
	<div class="clear-both"></div>
	<div class="row" >		
		<div class="clear-both"></div>
		
		<div class="span4 menu_court"  >
			<h2><?php echo $services;?></h2>
			<ul>
				<li><a href="/fr/nos-services/formations/">> <?php echo $formations;?></a></li>
					<ul>
						<li><a href="<?php echo $nos_formations_link;?>"><?php echo $nos_formations;?></a></li>
						<li><a href="<?php echo $formation_distance_link;?>"><?php echo $formation_distance;?></a></li>
						<li><a href=""><?php echo $formations_partenaire;?></a></li>
						<!--<li><a href="/fr/formations-renseignements-inscription-annulation/"><?php echo $renseignements;?></a></li>-->
					</ul>
			</ul>
		</div>
		<div class="span8" >			
			

			<header  class="page-leader">
				<h1><?php echo $type_formation_distance;?><br/><br/></h1>			
			</header>			
			<div>
				<?php echo $intro;?>
				<br/><br/>
			</div>
			<div class="formation-list">
				<?php
					$formationsWithStartDate = [];
					$formationsWithoutStartDate = [];

					/* Start the Pods Loop */
					$i=1;
					while ($mypod->fetch()) {
						$date_1_bruxelles = '';
						$date_2_bruxelles = '';
						$date_namur = '';
						$date_liege = '';
						$date_charleroi = '';
						$podid = $mypod->id();
						$formation = [
							'title' => $mypod->display('title'),
							'permalink' => $mypod->display('permalink'),
							'picture' => pods_image_url(
								$mypod->field('photo_de_la_formation'),
								$size = 'thumbnail',
								$default = 0,
								$force = false
							),		
							'date_1_bruxelles' => $mypod->display('date_1_bruxelles'),
							'date_2_bruxelles' => $mypod->display('date_2_bruxelles'),
							'date_namur' => $mypod->display('date_namur'),
							'date_liege' => $mypod->display('date_liege'),
							'date_charleroi' => $mypod->display('date_charleroi'),
							'type_formation' => $mypod->display('type_de_la_formation2'),
							'id' => $mypod->display('ID'),
						];
		
						$date_1_bruxelles = my_format_date($formation['date_1_bruxelles']);
						$date_2_bruxelles = my_format_date($formation['date_2_bruxelles']);
						$date_namur = my_format_date($formation['date_namur']);
						$date_liege = my_format_date($formation['date_liege']);
						$date_charleroi = my_format_date($formation['date_charleroi']);

				if(strtotime($date_1_bruxelles) - $yesterday < 0 && strtotime($date_2_bruxelles) - $yesterday < 0 && strtotime($date_namur) - $yesterday < 0 && strtotime($date_liege) - $yesterday < 0 && strtotime($date_charleroi) - $yesterday < 0){
					$formationsWithoutStartDate[] = $formation;

				} else {
					$formationsWithStartDate[] = $formation;
				}
			}

			$formations = array_merge(
				$formationsWithStartDate,
				$formationsWithoutStartDate
			);
			$total_formation = pods( 'formation', $params );
			if($total_formation ->total_found() == 0){
				if($ville == 'Liège'){				
					echo "Le programme pour Liège sera en ligne dès octobre 2019<br/><br/>";
				} else if($ville == 'charleroi'){
					echo 'Le programme pour Charleroi sera en ligne dès décembre 2019<br/><br/>';
				} else {
					echo "Programmation en cours";
				}
			}else{
				foreach ($formations as $formationx) {	
					$class_ville='display_ville';
					if($formationx['type_formation'] == 'Formation à distance'){$class_ville='hidden_ville';}
					?>
					<div class="formation">
						<div class="formation__picture"  >
						 <?php if(get_post_meta( $formationx['id'], '_pods_photo_de_la_formation', false )){?>
							<?php 
								$ref_photo_array = get_post_meta( $formationx['id'], '_pods_photo_de_la_formation', false );
								$myrows = $wpdb->get_results( "SELECT guid FROM smwp_posts WHERE ID LIKE '".$ref_photo_array[0][0]."'" );
								foreach ( $myrows as $row ) {
									echo '<img src="'.$row->guid.'">';
								}
							?>
						 <?php }?>
						</div>
						<div class="formation__info">
							<a href="<?php echo esc_url($formationx['permalink']);?>">
								<h2><?php echo $formationx['title'];?></h2>
							</a>
							
							<span><?php echo $programmee_le;?></span>
							<?php 
								$date_1_bruxelles = my_format_date($formationx['date_1_bruxelles']);
								$date_2_bruxelles = my_format_date($formationx['date_2_bruxelles']);
								$date_namur = my_format_date($formationx['date_namur']);
								$date_liege = my_format_date($formationx['date_liege']);
								$date_charleroi = my_format_date($formationx['date_charleroi']);


								if(strtotime($date_1_bruxelles) - $yesterday < 0 && strtotime($date_2_bruxelles) - $yesterday < 0 && strtotime($date_namur) - $yesterday < 0 && strtotime($date_liege) - $yesterday < 0 && strtotime($date_charleroi) - $yesterday < 0){									
									echo $sur_demande;
								}else{
									 
									//echo strtotime($date_2_bruxelles).'  '.time();
									if((strtotime($date_1_bruxelles) - $yesterday) >= 0){
										echo  '<span>'.$date_1_bruxelles.'  | ';
									}
									if((strtotime($date_2_bruxelles)  - $yesterday) >= 0) {
										echo  $date_2_bruxelles.'  | '; 
									}
									if((strtotime($date_namur)  - $yesterday) >= 0) {
										echo  $date_namur.'  | ';
									}
									if((strtotime($date_liege)  - $yesterday) >= 0) {
										echo  $date_liege.'  | ';
									}
									if((strtotime($date_charleroi)  - $yesterday) >= 0) {
										echo  $date_charleroi.'  | ';
									}
								}

							?><br/> 
							<div class="formation_detail_lien"  >
								<a href="<?php echo esc_url($formationx['permalink']); ?>" ><?php $detail_formation;?></a>
							</div>
							<div class="type_formation">
								<?php 									
									echo $type_formation_distance;
								?>
							</div>
						</div>
					</div>

				<?php  } ?>
			<?php  } ?>
			</div>
		</div>
	</div>
</article>
<div class="clear-both"></div>

	<?php //echo $mypod->pagination(); ?>


	<?php //get_sidebar(); ?>

<?php get_footer(); ?>
