<?php
	$url = 'https://ws-desk-api.smartbe.be/shareholder/count';	
	$data =  wp_remote_get($url); // put the contents of the file into a variable
	$json = json_decode(wp_remote_retrieve_body($data), true);
	
if (ICL_LANGUAGE_CODE=='nl'){
	$lien_cest_quoi =get_the_permalink(2894);
	$lien_facebook="https://www.facebook.com/SmartCoopBelgie/";
}else{	
	$lien_cest_quoi =get_the_permalink(27);
	$lien_facebook="https://www.facebook.com/SMartBeFR/";
}
?>
<div  class="hp-bloc hp-bloc-1-6 hidden-desktop hp-bloc-cest-quoi">
	<span class="ft-w-8 ft-r"><a href="<?php echo $lien_cest_quoi;?>"><?php echo $cest_quoi;?></a></span>
</div>
<div class="hp-bloc  hp-bloc-1-1">
	<div  class="hp-bloc-1-1-1" >
		<div class="icone-w">
			<a href="https://twitter.com/SMartBe_FR" target="_blank"><i class="fab fa-twitter icone-w-content"></i></a>
		</div> 
		<div class="icone-w">
			<a href="https://www.linkedin.com/company/smartbefr/" target="_blank"><i class="fab fa-linkedin-in icone-w-content"></i></a>
		</div>
		<div class="icone-w-noborder">
			<a href="<?php echo $lien_facebook;?>" target="_blank"> <i class="fab fa-facebook-f icone-w-fb"></i></a>
		</div>
		<div class="icone-w">
			<a href="https://www.youtube.com/channel/UCWfo_GiuDq6qNiW2IT5JOJg" target="_blank"><i class="fab fa-youtube  icone-w-yt"></i></a>
		</div>
	</div>
	<div  class=" hp-bloc-1-1-2">
		<div class="ft-s-s ft-upp ft-w" >
			<?php echo $coopsmart;?>
		</div>
		<div class="ft-s-xxl ft-w-7 ft-w" >
			<?php echo $json;?>
		</div>
		<div class="ft-s-s ft-upp ft-w" style="margin: 5px 0 0 0;">
			<?php echo $societaires;?>
		</div>
		<div class=" ft-w-8 ft-upp"  style="margin: 2px 0 0 0">
			<a href="/fr/la-cooperative-en-pratique/" class="link-w ft-w "><?php echo $et_vous;?></a>
		</div>			
	</div>
</div>

<div class="hp-bloc hp-bloc-1-3" >
	<div class="ft-s-l f-w-7 ">
		<?php echo $pas_encore_membre;?>
	</div>
	<div ><a href="<?php echo $inscrivez_vous_lien;?>" class="ft-w-7  ft-s-xl ft-r"><?php echo $inscrivez_vous;?></a></div>
	<div class="ft-w-4  ft-line-height-15"><?php echo $inscrivez_vous_plus;?></div>	
</div>
<div class="hp-bloc hp-bloc-1-2" >
	<span class="ft-w-8 ft-w ft-upp"><?php echo $kronik;?></span><br/>
</div>
<div class="hp-bloc hp-bloc-1-5">
	<span class="ft-b ft-s-l ft-w-8 ft-upp" style="line-height:1px!important"><?php echo $decouvrez_formations;?></span>
</div>
<div class="hp-bloc hp-bloc-1-4" >
	<span class="ft-w-8 ft-w ft-upp "><?php echo $vie_coop;?></span><br/>
	
	<span class="bullet-s ft-b">― </span><a href="" class="ft-w"><?php echo $coop_pratique;?></a><br/>
	<span class="bullet-s ft-b">― </span><a href="<?php echo $lien_sip;?>" class="ft-w link-g-l"><?php echo $label_sip;?></a><br/>
	<?php echo $hp_lienag;?>
	<?php echo $ajustement_hauteur;?>
</div>
<div class="hp-bloc hp-bloc-1-5" >
	<span class="ft-b ft-s-l ft-w-8"><?php echo $agora;?></span><br/>
	<div class="ft-g  ft-line-height-15"><?php echo $agora_plus;?></div>
</div>
<div  class="hp-bloc hp-bloc-1-6" >
	<span class="ft-w-8 ft-w ft-upp "><?php echo $offres_emploi;?></span>
</div>
