<?php
/**
 * Template for the archives of BET's Publications
 */

 
get_header(); ?>

<ul class="row">

<?php 
				/* $cat_ID = icl_object_id(27,'ep-type',false,ICL_LANGUAGE_CODE); */
				

				/* while(have_posts()) : the_post();$type = 'Newsletter'; $postid = get_the_ID(); */
				
			?>
				
	<div id="content" role="main" class="container">

  <?php while(have_posts()): ?>
    <?php the_post();$type = 'Newsletter'; $postid = get_the_ID(); ?>
  
    <article>
      <div class="row">
        <div class="span8 offset2">
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
            <?php if(smartportal_get_the_intro()): ?>
              <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
            <?php endif; ?>
          </header>
          <div class="article">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      
    </article>

	
		
					<!--<div class="article-meta">
					
						<h4 ><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
						<?php the_content(); ?>
											
						
					</div>-->
					
		</div>
				 
			<?php
				$i++;
				endwhile;
			?>
		</ul>
 
<?php get_footer(); ?>