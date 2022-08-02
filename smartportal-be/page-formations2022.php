<?php
/*
Template Name: Formations2022
*/
?>
<?php
$axe='';
$mode='';
$axe=$_GET['axe']; 
$mode=$_GET['mode'];
$keyword=$_GET['keyword'];

$mypod = pods('formation');

$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));
$annee2022 = strtotime('01 january 2022');

function my_format_date($input_date) {
	if($input_date !=''){
		return date("d-m-Y", strtotime($input_date));
	}else{
		return false;
	}
} 

$where0 = " post_title != ''  ";
if($axe != ''){
	$where1 = ' AND type_de_la_formation2.meta_value LIKE "%'.$axe.'%"';
		
}

if($keyword != ''){				
	$where4 = ' AND (post_title LIKE "%'.$keyword.'%" OR presentation_de_la_formation.meta_value LIKE "%'.$keyword.'%" OR contenu_de_la_formation.meta_value LIKE "%'.$keyword.'%"  OR formateurtrice.meta_value LIKE "%'.$keyword.'%" )';	
}

$params = array(
	'where'=> $where0.$where1.$where4,
	'orderby' => $orderby,
	'limit' => -1,		
	);

//echo $where0.$where1.$where2.$where3.$where4;
	
$mypod->find($params);
$total_formation = pods( 'formation', $params );
if($total_formation ->total_found() == 0){	
	$no_result = 'Aucune formation ne correspond au(x) paramètre(s) de recherche. <br/><br/><a href="/fr/formations-2022">Voir toutes les formations</a>'; 	
}
?>

<?php get_header(); ?>

<article id="content" class="container ">

	<!-- Row for main content area -->
	<div class="clear-both"></div>
	<div class="row" >		
		<div class="clear-both"></div>
		
		<div class="span4"  >
			<?php include 'components/formation-recherche.php';?>
			
		</div>
		<div class="span8" >
			<header class="page-leader">
				<h1><?php the_title();?></h1>	
			</header>
			<?php if($axe =='' && $mode == '' &&  $keyword == ''){?>
				<div>
					<div style="background :#f0f0f0; border-radius:6px; padding: 10px 20px">
						<?php the_content();?>
					</div>				
				</div>
			<?php } ?>
			
			
			<div class="clear-both"></div>
			
			<?php if($axe !='' || $mode != '' || $keyword != ''){?>
				<div class="filtres"  >
					 <br/><br/><span>
						Filtre(s):
					 </span>
					 <?php if($axe !=''){ ?>
						 <span class="formation_filtre">
						   <?php echo $axe;?> <a href="/fr/formations-2022?<?php echo $_SERVER['QUERY_STRING'];?>&axe=">X</a> 
						</span>
					<?php } ?>
					<?php if($mode !=''){ ?>
						<span class="formation_filtre">
						   <?php echo $mode_label;?> <a href="/fr/formations-2022?<?php echo $_SERVER['QUERY_STRING'];?>&mode=">X</a> 
						</span>	
					<?php } ?>
					<?php if($keyword !=''){ ?>
						<span class="formation_filtre">
						   Comprend le mot : <?php echo $keyword;?> <a href="/fr/formations-2022?<?php echo $_SERVER['QUERY_STRING'];?>&keyword=">X</a> 
						</span>	
					<?php } ?>
				</div>
			<?php } ?>
			<div class="clear-both"></div>
			<?php echo '<br/><br/>'.$no_result;?>
			<div class="formation-list">
				<?php
					include 'components/queries-liste.php';		
			$theme = 'Mieux se connaître';
					$params1 = array(
						'where'=> $where0.$where1.$where4. ' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params1);
					$total_theme = pods( 'formation', $params1 );
					if($total_theme ->total_found() > 0){	
						echo '<h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Re(penser) son projet';
					$params2 = array(
						'where'=> $where0.$where1.$where4. ' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params2);
					$total_theme = pods( 'formation', $params2 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					
					$theme = 'Dépasser ses freins professionnels';
					$params3 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params3);
					$total_theme = pods( 'formation', $params3 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Développer son activité';
					$params4 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params4);
					$total_theme = pods( 'formation', $params4 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Vendre son activité';
					$params5 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params5);
					$total_theme = pods( 'formation', $params5 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Les financements';
					$params6 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params6);
					$total_theme = pods( 'formation', $params6 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Penser sa communication';
					$params7 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params7);
					$total_theme = pods( 'formation', $params7 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'La communication digitale : les outils';
					$params8 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params8);
					$total_theme = pods( 'formation', $params8 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Parfaire sa communication';
					$params9 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params9);
					$total_theme = pods( 'formation', $params9 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Les bases juridiques';
					$params10 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params10);
					$total_theme = pods( 'formation', $params10 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
					
					
					$theme = 'Prévention et sécurité';
					$params11 = array(
						'where'=> $where0.$where1.$where4.' AND type_de_la_formation2.meta_value = "'.$theme.'"' ,						
						'limit' => 10,		
					);	
					$mypod->find($params11);
					$total_theme = pods( 'formation', $params11 );
					if($total_theme ->total_found() > 0){	
						echo '<br/><br/><h1>'.$theme.'</h1><br/>';
						while ($mypod->fetch()) {	 
							include 'components/formation-liste.php';													
						}
					}
				
		 ?>
			</div>
		</div>
	</div>
</article>
<div class="clear-both"></div>

<?php get_footer(); ?>
