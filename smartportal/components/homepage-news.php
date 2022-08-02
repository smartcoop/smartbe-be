
<?php
		// Start the loop.
if (ICL_LANGUAGE_CODE=='nl'){
	$titre=get_the_title(2894);
	$trim_me = get_post_field('post_content', 2894);
	$lien =get_the_permalink(2894);
}else{
	$trim_me = get_post_field('post_content', 27);
	$titre=get_the_title(27);
	$lien =get_the_permalink(27);
}
?>
<div class="visible-desktop bloc-cest-quoi" >
	<h1 class="ft-r ft-w-7"><?php echo $titre;?> </h1>				
	<?php 
		$sub_the_content= substr($trim_me, 0, 600);
		$last_space = strrpos($sub_the_content, " "); 
		$chapo = substr($sub_the_content, 0, $last_space)."..."; 
		echo $chapo; ?>
	<div style="clear:both"></div>
	<div class="hp_news_bloc_plus2"  >
		<a href="<?php echo $lien;?>"><?php echo $plus;?></a>
	</div>
</div>
<div style="clear:both"></div>
<?php
	
	$args = array(
	'posts_per_page'        => 4,
	'tag' 					=> 'Homebanners',
	'orderby' 				=> 'date',
	'order'  				=> 'DESC',
	);
	
	
	$bannerNews = new WP_Query(  $args );
	
	if ( $bannerNews->have_posts() ):
	
	
	$count = $bannerNews->post_count;
?>
<ul class="hp_news_ul">
	
    <?php 
		while ( $bannerNews->have_posts() ) :
		$bannerNews->the_post();
		$divisible="";
		if($count & 1){ // si impair et mobile
			$divisible="background:#e5e5e5;";
		}else{
			$divisible="background:#fff;";
		}
		/*if($count==5 or $count==4 or $count== 1){ // si deskop
			$divisible="background:#e5e5e5;";
		}*/
	?>
	
	<li class="hp_news_li"style="<?php echo $divisible;?>">
		<div class="hp_news_bloc">
			<div class="hp_news_bloc_cat" >
					<?php 
						
						$categories= explode(',', get_the_category_list(','));
						echo '<span class="ft-r ft-s-s ft-w-8 ft-upp"  >NEWS</span> <span class=" ft-r ">&#x2015;</span><span  class="ft-s-xs ft-upp "> '.$categories[0].'</span>';
						
					?>
				<a href="<?php echo the_permalink(); ?>" ><h4 class="hp_news_bloc_title" ><?php strip_tags(the_title());?></h4></a>
				<?php 
					$chapo = types_render_field("home-banner-desc", array("raw"=>"true"));
					$lg_max = 240; //nombre de caractères autorisés 

					if (strlen($chapo) > $lg_max) 
					{ 
					$chapo = substr($chapo, 0, $lg_max); 
					$last_space = strrpos($chapo, " "); 
					$chapo = substr($chapo, 0, $last_space)."..."; 
					} 
					
					
					
				?>
				<div class="hp_news_chapo"><?php echo $chapo;  ?></div>
				<div class="hp_news_bloc_plus"  >
					<a href="<?php echo the_permalink(); ?>"><?php echo $plus;?></a>
				</div>
				<div style="clearfix"></div>
			</div>
		</div>
		
	</li>
	
    
    <?php 
		$count--;
        endwhile;
	?>
</ul>


<?php endif; ?>


<?php wp_reset_query(); ?>
