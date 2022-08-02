<?php 
include 'traductions.php';
get_header();
//supprimer le header et le footer de l'iframe dans le site français
$lienframe='';
//$lien_page_ag="/$lg/assemblee-generale-2019/?req=$lienframe";
if($_GET['req'] == 'lienframe'){
	echo '<style>
	 header,  #masterfooter {display:none !important;}	 
	 header,  #masterfooter {display:none !important;}	 
	 #cookie-notice{display:none;}
	</style>';
	$lienframe='lienframe';
	$lien_page_ag="";
}
?>
<script>
	
     function Scrolldown() {
    window.location.hash = '#hautpage';
}


window.onload = Scrolldown;
</script>
<section id="content" role="main" class="ag2019">
	<div class="span3 ag_menu_conteneur" >
		<ul class="ag_menu" >
			<li ><a href="<?php echo $lien_page_ag;?>" target="_parent"><b><?php echo $assemblee;?></b></a>
				<ul>
					<li ><a href="/<?php echo $lg;?>/news/workshop-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $programme;?></a></li>
					<li ><a href="/<?php echo $lg;?>/news/intervenant-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $intervenants;?></a></li>					
					<!--<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-assemblee-generale-smart-1706-lille-62206407038"><?php //echo $sinscrire_lille;?></a><div class="clearfix"></div></li>		
					<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-18062019-bruxelles-62193747172"><?php //echo $sinscrire_bxl;?></a></li>-->
					
				</ul>
			</li>
		</ul>         
	</div> 
	<div class="span10 ag_content">
		<?php if (have_posts()): ?>
			<?php
				while(have_posts()):
					the_post();
					$postid = get_the_ID();	
					global $post;
					// get pods object
					$mypod = pods( $post->post_type, $post->ID );			
					// set our variables
					$title = $mypod->display('title');
					$permalink = $mypod->display('permalink');
					$title = $mypod->display('title');
					$permalink = $mypod->display('permalink');
					$fonction = $mypod->display('fonction_de_l_intervenant');
					$entite = $mypod->display('entite_representee');
					$descriptif = $mypod->display('descriptif');		
			?>
					
						
						<div class="ag_col_gauche">						
							<h1><?php echo $title; ?></h1>
							<div class="ag_descriptif">
								<?php echo $descriptif?>
							</div>
							<div  class="ag_infos">
								<h3><?php echo $fonction; ?></h3>
								<?php echo $entite; ?>
							</div>
						</div>	
						<div class="ag_col_droite">	
							<!--<iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62206407038" frameborder="0" height="414" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>				
							<iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62193747172" frameborder="0" height="394" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>-->
						</div>
						<div class="clearfix">		

			<?php endwhile; ?>
		</div>
		 <?php endif; ?>
</section>
<?php get_footer(); ?>