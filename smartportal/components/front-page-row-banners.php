<?php

$args = array(
	'posts_per_page'        => 4,
	'tag' 					=> 'Homebanners',
	'orderby' 				=> 'date',
	'order'  				=> 'DESC',
);


$bannerNews = new WP_Query(  $args );

if ( $bannerNews->have_posts() ):
  
 ?>




		 
	
<div class="row">
  <section class="focus">
    <ul>
	<?php if(ICL_LANGUAGE_CODE == "nl"): ?>
		
	

	
	<?php else: ?>
	

	
	

	
	<?php endif;?>
	
    <?php 
      while ( $bannerNews->have_posts() ) :
      $bannerNews->the_post();
    ?>
	<li class="span3">
      <a href="<?php echo the_permalink() ?>" class="focus-item clearfix">
        <?php echo the_post_thumbnail(); ?>
        <h4><?php the_title(); ?></h4>
        <p><?php echo types_render_field("home-banner-desc", array("raw"=>"true"))  ?></p>
      </a>
    </li>
		
    
    <?php 
        endwhile;
    ?>
     </ul>
  </section>
</div>
<?php endif; ?>


<?php wp_reset_query(); ?>
