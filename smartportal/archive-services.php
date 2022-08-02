<?php

get_header(); ?>

<?php if(have_posts()): ?>
	<div class="container" id="services-home">

		<header class="page-leader">
			<h1><?php _e("Creating solutions to help artists and creatives develop their projects", "smartportal"); ?></h1>
		</header>

  	<?php 
  		$services_types_raw = get_categories(array('taxonomy' => 'service-category', 'orderby' => 'menu_order')); 
  		foreach ($services_types_raw as $services_type_raw){
  			$services_types[] = $services_type_raw->slug;
  		}
  	?>
  	
  	<section class="services-list-expanded">
  		<?php foreach($services_types as $service_type):	
  			$term = get_term_by('slug', $service_type, 'service-category');
  		?>
  	    
  	  <hr class="page-divider">
  	    
  		<div class=" row clearfix" id="<?php echo $service_type ?>" >
  	    
  			<h2 class="span12  service-category-title"><?php echo $term -> name ?></h2>
  			<p class="span12  service-category-desc"><?php echo $term -> description ?></p>
  	      
  			<div class="services-list span12 ">
  			<?php
  				
  				$args = array(
  					'tax_query' => array(
  						array(
  							'taxonomy' => 'service-category',
  							'field' => 'slug',
  							'terms' => $term->slug
  						)
  					),
  					'posts_per_page' => -1,
  					'order' => 'ASC',
  					'orderby' => 'menu_order',
  	    			'post_parent' => 0
  				);
  	
  				$items = new WP_Query($args);
  				if($items->have_posts()) :
  				?>
  				<ul class="row">
  				<?php
  					while($items->have_posts()) :
  						$items->the_post();
  					?>
  						<li class="single-service span4 <?php $even ?>">
  							<a href="<?php the_permalink() ?>" class="block-link">
  							  <h3 class="service-title"><?php the_title() ?></h3>
  							  <p class="service-excerpt"><?= $post->post_excerpt ?> <span class="read-more"><?php _e("Learn more", "smartportal"); ?></span></p>
  							</a>
  						</li>
  					<?php
  					endwhile;
  					wp_reset_query();
  				?>
  				</ul>
  				<?php
  				endif;
  			?>
  			</div>
  	
  		</div>
  		<?php endforeach; ?>
  	</section>
	
	</div><!-- /container -->
<?php else : ?>
	<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>