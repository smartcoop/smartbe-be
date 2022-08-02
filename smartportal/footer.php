<?php
	/**
		* The template for displaying the footer.
		*
		* Contains the footer and anything after
		*
	*/
	include("components/hp_trad.php");
?>

<?php dynamic_sidebar('bottom-page-widget'); ?>
<div class="clearfix"></div>
<?php if($_GET['req'] == 'frame' || isset($_GET['jour'])){
	echo '<style>
	 footer {display:none !important;}	 
	 #masterfooter {display:none !important;}	 
	 
	</style>';
	}
	if (ICL_LANGUAGE_CODE=='nl'){
		$lien_facebook="https://www.facebook.com/SmartCoopBelgie/";
	}else{	
		$lien_facebook="https://www.facebook.com/SMartBeFR/";
	}
?>

<footer id="masterfooter" role="contentinfo" class="visible-desktop" >
    <div>
		<div class="span5">
			<h3><a href="http://smart.coop">Smart</a> <?php echo $coop_europe;?></h3>
			<ul class="liens_footer">
				<li><a href="http://smart-de.org">Deutschland</a></li>       
				<!--  <li><a href="http://smart-dk.org"><i class="iconflag-dk"></i> Danmark</a></li>  -->
				<li><a href="https://smartfr.fr">France</a></li>        
				<li><a href="https://smart-ib.coop">Ibérica</a></li>        
				<li><a href="https://smart-it.org">Italia</a></li>        
				<!--  <li><a href="http://smarthu.org">Magyarország</a></li>    -->    
				<li><a href="https://smart-nl.org">Nederland</a></li>        
				<li><a href="https://smart-at.org">Österreich</a></li>        
				<li><a href="http://smart-se.org">Sverige</a><br/><br/></li>     
				<!--   <li><a href="http://smartuk.org.uk"><i class="iconflag-uk"></i> United Kingdom</a></li> -->
				
			</ul>
		</div>
		<div class="span5" >
			<h3><?php echo $acces_rapides;?></h3>
			<?php 
				$args = array(
				'theme_location'  => 'footer',
				'container'       => '', 
				'menu_class'      => 'liens_footer', 
				'echo'            => true,
				'fallback_cb'     => false,
				'depth'           => 1);
				wp_nav_menu($args);
			?>
		</div>
		<div class="span4" >
			<h3><?php echo $reseaux_sociaux;?></h3>
			<ul class="liens_footer">
				<li><a href="https://twitter.com/SMartBe_FR" target="_blank"><i class="fab fa-twitter icone-b-content" ></i></a></li>
				<li><a href="https://www.linkedin.com/company/smartbefr/" target="_blank"><i class="fab fa-linkedin-in icone-b-content" ></i></a></li>
				<li><a href="<?php echo $lien_facebook;?>" target="_blank"><i class="fab fa-facebook-f icone-b-content" ></i></a></li>
				<li><a href="https://www.youtube.com/channel/UCWfo_GiuDq6qNiW2IT5JOJg" target="_blank"><i class="fab fa-youtube icone-b-content" ></i></a></li>
				
			</ul>
		</div>
		<br/><br/>
	</div>
</footer>
<!--<div id="masterfooter-topmenu"><button class="btn btn-small"><?php //_e( 'View site Menu', 'smartportal' ); ?></button></div>-->

<!-- JavaScript at the bottom for fast page loading -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri() ?>/ui/smartstrap/js/jquery-1.7.2.min.js"><\/script>')</script>

<!-- Libs -->
<script src="<?php echo get_template_directory_uri() ?>/ui/smartstrap/js/jquery.flexslider-min.js?v<?php echo getfiledate(get_template_directory() . '/ui/smartstrap/js/jquery.flexslider-min.js'); ?>"></script>
<script src="<?php echo get_template_directory_uri() ?>/ui/smartstrap/js/bootstrap-button.js?v<?php echo getfiledate(get_template_directory() . '/ui/smartstrap/js/bootstrap-button.js'); ?>"></script>
<script src="<?php echo get_template_directory_uri() ?>/ui/smartstrap/js/bootstrap-collapse.js?v<?php echo getfiledate(get_template_directory() . '/ui/smartstrap/js/bootstrap-collapse.js'); ?>"></script>
<script src="<?php echo get_template_directory_uri() ?>/ui/smartstrap/js/bootstrap-dropdown.js?v<?php echo getfiledate(get_template_directory() . '/ui/smartstrap/js/bootstrap-dropdown.js'); ?>"></script>
<script src="<?php echo get_template_directory_uri() ?>/ui/smartstrap/js/bootstrap-tab.js?v<?php echo getfiledate(get_template_directory() . '/ui/smartstrap/js/bootstrap-tab.js'); ?>"></script>
<!-- Theme scripts -->
<script src="<?php echo get_template_directory_uri() ?>/ui/js/scripts-ck.js?v<?php echo getfiledate(get_template_directory() . '/ui/js/scripts-ck.js'); ?>"></script>

<!-- end scripts -->

<?php wp_footer(); ?>



</body>
</html>
