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

<div id="content" role="main" class="container">
  <div class="row">
    <div id="notfound" class="span6 offset3 text-center article">
      <header class="page-leader" id="overview">
        <h1><?php _e('Whoops, page not found :-(', 'smartportal'); ?></h1>
      </header>
      <p class="lead"><?php _e('The page your are looking for does not exist. Maybe you misstyped the url or the page has been removed<br>Would you like to <strong><a href="/">come back to the homepage</a></strong>?', 'smartportal'); ?></p>
    </div>
  </div>
</div><!-- /content -->

<?php get_footer(); ?>