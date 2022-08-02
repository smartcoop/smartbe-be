<?php /* Template Name: Contact Equipe */ ?>
<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */

get_header(); 
//error_reporting(E_ALL);

/* Check if there is a menu for this page */
$menu_name = get_post_meta(get_the_ID(), "menu", true);
$display_date = types_render_field("display-last-updated", array("output" => "raw"));
$onlyBru = false;

if(!$menu_name) $menu_name = get_post_meta(get_the_ID(), "wpcf-menu", true);
$allowed_hosts = array('smartbe.be', 'stage.smartbe.be');


if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_hosts)) {
    //header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request');
	header('HTTP/1.1 400 Bad Request');
    exit;
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

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
	
        <div class="span12 offset2  <?php if($menu_name) echo 'offset3' ?>">
          <header class="page-leader" id="overview">
            <?php 
				$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$page_equipe =  substr(filter_input(INPUT_GET, 'team'),0,-1);
			?>
			<h1><?php the_title(); ?> <?php echo mb_strtoupper($page_equipe);  ?></h1> 
			
			<div id="presentation">
				<?php the_content(); ?> 
				
			</div>
			<script>
				$("#<?php echo mb_strtoupper($page_equipe); ?>").show();
			</script>
			
		  </header>
        </div>
      </div>
      <div class="row">
        <div class="span2">
		
			
			<?php 
			
			$only_bxl = " YELLOW, PURPLE, BLUE, GREEN, TURQUOISE ";
			$find = mb_strtoupper($page_equipe);
			// if($find==""){$find="ANTWERPEN";}
			
			if( strpos ($only_bxl, $find)){
				include 'menuBru.html'; 
				$onlyBru = true;
				}
			?>
		</div>
        <div class="span10">
		<?php 
	$show_team = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = %s AND  `meta_value` = %s  ", 'wpcf-equipe' , $page_equipe ), ARRAY_A);
	$def_attr = array(
				'Width' =>"150px",
				'class' =>"pic_conseiller",
				
			);
			
			if(ICL_LANGUAGE_CODE == "nl"){ 
				$lang_url = "nl";
			}
			else{
				$lang_url = "fr";
			}
			
	//if(ICL_LANGUAGE_CODE == "fr"){
		 $count=0;
		 $id_conseillers= array();
		 foreach ($show_team as $key => $team) {
				foreach ($team as $idkey => $idc){
					//array_push($id_conseillers,$id);
					$id_conseillers[] = $idc;
				}
		 }
		 shuffle($id_conseillers);
		 foreach ($id_conseillers as $id) {
					$count = $count + 1;
					$nom = get_post_meta($id, '_wp_attachment_image_alt', true);
					$langue = get_post_meta($id, 'wpcf-lang', true);
					$phone= get_post_meta($id, 'wpcf-phone', true);
					//$mail= get_post_meta($id, 'wpcf-mail', true);
					
						if($id!='36498'){
							echo "<div class='span2 Picpres well'>";
						
						//echo '<a href="http://smartbe.be/fr/page-conseiller?cs='.get_the_title($id) .'/">'.wp_get_attachment_image( $id, 'full',false,$def_attr ) . '</a>'; 
						
							echo wp_get_attachment_image( $id, 'full',false,$def_attr ); 						
							echo "<br><strong>".$nom."</strong>";
						
							//	echo '<br><strong><a href="http://smartbe.be/'.$lang_url.'/page-conseiller?cs='.get_the_title($id) .'/">'.$nom.'</a></strong>';
							//echo "<br>".$phone;
							//echo "<br>".hide_email($mail);
							echo "<br><a href='mailto:".$mail."' class='equipes_mail'>".c2c_obfuscate_email($mail)."</a>";
							echo "<br>".$langue ;
							echo "</div>";
						
							if($count==3 or $count==6){
								echo "</div>";
								echo "</div>";
								echo "<div class='row'>";
								echo "<div class='span2'>";
								echo "</div>";
								echo "<div class='span10'>";
							}
						}
		}
	//}
	//else{
	/*
		 $countfr=0;
		 $id_conseillers_fr= array();
		 $id_conseillers_nl= array();
		 foreach ($show_team_lang as $keylang => $teamlang) {
				foreach ($teamlang as $idkeylang => $idclang){
					$langTmp = get_post_meta($idclang, 'wpcf-mail', true);
					if($langTmp !=''){
						if (strpos($langTmp, 'nl')){
							$id_conseillers_nl[] = $idclang;
						}
						else{
							$id_conseillers_fr[] = $idclang;
						}
					}
					$id_conseillers_fr[] = $idclang;
					
				}
		 }
		 shuffle($id_conseillers_fr);
		 shuffle($id_conseillers_nl);
		 if (count($id_conseillers_nl) !=0){
		  echo count ($id_conseillers_nl);
		 
		 }
		 else {
			echo count ($id_conseillers_nl);
		 }
		 
		 */
/*		 
		 foreach ($id_conseillers as $id) {
					$count = $count + 1;
						$nom = get_post_meta($id, '_wp_attachment_image_alt', true);
						$phone= get_post_meta($id, 'wpcf-phone', true);
						$mail= get_post_meta($id, 'wpcf-mail', true);
												
						echo "<div class='span3'>";
						echo '<a href="http://smartbe.be/fr/page-conseiller?cs='.get_the_title($id) .'/">'.wp_get_attachment_image( $id, 'full',false,$def_attr ) . '</a>';
						echo "<br>".$nom;
						echo "<br>".$phone;
						//echo "<br>".hide_email($mail);
						echo "<br><a href='mailto:".$mail."'>".c2c_obfuscate_email($mail)."</a>";
						
						echo "</div>";
						if($count==3){
							echo "</div>";
							echo "</div>";
							echo "<div class='row'>";
							echo "<div class='span12'>";
						}
		}
		
		*/
		 
		 
	//}
	
	?>
      </div>
	  </div>
    </article>
  
  <?php endwhile; ?>
  
  <?php include ('components/floating-box-enquete.php');?>
 

</div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>

