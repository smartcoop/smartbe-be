<article class="blog-post span4<?= is_sticky(get_the_ID()) ? ' sticky' : '' ?><?= has_post_thumbnail() ? ' has-thumbnail' : ' no-thumbnail' ?> post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>" class="post-link">
	  <?php if(is_sticky(get_the_ID()) && has_post_thumbnail()): ?>
	  	<img src="<?php the_post_thumbnail() ?>" alt="" class="post-picture">
	  <?php endif; ?>
	  <p class="post-date"><?php the_time(get_option('date_format')); ?></p>
	  <p class="post-title"><?php the_title(); ?></p>
	</a>
</article>