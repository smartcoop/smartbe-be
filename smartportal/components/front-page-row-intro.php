<?php
global $front_page_row_title_displayed;
$upload_dir   = wp_upload_dir();
?>
<section id="front-page-row-intro" class="row">
	<!-- <article class="span9 article" > 1box-->
	<article class="span7 article" style="margin-left:0" > <!-- 2boxes -->
		<?php while (have_posts()) : the_post(); ?>
			<?php if (!isset($front_page_row_title_displayed) && $front_page_row_title_displayed != true){ ?>
			  <h1 class="home-title"><?php the_title(); ?></h1>
			<?php } ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</article>
	
	<aside class="span3" style="margin:0 5px 0 0" >
		<!-- Widget Coop Hardcoded -->
		<?php  
			get_template_part('components/compteur-societaires');		
		?>
		<!--END Widget Coop Hardcoded -->
	</aside>	
	
	<aside class="span3" style="margin:24px 5px 0 0" >
		<div class="widgets-col">
			<?php dynamic_sidebar('front-page-row-intro-widgets'); ?>
		</div>
	</aside> 
</section>
<div style="clear:both"></div>
<section >
	<?php If (ICL_LANGUAGE_CODE=='fr') : ?>	
		<aside class="span12 hidden-phone" style="padding-top:30px;border:1px solid red;margin:0;">
			<div>
				<a href="https://smartbe.be/fr/?post_type=formation"><img src="<?php echo $upload_dir ['baseurl'] ;?>/2018/09/visu_site2.png" style="border-radius:4px"></a>
			</div> 
			<div style="clear:both"></div>
		</aside>
		<aside class="span12 hidden-desktop" style="padding-top:30px;">
			<div>
				<a href="https://smartbe.be/fr/?post_type=formation"><img src="<?php echo $upload_dir ['baseurl'] ;?>/uploads/2018/09/visu_formation_phone.png" style="border-radius:4px"></a>
			</div> 
			<div style="clear:both"></div>
		</aside>
	<?php endif; ?>
</section>


