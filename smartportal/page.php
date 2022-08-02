<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */

get_header(); 


/* Check if there is a menu for this page */
$menu_name = get_post_meta(get_the_ID(), "menu", true);
$display_date = types_render_field("display-last-updated", array("output" => "raw"));

if(!$menu_name) $menu_name = get_post_meta(get_the_ID(), "wpcf-menu", true);


?>

<?php if (have_posts()): ?>

  <?php if($post->post_parent): ?>
    <div class="visible-phone mobile-nav-bar">
      <a href="<?= get_permalink($post->post_parent) ?>" class="parent-page"><?= ( get_post_meta($post->post_parent, 'wpcf-label-nav-mobile', true) ? : get_the_title( $post->post_parent)) ?></a>
    </div>
  <?php endif; ?>

<div id="content" role="main" class="container">

  <?php while(have_posts()): ?>
    <?php the_post(); ?>
  
    <article>
      <div class="row">
        <div class="span9 <?php if($menu_name) echo 'offset4' ?>">
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
            <?php if($display_date) { ?>
  		    <span class="text-muted last-modified"><?php _e("mis à jour le","smartportal"); ?> <?php the_date(get_option('date_format')) ?></span>
            <?php } ?>
          </header>
        </div>
      </div>
      <div class="row">
		  
        <?php
        if($menu_name){
          ?>
          <div class="span4 hidden-phone">
            <nav class="section-nav">          
            <?php
            $args = array(
              'menu'  => $menu_name,
              'container'       => '', 
              'menu_class'      => 'nav nav-chevron', 
              'echo'            => true,
              'fallback_cb'     => false,
              'depth'           => 2);
            wp_nav_menu($args);
            ?>
            </nav>
			<?php if(is_page('18923') || is_page('18947')){?>
				<hr class="page-divider" style="margin-top:82px">
				<?php include("components/compteur-societaires.php"); ?>
			<?php }?>
			<?php //if(is_page('26481') || is_page('26506') || is_page('26664')){ //page AG 2019?>
				<!--<iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62206407038" frameborder="0" height="414" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>				
				<iframe  src="https://www.eventbrite.fr/countdown-widget?eid=62193747172" frameborder="0" height="394" width="195" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>-->
			<?php //}?>
			<?php 
				
			
		
			if(is_page('SMart in Progress')):  ?>
			 
			 <hr class="page-divider" style="margin-top:82px">
			 
				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup">
					<form id="mc-embedded-subscribe-form" class="validate" action="//smartbe.us8.list-manage.com/subscribe/post?u=0d934dff68436120a131ebc5e&amp;id=2fc07ce5dc" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
						<div id="mc_embed_signup_scroll">
						
						
						<?php If (ICL_LANGUAGE_CODE=='nl') : ?> 
							<h2>Wil je op de hoogte gehouden worden? Schrijf je in op onze mailinglist! </h2>
							<div class="mc-field-group">e-mail adres
						
						<?php else : ?> 
							<h2>Envie d'être tenu au courant du projet? Inscrivez-vous!</h2>
							<div class="mc-field-group">Adresse e-mail
						<?php endif; ?>  
						
						
						
						
						
						<input id="mce-EMAIL" class="required email" name="EMAIL" type="email" value="" /></div>
						<div id="mce-responses" class="clear"></div>
						
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;"><input tabindex="-1" name="b_0d934dff68436120a131ebc5e_2fc07ce5dc" type="text" value="" /></div>
						<div class="clear"><input id="mc-embedded-subscribe" class="button" name="subscribe" type="submit" value="Subscribe" /></div>
						</div>
					</form>
				</div>

				
				<!-- Storify
					<div class="storify"><iframe src="//storify.com/SMartBe/smart-in-progress/embed?header=false&border=false" width="100%" height="750" frameborder="no" allowtransparency="true"></iframe><script src="//storify.com/SMartBe/smart-in-progress.js?header=false&border=false"></script><noscript>[<a href="//storify.com/SMartBe/smart-in-progress" target="_blank">View the story "SMart in Progress" on Storify</a>]</noscript></div>  
				-->
			<?php
				endif; 
			?>
			
          </div>
          <?php
        }
        ?> 
        <div class="span8">
          <div class="article">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php the_content(); ?>
          </div>
        </div>
      </div>
      
    </article>
  
  <?php endwhile; ?>
    <nav class="section-nav hidden-desktop"> 
		<hr/>  
		<?php
		$args = array(
		  'menu'  => $menu_name,
		  'container'       => '', 
		  'menu_class'      => 'nav nav-chevron', 
		  'echo'            => true,
		  'fallback_cb'     => false,
		  'depth'           => 2);
		
		 wp_nav_menu($args);
		?>
	</nav>
  <?php //get_sidebar('subfooter'); ?>

</div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>