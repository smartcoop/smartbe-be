<?php 
	
	// Get categories
	$services_categories = get_categories(array('taxonomy' => 'service-category', 'orderby' => 'menu_order')); 
	array_splice($services_categories, 4); // Max 4 items
	$total_cats = count($services_categories);
  
	
?>

<nav id="nav-projects">
  <ul id="" class="row">
    <?php 
    $span = "span" . floor(12 / $total_cats); // Calculate width of cols depending the total of categories to display
    foreach($services_categories as $services_category):	
    	$term = get_term_by('slug', $services_category -> slug, 'service-category');
      ?>
      
      <li class="<?php echo $span ?>">
        <h2>
          <?php echo $term -> name ?>
        </h2>
        <?php if(z_taxonomy_image_url($term->term_id)){ ?>
          <img class="picture" src="<?php echo z_taxonomy_image_url($term->term_id, 'services'); ?>" alt="<?php echo $term -> name ?>" class="hidden-phone service-category-img" />
        <?php } ?>
        <p><?php echo $term -> description ?></p>
        
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
    			<ul class="nav nav-chevron red">
    			<?php
    				while($items->have_posts()) :
    					$items->the_post();
    				?>
    					<li>
    						<a href="<?php the_permalink() ?>">
    						  <?php the_title() ?>
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
      </li>
      
      <?php 
    endforeach; ?>
  </ul>
</nav>