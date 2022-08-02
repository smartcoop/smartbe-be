<?php
/**
 * Template Name: Mentions légales
 */

get_header(); ?>
<?php the_post(); ?>

<div id="terms" class="container article">

	<article class="row">

		<div class="span10 offset1">
	
			<!-- HEADER -->
			<header class="page-leader" id="overview">
				<h1><?php the_title(); ?></h1>
			</header>
			<!-- / HEADER -->
			
			<!-- CONTENT -->	
			<?php the_content(); ?>
			<!-- / CONTENT -->

		</div>
			
	</article>

</div>

<?php get_footer(); ?>