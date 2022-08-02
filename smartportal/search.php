<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<section id="content" role="main" class="container blog-archive-list">
    
  <div class="row">
    <div class="span8 offset2">

<?php if (have_posts()): ?>
      <header id="page-title" class="page-leader">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <input type="search" class="search-field" value="<?php echo get_search_query(); ?>" placeholder="Search …" name="s" title="Search for:" >
        </form>
        <div class="results-number">
          <?php
          $num_results = $wp_query->found_posts;
          echo sprintf( _n( __('Il y a 1 résultat pour cette recherche.', 'smartportal'), __('Il y a %s résultats pour cette recherche.', 'smartportal'), $num_results, 'smartportal' ), $num_results );
          ?>
        </div>
      </header>
    
  <?php
  while(have_posts()): 
    the_post();
    ?>
    <article class="clearfix">
      <header class="page-leader">
        <h1>
          <a href="<?php the_permalink(); ?>"><?php relevanssi_the_title(); ?></a>
        </h1>
        <span class="result-type">
          <?php
            if ($post->post_type == 'post') _e('Actualité', 'smartbe');
            if ($post->post_type == 'publications-ep') _e('Publication', 'smartbe');
            if ($post->post_type == 'publications-bet') _e('Publication', 'smartbe');
            if ($post->post_type == 'services') _e('Nos services', 'smartbe');
            if (icl_object_id(end($post->ancestors), 'page', false, 'fr') == 27 || icl_object_id($post->ID, 'page', false, 'fr') == 27) _e('À propos', 'smartbe');
            if (icl_object_id(end($post->ancestors), 'page', false, 'fr') == 17 || icl_object_id($post->ID, 'page', false, 'fr') == 17) _e('Éclairages', 'smartbe');
            if (icl_object_id(end($post->ancestors), 'page', false, 'fr') == 33 || icl_object_id($post->ID, 'page', false, 'fr') == 33) _e('APMC', 'smartbe');
          ?>
        </span>
      </header>
      <div class="article clearfix">
      <?php the_excerpt(); ?>
      </div>
    </article>
  <?php endwhile; ?>
    </div>
  </div>
  
  <div class="pager">
    <?php 
      posts_nav_link(' ', __('Previous Results', 'smartportal'), __('Next Results', 'smartportal'));
    ?>
  

<?php else : ?>
    <header id="page-title" class="page-leader">
      <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="search-field" value="<?php echo get_search_query(); ?>" placeholder="Search …" name="s" title="Search for:" >
      </form>
    </header>
    <h1 class="muted">
      <?php _e('Sorry, no result found.', 'smartbe'); ?>
    </h1>
<?php endif; ?>
</div>
  
  <?php //get_sidebar('subfooter'); ?>
</section>
</div><!-- /content -->

<?php get_footer(); ?>