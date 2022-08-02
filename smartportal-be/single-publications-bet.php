<?php
/**
 * Template for a single BET Publication
 */

get_header(); ?>
<?php the_post(); $type = 'publications-bet'; $postid = get_the_ID(); ?>

<div id="know-pub" class="container <?php echo $type; ?>">

	<div class="row publications-bet single">

		<article class="span10 offset1">

			<!-- HEADER -->
			<header class="page-leader" id="overview">
				<h1><?php the_title(); ?></h1>
			</header>
			<!-- / HEADER -->

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
							<p class="book-description"><?php echo types_render_field("bet-author", array()); ?></p>
						</div>
					</div>
					<?php } ?>
					
					<?php if(types_render_field('bet-pdf', array('raw'=>'true'))){?>
					<br>
				    <a class="btn btn-primary" href="<?php echo types_render_field("ep-pdf", array()); ?>" ><?php _e("Consulter l'étude","smartbe"); ?></a>
					<?php }?>
					<br>
					
					
					<!-- AddThis Button BEGIN 
					<p class="share text-center">
            <div class="addthis_toolbox addthis_default_style">
              <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
              <a class="addthis_button_tweet"></a>
            </div>
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528b6e06367e63a9"></script>
          </p>
          <!-- AddThis Button END -->
				</aside>

				<section class="post_content article clearfix span7">
					<div class="meta">
						<p><?php _e("Une publication de","smartbe") ?> <strong><?php echo types_render_field("bet-author", array()); ?></strong></p>
					</div>
					
					<?php the_content(); ?>

					<p class="infos"><em><?php echo types_render_field("bet-available", array()); ?></em></p>
				</section>

			</div>
			<hr class="page-divider">

		</article>

		<div id="suggestions" class="span10 offset1">
			
			<h2 class="text-center"><?php _e("Dernières publications","smartbe"); ?></h2>

			<ul class="items clearfix">
				<?php
					$args = array(
						'post__not_in' => array( $postid ),
						'orderby' => 'id',
						'order' => 'DESC',
						'post_type' => $type,
						'posts_per_page' => 3
					);
					$items = new WP_Query($args);
					while($items->have_posts()) : $items->the_post();
				?>
				<li class="text-center book item">
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
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
      
      <ul class="nav nav-chevron red inline text-center">
          <li>
            <a href="<?php echo get_term_link( 32, 'bet-type' ); ?>"><?php _e("Voir toutes les publications","smartbe") ?></a>
          </li>
      </ul>
      
		</div>
		

	</div>

</div>

<?php get_footer(); ?>