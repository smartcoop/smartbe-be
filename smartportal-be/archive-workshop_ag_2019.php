<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
include 'traductions.php';

$frame='';
$jour='';
if(isset($_GET['jour'])){
	$jour=$_GET['jour'];
}else{
	$jour='18';
}
$lienframe='';
//$lien_page_ag="/$lg/assemblee-generale-2019/?req=$lienframe";

//supprimer l'affichage du header et du footer pour le site français
if($_GET['req'] == 'frame' && $jour !=''){
	echo '<style>
	 header,  footer {display:none !important;}	 
	 #masterfooter {display:none !important;}	 
	 #cookie-notice{display:none;}
	</style>';
	$jour='17';
	$lienframe='lienframe';
	$lien_page_ag="https://www.smartfr.fr/save-the-date-assemblees-generales-les-1718-juin-a-lillebruxelles-letscoop2019/";
}
if($_GET['req'] == 'lienframe'){
	echo '<style>
	 header,  #masterfooter {display:none !important;}	 
	 header,  #masterfooter {display:none !important;}	 
	 #cookie-notice{display:none;}
	</style>';
	$lienframe='lienframe';
	$lien_page_ag="https://www.smartfr.fr/save-the-date-assemblees-generales-les-1718-juin-a-lillebruxelles-letscoop2019/";
}
$mypod = pods('workshop_ag_2019');	
$params = array(
    'orderby'        => 'heure_debut_workshop',       // Or post by custom field
	'where'=>'date_et_lieu.meta_value  LIKE "%' . $jour. '%"' ,
    // By which custom field
    'order'          => 'ASC',          // Just the post type
    'limit' => 0                   // Show all available post
);

$mypod->find($params);

get_header();


function my_format_date($input_date) {
	return date("d-m-Y", strtotime($input_date));         
}
function my_format_heure($input_date) {
	return date("H:i", strtotime($input_date));         
}

//Passage de style pour affichage du 17 ou du 18
if($jour == '17'){	
	$onglet_lille='style="border-bottom:1px solid #fff;"'; 
	$onglet_bxl='style="background:#f3f3f3;"'; 
	$adresse=$adresse_lille;
}else{
	$onglet_lille='style="background:#f3f3f3;"'; 
	$onglet_bxl='style="border-bottom:1px solid #fff;"'; 
	$adresse=$adresse_belge;
}
?>

<section id="content" role="main" class="ag2019">
	<div class="span3 ag_menu_conteneur" >
		<ul class="ag_menu" >
			<li ><a href="<?php echo $lien_page_ag;?>"  target="_parent"><b><?php echo $assemblee;?></b></a>
				<ul>
					<li ><a href="/<?php echo $lg;?>/news/workshop-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $programme;?></a></li>
					<li ><a href="/<?php echo $lg;?>/news/intervenant-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $intervenants;?></a></li>
					<!--<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-assemblee-generale-smart-1706-lille-62206407038"><?php //echo $sinscrire_lille;?></a></li>		
					<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-18062019-bruxelles-62193747172"><?php //echo $sinscrire_bxl;?></a></li>-->
				</ul>
			</li>
		</ul>        
	</div> 
	<div class="span10 ag_content">
	
	<h1 >
	  <?php echo $titre_programme;?>
	</h1>
	
	<div>
		<ul > 
			<li class="ag_onglet" <?php echo $onglet_lille;?>><a href="?jour=17&req=<?php echo $lienframe;?>"  ><?php echo $lille17;?></a></li>
			<li class="ag_onglet" <?php echo $onglet_bxl;?> ><a href="?jour=18&req=<?php echo $lienframe;?>"><?php echo $bruxelles18;?></a></li>
		</ul>
	</div>
	<div class="clearfix"></div>
    <div class="ag_programme">
		<?php
			echo '<div class="ag_workshops">';
			echo $adresse;
			while ( $mypod->fetch() ) :
				// set our variables
				$title = $mypod->display('title');
				$permalink = $mypod->display('permalink');				
				$heure_debut_workshop = $mypod->field('heure_debut_workshop');
				$heure_fin_workshop = $mypod->field('heure_fin_workshop');
				$salle_workshop = $mypod->field('salle_workshop');
				$description_du_workshop = $mypod->field('description_du_workshop');
				$intervenants_workshop = $mypod->field('intervenants_workshop');
				$co_intervenants = $mypod->field('co-intervenants');
				$date_et_lieu = $mypod->field('date_et_lieu');
				$langues_workshop = $mypod->field('langue_workshop');
					
						
							echo '<div class="ag_workshop">';											
								echo '<a href="'.$permalink.'/?req='.$lienframe.'" ><h3>';										
									echo $title;
									
								echo '</h3></a>';
								echo '<div>';
								
								if ( is_array($langues_workshop) ) {
									foreach ( $langues_workshop as $langue ) {		echo '<b>'.$langue.'</b> ';			
									}
								}else{ 
									echo '<b>'.$langues_workshop.'</b> ';
								}
								echo '</div>';
								echo '<div class="ag_descriptif">';												
									echo $description_du_workshop.'<br/>';
								echo '</div >';
								echo '<div  class="ag_infos">';
									echo '<b>'.substr($heure_debut_workshop,0,5).' - '.substr($heure_fin_workshop,0,5).'</b><br/>';
									echo $salle_workshop.'<br/>';
									echo '<b>'.$avec.'</b><br/>';
									if ( ! empty( $intervenants_workshop ) ) {
										foreach ( $intervenants_workshop as $rel ) { 
											$id = $rel[ 'ID' ];
											$entite_representee = get_post_meta( $id, 'entite_representee', true );
											//show the related post name as link
											echo '<a href="'.esc_url( get_permalink( $id ) ).'/?req='.$lienframe.'">'.get_the_title( $id ).'</a> ('.$entite_representee.')<br/> ';
											//get the value for some_field in related post and echo it
											
										} //end of foreach
									} //endif ! empty ( $related )
									echo $co_intervenants.'<br/>';
								echo '</div >';
								echo '<div style="clear:both"></div>';
							echo '</div>';						
									
			endwhile;
		echo '</div>';	
			  ?>  
			<div class="ag_col_droite">	
				<?php if($jour =='17'){ ?>
					<!--<div class="ag_frame_event_brite" ><iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62206407038" frameborder="0" height="414" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe></div>-->
				<?php } else { ?>
					
				
					<!--<div class="ag_frame_event_brite" ><iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62193747172" frameborder="0" height="394" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe></div>-->
				<?php } ?>
			</div>
			<div style="clear:both"></div>
	</div>
</div> 
  <div style="clear:both"></div>
  <?php //get_sidebar('subfooter'); ?>
</section>




<?php get_footer(); ?>