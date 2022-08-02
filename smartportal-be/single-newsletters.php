<?php
/**
 * Template for the archives of BET's Publications
 */

 
get_header(); ?>


			
<section id="content" role="main" class="container blog-archive-list">
  
  <header id="page-title" class="page-leader">
    <h1 class="muted">
					
    </h1>
  </header>
  

  
  
   <div class="row">
   <div class="span3 ">
   
		<!-- <?php get_template_part("components/blog-list-sidebar"); ?> -->
	  
	 		
			<?php 
    $args = array(
	'show_option_all'    => '',
	'orderby'            => 'menu_order',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => __( 'Newsletter Liège' ),
	'show_option_none'   => __( '' ),
	'number'             => null,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'newsletter-category', 
	'walker'             => null
    );
    wp_list_categories( $args ); 
?>	
									
			
			
	 
	  
    </div>
  
		<?php while(have_posts()): ?>
    <?php the_post();$type = 'newsletters'; $postid = get_the_ID(); ?>
		 
        <div class="span9" >
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
            <?php if(smartportal_get_the_intro()): ?>
              <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
            <?php endif; ?>
          </header>
          <div class="article">
            <?php the_content(); ?>
          </div>
        </div>
  		
      </div>
      
  

	
		
					
					
	
				 
			<?php
				$i++;
				endwhile;
			?>

</section>
			</div>	
 
<?php get_footer(); ?>