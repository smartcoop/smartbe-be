<?php
global $front_page_row_title_displayed;
$front_page_row_title_displayed = true;
?>
<section id="front-page-row-title" class="article">
  <?php while (have_posts()) : the_post(); ?>
  <h1 class="home-title text-center"><?php the_title(); ?></h1>
	<?php endwhile; ?>
</section>