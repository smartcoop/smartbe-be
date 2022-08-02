<!--DISCOVER -->
<div id="front-page-row-discover">	
	<?php
		$args = array(
			'post_type' => 'discover',
			'order' => 'ASC',
			'posts_per_page' => 4 
		);              
		$items = new WP_Query($args);
	
		if($items->have_posts()) :
	?>
	
		<section id="discover" class="text-center span2">
			<ul class="row text-center "><li><h3><?php _e("A découvrir", "smartbe"); ?></h3><li></ul>
			<ul class="row text-center ">
				<?php while($items->have_posts()) : $items->the_post(); ?>
					<li class="text-left ">
						<a target="_blank" href="<?php echo types_render_field('discover-url', array('raw' => 'true')); ?>">
							<?php the_post_thumbnail('features'); ?>
					    </a>
					    <a target="_blank" href="<?php echo types_render_field('discover-url', array('raw' => 'true')); ?>">
							<h4><?php the_title() ?></h4>
					    </a>
					    <?php the_content() ?>
					</li>
				<?php endwhile; ?>
			</ul>
		</section>
		
	<?php endif; ?>
</div>
<!--/ DISCOVER -->
