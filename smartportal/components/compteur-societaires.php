<?php
	$url = 'https://ws-desk-api.smartbe.be/shareholder/count';	
	$data =  wp_remote_get($url); // put the contents of the file into a variable
	$json = json_decode(wp_remote_retrieve_body($data), true);

?>
<?php If (ICL_LANGUAGE_CODE=='fr') : ?>	
	<div >
		<div class="well" style="margin-bottom: 0; padding-top: 24px; height: 280px">
			<h2  class="text-center">La coopérative Smart</h2> 
			<hr class="page-divider" style="margin: 24px auto 18px;">	
			<h4 class="text-center"><?php echo date('d/m/Y');?></h4>			
			<h2 class="text-center">Déjà <?php echo $json;?></h2>
			<h2 class="text-center"> sociétaires! </h2>
			<?php if(! is_page('18923')){?>			
				<div class="text-center" style="margin-top:20px">
					<a class="btn btnCoop"  href="http://smartbe.be/fr/la-cooperative-en-pratique/ ">ET VOUS?</a>	
				</div>
			<?php } ?>
		</div> 
	</div>	
<?php endif; ?>  

<?php If (ICL_LANGUAGE_CODE=='nl') : ?> 
	<div >
		<div class="well" style="margin-bottom: 0; padding-top: 24px; height: 256px">
			<h2  class="text-center">De Smart Coöperatie </h2>
			<hr class="page-divider" style="margin: 24px auto 18px;">	
			<h4 class="text-center"><?php echo date('d/m/Y');?></h4>			
			<h2 class="text-center">Al <?php echo $json;?></h2>
			<h2 class="text-center"> vennoten! </h2>
			<?php if(! is_page('18947')){?>		
				<div class="text-center" style="margin-top:20px">
					<a class="btn btnCoop"  href="http://smartbe.be/nl/de-cooeperatie-smart-praktisch/">EN U?</a>			
				</div>
			<?php } ?>
		</div> 
	</div>
<?php endif; ?>