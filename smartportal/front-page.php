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

get_header(); 
include("components/hp_trad.php");

?>

<div id="hp_slider" >
	<?php if (ICL_LANGUAGE_CODE=='nl'){?>
		<?php echo do_shortcode('[metaslider id="25653"]'); ?> 
	<?php }else{ ?>
		<?php echo do_shortcode('[metaslider id="25648"]'); ?> 	
	<?php }?>
</div>
<div class="homepage-content" >
	<div  class="homepage-col-first">
		<?php include("components/homepage-left-col.php"); ?>
	</div>
	
	<div  class="homepage-col-second" >		
		<?php include("components/homepage-news.php"); ?>		
	</div>
</div>



<?php get_footer(); ?>