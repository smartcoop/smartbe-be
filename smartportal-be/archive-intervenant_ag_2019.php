<?php
include 'traductions.php';
$mypod = pods('intervenant_ag_2019');	
$params = array(
    'order'          => 'ASC',          // Just the post type
    'limit' => 0              // Show all available post
); 
$mypod->find($params);
get_header();
$lienframe='';
//$lien_page_ag="/$lg/assemblee-generale-2019/?req=$lienframe";
if($_GET['req'] == 'lienframe'){
	echo '<style>
	 header, footer {display:none !important;}	 
	 #masterfooter {display:none !important;}	 
	 #cookie-notice{display:none;}
	</style>';
	$lienframe='lienframe';
	$lien_page_ag="";
}
?>
<section id="content" role="main" class="ag2019">
	<div class="span3 ag_menu_conteneur" >
		<ul class="ag_menu" >
			<li ><a href="<?php echo $lien_page_ag;?>" target="_parent"><b><?php echo $assemblee;?></b></a>
				<ul>
					<li ><a href="/<?php echo $lg;?>/news/workshop-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $programme;?></a></li>
					<li ><a href="/<?php echo $lg;?>/news/intervenant-ag-2019/?req=<?php echo $lienframe;?>"><?php echo $intervenants;?></a></li>
										
					<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-assemblee-generale-smart-1706-lille-62206407038"><?php echo $sinscrire_lille;?></a></li>		
					<li class="hidden-desktop"><a href="https://www.eventbrite.fr/e/billets-lets-coop-2019-18062019-bruxelles-62193747172"><?php echo $sinscrire_bxl;?></a></li>
				</ul>
			</li>
		</ul>         
	</div> 
	<div class="span10 ag_content">
		<h1 >
		  <?php
			 echo $titre_intervenants;
		  ?>
		</h1>	
		
		<?php		 
			echo '<div class="ag_workshops">';
				while ( $mypod->fetch() ) :
					// set our variables
					$formation = $mypod->id();
					$title = $mypod->display('title');
					$permalink = $mypod->display('permalink');
					$fonction_de_l_intervenant = $mypod->field('fonction_de_l_intervenant');
					$entite_representee = $mypod->field('entite_representee');
					$descriptif = $mypod->field('descriptif');				
					
					echo '<div class="ag_intervenant">';
						echo '<div>';
							echo '<a href="'.$permalink.'/?req='.$lienframe.'" ><h3 class="titre_intervenants">';										
								echo $title;
							echo '</h3></a>';
							echo '<div class="ag_descript">';
								echo $entite_representee.'<br/>';
							echo '</div>';
							echo '<a href="'.$permalink.'/?req='.$lienframe.'" >'. $plus.'</a>';
							
							
						echo '</div>';	
						echo '<div style="clear:both"></div>';
					echo '</div>';
									
				endwhile;
			echo '</div>';	
			
		?>  
		<div class="ag_col_droite">	
			<div class="ag_col_droite_fixe">
				<iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62206407038" frameborder="0" height="414" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>				
				<iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62193747172" frameborder="0" height="394" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>
			<div>
		</div>
	</div>
</section>
<?php get_footer(); ?>