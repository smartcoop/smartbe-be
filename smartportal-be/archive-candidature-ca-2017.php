<?php 
/**
 * Template for the archives of BET's Publications
 */
get_header();
?>
<style>
.vignette_candidat{float:left;width:160px;padding:15px 15px 0px 15px; border-radius:3px;background:#fff;margin: 0 15px 15px 0;min-height:280px}
.candidat_img {width:140px;height:140px;overflow:hidden;border:1px solid #f5f5f5;margin-left:10px;border-radius:5px}
h2{color:#dd2222;}
.colonne_categorie{float:left;width:100%;}
.chapo{color:#333}
.grey{color:#999}
.candidat_titre{text-align:center;min-height:87px;}
.candidat_cat{text-align:center;color:#666;font-size:10px;font-weight:bold;}
.cat_nl{color:rgb(153, 153, 153);}
.rose{color:#ff4053;}
</style>
<?php  query_posts('post_type=candidature-ca-2017&showposts=200');
	if (have_posts()): ?>

	<section id="content" role="main" class="container blog-archive-list">	  
		<header id="page-title" class="page-leader">
			<h1 >
			  <?php
				echo 'Campagne 2017 : ';
			  ?>
			</h1>
			<h2 class="chapo">Elisez le conseil d’administration de votre coopérative !    <span class="grey">Kies de Raad van Bestuur van je coöperatie!</span></h2>
		</header>
		<div class="chapo">
			Découvrez sur cette page les candidats au conseil d’administration de la coopérative Smart au fur et à mesure de leur inscription. Le vote aura lieu le <strong>20 juin 2017</strong> lors de l’Assemblée Générale à Bruxelles. Toutes les modalités d’élection des candidats seront spécifiées dans le R.O.I (Règlement d’Ordre Intérieur) et communiquées via notre site.<br/>
			Chaque candidat se présente dans sa langue et a la possibilité de se présenter dans une deuxième langue (NL/DE/EN).<br/>
			<span class="grey">Ontdek hier gaandeweg de nieuwe kandidaten voor de Raad van Bestuur van de Smart-coöperatie. De nieuwe Raad van bestuur zal verkozen worden <strong>op 20 juni 2017</strong> tijdens de Algemene Vergadering in Brussel. De verkiezingsmodaliteiten zullen beschreven worden in het huishoudelijk reglement op onze website.<br/> 
			Elke kandidaat stelt zich voor in zijn/haar taal en kan zich, als hij/zij dat wil, in een tweede taal presenteren (Frans/Duits/Engels).<br/> 
			</span>
			<br/>
				Faites campagne ou soutenez votre candidat préféré !<br/>
			<span class="grey">	Stel je kandidaat of voer campagne voor de kandidaat van jouw keuze!</span>
			<br/>
		</div>
		
	  
		<div class="chapo">
			<br/>  
			<!--Envie de vous porter candidat aussi ? Postulez <a href="http://smartbe.be/fr/formulaire-de-candidature-ca/">ici</a><br/> -->
			Envie de découvrir les missions du conseil d’administration ? C’est par <a href="http://smartbe.be/fr/devenez-membre-du-conseil-dadministration-de-la-cooperative/">ici</a><br/>  
			<!--<span class="grey">Interesse? Vul hier je kandidatuur  <a href="http://smartbe.be/nl/formulaire-de-candidature-ca/">in</a>. <br/> -->
			Wil je meer weten over de rol van de Raad van Bestuur? Klik  <a href="http://smartbe.be/nl/stel-je-kandidaat/">hier</a><span class="grey">
			<!--<h2>Fin des candidatures : 15 juin 2017 à midi</h2>
			<h2 class="rose">Einde van de kandidaturen : 15 juni 2017 om 12u </h2>-->
			<br/>
			<br/>	
		</div>		
		<?php
		  //$post_counter = 0;
		echo '<div id="catA" class="colonne_categorie">';
			   //echo '<h2>Catégorie A</h2><br/>';
			while(have_posts()):  // post-types = candidature-ca-2017 - toutes les langues - en random
				the_post();			
				// les candidatures Cat A
				
					//if( get_post_meta($post->ID, 'Categorie', true)==='Catégorie A' || get_post_meta($post->ID, 'Categorie', true)==='Categorie A'){					
						// uniquement les posts qui ne sont pas une traduction
						if(icl_object_id($post->ID,'post',true,'fr')== $post->ID && $post->ID != 19429 ){
							echo '<div class="vignette_candidat">';	
								if($post->ID == 19409){
									$link_fiche='http://smartbe.be/nl/news/candidature-ca-2017/gommers/';
								}else{
									$link_fiche=get_permalink();
								}
							   echo '<a href="'.$link_fiche.'">';
										echo '<div class="candidat_img">';
											if ( get_the_post_thumbnail( $post->ID, 'thumbnail_large', array( 'class' => 'alignleft' ) ) !='' ) { // check if the post has a Post Thumbnail assigned to it.
											  echo get_the_post_thumbnail( $post->ID, 'thumbnail_large', array( 'class' => 'alignleft' ) );
											}else{						
												echo '<img src="http://smartbe.be/wordpress/../media/uploads/2016/06/ingognito-286x300.png">';
											}
										echo '</div>';
										echo '<div class="candidat_titre">';
											echo '<h2>';												
												echo get_post_meta($post->ID,'Prenom',true).' ';
												the_title();
											echo '</h2>';
										echo '</div>';
										
									echo '</a>';
									echo '<div class="candidat_cat">';
										if(get_post_meta($post->ID, 'Categorie', true)=='Catégorie A' || get_post_meta($post->ID, 'Categorie', true)=='Categorie A'){
											echo 'Catégorie / <span class="cat_nl">Categorie</span> A';
										}else{
											echo 'Catégorie / <span class="cat_nl">Categorie</span> B';
										}										
									echo '</div>';									
							echo '</div>';
						}				
					//}				
			endwhile;
		echo '</div>';	
		/*echo '<div id="catB" class="colonne_categorie">';
			   echo '<h2>Catégorie B</h2><br/>';
			while(have_posts()):  // post-types = candidature-ca-2017 - toutes les langues - en random
				the_post();			
				// les candidatures Cat A
				
					if( get_post_meta($post->ID, 'Categorie', true)==='Catégorie B'){					
						// uniquement les posts qui ne sont pas une traduction
						if(icl_object_id($post->ID,'post',true,'')== $post->ID){
							echo '<div class="vignette_candidat">';							
							   echo '<a href="'.get_permalink().'">';
										echo '<div class="candidat_img">';
											if ( get_the_post_thumbnail( $post->ID, 'thumbnail_large', array( 'class' => 'alignleft' ) ) !='' ) { // check if the post has a Post Thumbnail assigned to it.
											  echo get_the_post_thumbnail( $post->ID, 'thumbnail_large', array( 'class' => 'alignleft' ) );
											}else{						
												echo '<img src="http://smartbe.be/wordpress/../media/uploads/2016/06/ingognito-286x300.png">';
											}
										echo '</div>';
										echo '<div class="candidat_titre">';
											echo '<h2>';												
												echo get_post_meta($post->ID,'Prenom',true).' ';
												the_title();
											echo '</h2>';
										echo '</div>';
									echo '</a>';
							echo '</div>';
						}				
					}				
			endwhile;
		echo '</div>';*/
		?>   		
	</section>
<?php else : ?>
	<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>
<?php get_footer(); ?>