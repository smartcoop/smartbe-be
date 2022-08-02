<?php
/**
 * Template for a single BET Publication
 */

get_header(); ?>
<?php the_post(); $type = 'publications-ep'; $postid = get_the_ID(); ?>

<div id="know-pub" class="container <?php echo $type; ?>">

	<div class="row publications-ep articles single">

		<article class="span10 offset1 articles">

			<!-- HEADER -->
			<header class="page-leader" id="overview">
				<h1><?php the_title(); ?></h1>
			</header>
			<!-- / HEADER -->

			<?php
					$cats = get_the_terms($post->ID, 'ep-type');
					foreach($cats as $cat){
						$cat_id = icl_object_id($cat->term_id, 'ep-type', false, 'fr');
					}

					if($cat_id == 28){
			?>

			<div id="post-<?php the_ID(); ?>" class="row publication">
				<aside class="span3 text-center-phone">
				
					<?php if(has_post_thumbnail()){ ?>
  					<a href="<?php the_permalink(); ?>" class="book-cover book-thumbnail">
  						<?php the_post_thumbnail("publication"); ?>
  					</a>
					<?php }else{ ?>
					<div class="book-cover">
						<div class="container">
							<h4 class="book-title"><?php the_title(); ?></h4>
							<p class="book-description"><?php echo types_render_field("ep-author", array()); ?></p>
						</div>
					</div>
					<?php } ?>
					
					<?php if(types_render_field('ep-pdf', array('raw'=>'true'))){?>
					<br>
					  <a class="btn btn-primary" href="<?php echo strip_tags(types_render_field("ep-pdf", array())); ?>" ><?php _e("Consulter l'étude","smartbe"); ?></a>
					<?php }?>
					
					<br>
					
					<!-- AddThis Button BEGIN 
          <div class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_tweet"></a>
          </div>
          <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528b6e06367e63a9"></script>
          <!-- AddThis Button END -->
          
			</aside>

				<section class="post_content article clearfix span7">
					<div class="meta">
						<p><?php _e("Une étude de ", "smartbe");?> <strong><?php echo types_render_field("ep-author", array()); ?></strong></p>
					</div>
					
					<?php the_content(); ?>
					
					<p class="infos"><em><?php echo types_render_field("ep-available", array()); ?></em></p>
					
				</section>
			</div>

			<?php
					}else{
			?>

			<div id="post-<?php the_ID(); ?>" class="analyse publication">
				<div class="article-meta">
					<p class="article-author"><?php _e("Une analyse de","smartbe"); echo ' <strong>' . types_render_field("ep-author", array()); ?></strong>, <?php _e("publiée le","smartbe"); echo ' '; ?><?php the_date(); ?></p>
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
								echo $sep . '#<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>';
								$ii++;
							}
						?>
					</p>
					<p class="article-description"><?php the_content() ?></p>
					
					<p class="infos"><em><?php echo types_render_field("ep-available", array()); ?></em></p>
					
					<?php if(types_render_field('ep-pdf', array('raw'=>'true'))){?>
						<?php $link_pdf=types_render_field("ep-pdf", array()); ?>

						<a class="btn btn-primary" href="<?php echo strip_tags($link_pdf); ?>" ><?php _e("Consulter l'analyse","smartbe"); ?></a>
					  <br>
					<?php }?>
					
					<br>
					
					<!-- AddThis Button BEGIN 
          <div class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_tweet"></a>
          </div>
          <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528b6e06367e63a9"></script>
          <!-- AddThis Button END -->
				</div>
			</div>
			<?php } ?>

			<hr class="page-divider">

		</article>

		<!-- SUGGESTIONS -->
		<div id="suggestions" class="span10 offset1">
			
			<h2 class="text-center"><?php _e("Dernières analyses","smartbe"); ?></h2>

			<ul class="items row">
				<?php
					$cat_ID = icl_object_id(27,'ep-type',false,ICL_LANGUAGE_CODE);
					$args = array(
						'post__not_in' => array( $postid ),
						'orderby' => 'id',
						'order' => 'DESC',
						'post_type' => 'publications-ep',
						'posts_per_page' => 2,
						'tax_query' => array(
							array(
								'taxonomy' => 'ep-type',
								'field' => 'id',
								'terms' => array($cat_ID)
							),
						)
					);
					$items = new WP_Query($args);
					while($items->have_posts()) : $items->the_post();
				?>
				<li class="span5">
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
									echo $sep . ' #<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>'  . $tax_term->name.'</a>';
									$ii++;
								}
							?>
						</p>
						<?php the_excerpt() ?>
						<ul class="nav nav-chevron inline red">
							<li>
								<a href="<?php the_permalink(); ?>" ><?php _e("En lire plus","smartbe") ?></a>
							</li>
						</ul>
					</div>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
			
			<ul class="nav nav-chevron red inline text-center">
			    <li>
			      <a href="<?php echo get_term_link( 27, 'ep-type' ); ?>"><?php _e("Voir tous les articles","smartbe") ?></a>
			    </li>
			</ul>

		</div>
		<!-- / SUGGESTIONS -->

	</div>

</div>

<?php get_footer(); ?>