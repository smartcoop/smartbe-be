<div class="timeline">

  <?php
	if (strstr(home_url( $wp->request ), 'actualites')){query_posts('cat=-271&posts_per_page=50'); } //pour la page actualités on enlève toutes les offres d'emploi cat = 271
  $post_counter = 0;
  while(have_posts()): 
    the_post();
    ?>
    <?php get_template_part("components/blog-list-item"); ?>
    <?php $post_counter++; ?>
    <?php if( $post_counter != count( $posts ) ) echo '<!--hr class="page-divider"-->'; ?>
  <?php endwhile; ?>    
</div>