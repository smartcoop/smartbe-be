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
get_header(); ?>
<style>
.vignette_candidat{float:left;width:160px;padding:15px 15px 0px 15px; border-radius:3px;background:#fff;margin: 0 15px 15px 0;min-height:240px}
.candidat_img {width:140px;height:140px;overflow:hidden;border:1px solid #f5f5f5;margin-left:10px;border-radius:5px}
h2{color:#dd2222;}
.colonne_categorie{float:left;width:100%;}
.chapo{color:#333}
.grey{color:#999}
.candidat_titre{text-align:center;min-height:47px;}
.candidat_cat{text-align:center;color:#666;font-size:10px;font-weight:bold;line-height:12px}
.cat_nl{color:rgb(153, 153, 153);}
</style>
<?php  query_posts('post_type=intervenant-ca-2017&showposts=50');if (have_posts()): ?>

<section id="content" role="main" class="container blog-archive-list">
  
	<header id="page-title" class="page-leader">
		<h1 >
		  <?php
			echo 'INTERVENANTS ASSEMBLEE GENERALE LET’S COOP 2017 <br/><span class="grey">SPREKERS ALGEMENE VERGADERING LET’S COOP 2017</span>';
		  ?>
		</h1>
	</header>
	<div class="chapo">
		Consultez le programme entier <a href="http://smartbe.be/fr/le-programme-de-la-journee/">ici</a><br/> 

		<span class="grey">Bekijk <a href="http://smartbe.be/fr/le-programme-de-la-journee/">hier</a> het volledige programma</span> <br/><br/>

	</div>
    <div>
		<?php
		  //$post_counter = 0;
		echo '<div id="catA" class="colonne_categorie">';
			   //echo '<h2>Catégorie A</h2><br/>';
			while(have_posts()):  // post-types = candidature-ca-2017 - toutes les langues - en random
				the_post();			
				// les candidatures Cat A
				
					//if( get_post_meta($post->ID, 'Categorie', true)==='Catégorie A' || get_post_meta($post->ID, 'Categorie', true)==='Categorie A'){					
						// uniquement les posts qui ne sont pas une traduction
						if(icl_object_id($post->ID,'post',true,'fr')== $post->ID){
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
										echo '<div class="candidat_cat">';
											echo get_post_meta($post->ID,'fc_intervenant_organisation',true);				
										echo '</div>';
										
									echo '</a>';
									
									
							echo '</div>';
						}				
					//}				
			endwhile;
		echo '</div>';	
		
			  ?>    
		
	</div>

  
  <?php //get_sidebar('subfooter'); ?>
</section>


<?php else : ?>
<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>