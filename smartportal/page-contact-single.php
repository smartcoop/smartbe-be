<?php
/*
Template Name: Contact Single
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <div class="container" id="content" role="main">
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <header class="page-leader" id="overview">
          <h1><?php the_title(); ?></h1>
        </header>
        
        <div class="row">
          <div class="span4">
            <?php if (smartportal_get_the_intro()) : ?>
              <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
            <?php endif; ?>
            
            <?php the_content(); ?>
            
            <hr class="page-divider">
            
            <div id="address-card">
              <dl class="row">
                <?php if ($meta['email'] = get_post_meta($post->ID, 'contact-email', true)) : ?>
                  <dt class="span1"><?php _e('E-mail', 'smartportal'); ?></dt>
                  <dd class="email span3"><a href="mailto:<?php echo $meta['email']; ?>"><?php echo $meta['email']; ?></a></dd>
                <?php endif; ?>
                <?php if ($meta['phone'] = get_post_meta($post->ID, 'contact-phone', true)) : ?>
                  <dt class="span1"><?php _e('Phone', 'smartportal'); ?></dt>
                  <dd class="phone span3"><?php echo $meta['phone']; ?></dd>
                <?php endif; ?>
                
                <?php if ($meta['address'] = get_post_meta($post->ID, 'contact-address', true)) : ?>
                  <div class="gmap span4">
                    <a href="https://maps.google.com/maps?q=<?php echo urlencode($meta['address']); ?>" style='background-image: url(http://maps.googleapis.com/maps/api/staticmap?center=<?php echo urlencode($meta['address']); ?>&amp;zoom=14&amp;size=600x168&amp;sensor=false&amp;markers=color:red|<?php echo urlencode($meta['address']); ?>);'></a>
                    
                  </div>
                  <dt class="span1"><?php _e('Address', 'smartportal'); ?></dt>
                  <dd class="span3"><?php echo nl2br($meta['address']); ?></dd>
                <?php endif; ?>
              </dl>
            </div>
          </div>
          
          <div class="form-horizontal span8">
            <hr class="page-divider visible-phone">
            <h1 id="form-title" class="visible-phone"><?php _e('Send us a message', 'smartportal'); ?></h1>
            <?php if ($meta['form-id'] = get_post_meta($post->ID, 'contact-form-id', true)) : ?>
              <?php echo do_shortcode('[contact-form-7 id="' . $meta['form-id'] . '" title="Contact form" /]'); ?>
            <?php endif; ?>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  </div><!-- /#content -->
<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>