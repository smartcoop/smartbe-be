<?php
/**
 * Template for the archives of BET's Publications
 */

get_header(); ?>
<?php $tax = 'ep-type'; ?>

<div id="know-pub" class="container">

	<div class="row publications-ep articles archives">
		
		<!-- HEADER -->
		<header class="page-leader span12" id="overview">
			<div class="row">
				<div class="span9 offset3">
					<h1><?php _e("Éducation Permanente","smartbe") ?></h1>
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
					<li class="<?php echo 'cat' . icl_object_id($item->term_id, 'ep-type', false, 'fr'); ?>">
						<a href="#"><?php echo $item->name ?></a>
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
					$years_old = 0;
					$i = 0;
					$book_number = 0;
					while(have_posts()) : the_post();
						$cats = get_the_terms($post->ID, 'ep-type');
						foreach($cats as $cat){
							$cat_id = icl_object_id($cat->term_id, 'ep-type', false, 'fr');
						}

						if($cat_id == '28'){
				?>
				
				<li class="span3 text-center book item <?php echo 'cat' . $cat_id; if($book_number%3 == 0) echo 'clear' ?>">
					<?php if(has_post_thumbnail()){ ?>
					<a href="<?php the_permalink(); ?>" class="book-cover book-thumbnail">
						<?php the_post_thumbnail("publication"); ?>
					</a>
					<?php }else{ ?>
					<a href="<?php the_permalink(); ?>" class="book-cover">
						<div class="container">
							<h4 class="book-title"><?php the_title(); ?></h4>
							<p class="book-description"><?php echo types_render_field("ep-author", array()); ?></p>
						</div>
					</a>
					<?php } ?>
					<div class="book-meta">
						<h4 class="book-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p class="book-description"><?php echo types_render_field("ep-author", array()); ?></p>
					</div>
				</li>
				
				<?php
				$book_number++;
						}else{
							$years = get_the_date('Y');
							if($years != $years_old){
								echo '<h1 class="date ' . $cat_slug. ' span9">'.$years.'</h1>';
							}
							$i++;
				?>
				
				<li class="item span9 <?php echo 'cat' . $cat_id; ?>">
					<div class="article-meta">
						<h4 class="article-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
						<p class="article-author"><?php echo types_render_field("ep-author", array()); ?></p>
						<p class="article-topics">
							<?php _e("Thèmes","smartbe"); ?>:
							<?php
								$taxonomy = 'ep-tags';
								$tax_terms = get_the_terms($post->ID, $taxonomy);
							?>
							<?php
								$ii = 0;
								$sep = " ";
								foreach ($tax_terms as $tax_term){
									if($ii > 0) $sep = ', ';
									echo $sep . '<span>#' . $tax_term->name.'</span>';
									$ii++;
								}
							?>
						</p>
						<?php the_excerpt() ?>
						<ul class="nav nav-chevron inline red">
							<li>
								<a href="<?php the_permalink(); ?>"><?php _e("Consulter l'analyse","smartbe"); ?></a>
							</li>
						</ul>
					</div>
          <hr class="page-divider">
				</li>
				
				<?php
							$years_old = $years; 
						}
					endwhile; 
				?>
				<p class=" item cat27 span9"><a href="https://pmb.smartbe.be/pmb/opac_css/"><strong><?php _e("> Consulter le centre de documentation de l'APMC","smartbe"); ?></strong></a></p> 
			</ul>
			<div class="clearfix"></div>
		</div>
		<!-- / PUBLICATIONS -->

	</div>

</div>

<script>
	jQuery(document).ready(function($){
		ali = $('aside li');
		ite = $('.item, .date');
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