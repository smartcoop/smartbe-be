<?php get_header(); ?>
<?php
	$lg=ICL_LANGUAGE_CODE; 
	if($lg =='nl'){
		$suffixe_lg = '_nl';
		$label_activite='Beschrijf hier je beroep of je activiteit';
		$label_raisons='Waarom stel je je kandidaat voor de Raad van bestuur?';
		$label_futur='Hoe zie je Smart in de toekomst? Wat is jouw langetermijnvisie voor het project?';
		$label_competences='Welke competenties en ervaringen wil je bij de Raad van bestuur en het project Smart aanbrengen?';
		$label_engagement='Heb je al een ander engagement binnen Smart (RvB, ethisch comité, Smart in Progress, andere) of heb je ervaring in andere coöperaties?';
		$femme = 'Vrouw';
		$homme = 'Man';
		$catA = 'Categorie A: Loontrekkend ondernemer';
		$catB = 'Categorie B: Werknemer van het vaste personeel';
		$catC = 'Categorie C: Extern partner, klant, opdrachtgever';
		$entite_label = 'Entiteit:';
		$menu="De coöperatie";
		$href_retour='/nl/news/candidature-ca-2021/';
		$page_perso = 'Persoonlijke pagina';
		$deja_membre = 'Momenteel lid van de Raad van Bestuur SmartCoop';
		$retour_liste = 'Terug naar de lijst met kandidaten';
	}else{
		$suffixe_lg = '_fr';
		$label_activite='Votre métier, votre activité :';
		$label_raisons='Pourquoi vous présentez-vous au Conseil d’Administration ?';
		$label_futur='Comment voyez-vous Smart dans le futur ? Quelle est votre vision à terme du projet ?';
		$label_competences='Que pouvez-vous apporter au projet Smart ? Quelles sont les compétences et expériences que vous souhaitez apporter au sein du conseil d’administration ?';
		$label_engagement='Avez-vous déjà été engagé·e au sein de Smart (CA, Comité d’éthique, Smart in Progress, autres) ou avez-vous de l\'expérience dans d\'autre·s coopérative·s ?';
		$femme = 'Femme';
		$homme = 'Homme';
		$catA = 'Catégorie A : Entrepreneur·se salarié·e';
		$catB = 'Catégorie B : Travailleur·euse des équipes mutualisées';
		$catC = 'Catégorie C : Partenaire externe, client, donneur d\'ordre';
		$entite_label = 'Représente l\'entité';
		$menu="La coopérative";
		$titre = 'Candidat pour le Conseil d\'Administration SmartCoop';
		$href_retour='/fr/news/candidature-ca-2021/';
		$page_perso = 'Page personnelle';
		$deja_membre = 'Actuellement membre du CA SmartCoop';
		$retour_liste = 'Retour à la liste des candidats';
	}
    global $post;
	// get pods object
	$mypod = pods( $post->post_type, $post->ID );
	$podid = $mypod->id();
	$title = $mypod->display('title');
	$permalink = $mypod->display('permalink');
	$genre = $mypod->display('genre');
	$prenom = $mypod->display('prenom');
	$nom = $mypod->display('nom');
    $tel = $mypod->display('telephone');
	$ville = $mypod->display('ville');
	$website = $mypod->display('website');
	$alreadyadmin = $mypod->display('alreadyadmin');
	$combien = $mypod->display('combien');
	$entite = $mypod->display('entite');
    $cat_smart = $mypod->display('categorie');
	$engagement_fr = $mypod->display('engagement');
	$activite_fr = $mypod->display('activite');
	$competences_fr = $mypod->display('competences');
	$raisons_fr = $mypod->display('raisons');
	$futur_fr = $mypod->display('vision_pour_le_futur');
	$video = $mypod->display('video');
	$engagement_nl = $mypod->display('engagement-nl');
	$activite_nl = $mypod->display('activite-nl');
	$competences_nl = $mypod->display('competences-nl');
	$raisons_nl = $mypod->display('raisons-nl');
	$futur_nl = $mypod->display('futur-nl');
