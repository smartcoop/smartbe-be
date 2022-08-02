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
<?php if (have_posts()): ?>
<section id="content" role="main" class="container blog-archive-list">
  
  <header id="page-title" class="page-leader">
   
  </header>
    
  <div class="row">
  
	 <div class="span3">
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
	<!-- <img src="http://smartbe.be/wordpress/../media/uploads/2015/05/image_une_rubriquetransparent.gif" alt="" class="hidden-phone service-category-img">-->
	 <img src="http://smartbe.be/wordpress/../media/uploads/2015/06/image_une_rubriquejuin15.gif" alt="" class="hidden-phone service-category-img">
	 
			<div class="timeline">
			
			
				 <?php
						
									$args = array(
							
							'child_of'                 => 0,
							'parent'                   => '',
							'orderby'                  => 'menu_order',
							'order'                    => 'ASC',
							'hide_empty'               => 1,
							'hierarchical'             => 1,
							'exclude'                  => '',
							'include'                  => '',
							'number'                   => '',
							'taxonomy'                 => 'newsletter-category',
							'pad_counts'               => false 

							); 
						$categories = get_categories( $args );
						foreach ( $categories as $cat ) {
									
									 		
									$posts_array = get_posts(
                        array( 'showposts' => 1,
                            'post_type' => 'newsletters',
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'newsletter-category',
                                'field' => 'term_id',
								'terms' => $cat->term_id,
                                )
                            )
                        )
                    );	
					//print_r( $posts_array ); 
					global $post;
					$post = $posts_array[0];
					setup_postdata( $post );
					?>	
					<article class="blog-entry clearfix">
				  <header class="page-leader">
					<div class="blog-entry-img">
					 
					</div>
					<h1><a href="<?php echo get_term_link( $cat ); 
							?>"><?php echo the_title() //$posts_array[0]->post_title; ?></a></h1>  
					<span class="date">
					  					  
					  <?php the_time(get_option('date_format')); ?>
					</span>
				  </header>
				  <div class="article clearfix">
				  <?php echo the_excerpt(); ?>
				  </div>
				</article>
					
					<?php
    
 }
						
					
 
								?>	
				
			
			
			</div>
			
			
    </div>
   
  </div>
  
 <!-- <div class="pager"> -->
 <!--   <?php posts_nav_link(' ','<i class="icon-arrow-left"></i> Newer news','Older news <i class="icon-arrow-right"></i>');   ?> -->
  <!-- </div> -->
  
  <?php //get_sidebar('subfooter'); ?>
</section>
</div><!-- /content -->

<?php else : ?>
<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>
