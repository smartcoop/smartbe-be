<?php /* Template Name: Contact BXL */ ?>
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
			<?php 
				
				$get_teams = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE meta_key = %s AND  `meta_value` IS NOT NULL  ", 'wpcf-equipe'), ARRAY_A);
				 $TeamsColor = array() ;
				 $nlspeakers = array();
				 $title_equipe = array();
				
				 foreach ($get_teams as  $teams) {
						
						$keyColor = strtoupper ($teams['meta_value']);
						
						if (!array_key_exists($keyColor ,$TeamsColor)){
							$TeamsColor[$keyColor] =array ($teams['post_id'] );
						}else {
							array_push($TeamsColor[$keyColor],$teams['post_id']);
						}
						
						$lang_spoken= get_post_meta($teams['post_id'], 'wpcf-lang', true);
						$nl = strpos($lang_spoken, 'NL');
						$only_bxl = "YELLOW, PURPLE, BLUE, GREEN, TURQUOISE";
						if( strpos ($only_bxl, $keyColor)){
							if($nl) {
								$nlspeakers[]=$teams['post_id'];
							}
						}
						
							
						
					}
					//echo count($nlspeakers);
					//var_dump ($title_equipe);
					$title_equipe = array ("YELLOW" => "+32 2 543 77 15 &#10; bruxellesyellow@smart.coop" , 
										   "PURPLE" => "+32 2 543 77 13 &#10; bruxellespurple@smart.coop" , 
										   "BLUE" => "+32 2 543 77 12 &#10; bruxellesblue@smart.coop",
										   "GREEN" => "+32 2 543 77 14 &#10; bruxellesgreen@smart.coop", 
										   "TURQUOISE" => "+32 2 543 77 11 &#10; bruxellesturquoise@smart.coop",
										   
										   );
					
							
			?>
			
			
			<?php include 'menuBru.html'; ?>
            <?php if($display_date) { ?>
  		    <span class="text-muted last-modified"><?php _e("mis à jour le","smartportal"); ?> <?php the_date(get_option('date_format')) ?></span>
            <?php } ?>
          </header>
        </div>
      </div>
      <div class="row">
        
        <div class="span12">
		<div class="article offset1"><?php the_content(); ?></div>
          <?php 
		 // error_reporting(E_ALL);
		 
		 if(ICL_LANGUAGE_CODE == "fr"){echo "<hr class='page-divider'>";}
		 
		  $def_attr = array(
				'Width' =>"150px",
				'Title' => "",
				'class' =>"team-media",
				
			);

			
			if(ICL_LANGUAGE_CODE == "nl"){
				if (count($nlspeakers)>0){
					
					$nlcounter = 0;
					//echo the_content();
					shuffle($nlspeakers);
					foreach ($nlspeakers as $nlspeaker){
						if($nlcounter ==9) {
							echo "</div>";
							echo "</div>";
							echo "<div class='row'>";
							echo "<div class='span12'>";
						}
						echo "<div class='span1 ' >";
						/* echo '<a href="http://smartbe.be/fr/page-conseiller?cs='.get_the_title($nlspeaker) .'/">'.wp_get_attachment_image( $nlspeaker, 'full',false,$def_attr ) . '</a>'; */
						echo "</div>";
						$nlcounter = $nlcounter +1;
					}
							echo "<hr class='page-divider'>";
							echo "</div>";
							echo "</div>";
							
							echo "<div class='row'>";
							echo "<div class='span12'>";
				
				}
			$lang_url = "nl";
			}
			else{
			$lang_url = "fr";
			}
				
		 shuffle_assoc($TeamsColor);
		  $countequipe = 0;
		  foreach ($TeamsColor as $Color => $IDTeam){
		  $match_bxl =  strpos ($only_bxl, $Color);
			  if ($match_bxl !== false){
				
				shuffle($IDTeam);
				//var_dump($IDs);
				echo "<div id=".$Color ." class = 'span4_rev team'>";    //.$Color. "<br>";
			
				echo "<div  class='team-title '><a class='title_".$Color."' title='".$title_equipe[$Color]."' href='http://smartbe.be/".$lang_url."/equipe?team=".$Color."/'>" .$Color."</a></div>";
				echo "<div  class='clearfix'></div>";
				//echo "<div class='team-sub cell_".$Color."' >".$title_equipe[$Color]."</div>";
				$exploded_pieces = explode("&#10;", $title_equipe[$Color]);
				$phoneTeam = $exploded_pieces[0];
				$mailsTeam = $exploded_pieces[1];
					
				echo "<div class='team-sub cell_".$Color."' >".$phoneTeam."&#10;<a href='mailto:".$mailsTeam."'>".$mailsTeam."</a> </div>";
								
				
					foreach ($IDTeam as $key => $IDteam_member){
					$nom = get_post_meta($IDteam_member, '_wp_attachment_image_alt', true);
					//$phone= get_post_meta($IDteam_member, 'wpcf-phone', true);
					//$mail= get_post_meta($IDteam_member, 'wpcf-mail', true);
					$lang= get_post_meta($IDteam_member, 'wpcf-lang', true);
					//$def_attr['Title'] = $mail . '&#10;' .$phone.'&#10;'.$lang ;
					$def_attr['Title'] = $mail . '&#10;' .$lang ;
					$achortitle = $mail . '&#10;' .$phone.'&#10;'.$lang ;
						
					echo "<div class='span4' id='mediatxtalign'>";
					echo '<div class="span1 " >';
					
					//echo '<img src="http://smartbe.be/wordpress/../media/uploads/2016/03/MrWhite.png" >'; 
					//echo '<a href="http://smartbe.be/fr/page-conseiller?cs='.get_the_title($IDteam_member) .'/">'.  wp_get_attachment_image( $IDteam_member, 'full',false,$def_attr ) . '</a>'; 
					echo wp_get_attachment_image( $IDteam_member, 'full',false,$def_attr );
					
					
					echo"</div>";
					//echo '<div class="span2 namealign cell_'.$Color.'" ><a title="'.$achortitle.'" href="http://smartbe.be/'.$lang_url.'/page-conseiller?cs='.get_the_title($IDteam_member) .'/">'.$nom.'</a></div>'; 
					echo '<div class="span2 namealign cell_'.$Color.'"  >'.$nom.'</div>'; 
					echo '<div class="span1 langalign cell_'.$Color.'" >'.$lang.'</div>'; 
					echo"</div>";	
					
					}
				echo "</div>";
				
				if($countequipe == 2){
					echo "</div>";
					echo "</div>";
					echo "<hr class='page-divider'>";
					echo "<div class='row'>";
					echo "<div class='span12'>";
				 
				}
				$countequipe = $countequipe +1;
				
			  }
				
		 }
		  	
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

