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
$now_date = date('d-m-Y', strtotime('now'));
$yesterday = strtotime('-1 day', strtotime('now'));
$partager='Partager';
get_header();
$lg=ICL_LANGUAGE_CODE;
function my_format_date($input_date) {
	return date("d-m-Y", strtotime($input_date));         
}
 ?>



<?php if (have_posts()): ?>
<?php
include('trad_emploi.php');
while(have_posts()): 
  the_post();
  $postid = get_the_ID();
  ?>
<article id="content" role="main" class="container">
  <div class="row">
    <div class="span4 hidden-phone menu_court">
		<?php include 'components/formation-recherche.php';?>
    </div>
    <div class="span8">
      <?php
      if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. 
      ?>
        <div class="featured-image">
            <?php
            the_post_thumbnail('post-image');
            ?>
        </div>
      <?php
      }
      ?>
      <div class="blog-entry">
			<?php /* Initiate the Pods Object */
				// get the current slug
				/* $slug = pods_v( 'last', 'url' ); */
				global $post;
				// get pods object
				$mypod = pods( $post->post_type, $post->ID );
				$podid = $mypod->id();
				$title = $mypod->display('title');
				$permalink = $mypod->display('permalink');
				
				$type_de_la_formation = $mypod->field('type_de_la_formation2');
			
				$photo_de_la_formation = $mypod->field('photo_de_la_formation');
				$photo_de_la_formation=pods_image_url ( $photo_de_la_formation, $size = 'thumbnail', $default = 0, $force = false );
				$presentation_de_la_formation = $mypod->field('presentation_de_la_formation');
				$description_de_la_formation = $mypod->field('description_de_la_formation');
				$objectifs = $mypod->field('objectifs');
				$contenu_de_la_formation = $mypod->field('contenu_de_la_formation');
				$informations_pratiques = $mypod->field('informations_pratiques');
				$prix = $mypod->field('prix');
				$inscription = $mypod->field('inscription');
				$formateurtrice = $mypod->field('formateurtrice');
				$photo_du_formateur = $mypod->field('photo_du_formateur');
				$photo_du_formateur = pods_image_url ( $photo_du_formateur, $size = 'thumbnail', $default = 0, $force = false );
				$formateurtrice2 = $mypod->field('formateurtrice_2');
				$photo_du_formateur2 = $mypod->field('photo_du_formateur_2');
				$photo_du_formateur2 = pods_image_url ( $photo_du_formateur2, $size = 'thumbnail', $default = 0, $force = false );
				$formateurtrice3 = $mypod->field('formateurtrice_3');
				$photo_du_formateur3 = $mypod->field('photo_du_formateur_3');
				$photo_du_formateur3 = pods_image_url ( $photo_du_formateur3, $size = 'thumbnail', $default = 0, $force = false );
				$formateurtrice4 = $mypod->field('formateurtrice_4');
				$photo_du_formateur4 = $mypod->field('photo_du_formateur_4');
				$photo_du_formateur4 = pods_image_url ( $photo_du_formateur4, $size = 'thumbnail', $default = 0, $force = false );
								
				$parcours = $mypod->field('parcours');
				$parcours_complet_s1 = $mypod->field('parcours_complet_s1');
				$parcours_complet_s2 = $mypod->field('parcours_complet_s2');
				
				$complet_s1 = $mypod->display('complet_s1');
				$date_s1d1_init = $mypod->field('date_s1d1');
				$date_s1d1 = $mypod->field('date_s1d1');
				$horaire_s1h1 = $mypod->field('horaire_s1h1');
				$mode_s1m1 = $mypod->field('mode_s1m1');
				
				$date_s1d2 = $mypod->field('date_s1d2');
				$horaire_s1h2 = $mypod->field('horaire_s1h2');
				$mode_s1m2 = $mypod->field('mode_s1m2');
				
				$date_s1d3 = $mypod->field('date_s1d3');
				$horaire_s1h3 = $mypod->field('horaire_s1h3');
				$mode_s1m3 = $mypod->field('mode_s1m3');
				
				
				$complet_s2 = $mypod->display('complet_s2');
				$date_s2d1_init = $mypod->field('date_s2d1');
				$date_s2d1 = $mypod->field('date_s2d1');
				$horaire_s2h1 = $mypod->field('horaire_s2h1');
				$mode_s2m1 = $mypod->field('mode_s2m1');

				$date_s2d2 = $mypod->field('date_s2d2');
				$horaire_s2h2 = $mypod->field('horaire_s2h2');
				$mode_s2m2 = $mypod->field('mode_s2m2');

				$date_s2d3 = $mypod->field('date_s2d3');
				$horaire_s2h3 = $mypod->field('horaire_s2h3');
				$mode_s2m3 = $mypod->field('mode_s2m3');
				
				
				$complet_s3 = $mypod->display('complet_s3');
				$date_s3d1_init = $mypod->field('date_s3d1');
				$date_s3d1 = $mypod->field('date_s3d1');
				$horaire_s3h1 = $mypod->field('horaire_s3h1');
				$mode_s3m1 = $mypod->field('mode_s3m1');

				$date_s3d2 = $mypod->field('date_s3d2');
				$horaire_s3h2 = $mypod->field('horaire_s3h2');
				$mode_s3m2 = $mypod->field('mode_s3m2');

				$date_s3d3 = $mypod->field('date_s3d3');
				$horaire_s3h3 = $mypod->field('horaire_s3h3');
				$mode_s3m3 = $mypod->field('mode_s3m3');			
				
				$parcours_session1_dates = $mypod->field('parcours_session1_dates');
				$parcours_session2_dates = $mypod->field('parcours_session2_dates');
			?>
				<article>
						
					<div>
						<header class="page-leader">
							<h1>Formation</h1>
						</header>
						<?php if ($type_de_la_formation != '' ) {?>
							<b><?php echo $type_de_la_formation;?></b><br/>
						<?php } ?>
						<h1><span class="muted"><?php echo $title;?></span></h1>
						
							<?php 
								
								$date_s1d1 = my_format_date($date_s1d1);
								$date_s1d2 = my_format_date($date_s1d2);
								$date_s1d3 = my_format_date($date_s1d3);
								if($complet_s1 == 'Oui'){
									$complet_s1_label = 'COMPLET';
								}
							?>
							<?php if(strtotime($mypod->field('date_s1d1')) - $yesterday >= 0){?>
								<?php 
									if (($mypod->field('date_s1d1') != '0000-00-00' && $mypod->field('date_s1d1') != '') || ($mypod->field('date_s1d2') != '0000-00-00' && $mypod->field('date_s1d2') != '') || ($mypod->field('date_s1d3') != '0000-00-00' && $mypod->field('date_s1d3') != '')){
										echo '<div><b>Session 1</b><span class="formation_liste_complet"> '.$complet_s1_label.'</span></div>'; 
									} ?>
								<?php 
									if ($mypod->field('date_s1d1') != '0000-00-00' && $mypod->field('date_s1d1') != ''){
										if($mode_s1m1 == '1'){
											$s1m1 = '<b class="formation_mode">À distance</b>';
										}else{
											$s1m1= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s1d1;?> 
											<?php if($horaire_s1h1 != ''){ ?>
												de <?php echo $horaire_s1h1;?> 
											<?php } ?>
											<?php echo $s1m1;?> 
										</div>
								<?php } ?>
								
								<?php 
									if ($mypod->field('date_s1d2') != '0000-00-00' && $mypod->field('date_s1d2') != ''){
										if($mode_s1m2 == '1'){
											$s1m2 = '<b class="formation_mode">À distance</b>';
										}else{
											$s1m2= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s1d2;?> 
											<?php if($horaire_s1h2 != ''){ ?>
												de <?php echo $horaire_s1h2;?> 
											<?php } ?>
											<?php echo $s1m2;?> 
										</div>
								<?php } ?>
								
								<?php 
									if ($mypod->field('date_s1d3') != '0000-00-00' && $mypod->field('date_s1d3') != ''){
										if($mode_s1m3 == '1'){
											$s1m3 = '<b class="formation_mode">À distance</b>';
										}else{
											$s1m3= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s1d3;?> 
											<?php if($horaire_s1h3 != ''){ ?>
												de <?php echo $horaire_s1h3;?> 
											<?php } ?>
											<?php echo $s1m3;?> 
										</div>
								<?php } ?>
							<?php } ?>
								
								
							<?php 								
								$date_s2d1 = my_format_date($date_s2d1);
								$date_s2d2 = my_format_date($date_s2d2);
								$date_s2d3 = my_format_date($date_s2d3);
								$complet_s2_label = '';
								if($complet_s2 == 'Oui'){
									$complet_s2_label = 'COMPLET';
								}
							?>
							<?php if(strtotime($mypod->field('date_s2d1')) - $yesterday >= 0){ ?>
								<?php 
									if (($mypod->field('date_s2d1') != '0000-00-00' && $mypod->field('date_s2d1') != '') || ($mypod->field('date_s2d2') != '0000-00-00' && $mypod->field('date_s2d2') != '') || ($mypod->field('date_s2d3') != '0000-00-00' && $mypod->field('date_s2d3') != '')){
										echo '<div><b>Session 2</b><span class="formation_liste_complet"> '.$complet_s2_label.'</span></div>';
									} ?>
								<?php 
									if ($mypod->field('date_s2d1') != '0000-00-00' && $mypod->field('date_s2d1') != '' ){
										if($mode_s2m1 == '1'){
											$s2m1 = '<b class="formation_mode">À distance</b>';
										}else{
											$s2m1= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s2d1;?> 
											<?php if($horaire_s2h1 != ''){ ?>
												de <?php echo $horaire_s2h1;?> 
											<?php } ?>
											<?php echo $s2m1;?> 
										</div>
								<?php } ?>
								
								<?php 
									if ($mypod->field('date_s2d2') != '0000-00-00' && $mypod->field('date_s2d2') != ''){
										if($mode_s2m2 == '1'){
											$s2m2 = '<b class="formation_mode">À distance</b>';
										}else{
											$s2m2= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s2d2;?> 
											<?php if($horaire_s2h2 != ''){ ?>
												de <?php echo $horaire_s2h2;?> 
											<?php } ?>
											<?php echo $s2m2;?> 
										</div>
								<?php } ?>
								
								<?php 
									if ($mypod->field('date_s2d3') != '0000-00-00' && $mypod->field('date_s2d3') != ''){
										if($mode_s2m3 == '1'){
											$s2m3 = '<b class="formation_mode">À distance</b>';
										}else{
											$s2m3= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s2d3;?> 
											<?php if($horaire_s2h3 != ''){ ?>
												de <?php echo $horaire_s2h3;?> 
											<?php } ?>
											<?php echo $s2m3;?> 
										</div>
								<?php } ?>
							<?php } ?>
							
							
							
							<?php 
								$date_s3d1 = my_format_date($date_s3d1);
								$date_s3d2 = my_format_date($date_s3d2);
								$date_s3d3 = my_format_date($date_s3d3);
								if($complet_s3 == 'Oui'){
									$complet_s3_label = 'COMPLET';
								}
							?>
							<?php if(strtotime($mypod->field('date_s3d1')) - $yesterday >= 0){ ?>
								<?php 
									if (($mypod->field('date_s3d1') != '0000-00-00' && $mypod->field('date_s3d1') != '') || ($mypod->field('date_s3d2') != '0000-00-00' && $mypod->field('date_s3d2') != '') || ($mypod->field('date_s3d3') != '0000-00-00' && $mypod->field('date_s3d3') != '')){
										echo '<div><b>Session 3</b><span class="formation_liste_complet"> '.$complet_s3_label.'</span></div>';
									} ?>
								<?php 
									if ($mypod->field('date_s3d1') != '0000-00-00' && $mypod->field('date_s3d1') != ''){
										if($mode_s3m1 == '1'){
											$s3m1 = '<b class="formation_mode">À distance</b>';
										}else{
											$s3m1= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s3d1;?> 
											<?php if($horaire_s3h1 != ''){ ?>
												de <?php echo $horaire_s3h1;?> 
											<?php } ?>
											<?php echo $s3m1;?> 
										</div>
								<?php } ?>
								
								<?php 
									if ($mypod->field('date_s3d2') != '0000-00-00' && $mypod->field('date_s3d2') != ''){
										if($mode_s3m2 == '1'){
											$s3m2 = '<b class="formation_mode">À distance</b>';
										}else{
											$s3m2= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s3d2;?> 
											<?php if($horaire_s3h2 != ''){ ?>
												de <?php echo $horaire_s3h2;?> 
											<?php } ?>
											<?php echo $s3m2;?> 
										</div>
								<?php } ?>
								
								<?php 
									if ($mypod->field('date_s3d3') != '0000-00-00' && $mypod->field('date_s3d3') != ''){
										if($mode_s3m3 == '1'){
											$s3m3 = '<b class="formation_mode">À distance</b>';
										}else{
											$s3m3= '<b class="formation_mode">En présentiel</b>';
										}										
								?>
										<div>
											Le <?php echo $date_s3d3;?> 
											<?php if($horaire_s3h3 != ''){ ?>
												de <?php echo $horaire_s3h3;?> 
											<?php } ?>
											<?php echo $s3m3;?> 
										</div>
								<?php } ?>
							<?php } ?>
							
							
						
						<div class="clear-both"><br/></div>
						
						<div class="fiche_presentation_image" >
							<div >
								<?php 
									if(get_post_meta( $podid, '_pods_photo_de_la_formation', false )){
										$ref_photo_array = get_post_meta( $podid, '_pods_photo_de_la_formation', false );
										$myrows = $wpdb->get_results( "SELECT guid FROM smwp_posts WHERE ID LIKE '".$ref_photo_array[0][0]."'" );
										foreach ( $myrows as $row ) {
											echo '<img src="'.$row->guid.'"  class="fiche_image">';
										}
									}
								?>
							</div>
							<div>
								<i><?php echo $presentation_de_la_formation;?></i>
							</div>
						</div>
						
						<?php if($parcours_session1_dates !='' || $parcours_session2_dates !=''  ){?>
							<?php if($parcours_complet_s1 == '1'){ 
								$parcours_complet_s1_label = '<span class="formation_liste_complet"> COMPLET</span>';
							 } ?>
							<div>
								<b>Session 1</b> : <?php echo $parcours_session1_dates.$parcours_complet_s1_label;?>
							</div>
							<?php if($parcours_complet_s2 == '1'){ 
								$parcours_complet_s2_label = '<span class="formation_liste_complet"> COMPLET</span>';
							 } ?>
							<div>
								<b>Session 2</b> : <?php echo $parcours_session2_dates.$parcours_complet_s2_label;?>
							</div>
						<?php }?>
						
						<div class="clear-both"></div>
						<?php //if(strtotime($date_s1d1) - $yesterday < 0 || $complet == '1'){	
						
						?>

						<?php  
							if ($parcours == '1'){
								$lien_bouton_inscription = '/fr/inscription-parcours/?your-formation='.$title.'&podid='.$podid;
								$target='target="_self"';
								if( ($parcours_session1_dates != '' && $parcours_complet_s1 != '1') || ($parcours_session2_dates != '' && $parcours_complet_s2 != '1')){ 
									echo '<div class="button-link-fiche"><a href="'.$lien_bouton_inscription.'" '.$target.'>'.$je_minscris.'</a></div>';
								}
							}else{
								$lien_bouton_inscription = '/fr/inscription-formation/?your-formation='.$title.'&podid='.$podid;
								$target='target="_self"';
								
								$s1_possible = 'non';								
								$s2_possible = 'non';
								$s3_possible = 'non';
							
								if($date_s1d1_init != '0000-00-00'){
									$s1_possible = 'oui';
								}
								if($date_s2d1_init != '0000-00-00'){
									$s2_possible = 'oui';
								}
								if($date_s3d1_init != '0000-00-00'){
									$s3_possible = 'oui';
								}
								if($complet_s1 == 'Oui' || (strtotime($date_s1d1_init) - $yesterday < 0)){ $s1_possible = 'non';}
								if($complet_s2 == 'Oui' || (strtotime($date_s2d1_init) - $yesterday < 0)){ $s2_possible = 'non';}
								if( $complet_s3 == 'Oui' || (strtotime($date_s3d1_init) - $yesterday < 0)){ $s3_possible = 'non';}
								
								if($s1_possible == 'oui' || $s2_possible == 'oui' || $s3_possible == 'oui') {
										echo '<div class="button-link-fiche"><a href="'.$lien_bouton_inscription.'" '.$target.'>'.$je_minscris.'</a></div>';
										
									
								}
							}
						?>	
						
						<div class="clear-both"></div>
						<?php if($objectifs !=''){?>
							<h3><strong><?php echo $objectifs_label;?></strong></h3>
							<?php echo $objectifs;?>
						<?php }?>
						<?php if($contenu_de_la_formation !=''){?>
							<h3><strong><?php echo $contenus;?></strong></h3>
							<?php echo $contenu_de_la_formation;?>
						<?php }?>
						<?php if($informations_pratiques !=''){?>
							<h3><strong><?php echo $informations;?></strong></h3>
							<?php echo $informations_pratiques;?>
						<?php }?>
						<?php if($prix !=''){?>
							<h3><strong>Prix</strong></h3>
							<?php echo $prix;?>
						<?php }?>
						<!--<h3><strong>Inscription</strong></h3>-->
						<?php //echo $inscription;?>
						<?php if($formateurtrice !=''){?>
							<div class="fiche_formateur">
								<div class="fiche_image_formateur">
									<?php 
										if($ref_photo_array = get_post_meta( $podid, '_pods_photo_du_formateur', false )){
											$ref_photo_array = get_post_meta( $podid, '_pods_photo_du_formateur', false );
											
											$myrows = $wpdb->get_results( "SELECT guid FROM smwp_posts WHERE ID LIKE '".$ref_photo_array[0][0]."'" );
											foreach ( $myrows as $row ) {
												echo '<img src="'.$row->guid.'"  >';
											}
										}	
									?>
								</div>
								<div class="fiche_presentation_formateur">	
									<?php echo $formateurtrice;?>
								</div>
							</div>
						<?php }?>	
							
						<?php if($formateurtrice2 !=''){?>
							<div class="fiche_formateur">
								<div class="fiche_image_formateur">
									<?php 
										if($ref_photo_array2 = get_post_meta( $podid, '_pods_photo_du_formateur_2', false )){
											$ref_photo_array2 = get_post_meta( $podid, '_pods_photo_du_formateur_2', false );
											
											$myrows2 = $wpdb->get_results( "SELECT guid FROM smwp_posts WHERE ID LIKE '".$ref_photo_array2[0][0]."'" );
											foreach ( $myrows2 as $row2 ) {
												echo '<img src="'.$row2->guid.'"  >';
											}
										}	
									?>
								</div>
								<div class="fiche_presentation_formateur">	
									<?php echo $formateurtrice2;?>
								</div>
							</div>
						<?php }?>
						
						<?php if($formateurtrice3 !=''){?>
							<div class="fiche_formateur">
								<div class="fiche_image_formateur">
									<?php 
										if($ref_photo_array3 = get_post_meta( $podid, '_pods_photo_du_formateur_3', false )){
											$ref_photo_array3 = get_post_meta( $podid, '_pods_photo_du_formateur_3', false );
											
											$myrows3 = $wpdb->get_results( "SELECT guid FROM smwp_posts WHERE ID LIKE '".$ref_photo_array3[0][0]."'" );
											foreach ( $myrows3 as $row3 ) {
												echo '<img src="'.$row3->guid.'"  >';
											}
										}	
									?>
								</div>
								<div class="fiche_presentation_formateur">	
									<?php echo $formateurtrice3;?>
								</div>
							</div>
						<?php }?>
						<div>
						
						<?php if($formateurtrice4 !=''){?>
							<div class="fiche_formateur">
								<div class="fiche_image_formateur">
									<?php 
										if($ref_photo_array4 = get_post_meta( $podid, '_pods_photo_du_formateur_4', false )){
											$ref_photo_array4 = get_post_meta( $podid, '_pods_photo_du_formateur_4', false );
											
											$myrows4 = $wpdb->get_results( "SELECT guid FROM smwp_posts WHERE ID LIKE '".$ref_photo_array4[0][0]."'" );
											foreach ( $myrows4 as $row4 ) {
												echo '<img src="'.$row4->guid.'"  >';
											}
										}	
									?>
								</div>
								<div class="fiche_presentation_formateur">	
									<?php echo $formateurtrice4;?>
								</div>
							</div>
						<?php }?>
						<div>
							<br/><br/></div>
						
						
					</div>
					<div class="clear-both"><br/></div>
					
					<div class="clear-both"></div>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<?php include('partage_rezo.php');?>
					<p>&nbsp;</p>
					<div >
					  <a class="" href="/fr/formations-2022">&lt; <?php echo $toutes_formations;?></a>
					</div>
				</div>
			</div>
		</article><!-- /content -->		
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?> 