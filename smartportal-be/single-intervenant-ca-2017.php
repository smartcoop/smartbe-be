<?php 
get_header();?>
<style>
.retour_liste{margin-botom:25px;}
#fiche_candidat h4{color:rgb(111, 105, 93); border-bottom:1px solid grey;}
.identity_row{font-weight:bold;}
#fiche_candidat label{display:inline;color:rgb(111, 105, 93);font-weight:normal;font-size:18px}
.fiche_titre{font-family:ars-maquette-web, "Helvetica Neue", Arial, Helvetica, sans-serif;font-size:22px;color:rgb(221, 34, 34);}
.bloc_catB{padding-left: 40px}
.bloc_editor{background:#ececec;padding:30px;margin:40px}
.bloc_texte{background:#fff;padding:10px;margin-top:20px;min-height:200px;border-radius:3px}
.bloc_texte h4{background-color:rgb(221, 34, 34);color:#fcfcfc !important;padding:10px 20px;border-radius:3px 3px 0 0;margin-top:0;font-size:18px;}
.bloc_identity{float:left;width:30%;}
.bloc1{min-width:200px;margin-right:20px;margin-bottom:10px;}
.bloc1 img{border:10px solid #fff;border-radius:3px;width:100%}
.bloc2{float:right;width:60%;background:#fff;padding:20px;border-radius:3px;min-width:300px;}
.identity_row{margin-top:6px}
.bloc_reponse{padding:0 40px;}
.largeur50{float:left;width:45%;}
.align-right{float:right;text-align:right;}
.bouton{background-color:rgb(221, 34, 34);border-radius:3px;color:#fff;width:auto;padding: 6px;font-size:11px}
.row-btn{margin-top:25px}
</style>

<?php if (have_posts()): ?>
	<?php  while(have_posts()): 
				the_post();
				$postid = get_the_ID();
	?>  
		<article id="content" role="main" class="container">
			<div class="retour_liste"><a href="http://smartbe.be/fr/news/intervenant-ag-2017/">< Retour à la liste des intervenants</a><br/><br/></div>		
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
					<div class="fiche_titre"><?php echo get_post_meta( get_the_ID(), 'Prenom',true ); ?> <?php the_title(); ?><br/></div>
					<div>
						<h3><?php echo get_post_meta( get_the_ID(), 'fc_intervenant_organisation',true ); ?>
						</h3>
					</div>
					<div>
						<?php echo get_post_meta( get_the_ID(), 'fc_intervenant_fonction',true ); ?>
						<br/><br/>
					</div>
					<?php echo the_content();?><br/><br/>
				</div>					
			</div>	
			<div class="clearfix"><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></div>			
			<div>
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
			</div>
		</article><!-- /content -->
	<?php endwhile; ?>
    
<?php else : ?>
	<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>