<?php /* Template Name: Contact Map */ ?>
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
        <div class="span12 <?php if($menu_name) echo 'offset3' ?>">
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
            <?php if($display_date) { ?>
  		    <span class="text-muted last-modified"><?php _e("mis à jour le","smartportal"); ?> <?php the_date(get_option('date_format')) ?></span>
            <?php } ?>
          </header>
        </div>
      </div>
      <div class="row">
        
        <div class="span12">
          
         <?php the_content(); ?>
		  
		 <map name="ContactMap" class="hidden-phone"> 
		<?php if(ICL_LANGUAGE_CODE == "fr"){  ?>
		
			
			
			

				<area shape="rect" coords="282,221,329,250"href="http://smartbe.be/fr/equipe/?team=Gent/" alt="Gent" title="Gent"/>

				<!--<area shape="rect" coords="223,263,290,290" href="http://smartbe.be/fr/equipe/?team=Kortrijk/" alt="Kortrijk" title="Kortrijk"/>-->

				<area shape="rect" coords="253,335,327,364" href="http://smartbe.be/fr/equipe/?team=Tournai/" alt="Tournai" title="Tournai"/>

				<area shape="rect" coords="328,367,375,396" href="http://smartbe.be/fr/equipe/?team=Mons/" alt="Mons" title="Mons"/>

				<area shape="rect" coords="390,390,463,417" href="http://smartbe.be/fr/equipe/?team=Charleroi/" alt="Charleroi" title="Charleroi"/>

				<area shape="rect" coords="469,369,526,397" href="http://smartbe.be/fr/equipe/?team=Namur/" alt="Namur" title="Namur"/>

				<area shape="rect" coords="404,324,514,352" href="http://smartbe.be/fr/equipe/?team=LLN/" alt="LLN" title="LLN"/>

				<area shape="rect" coords="647,321,698,350" href="http://smartbe.be/fr/equipe/?team=Eupen/" title="Eupen"/>

				<area shape="rect" coords="563,317,605,347" href="http://smartbe.be/fr/equipe/?team=Liège/" alt="Liège" title="Liege"/>

				<!--<area shape="rect" coords="556,240,602,269" href="http://smartbe.be/fr/equipe/?team=Genk/" alt="Genk" title="Genk"/>-->

				<area shape="rect" coords="412,186,490,211" href="http://smartbe.be/fr/equipe/?team=Antwerpen/" alt="Antwerpen" title="Antwerpen"/>

				<area shape="rect" coords="387,274,457,300" href="http://smartbe.be/fr/bruxelles/" alt="Bruxelles" title="Bruxelles"/>



			
			<?php
			}
			else{
			?>
				
			<area shape="rect" coords="282,221,329,250" href="http://smartbe.be/nl/equipe/?team=Gent/" alt="Gent" title="Gent_nl"/>

			<!--<area shape="rect" coords="223,263,290,290" href="http://smartbe.be/nl/equipe/?team=Kortrijk/" alt="Kortrijk" title="Kortrijk_nl"/>-->

			<area shape="rect" coords="253,335,327,364" href="http://smartbe.be/nl/equipe/?team=Tournai/" alt="Tournai" title="Tournai_nl"/>

			<area shape="rect" coords="328,367,375,396" href="http://smartbe.be/nl/equipe/?team=Mons/" alt="Mons" title="Mons_nl"/>

			<area shape="rect" coords="390,390,463,417" href="http://smartbe.be/nl/equipe/?team=Charleroi/" alt="Charleroi" title="Charleroi_nl"/>

			<area shape="rect" coords="469,369,526,397" href="http://smartbe.be/nl/equipe/?team=Namur/" alt="Namur" title="Namur_nl"/>
			
			<area shape="rect" coords="404,324,514,352" href="http://smartbe.be/fr/equipe/?team=LLN/" alt="LLN" title="LLN_nl"/>

			<area shape="rect" coords="647,321,698,350" href="http://smartbe.be/nl/equipe/?team=Eupen/" alt="Eupen" title="Eupen_nl"/>

			<area shape="rect" coords="563,317,605,347" href="http://smartbe.be/nl/equipe/?team=Liège/".html" alt="Liege" title="Liege_nl"/>

			<!--<area id="genk_add" shape="rect" coords="556,240,602,269" href="http://smartbe.be/nl/equipe/?team=Genk/" alt="Genk" title="Genk_nl"/>-->

			<area id="antw_add" shape="rect" coords="412,186,490,211" href="http://smartbe.be/nl/equipe/?team=Antwerpen/" alt="Antwerpen" title="Antwerpen_nl"/>

			<area id="bru_add" shape="rect" coords="387,274,457,300" href="http://smartbe.be/nl/bruxelles/" alt="Brussel" title="Brussel"/>
				
			<?php	
			}
		
		 ?>
		
		
			</map>
		</div>
		
      </div>
      
    </article>
  
  <?php endwhile; ?>
  
 

</div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>

