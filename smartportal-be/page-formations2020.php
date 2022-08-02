<?php
/*
Template Name: Formations2020
*/
?>
<?php/*
$axe='';
$mode='';
$axe=$_GET['axe']; 
$mode=$_GET['mode'];
$keyword=$_GET['keyword'];

$mypod = pods('formation');

$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));
function my_format_date($input_date) {
	if($input_date !=''){
		return date("d-m-Y", strtotime($input_date));
	}else{
		return false;
	}
} 
$where0 = " DATE(partie_1_date.meta_value ) >= NOW() ";
$where0 = " post_title != ''  ";
if($axe != ''){
	$where1 = ' AND type_de_la_formation2.meta_value LIKE "%'.$axe.'%"';
		
}
if($mode != ''){
	if($mode == 'presentiel'){
		$where2 = " AND  (partie_1_distance.meta_value = 0 AND partie_2_distance.meta_value = 0)";
		$mode_label = 'En présentiel';
	}
	if($mode == 'distance'){
		$where3 = " AND  (partie_1_distance.meta_value = 1 || partie_2_distance.meta_value = 1)";
		$mode_label = 'À distance';
	}
}
if($keyword != ''){				
	$where4 = ' AND (post_title LIKE "%'.$keyword.'%" OR presentation_de_la_formation.meta_value LIKE "%'.$keyword.'%" OR contenu_de_la_formation.meta_value LIKE "%'.$keyword.'%"  OR formateurtrice.meta_value LIKE "%'.$keyword.'%" )';	
}

$params = array(
	'where'=> $where0.$where1.$where2.$where3.$where4,
	'orderby' => 'partie_1_date ASC',
	'limit' => -1,		
	);

//echo $where0.$where1.$where2.$where3.$where4;
	
$mypod->find($params);
$total_formation = pods( 'formation', $params );
if($total_formation ->total_found() == 0){	
	$no_result = 'Aucune formation ne correspond au(x) paramètre(s) de recherche. <br/><br/><a href="/fr/formations-2020">Voir toutes les formations</a>'; 	
}*/
?>

<?php get_header(); ?>

<article id="content" class="container ">

	<!-- Row for main content area -->
	<div class="clear-both"></div>
	<div class="row" >		
		<div class="clear-both"></div>
		
		<div class="span4"  >
			<?php // include 'components/formation-recherche.php';?>
			
		</div>
		<div class="span8" >
			<header class="page-leader">
				<h1>Catalogue des formations 2022</h1>	
			</header>
			<div>
				<div>
					Nos équipes formation et informatique s’activent pour vous préparer un catalogue 2022 tout beau tout chaud. Vous pourrez le retrouver ici dès le mercredi 12 janvier au soir. 
				</div>				
			</div>
			
			
			<div class="clear-both"></div>
			
			<?php if($axe !='' || $mode != '' || $keyword != ''){?>
				<div class="filtres"  >
					 <span>
						Filtre(s):
					 </span>
					 <?php if($axe !=''){ ?>
						 <span class="formation_filtre">
						   <?php echo $axe;?> <a href="/fr/formations-2021?<?php echo $_SERVER['QUERY_STRING'];?>&axe=">X</a> 
						</span>
					<?php } ?>
					<?php if($mode !=''){ ?>
						<span class="formation_filtre">
						   <?php echo $mode_label;?> <a href="/fr/formations-2021?<?php echo $_SERVER['QUERY_STRING'];?>&mode=">X</a> 
						</span>	
					<?php } ?>
					<?php if($keyword !=''){ ?>
						<span class="formation_filtre">
						   Comprend le mot : <?php echo $keyword;?> <a href="/fr/formations-2021?<?php echo $_SERVER['QUERY_STRING'];?>&keyword=">X</a> 
						</span>	
					<?php } ?>
				</div>
			<?php } ?>
			<div class="clear-both"><br><br></div>
			<?php echo $no_result;?>
			<div class="formation-list">
				<?php/*
					$formationsWithStartDate = [];
					$formationsWithoutStartDate = [];
					while ($mypod->fetch()) {
						$partie_1_date = '';
						$partie_2_date = '';
						$formation = [
							'title' => $mypod->display('title'),
							'permalink' => $mypod->display('permalink'),
							'picture' => pods_image_url(
								$mypod->field('photo_de_la_formation'),
								$size = 'thumbnail',
								$default = 0,
								$force = false
							),		
							'partie_1_date' => $mypod->display('partie_1_date'),
							'partie_1_distance' => $mypod->display('partie_1_distance'),
							'partie_1_date' => $mypod->display('partie_1_date'),
							'partie_2_date' => $mypod->display('partie_2_date'),
							'partie_2_distance' => $mypod->display('partie_2_distance'),
							'ville' => $mypod->display('ville'),
							'type_de_la_formation2' => $mypod->display('type_de_la_formation2'),
							'a_distance' => $mypod->display('a_distance'),
							'en_presentiel' => $mypod->display('en_presentiel'),
							'complet' => $mypod->display('complet'),
						];
					
						if(strtotime($formation['partie_1_date']) - $yesterday < 0 && ($mode == '' && $axe == '' && $keyword == '')){
							$formationsWithoutStartDate[] = $formation;
						} else {
							
							$formationsWithStartDate[] = $formation;
						}
						$formations = array_merge(
							$formationsWithStartDate,
							$formationsWithoutStartDate
						);
					}
						
					foreach ($formations as $formationx) {						
						//include 'components/formation-liste.php';
					}*/
					
		 ?>
			</div>
		</div>
	</div>
</article>
<div class="clear-both"></div>

<?php get_footer(); ?>
