<?php
/**
 * Template for the archives of BET's Publications
 */

get_header(); ?>

<?php 

$tax = get_queried_object()->taxonomy;
$term_name = get_queried_object()->slug;
$term_id = get_queried_object()->term_id;
$main_term_id = icl_object_id($term_id,$tax,false,'fr');
define('page', 'page');
?>

<div id="know-pub" class="container">

	<div class="row publications-bet archives">
		
		<!-- HEADER -->
		<header class="page-leader span12" id="overview">
			<div class="row">
				<div class="span9 offset3">
					<h1><?php _e("Publications du BET","smartbe") ?></h1>
				</div>
			</div>
		</header>
		<!-- / HEADER -->

		<!-- SIDEBAR -->
		<aside class="span3">
			<nav class="section-nav">
				<ul class="nav nav-chevron">
					<?php 
						$args = array(
							'taxonomy' => $tax,
							'orderby' => 'menu_order'
						);
						$items = get_categories($args);

						foreach($items as $item){
					?>
					<li class="<?php if($term_name == $item->slug ) echo 'active'; ?>">
						<a href="<?php echo get_term_link( $item->slug, $tax ); ?>"><?php echo $item->name; ?></a>
					</li>
					<?php
						}
					?>
				</ul>
			</nav>
			<hr class="page-divider">
			<a href="<?php echo get_page_link(icl_object_id(17,page,false,ICL_LANGUAGE_CODE)); ?>">« <?php echo get_the_title(icl_object_id(17,page,false,ICL_LANGUAGE_CODE)); ?></a>
			
			
		</aside>
		<!-- / SIDEBAR -->

		<!-- PUBLICATIONS -->
		<div class="span9">
			<ul class="items row">
			<?php
				$p_number = 0;
				while(have_posts()) : the_post();
					$cats = get_the_terms($post->ID, $tax);
					foreach($cats as $cat){
						$cat_slug = $cat->slug;
						$cat_id = icl_object_id($cat->term_id, 'bet-type', false, 'fr');
					}
			?>
				<li class="span3 text-center book item <?php if($p_number%3 == 0) echo ' clear'; ?>">
					<?php if(has_post_thumbnail()){ ?>
					<a href="<?php the_permalink(); ?>" class="book-cover book-thumbnail">
						<?php the_post_thumbnail("publication"); ?>
					</a>
					<?php }else{ ?>
					<a href="<?php the_permalink(); ?>" class="book-cover">
						<div class="container">
							<h4 class="book-title"><?php the_title(); ?></h4>
							<p class="book-description"><?php echo types_render_field("bet-author", array()); ?></p>
						</div>
					</a>
					<?php } ?>
					<div class="book-meta">
						<h4 class="book-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p class="book-description"><?php echo types_render_field("bet-author", array()); ?></p>
					</div>
				</li>
			<?php
		    $p_number++;
			endwhile;
			?>
			</ul>
			<div class="pager">
              <?php 
                posts_nav_link(' ', '<i class="icon-arrow-left"></i> ' . __('Newer publications','smartbe'), __('Older publications','smartbe') . ' <i class="icon-arrow-right"></i>');
              ?>
            </div>
		</div>
		<!-- / PUBLICATIONS -->

	</div>

</div>

<?php get_footer(); ?>