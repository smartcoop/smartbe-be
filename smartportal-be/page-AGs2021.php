<?php
/*
Template Name: AGs2021
*/
if (ICL_LANGUAGE_CODE=='nl'){
	$lg = 'nl';
	$prog_detail="Gedetailleerd programma";
	$the_content='Ondanks de aanhoudende gezondheidsmaatregelen en afstandsregels hebben we wel ontzettend veel zin om jullie terug te zien. We hebben het format van onze jaarlijkse algemene vergadering dan ook grondig omgegooid. <br/>
Sommige kantoren bieden hun leden de mogelijkheid om gezellig bijeen te komen, al dan niet de hele dag, samen naar de live-uitzending van de <a href="/nl/algemene-vergadering-2021/"><b>algemene vergadering</b></a> te kijken of voor een workshop ...  
<br/><br/>
Blijf je toch liever thuis? Dan kan je ook deelnemen aan een rijkgevuld onlineprogramma.  
Je ontdekt het programma hieronder. Maak zeker al op voorhand je keuze tussen de evenementen op basis van de locatie of de taal, en of je fysiek of op afstand wil deelnemen … en schrijf je vanaf 26 mei in op deze pagina.<br/><br/> ';
	$menu="De coöperatie";
}else{	
	$lg = 'fr';
	$menu="La coopérative";
	$prog_detail="Programme détaillé";
	$the_content='Afin de combiner règles sanitaires, jauges et notre envie de vous revoir, le format de notre célèbre <a href="/fr/assemblee-generale-2021"><b>assemblée générale</b></a> annuelle a été modifié de fond en comble. 
Certains bureaux proposent à leurs membres de rejoindre leurs événements locaux pour un moment convivial ou pour toute la journée, pour une diffusion en direct de l’assemblée générale ou pour un atelier... <br/>
Vous préférez rester chez vous? Vos équipes vous ont préparé un riche programme en visio.  
<br/><br/>

Découvrez sans plus attendre le programme. <br/>
On vous conseille vivement de filtrer directement les évènements ; que ce soit par le lieu, par le format, visio ou présentiel, ou encore par la langue. 

<br/><br/>';
}
?>


<?php get_header(); ?>

<article>

	<!-- Row for main content area -->
	
	<div>		
		
		<div style="width:98%;" >
			<header class="page-leader" id="overview">
				<h1><?php the_title();?></h1>
			</header>
			<?php echo $the_content; ?>
			<div class="ag21_inscription" id="inscription"  >
				<script type="text/javascript" src="https://evenium.net/ng/js/widgets/web-widget.js?name=ticketing&from=js&siteName=q9bjcbpf&loc=<?php echo $lg;?>"></script>
				
			</div>
			<div class="ag21_programme"  id="programme" >
				<h2><?php echo $prog_detail ;?></h2>
				
				<script type="text/javascript" src="https://evenium.net/ng/js/widgets/web-widget.js?name=program&siteName=q9bjcbpf&from=js&loc=<?php echo $lg;?>"></script>
			</div>
		</div>
		
	</div>
</article>
<div class="clear-both"></div>

<?php get_footer(); ?>
