<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till the content
 *
 */

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-7864256-15"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-7864256-15');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PD6D4LS');</script>
<!-- End Google Tag Manager -->

  <meta name= "robots" content= "index, follow">
  <meta name="google-site-verification" content="fhcuWRDBsoThSz9esVwecbvP6R_TbEPHtJ772Ql-LdQ" />
  <meta property="fb:app_id" content="172525162793917" />
<meta property="fb:admins" content="100022013350727" />
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php wp_title('') ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/ui/smartstrap/css/smartstrap.css?v<?php echo getfiledate(get_template_directory() . '/ui/smartstrap/css/smartstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/ui/css/theme.css?v<?php echo getfiledate(get_template_directory() . '/ui/css/theme.css'); ?>">
 


  <!-- BO -Favicon and images targeting Apple devices. -->
	<!-- Apple-specific image, although this is also used by other hardware/software. -->
	<link rel="apple-touch-icon" sizes="180x180" href="/ressources/favicon/apple-touch-icon.png?v=1.5">

	<!-- Regular favicons, using PNG for improved quality and compression. -->
	<link rel="icon" type="image/png" sizes="32x32" href="/ressources/favicon/favicon-32x32.png?v=1.5">
	<link rel="icon" type="image/png" sizes="16x16" href="/ressources/favicon/favicon-16x16.png?v=1.5">

	<!-- Web manifest for Android devices and others. -->
	<link rel="manifest" href="/ressources/favicon/site.webmanifest?v=1.5">

	<!-- Safari-specific SVG file for pinned tabs, favorites and Touch Bar buttons -->
	<link rel="mask-icon" href="/ressources/favicon/safari-pinned-tab.svg?v=1.5" color="#ff4054">

	<!-- Good old .ico file, used as a fallback as well as for legacy user agents. -->
	<link rel="shortcut icon" href="/ressources/favicon/favicon.ico?v=1.5">

	<!-- Proprietary configuration code (Microsoft, etc.). -->
	<meta name="msapplication-TileColor" content="#ff4054">
	<meta name="theme-color" content="#ffffff">
  <!-- EO -Favicon and images targeting Apple devices. -->	

	<link rel="stylesheet" href="/ressources/fontawesome/css/all.css" rel="stylesheet">
 <script type="text/javascript" src="<?php echo get_option('typekit_url') ?>"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <script src="<?php echo get_template_directory_uri() ?>/ui/js/modernizr.custom.14577.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script type="text/javascript">

	function showAdd(element){
		var hoveredElement = element;
		var cityurl;
		var coordStr = element.getAttribute('coords');
		var areaLocation = element.getAttribute('title');
			switch (areaLocation) {

				case 'Bruxelles':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Bru_add.png";
					break;
				case 'Brussel':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Bru_nl_add.png";
					break;

				case 'Antwerpen':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Antw_add.png";
					break;
				case 'Antwerpen_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Antw_nl_add.png";
					break;

				case 'Charleroi_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Char_nl_add.png";
					break;
				case 'Charleroi':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Char_add.png";
					break;

				case 'Eupen':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Eupen_add.png";
					break;
				case 'Eupen_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Eupen_nl_add.png";
					break;

				case 'Genk':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Genk_add.png";
					break;
				case 'Genk_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Genk_nl_add.png";
					break;

				case 'Gent':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Gent_add.png";
					break;
				case 'Gent_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Gent_nl_add.png";
					break;

				case 'Kortrijk':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Kort_add.png";
					break;
				case 'Kortrijk_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Kort_nl_add.png";
					break;

				case 'Liege':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Liege_add.png";
					break;
				case 'Liege_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Liege_nl_add.png";
					break;

				case 'Mons':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Mons_add.png";
					break;
				case 'Mons_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Mons_nl_add.png";
					break;

				case 'LLN':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/LLN_add.png";
					break;
				case 'LLN_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/LLN_nl_add.png";
					break;

				case 'Namur':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Namur_add.png";
					break;
				case 'Namur_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Namur_nl_add.png";
					break;

				case 'Tournai':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Tour_add.png";
					break;
				case 'Tournai_nl':
					cityurl = "http://smartbe.be/wordpress/../media/uploads/2016/03/Tour_nl_add.png";
					break;


			}

		document.getElementById("mapContact").src = cityurl;
	}
	function hideAdd(){

		var lang = "<?php if(ICL_LANGUAGE_CODE == "fr"){ echo "fr";} else {echo "nl";} ?>";
		console.log(lang);

		if(lang == "fr"){
			document.getElementById("mapContact").src = "http://smartbe.be/wordpress/../media/uploads/2016/03/SMART.png";
		}
		else{
			document.getElementById("mapContact").src = "http://smartbe.be/wordpress/../media/uploads/2016/03/SMART Nl.png";
		}
	}



</script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> name="hautpage" id="hautpage">

<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PD6D4LS"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
		  <!--[if lt IE 7]><p id="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

			<?php //get_template_part("components/smartbar", ""); ?>

	<?php get_template_part("components/masterhead", ""); ?>
	
		   <?php
				/*if (function_exists('icl_get_languages')) {
				  $languages = icl_get_languages('skip_missing=0&orderby=code');
				  
				  if(!empty($languages)){
					echo '<ul id="smartbar-language" class="right">';
					$first = true;
					foreach($languages as $l){
					  $class = '';
					  if($l['active']) $class = 'active';
					  if($first) $class .= " divider";
					  echo '<li class="' . $class . '">';
					  echo '<a title="'.$l['translated_name'].'" href="'.$l['url'].'">';
					  echo $l['language_code'];
					  echo '</a>';
					  echo '</li>';
					  $first = false;
					}
					echo '</ul>';
				  }
				}*/
				?>
		   <?php //if(ICL_LANGUAGE_CODE  == "nl"){?>
				<!--<div style="width:100%;text-align:center;">
					 <div style="margin:auto;width:55%; border:1px solid #d20; border-radius:6px;margin-top:15px; padding:1%;">
						<h2 style="color: #d22">Site en ledenzone wegens onderhoud niet toegankelijk op zaterdag 10 februari van 9 uur tot 17 uur</h2>
						<a href="/nl/onderhoudswerken">Meer weten</a>
					</div>
				</div>-->
			<?php //}else{ ?>
				<!--<div style="width:100%;text-align:center;">
					<div style="margin:auto;width:55%; border:1px solid #d20; border-radius:6px;margin-top:15px; padding:1%;">
						<h2 style="color: #d22">Le site et l'espace membres seront inaccessibles ce samedi 10 février de 9h à 17h pour des raisons de maintenance</h2>
						<a href="/fr/maintenance">En savoir plus</a>
					</div>
				</div>-->
			<?php //} ?>
	
