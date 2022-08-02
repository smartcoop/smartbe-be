<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <section class="container" id="content" role="main">
    <header class="page-leader" id="page-title">
      <h1><?php echo __('Team', 'smartportal'); ?></h1>
    </header>
    <article>
      <div class="row">
        <?php
        $rowcount = 0;
        while (have_posts()) : the_post();
        ?>
          <?php
          $rowcount++;
          
          if ($rowcount > 3) :
          ?>
            <?php $rowcount = 1; ?>
            </div>
            <div class="row">
          <?php endif; ?>
          <div class="span4">
            <div class="team-member">
              <?php if (has_post_thumbnail()) : ?>
                <?php
                $attr = array('class' => 'portrait');
                
                the_post_thumbnail('full', $attr);
                ?>
              <?php endif; ?>
              <div>
                <hgroup>
                  <h1><?php the_title(); ?></h1>
                  <!-- <h2><?php echo get_post_meta(get_the_ID(), 'wpcf-position', true); ?></h2> -->
                </hgroup>
                <p><?php the_content(); ?></p>
                <!--
                <h3><?php echo __('Languages', 'smartportal'); ?></h3>
                <p><?php echo get_post_meta(get_the_ID(), 'wpcf-languages', true); ?></p>
                -->
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </article>
  </section>
<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>