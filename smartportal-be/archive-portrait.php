<?php
/*
Template Name: Formation Archive
*/
?>
<?php 
	
	$mypod = pods('portrait');

	
	
	$mypod->find($params);
	
?>
<?php get_header(); ?>



<article id="content" class="container "> 
	<!-- Row for main content area -->
	<div style="clear:both"></div>
	<div class="row" >
		
		
		
		<div  >
			<header  class="page-leader">
				<h1>Portraits</h1>
				
			</header>	
			<div>
				
				
				
			<div style="clear:both"></div>
			
			<hr/>
			
			<?php 
			/* Start the Pods Loop */
			while ( $mypod->fetch() ) :
				// set our variables
				$formation = $mypod->id();
				$title = $mypod->display('title');
				$permalink = $mypod->display('permalink');
				$photo = $mypod->field('image');
				$photo=pods_image_url ( $photo, $size = 'null', $default = 0, $force = false );
				
			?>
			<?php  //if(check_date($date_du_debut_de_la_formation)){?>
				<div style="width:100%;">				
					<div style="float:left;padding-right:20px;width:30%">
						<a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>"><img src="<?php echo $photo;?>" style="width:200px;"></a>
					</div>
					<div style="float:left;width:50%">					
							
							
							<a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>">
							<h3><?php echo $title; ?></h3></a>
						
					</div>	
					
					<div style="clear:both"></div>
					<hr/>						
				</div>
			<?php // }?>	
				
			<?php endwhile; ?>
		</div>
	</div>
</article>
<div style="clear:both"></div>

	<?php //echo $mypod->pagination(); ?>

	
	<?php //get_sidebar(); ?>

<?php get_footer(); ?>