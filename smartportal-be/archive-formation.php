<?php
/*
Template Name: Formation Archive
*/
?>
<?php
$axe='';
$ville='';
$axe=$_GET['axe'];
$ville=$_GET['ville'];
switch ($axe) {
    case 'idee':
        $axe="De l'idée au projet";
		$axe_sql='idée';
		$class_axe_idee='class_axe_idee';
        break;
    case 'finance':
        $axe="Gestion financière de votre projet";
		$axe_sql='gestion';
		$class_axe_finance='class_axe_finance';
        break;
	case 'valorisation':
        $axe="Valorisation de votre projet";
		$axe_sql='valorisation';
		$class_axe_valorisation='class_axe_valorisation';
        break;
	case 'outils':
        $axe="Boîte à outils";
		$axe_sql='outils';
		$class_axe_outils='class_axe_outils';
        break;
    case 'evolution':
        $axe="Évolution personnelle";
		$axe_sql='évolution';
		$class_axe_prevention='class_axe_evolution';
        break;
	case 'distance':
        $axe="Formation à distance";
		$axe_sql='distance';
		$class_axe_prevention='class_axe_distance';
        break;
}

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

if( $ville !=''){
	if($ville == 'bruxelles'){
		$where_ville ='DATE(date_1_bruxelles.meta_value ) >= NOW() OR DATE(date_2_bruxelles.meta_value ) >= NOW()';
	}else if($ville == 'namur'){
		$where_ville = 'DATE(date_namur.meta_value ) >= NOW()' ;
		
	}else if($ville == 'liege'){
		$where_ville ='DATE(date_liege.meta_value ) >= NOW()';
		
	}else if($ville == 'charleroi'){
		$where_ville ='DATE(date_charleroi.meta_value ) >= NOW()';
		
	}
	$params = array(
	'where'=>$where_ville,
	'orderby' => 'date_1_bruxelles.meta_value ASC',
	'limit' => -1,		
	);
	$axe_visibility ='tous_invisibles';
	
}else if($axe !=''){
	$params = array(
	'where'=>'type_de_la_formation2.meta_value LIKE "%'.$axe_sql.'%"',
	'orderby' => 'date_1_bruxelles ASC',
	'limit' => -1,		
	);
	$axe_visibility ='tous_invisibles';
}else{
	$params = array(
	'limit' => -1,
	'orderby' => 'date_1_bruxelles.meta_value ASC',
	//'orderby' => $mypod->field('title'),
	//'orderby' => 'DATE(date_1_bruxelles.meta_value ),DATE(date_2_bruxelles.meta_value ),DATE(date_namur.meta_value ),DATE(date_liege.meta_value ),DATE(date_charleroi.meta_value ) asc ',
//'orderby' => 'date_1_bruxelles.meta_value, date_liege.meta_value asc ',
	//'where' => 'date_1_bruxelles.meta_value >= CURDATE() OR date_2_bruxelles.meta_value >= CURDATE() OR date_namur.meta_value >= CURDATE() OR date_liege.meta_value >= CURDATE() OR date_charleroi.meta_value >= CURDATE()'
	);
	$axe_visibility ='tous_visibles';
}

	
$mypod->find($params);
?>

<?php get_header(); ?>

