<?php
/**
 * Template Name: Comprendre Home
 */

get_header(); ?>
<?php the_post(); ?>

<div id="know-home" class="container">

	<!-- LISTING -->
    <header class="page-leader">
        <h1>
            <?php the_title(); ?>
        </h1>
    </header>
    <hr class="page-divider">
	<section id="listing">
			<?php
				$menu = wp_get_nav_menu_object("S'informer");
				$items = wp_get_nav_menu_items($menu->term_id);

				$list = '<ul class="row">';
				$i = 0;
				foreach((array) $items as $key => $item){
					$title = $item->title;
					$url = $item->url;
					$parent = $item->menu_item_parent;
					$nohome = $item->attr_title;
					$pageID = $item->object_id;
					$thumb = get_the_post_thumbnail($pageID, 'comprendre');
					
					if(strpos($nohome,'no-home') == false){
						if(!$parent){
						    $clear = null;
						    if($i % 4 == 0) {$clear = ' clear ';}
							$list .= '<li class="span3 text-center' . $clear . '"><a href="' . $url . '">' . $thumb . '<h3>' . $title . '</h3></a></li>';
							$i++;
						}
					}
				}
				$list .= '</ul>';
				echo $list;
			?>
			<div class="row">
			  <div class="span10 offset1 article">
			    <?php the_content(); ?>
			  </div>
			</div>
	</section>
	<!-- / LISTING -->
	<hr class="page-divider">

	<!-- PUBLICATIONS -->
	<section class="publications-bet">
		<header>
			<h2><?php _e("Publications SMart","smartbe"); ?></h2>
		</header>
			<ul class="row">
				<?php 
					$args = array(
						'orderby' => 'id',
						'order' => 'DESC',
						'post_type' => 'publications-bet',
						'posts_per_page' => 3
					);

					$posts = query_posts($args);
					while(have_posts()) : the_post()
				?>
				<li class="span4 text-center book">
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
					endwhile;
				?>
			</ul>
		<footer class="all-publications-btn">
			<ul class="nav nav-chevron red inline text-center">
				<li>
					<a href="<?php echo get_term_link( 32, 'bet-type' ); ?>"><?php _e("Voir toutes les publications","smartbe"); ?></a>
					
				</li>
			</ul>
		</footer>
	</section>
	<!-- / PUBLICATIONS -->
	<hr class="page-divider">

	<!-- ARTICLES -->
	<section class="articles">
		<header>
			<h2><?php _e("Articles SMart","smartbe"); ?></h2>
		</header>
		<ul class="row">
			<?php 
				$cat_ID = icl_object_id(27,'ep-type',false,ICL_LANGUAGE_CODE);
				$args = array(
					'orderby' => 'id',
					'order' => 'DESC',
					'post_type' => 'publications-ep',
					'posts_per_page' => 4,
					'tax_query' => array(
						array(
							'taxonomy' => 'ep-type',
							'field' => 'id',
							'terms' => array( $cat_ID )
						),
					)
				);
				$posts = query_posts($args);
				$i = 0;

				while(have_posts()) : the_post();
			?>
				<li class="span6 <?php if($i % 2 == 0) echo "clear" ?>">
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
								<a href="<?php the_permalink(); ?>" ><?php _e('En lire plus', 'smartbe') ?></a>
							</li>
						</ul>
					</div>
				</li>
			<?php
				$i++;
				endwhile;
			?>
		</ul>
		<footer class="all-publications-btn">
			<ul class="nav nav-chevron red inline text-center">
				<li>
					<a href="<?php echo get_term_link( 27, 'ep-type' ); ?>"><?php _e("Voir tous les articles","smartbe"); ?></a>
				</li>
			</ul>
		</footer>
		<hr class="page-divider"> 
		&nbsp;
<div class="text-center"></div>
<div class="text-center"></div>
<div class="text-center"></div>
<div class="text-center">Avec le soutien de la Fédération Wallonie-Bruxelles</div>
<div class="text-center"><a href="http://www.culture.be"><img class="alignnone  wp-image-7619" alt="logo_culture.be" src="http://smartbe.be/wordpress/../media/uploads/2013/11/culture.be_.png" width="67" height="41" /></a>  <a href="http://www.educationpermanente.cfwb.be"><img class="alignnone  wp-image-7620" alt="logo_FWB" src="http://smartbe.be/wordpress/../media/uploads/2013/11/logoFWB.jpeg" width="43" height="41" /></a></div>
	</section>
	<!-- / ARTICLES -->
                            <!-- <hr class="page-divider">  -->

	<!-- / JOIN -->
	 <!--  <section id="join"> -->
	 <!-- 	<div class="row"> -->
	 <!-- 		<div class="span12 text-center"> -->
	 <!-- 			<h3><?php _e("Rejoignez-nous","smartbe"); ?></h3> -->
	 <!-- 			<span href="<?php echo types_render_field("apmc-location", array('output' => 'raw')); ?>" -->
  	 <!-- 				<?php if(ICL_LANGUAGE_CODE=='fr'): ?> class="apmc-logo fr">	 -->				  
  	 <!-- 				<?php elseif(ICL_LANGUAGE_CODE=='nl'): ?> class="apmc-logo nl"> -->
  	 <!-- 				<?php endif;?> -->
	 <!-- 			</span> -->
	 <!-- 			<br> -->
	 <!-- 			<a href="<?php echo get_page_link(icl_object_id(177,page,false,ICL_LANGUAGE_CODE)); ?>" class="btn btn-lg btn-primary"><?php _e("Devenir membre","smartbe"); ?></a> -->
	 <!-- 		</div> -->
	 <!-- 	</div> -->
	 <!-- </section> -->
	<!-- / JOIN -->

</div>

<?php get_footer(); ?>