?>
<article id="content" role="main" class="container">
  <div class="row">
	<nav class="nav-vie-cooperative visible-desktop span4" >
	    <?php
            $args = array(
              'menu'  => $menu,
              'container'       => '', 
              'menu_class'      => 'nav nav-chevron', 
              'echo'            => true,
              'fallback_cb'     => false,
              'depth'           => 2);
            wp_nav_menu($args);
            ?>
	</nav>

	<div  class="span8" >
		<header id="page-title" class="page-leader">
			<h1><?php echo $titre;?> 			</h1>			
		</header>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
									
				
				<div class="fiche_candidat">
					<div class="fiche_candidat_image">
						<?php the_post_thumbnail();?>
					</div>
					
					<div class="fiche_candidat_content">
						<div class="fiche_candidat_nom fiche_candidat_signaletique">
							<?php echo $prenom.' '.$nom; ?>
						</div>
						
						<div class="fiche_candidat_sexe fiche_candidat_signaletique">
							<span class="label">
								<?php 
									if($genre == 'Femme' || $genre == 'Vrouw'){
										echo $femme; 
									}else if ($genre == 'Homme' || $genre == 'Man'){
										echo $homme;
									}										
								?>
							</span>
						</div>
						
						
						<div class="fiche_candidat_categorie fiche_candidat_signaletique">			
							<span class="label">
								<?php 
									if($cat_smart == 'Categorie A: Loontrekkend ondernemer' || $cat_smart == 'Catégorie A : Entrepreneur·se salarié·e'){
										echo $catA ; 
									}else if($cat_smart == 'Categorie B: Werknemer van het vaste personeel' || $cat_smart == 'Catégorie B : Travailleur·euse des équipes mutualisées'){
										echo $catB ;
									}else if($cat_smart == "Categorie C: Extern partner, klant, opdrachtgever" || $cat_smart =='Catégorie C : Partenaire externe, client, donneur d\'ordre' ){
										echo $catC  ;
										}
									?>
							</span>
						</div>
						
						<?php if($entite !=''){?>
							<div class="fiche_candidat_entite fiche_candidat_signaletique">
								<span class="label"><?php echo $entite_label;?> </span><?php echo $entite; ?>
							</div>
						<?php } ?>
						
						<div class="fiche_candidat_ville fiche_candidat_signaletique">
							<?php echo $ville ; ?>						
						</div>
						
						<?php if($website !=''){?>
							<div class="fiche_candidat_website fiche_candidat_signaletique">
								<a href="<?php echo $website ; ?>" target="_blank"><span class="labelxx"><?php echo $page_perso;?> </span></a>
							</div>
						<?php } ?>	
						<?php if($alreadyadmin !=''){?>
							<div class="fiche_candidat_alreadyadmin ">
								<?php echo $deja_membre;?> 
							</div>
						<?php } ?>	
					</div>
					
					<div class="fiche_candidat_content2">
						<h3><?php echo $label_engagement;?></h3>
						<div class="fiche_candidat_activity fiche_candidat_txt">						 
							<?php 
								$engagement='engagement'.$suffixe_lg;
								echo $$engagement; 
							?>						
						</div>
					
						<h3><?php echo $label_activite;?></h3>
						<div class="fiche_candidat_activity fiche_candidat_txt">						 
							<?php 
								$activite='activite'.$suffixe_lg;
								echo  $$activite; 
							?>						
						</div>
						
						<h3><?php echo $label_competences;?></h3>
						<div class="fiche_candidat_competences fiche_candidat_txt">						
							<?php 
								$competences='competences'.$suffixe_lg;
								echo $$competences; 
							?>
						</div>
						
						<h3><?php echo $label_raisons;?></h3>
						<div class="fiche_candidat_competences fiche_candidat_txt">						
							<?php 
								$raisons='raisons'.$suffixe_lg;
								echo $$raisons ; 
							?>
						</div>
						
						<h3><?php echo $label_futur;?></h3>
						<div class="fiche_candidat_futur fiche_candidat_txt">							
							<?php 
								$futur='futur'.$suffixe_lg;
								echo $$futur ; 
							?>						
						</div>
						
						<?php if($video !=''){?>
							<div class="fiche_candidat_video iframe__container">
								 <iframe src="<?php echo $video;?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
							</div>							
						<?php } ?>
						
						<div>
							<br/>&nbsp;
							<br/>&nbsp;
						</div>
						
					</div>
					<div>
						<a href="<?php echo $href_retour;?>"><?php echo $retour_liste;?> </a>
					</div>
				</div>       

			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<nav class="nav-vie-cooperative visible-mobile hidden-desktop" >
			<?php
            $args = array(
              'menu'  => $menu,
              'container'       => '', 
              'menu_class'      => 'nav nav-chevron', 
              'echo'            => true,
              'fallback_cb'     => false,
              'depth'           => 2);
            wp_nav_menu($args);
            ?>
	</nav>
</div>
</div>
</article>


<?php get_footer(); ?>