<article id="content" class="container ">

	<!-- Row for main content area -->
	<div class="clear-both"></div>
	<div class="row" >		
		<div class="clear-both"></div>
		
		<div class="span4 menu_court"  >
			<h2>Services </h2>
			<ul class="">
				<li><a href="/fr/nos-services/formations/">> Formations</a></li>
					<ul>
						<li><a href="/fr/?post_type=formation">Nos formations</a></li>
						<li lang="fr nl en"><a href="/fr/formations-a-distance">Nos formations à distance</a></li>
						<li><a href="/fr/nos-services/formations/formations-de-nos-partenaires/">Formations de nos partenaires</a></li>
						<li><a href="/fr/formations-renseignements-inscription-annulation/">Renseignements, modalités d’inscription et d’annulation</a></li>

					</ul>
			</ul>
		</div>
		<div class="span8" >			
			<div>
				<div>
					Vous souhaitez développer vos compétences et votre autonomie afin de pouvoir mieux vivre de votre activité ? <br/>Vous avez besoin de conseils pratiques pour présenter,  et développer vos projets ? <br/>
					Voici notre catalogue de formation pour premier semestre 2021.<br/>
					Vous n’avez pas trouvé ce que vous cherchiez ? N’hésitez pas à aller voir chez nos <a href="/fr/nos-services/formations/formations-de-nos-partenaires/">partenaires</a> <br/><br/>
				</div>
				<h2>Choisissez par axes de formation</h2>
				<div>
					<div class="button-link">
						<a href="/fr/?post_type=formation&axe=idee">De l'idée au projet</a>
					</div>
					<div class="button-link">
						<a href="/fr/?post_type=formation&axe=finance">Gestion financière et commerciale de votre projet</a>
					</div>
					<div class="button-link">
						<a href="/fr/?post_type=formation&axe=valorisation">Valorisation de votre projet</a>
					</div>
					<div class="button-link">
						<a href="/fr/?post_type=formation&axe=outils">Boîte à outils</a>
					</div>
					<div class="button-link">
						<a href="/fr/?post_type=formation&axe=evolution">Évolution personnelle</a>
					</div>
					<div class="button-link">
						<a href="/fr/formations-a-distance">Formation à distance</a>
					</div>
				</div>
				<div class="clear-both"></div>
				<h2>Choisissez par ville</h2>
				<div>
					<div class="button-link">
						<a href="/fr/?post_type=formation&ville=bruxelles">Bruxelles</a>
					</div>
					<!--<div class="button-link">
						<a href="/fr/?post_type=formation&ville=namur">Namur</a>
					</div>-->
					<!--<div class="button-link">
						<a href="/fr/?post_type=formation&ville=liege">Liège</a>
					</div>-->
					<div class="button-link">
						<a href="/fr/?post_type=formation&ville=charleroi">Charleroi</a>
					</div>
				</div>
			</div>
			<div class="clear-both"></div>
			<hr/>				
			<div class="button-link">
				<a href="<?php echo get_site_url();?>/wp-content/uploads/2019/09/calendrier-website-2019-2020-1.pdf" target="_blank">
					Toutes les formations en PDF
				</a> 
			</div> 
			
			<div class="clear-both"></div>
			<hr/>

			<header  class="page-leader">
				<h1><?php 
						if($ville=="liege"){$ville='Liège';}
						echo 'Formations : '.$axe.Ucfirst($ville);?></h1>			
			</header>			

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
						];
						/*
						$date_1_bruxelles = my_format_date($mypod->display('date_1_bruxelles'));
						$date_2_bruxelles = my_format_date($mypod->display('date_2_bruxelles'));
						$date_namur = my_format_date($mypod->display('date_namur'));
						$date_liege = my_format_date($mypod->display('date_liege'));
						$date_charleroi = my_format_date($mypod->display('date_charleroi'));*/
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
					echo "Programmation en cours".$ville;
				}
			}else{
				foreach ($formations as $formationx) {	
					$class_ville='display_ville';
					if($formationx['type_formation'] == 'Formation à distance'){$class_ville='hidden_ville';}
					?>
					<div class="formation">
						<div class="formation__picture"  >
							<img src="<?php echo $formationx['picture'];?>"  >
						</div>
						<div class="formation__info">
							<a href="<?php echo esc_url($formationx['permalink']);?>">
								<h2><?php echo $formationx['title'];?></h2>
							</a>
							
							<span>Programmée le(s) : </span>
							<?php 
								$date_1_bruxelles = my_format_date($formationx['date_1_bruxelles']);
								$date_2_bruxelles = my_format_date($formationx['date_2_bruxelles']);
								$date_namur = my_format_date($formationx['date_namur']);
								$date_liege = my_format_date($formationx['date_liege']);
								$date_charleroi = my_format_date($formationx['date_charleroi']);


								if(strtotime($date_1_bruxelles) - $yesterday < 0 && strtotime($date_2_bruxelles) - $yesterday < 0 && strtotime($date_namur) - $yesterday < 0 && strtotime($date_liege) - $yesterday < 0 && strtotime($date_charleroi) - $yesterday < 0){									
									echo 'Sur demande';
								}else{
									 
									//echo strtotime($date_2_bruxelles).'  '.time();
									if((strtotime($date_1_bruxelles) - $yesterday) >= 0){
										echo  '<span>'.$date_1_bruxelles.'</span><span class="'. $class_ville.'"> à Bruxelles | </span>';
									}
									if((strtotime($date_2_bruxelles)  - $yesterday) >= 0) {
										echo  $date_2_bruxelles.'<span class="'. $class_ville.'"> à Bruxelles | </span>'; 
									}
									if((strtotime($date_namur)  - $yesterday) >= 0) {
										echo  $date_namur.'<span class="'. $class_ville.'"> à Namur | </span>';
									}
									if((strtotime($date_liege)  - $yesterday) >= 0) {
										echo  $date_liege.'<span class="'. $class_ville.'"> à Liège | </span>';
									}
									if((strtotime($date_charleroi)  - $yesterday) >= 0) {
										echo  $date_charleroi.'<span class="'. $class_ville.'"> à Charleroi | </span>';
									}
								}

							?><br/> 
							<div class="formation_detail_lien"  >
								<a href="<?php echo esc_url($formationx['permalink']); ?>" >Détail de la formation</a>
							</div>
							<div class="type_formation">
								<?php 
									switch ($formationx['type_formation']) {
									case 'idée au projet':
										$type_formation="De l'idée au projet";
										break;
									case 'Gestion financière de votre projet':
										$type_formation="Gestion financière et commercial de votre projet";
										break;
									case 'Valorisation de votre projet':
										$type_formation="Valorisation de votre projet";
										break;
									case 'Outils et ressources':
										$type_formation="Boîte à outils";
										break; 
									case 'Evolution personnelle':
										$type_formation="Évolution personnelle";
										break;
									case 'Formation à distance':
										$type_formation="Formation à distance";
										break;
									}
						
									echo $type_formation;
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
