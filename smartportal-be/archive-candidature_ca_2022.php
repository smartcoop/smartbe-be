<?php 
	/**
 * Template for the archives Candidature CA 2022
 */
	get_header(); 
	
	$lg=ICL_LANGUAGE_CODE; 
	if($lg =='nl'){
		$suffixe_lg = '_nl';
		$titre = 'Kandidaten voor de Raad van Bestuur van de coöperatie Smart';
		$entite_label = 'Entiteit:';
		$menu="De coöperatie";
		$catA = 'Categorie A: Loontrekkend ondernemer';
		$catB = 'Categorie B: Werknemer van het vaste personeel';
		$catC = 'Categorie C: Extern partner, klant, opdrachtgever';
	}else{
		$suffixe_lg = '_fr';
		$titre = 'Candidats au Conseil d\'Administration de SmartCoop';
		$entite_label = 'Représente l\'entité';
		$menu="La coopérative";
		$catA = 'Catégorie A : Entrepreneur·se salarié·e';
		$catB = 'Catégorie B : Travailleur·euse des équipes mutualisées';
		$catC = 'Catégorie C : Partenaire externe, client, donneur d\'ordre';
	}

$args = array(
    'post_type' => 'candidature_ca_2022',
    'orderby' => 'rand',
	'posts_per_page' => -1
);

$query = new WP_Query($args);
	
	
?>

<div>
	
	<nav class="nav-vie-cooperative visible-desktop span4" >
	    <?php
			global $post;
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

	<div  class="span10" >
		<header id="page-title" class="page-leader">
			<h1><?php echo $titre;?> 			</h1>			
		</header>
		<div class="candidats_container">
			<?php if ($query->have_posts()) : ?>
				<?php while ($query->have_posts()) : $query->the_post();
					$mypod = pods( $post->post_type, $post->ID );
					$podid = $mypod->id();
					$prenom = $mypod->display('prenom');
					$nom = $mypod->display('nom');
					$permalink = $mypod->display('permalink');
					$alreadyadmin = $mypod->display('alreadyadmin');
					$entite = $mypod->display('entite');
					$cat_smart = $mypod->display('categorie');
					$eligible = $mypod->display('eligible');
					
				?>		
					<?php if($eligible == 'Oui' || $eligible == 'oui' ){ ?>
					
						<div class="candidat_bloc">
							<div class="candidat_photo">
								<a href="<?php echo the_permalink();?>"><?php the_post_thumbnail();?></a>		
							</div>
							<div class="candidat_nom">
								<a href="<?php echo the_permalink();?>"><?php echo $prenom.' '.$nom;?></a>				
							</div>
							<div class="candidat_pour">
								<?php 
									if($cat_smart == 'Categorie A: Loontrekkend ondernemer' || $cat_smart == 'Catégorie A : Entrepreneur·se salarié·e'){
										echo $catA ; 
									}else if($cat_smart == 'Categorie B: Werknemer van het vaste personeel' || $cat_smart == 'Catégorie B : Travailleur·euse des équipes mutualisées'){
										echo $catB ;
									}else if($cat_smart == "Categorie C: Extern partner, klant, opdrachtgever" || $cat_smart =='Catégorie C : Partenaire externe, client, donneur d\'ordre' ){
										echo $catC  ;
										}
								?>
							</div>
							<div class="candidat_entite">
								<?php echo $entite;?>
							</div>
						</div>	
					<?php } ?>
				<?php endwhile; ?>
			</div>					
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


<?php get_footer(); ?>
