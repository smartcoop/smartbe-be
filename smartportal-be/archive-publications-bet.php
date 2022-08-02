<?php
/**
 * Template for the archives of BET's Publications
 */

get_header(); ?>
<?php $tax = 'bet-type'; ?>

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
							'orderby' => 'name'
						);
						$items = get_categories($args);

						foreach($items as $item){
					?>
					<li class="<?php echo 'cat' . icl_object_id($item->term_id, 'bet-type', false, 'fr'); ?>">
						<a href="#"><?php echo $item->name; ?></a>
					</li>
					<?php
						}
					?>
				</ul>
			</nav>
			<hr class="page-divider">
			<a href="<?php echo get_page_link(17); ?>">« <?php echo get_the_title(17); ?></a>
			
			
		</aside>
		<!-- / SIDEBAR -->

		<!-- PUBLICATIONS -->
		<div class="span9">
			<ul class="items row">
			<?php
				$p_number = 0;
				$mc_number = 0;
				while(have_posts()) : the_post();
					$cats = get_the_terms($post->ID, $tax);
					foreach($cats as $cat){
						$cat_slug = $cat->slug;
						$cat_id = icl_object_id($cat->term_id, 'bet-type', false, 'fr');
					}
			?>
				<li class="span3 text-center book item <?php echo 'cat' . $cat_id; if($cat_id == '32' && $p_number%3 == 0) echo ' clear'; if($cat_id == '33' && $mc_number%3 == 0) echo ' clear' ?>">
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
			if($cat_id == '32') {
			  $p_number++;
			} elseif ($cat_id == '33') {
			  $mc_number++;
			}
			endwhile;
			?>
			</ul>
		</div>
		<!-- / PUBLICATIONS -->

	</div>

</div>

<script>
	jQuery(document).ready(function($){
		ali = $('aside li');
		ite = $('.item');
		alif = ali.not('.no').eq(0);

		what = alif.attr('class');
		ite.not('.'+what).hide();
		alif.addClass('active');

		ali.on('click', function(){
			if(!$(this).hasClass('active')){
				what = $(this).attr('class');
				ite.hide();
				ite.parent().find('.'+what).show();
				$(this).toggleClass('active');
				$(this).siblings('li').removeClass('active');
			}
		});
	});
</script>

<?php get_footer(); ?>