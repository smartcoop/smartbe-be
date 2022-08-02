<?php
if($axe == "Mieux se connaître"){$etat_connaitre = 'selected="selected"';}
if($axe == "(Re-)penser son projet"){$etat_repenser = 'selected="selected"';}
if($axe == "Dépasser ses freins d’entrepreneur"){$etat_depasser = 'selected="selected"';}
if($axe == "Développer son activité"){$etat_developper = 'selected="selected"';}
if($axe == "Vendre son activité"){$etat_vendre = 'selected="selected"';}
if($axe == "Les financements"){$etat_finances = 'selected="selected"';}
if($axe == "Penser sa communication"){$etat_communication = 'selected="selected"';}
if($axe == "La communication digitale : les outils"){$etat_digitale = 'selected="selected"';}
if($axe == "Parfaire sa communication"){$etat_parfaire = 'selected="selected"';}
if($axe == "Les bases juridiques"){$etat_juridiques = 'selected="selected"';}
if($axe == "Prévention et sécurité"){$etat_securite = 'selected="selected"';}

?>
<div class="formation_form_recherche" >
	<header class="formation_form_title" >
		<h3>Rechercher une formation</h3>
	</header>
	<form action="/fr/formations-2022/" method="get">
		<div class="formation_form_section"  >
			<label for="name">Par mots clés :</label>
			<input type="text"  name="keyword" minlength="3" onchange="this.form.submit()" value="<?php echo $keyword;?>" onchange="this.form.submit()">
		</div>
		<div  class="formation_form_section">
			<label for="mail">Par thématique :</label>
			<select  name="axe" onchange="this.form.submit()">
				<option></option>
				<option value="Mieux se connaître" <?php echo $etat_connaitre;?>>Mieux se connaître</option>
				<option value="Re(penser) son projet" <?php echo $etat_repenser;?>>Re(penser) son projet</option>
				<option value="Dépasser ses freins professionnels" <?php echo $etat_depasser;?>>Dépasser ses freins professionnels</option>
				<option value="Développer son activité" <?php echo $etat_developper;?>>Développer son activité</option>
				<option value="Vendre son activité" <?php echo $etat_vendre;?> >Vendre son activité</option>
				<option value="Les financements" <?php echo $etat_finances;?>>Les financements</option>
				<option value="Penser sa communication" <?php echo $etat_communication;?>>Penser sa communication</option>
				<option value="La communication digitale : les outils" <?php echo $etat_digitale;?>>La communication digitale : les outils </option>
				<option value="Parfaire sa communication" <?php echo $etat_parfaire;?>>Parfaire sa communication</option>
				<option value="Les bases juridiques" <?php echo $etat_juridiques;?> >Les bases juridiques</option>
				<option value="Prévention et sécurité" <?php echo $etat_securite;?> >Prévention et sécurité</option>
			</select>
		</div>
		
		
		<div  class="formation_form_section">
			<a href="/fr/formations-2022/">Toutes les formations</a>
		</div>		
	</form>	
</div>
<div class="visible-desktop">
	<?php include 'formation-recherche-autre.php';?>
</div>