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
get_header(); ?>
<style>
.retour_liste{margin-botom:25px;}
#fiche_candidat h4{color:rgb(111, 105, 93); border-bottom:1px solid grey;}
.identity_row{font-weight:bold;}
#fiche_candidat label{display:inline;color:rgb(111, 105, 93);font-weight:normal;font-size:18px}
.fiche_titre{font-family:"cerebri_sans", "Helvetica Neue", Arial, Helvetica, sans-serif;font-size:22px;color:#ff4053;}
.bloc_catB{padding-left: 40px}
.bloc_editor{background:#ececec;padding:30px;margin:40px}
.bloc_texte{background:#fff;padding:10px 10px 30px 10px;margin-top:20px;min-height:200px;border-radius:3px}
.bloc_texte h4{background-color:#ff4053;color:#fcfcfc !important;padding:10px 20px;border-radius:3px 3px 0 0;margin-top:0;font-size:18px;}
.bloc_identity{float:left;width:30%;}
.bloc1{min-width:200px;margin-right:20px;margin-bottom:10px;}
.bloc1 img{border:10px solid #fff;border-radius:3px;width:100%}
.bloc2{float:right;width:60%;background:#fff;padding:20px;border-radius:3px;min-width:300px;}
.identity_row{margin-top:6px}
.bloc_reponse{padding:0 40px;}
.largeur50{float:left;width:45%;}
.align-right{float:right;text-align:right;}
.bouton{background-color:#ff4053;border-radius:3px;color:#fff;width:auto;padding: 6px;font-size:11px}
.row-btn{margin-top:25px}
</style>


<?php if (have_posts()): ?>
<?php
while(have_posts()): 
  the_post();
  $postid = get_the_ID();
  ?>
  <?php
	// Clés de traduction
	$lang=get_bloginfo("language");

	if($lang == "fr-FR") {
		$retour_liste='Retour à la liste des candidats ';
		$femme='Femme';
		$homme='Homme';
		$email='Adresse e-mail';
		$tel='Téléphone';
		$langue='Langue(s) pratiquée(s)';
		$residence='Lieux de résidence et de travail';
		$categorie='Catégorie de sociétaire';
		$cat_label='Catégorie';
		$structure_nom='Nom de la structure';
		$structure_siege_social='Siège social';
		$structure_forme_juridique='Forme juridique';
		$website='Website';
		$voir_cv='Voir son CV';
		$traduction='Traduction disponible en ';
		$metier='Votre métier, votre activité :';
		$apport="Que pouvez-vous apporter au projet Smart ? Quelles sont les compétences et expériences que vous souhaitez apporter au sein du conseil d’administration ?";
		$pourquoi="Pourquoi vous présentez-vous au conseil d’administration ?";
		$futur="Comment voyez-vous Smart dans le futur ? Quelle est votre vision à terme du projet ?";
	} 

	if($lang == "en-US") {
		$retour_liste='Back to the list';
		$femme='Woman';
		$homme='Man';
		$email='Email address';
		$tel='Telephone';
		$langue='Language(s) known';
		$residence='Place(s) of residence and work';
		$categorie='Membership category';
		$cat_label='Category';
		$structure_nom='Name of entity';
		$structure_siege_social='Head office';
		$structure_forme_juridique='Legal form';
		$website='Website';
		$voir_cv='See her/his resumé';
		$traduction='Translation available in ';
		$metier='Business and activity:';
		$apport='What can you bring to the Smart project? Which are the skills and experiences that you intend to provide to the Board?';
		$pourquoi='Which are your reasons to apply as a member of the board of directors of the Smart cooperative?';
		$futur='How do you see Smart in the future? What is your vision of the Smart project?';
	}
	if($lang == "de-DE") {
		$retour_liste='Back to the list';
		$femme='Frau';
		$homme='Mann';
		$email='E-mail';
		$tel='Telefon';
		$langue='Sprache(n)';
		$residence='Wohnsitz und Arbeitsplatz ';
		$categorie='Teilhaberkategorie';
		$cat_label='kategorie';
		$structure_nom='Name der Organisation';
		$structure_siege_social='Firmensitz';
		$structure_forme_juridique='Rechtsform';
		$website='Website';
		$voir_cv='Siehe Lebenslauf';
		$traduction='Übersetzung verfügbar auf ';
		$metier='Seine/ihre Arbeit, seine/ihre Tätigkeit';
		$apport='Was kann er/sie zum Projekt von Smart beitragen ? Welche Kompetenzen und Erfahrungen möchte er/sie im Rahmen des Verwaltungsrates einbringen ?';
		$pourquoi='Warum bewirbt er/sie sich für den Verwaltungsrat der Smart Kooperative?';
		$futur='Wie sieht er/sie SMart in der Zukunft? Welche langfristige Vision hat er/sie für das Projekt?';
	}
	if($lang == "nl-NL") {
		$retour_liste='Terug naar de lijst met kandidaten';
		$femme='Vrouw';
		$homme='Man';
		$email='Mailadres';
		$tel='Telefoon';
		$langue='Gesproken taal/talen';
		$residence='Woon- en werkplaats';
		$categorie='Vennoot van categorie ';
		$cat_label='Categorie';
		$structure_nom='Naam';
		$structure_siege_social='Hoofdkantoor';
		$structure_forme_juridique='Juridische vorm';
		$website='Website';
		$voir_cv='Bekijk het CV';
		$traduction='Vertaling beschikbaar in ';
		$metier='Beroep, activiteit :';
		$apport="Wat kan ik bijdragen aan het Smart project? Welke vaardigheden en ervaringen breng ik mee als lid van de Raad van Bestuur?
	";
		$pourquoi="Waarom stel ik me kandidaat voor de Raad van Bestuur van de Smart-coöperatie?";
		$futur='Hoe zie ik Smart in de toekomst? Wat is mijn langetermijnvisie voor het project? ';
	} 
?>
 
<article id="content" role="main" class="container">
	<div class="retour_liste"><a href="/?post_type=candidature-ca-2017"><?php echo $retour_liste;?></a><br/><br/></div>
  
			<?php //the_meta(); ?>
			<div   id="fiche_candidat">
				<div class="bloc_identity bloc1" >
					
					<?php
					 // if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. 
					  ?>
						<div class="featured-image">
							<?php
							if(get_the_post_thumbnail( $post->ID, 'thumbnail_large', array( 'class' => 'alignleft' ) )!=''){
								echo get_the_post_thumbnail( $post->ID, 'thumbnail_large', array( 'class' => 'alignleft' ) );
							}else{
								echo '<img src="http://smartbe.be/wordpress/../media/uploads/2016/06/ingognito-286x300.png">';								
							}
							
							?>
						</div>
					  <?php
					 // }
					?>
				</div>
				<div class="bloc_identity bloc2" style="float:right" >
					<div class="fiche_titre"><?php echo get_post_meta( get_the_ID(), 'Prenom',true ); ?> <?php the_title(); ?><br/><br/></div>
					<?php
						if (get_post_meta($post->ID, 'Sexe', true) == 'F' || get_post_meta($post->ID, 'Sexe', true) == 'V'  ) {						 
						  echo $femme;
						}
						if ( get_post_meta($post->ID, 'Sexe', true) == 'H' || get_post_meta($post->ID, 'Sexe', true) == 'M'   ) {						 
						  echo $homme;
						}
					?>
					<?php if (in_array('Oui', get_post_meta($post->ID, 'Email_public', true)) == true) {?>
						<div class="identity_row">
							<label><?php echo $email;?> : </label><?php echo get_post_meta( get_the_ID(), 'Email',true ); ?> 
						</div>
						<div class="identity_row">
							<label><?php echo $tel;?>  : </label>
							<?php echo get_post_meta( get_the_ID(), 'Telephone',true ); ?>
						</div> 
					<?php }	?>	
					
					<div class="identity_row">
						<label><?php echo $langue;?>  : </label>
						<?php 
							//echo get_post_meta( get_the_ID(), 'Langues_parlees' ); 
							if (in_array('FR', get_post_meta($post->ID, 'Langues_parlees', true)) == true) {
							   echo "FR | ";
							}
							if (in_array('NL', get_post_meta($post->ID, 'Langues_parlees', true)) == true) {
							    echo "NL | ";
							}
							if (in_array('DE', get_post_meta($post->ID, 'Langues_parlees', true)) == true) {
							    echo "DE | ";
							}
							if (in_array('EN', get_post_meta($post->ID, 'Langues_parlees', true)) == true) {
							    echo "EN | ";
							}
							if (in_array('IT', get_post_meta($post->ID, 'Langues_parlees', true)) == true) {
							    echo "IT | ";
							}
						?> 
					</div> 
					<div class="identity_row">
						<label><?php echo $residence;?>  : </label><?php echo get_post_meta( get_the_ID(), 'Lieu_residence',true ); ?> 
					</div>
					<div class="identity_row">
					<?php if(get_post_meta( get_the_ID(), 'Categorie',true ) !=''){ ?>
						<label><?php echo $categorie;?> :</label> <?php echo get_post_meta( get_the_ID(), 'Categorie',true ); ?> 
						<?php if(get_post_meta( get_the_ID(), 'Categorie',true ) =='Catégorie B' || get_post_meta( get_the_ID(), 'Categorie',true ) =='Categorie B'){ ?>
							<div class="bloc_catB">
								<label><?php echo $structure_nom;?> :</label> <?php echo get_post_meta( get_the_ID(), 'Nom_structure',true ); ?> <br/>
								<label><?php echo $structure_siege_social;?> :</label> <?php echo get_post_meta( get_the_ID(), 'Siege_social',true ); ?> <br/>
								<label><?php echo $structure_forme_juridique;?> :</label> <?php echo get_post_meta( get_the_ID(), 'Forme_juridique',true ); ?> <br/>							
							</div>
						<?php }?>
					<?php }?>
					</div>
					<?php if(get_post_meta( get_the_ID(), 'Website',true ) !=''){ ?>
						<div class="identity_row">
							<label><?php echo $website;?> : </label><a href="<?php echo get_post_meta( get_the_ID(), 'Website',true ); ?>" target="_blank" ><?php echo get_post_meta( get_the_ID(), 'Website',true ); ?></a> 
						</div>
					<?php }?>
					<div class="row-btn">
						<?php if(get_post_meta( get_the_ID(), 'CV',true ) !='' || get_the_ID() =='19571' || get_the_ID() =='19583'){ ?>
							<div class="largeur50">
								<?php
								$path_cv=get_post_meta( get_the_ID(), 'CV',true );
								if(get_the_ID() =='19854' || get_the_ID() =='19922'){
									$path_cv='https://www.linkedin.com/in/marielledemilie/';
									$voir_cv = 'LinkedIn';
								}
								if(get_the_ID() =='19571' || get_the_ID() =='19583'){$path_cv='https://www.linkedin.com/in/thomas-blondeel-a5298356/';}
								$lien_cv=str_replace('/home/www.smartbe.be/files/','http://smartbe.be/wordpress/../',$path_cv);
									$voir_cv = 'LinkedIn';
								 ?>
								<a href="<?php echo $lien_cv; ?>" class="btn btn-primary btn-filled" target="_blank"><?php echo $voir_cv;?></a> 
							</div>
						<?php }?>
						<?php
							echo '<div class="largeur50 align-right">';
								if(icl_object_id(get_the_ID(),'post',true,'nl') !== $post->ID  ){
									//if( $post->ID != '19888'){
										echo '<a href="'.get_permalink( icl_object_id(get_the_ID(),'post',true,'nl') ).'" class="btn btn-primary btn-filled">'.$traduction.' NL </a> ';
									//}
								}
								if(icl_object_id(get_the_ID(),'post',true,'fr') !== $post->ID){
									echo '<a href="'.get_permalink( icl_object_id(get_the_ID(),'post',true,'fr') ).'" class="btn btn-primary btn-filled">'.$traduction.' FR</a>';
								}
								if(icl_object_id(get_the_ID(),'post',true,'de') !== $post->ID){
									echo '<a href="'.get_permalink( icl_object_id(get_the_ID(),'post',true,'de') ).'" class="btn btn-primary btn-filled">'.$traduction.' DE</a>';
								}
								if(icl_object_id(get_the_ID(),'post',true,'en') !== $post->ID ){
									echo '<a href="'.get_permalink( icl_object_id(get_the_ID(),'post',true,'en') ).'" class="btn btn-primary btn-filled">'.$traduction.' EN</a>';
								}
							echo '</div>';
						?>
						<div class="clearfix"></div>
					</div>
					
				</div>
				<div class="clearfix"></div>
				
				<div class=" bloc_texte" >
					<h4><?php echo $metier;?></h4>
					<div class="bloc_reponse" >
						<?php echo get_post_meta( get_the_ID(), 'Metier',true ); ?>
					</div>
				</div>
				<div class=" bloc_texte" >
					<h4><?php echo  $apport;?></h4>
					<div class="bloc_reponse" >
						<?php echo get_post_meta( get_the_ID(), 'Competences',true ); ?>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class=" bloc_texte" >	
					<h4><?php echo  $pourquoi;?></h4>
					<div class="bloc_reponse" >
						<?php echo get_post_meta( get_the_ID(), 'Raisons_candidature',true ); ?> 
					</div>
				</div>
				<div class="bloc_texte" >
								
					<h4><?php echo  $futur;?></h4>
					<div class="bloc_reponse" >
						<?php echo get_post_meta( get_the_ID(), 'Vision_futur',true ); ?>
					</div>				
				</div>
				<div  >
					<br/><br/><br/>				
				</div>
				<div class="clearfix"></div>
				<?php if(is_user_logged_in()==true){?>
					<div class="bloc_editor">
						<div>
						<h3>Bloc visible uniquement des éditeurs :</h3>
						 Date de la candidature : <?php	echo get_the_date( 'd m Y', $post );?><br/>
						 Genre : <?php echo get_post_meta( get_the_ID(), 'Sexe',true ); ?> <br/>	
						 Besoin en traduction vers le : 
						 <?php 
								if (in_array('FR', get_post_meta($post->ID, 'Traduction', true)) == true) {
								  // Show the content here
								  echo "FR";
								}
								if (in_array('NL', get_post_meta($post->ID, 'Traduction', true)) == true) {
								  // Show the content here 
								  echo "NL";
								}
								if (in_array('DE', get_post_meta($post->ID, 'Traduction', true)) == true) {
								  // Show the content here
								  echo "DE";
								}
								if (in_array('EN', get_post_meta($post->ID, 'Traduction', true)) == true) {
								  // Show the content here
								  echo "EN";
								}
						 
						 ?><br/>	
						 Besoin en reformulation : <?php echo get_post_meta( get_the_ID(), 'Reformulation',true ); ?><br/>	
						 Moyen de contact privilégié : <?php echo get_post_meta( get_the_ID(), 'Moyen_contact',true ); ?><br/>	
						 Email et téléphone public:
							<?php
							if (in_array('Oui', get_post_meta($post->ID, 'Email_public', true)) == true) {
								  // Show the content here
								  echo "Oui";
								}	else{
									echo "Non";
								}	
							?>			 <br/>				
						 <?php echo 'Email : '.get_post_meta( get_the_ID(), 'Email',true ); ?><br/>
						 <?php echo 'Téléphone : '.get_post_meta( get_the_ID(), 'Telephone',true ); ?><br/>
						</div>
					</div>
				<?php } ?>
			
          <!-- AddThis Button BEGIN 
          <div class="addthis_toolbox addthis_default_style">
          <a class="addthis_button_facebook_share" fb:share:layout="button_count"></a>
          <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
          <a class="addthis_button_linkedin_counter"></a>
          <a class="addthis_button_tweet"></a>
          </div>
          <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528b6e06367e63a9"></script>
          <!-- AddThis Button END -->
     
</article><!-- /content -->

<?php endwhile; ?>
    
<?php else : ?>
<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>