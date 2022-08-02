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

get_header(); ?>


<?php 

        $args = array( 'post_type' => 'newsletter-category', 'posts_per_page' => 9, 'orderby' => 'date'  );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php  ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

        <?php wp_reset_postdata(); ?>
		


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
	
	
  
	  <div class="span9">
			<?php if(z_taxonomy_image_url($term->term_id)){ ?>
  	        <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term -> name ?>" class="hidden-phone service-category-img" />
  	      <?php } ?>
			<h1 class="newsletter-cat"><?php echo $term_name; ?></h1>
		<div class="timeline">
		  
		 <?php
		  $post_counter = 0;
		  while(have_posts()): 
			the_post();$type = 'Newsletter'; $postid = get_the_ID();
			?>
							
								
						<article class="blog-entry clearfix">
						  <header class="page-leader">
							<div class="blog-entry-img"></div>
							<h1><?php the_title(); ?></h1>
							<span class="date">
								<?php the_time(get_option('date_format')); ?>
							</span>
						  </header>
						  
						  <div class="article clearfix">
						  <?php the_content(); ?>
						  </div>
						  
						</article>
			<?php $post_counter++; ?>
			<?php if( $post_counter != count( $posts ) ) echo '<!--hr class="page-divider"-->'; ?>
		  <?php endwhile; ?>    
		</div>
    </div>
   
  </div>
  
  <div class="pager">
    <?php 
      posts_nav_link(' ','<i class="icon-arrow-left"></i> Newer news','Older news <i class="icon-arrow-right"></i>');
    ?>
  </div>
  
  <?php //get_sidebar('subfooter'); ?>
</section>
</div><!-- /content -->



<?php get_footer(); ?>