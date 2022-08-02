<?php /* Template Name: Conseiller */ ?>
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

$allowed_hosts = array('smartbe.be', 'smartbe.be');
//$allowed_hosts = array('foo.smabe.be', 'smabe.be');

if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_hosts)) {
    //header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request');
	header('HTTP/1.1 400 Bad Request');
    exit;
}
?>

<?php
function left($str, $length) {
     return substr($str, 0, $length);
}

function right($str, $length) {
     return substr($str, -$length);
}
function url_exists($url) {
    if (!$fp = curl_init($url)) return false;
    return true;
}

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$filenameConseiller =  substr(filter_input(INPUT_GET, 'cs'),0,-1);

/*
$upload_dir = wp_upload_dir();


$query = "SELECT * FROM {$wpdb->posts} WHERE  post_title='$filenameConseiller'  AND post_mime_type='image/jpeg' order by post_date";
$count = $wpdb->get_row($query, ARRAY_A);
		
*/
$myres = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_title= %s AND post_mime_type='image/jpeg' order by post_date ASC ", $filenameConseiller), ARRAY_A);
 //test get_row when 2 images to avoid foreach
 foreach ($myres as $res) {
		$Cons_ID = $res['ID'];
 }
 
$def_attr = array(
	'Width' =>"200px",
	
);
$array_size = array(450,441);
 //$Cons_ID = $myres['ID'];
 
 
 ?>
 <div id="content" role="main" class="container">

  
 
	 <article>
		  <div class="row">
		 <div class="span12 <?php if($menu_name) echo 'offset3' ?>">
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
			
			</header>
		 </div>	
		 					</div>
			 <div class="row">
				<div class="span3 <?php if($menu_name) echo 'offset3' ?>"></div>
					<div class="span9 <?php if($menu_name) echo 'offset3' ?>">
						<div id="imgCons" style="float:left">
							<!-- <?php echo "<div class='well'>".wp_get_attachment_image( $Cons_ID, $array_size,false,$def_attr )."</div>" ; ?> -->
						</div>
						<div id="shortdesc">
						<?php
						if(ICL_LANGUAGE_CODE == "nl"){ 
							$lang_url = "nl";
						}
						else{
							$lang_url = "fr";
						}
						
						$equipe = strtoupper(get_post_meta($Cons_ID, 'wpcf-equipe', true));
						$mail= get_post_meta($Cons_ID, 'wpcf-mail', true);
						echo "<div class='well'  style='text-align: center;'>";
						echo "<h2>" .$nom = get_post_meta($Cons_ID, '_wp_attachment_image_alt', true) ."</h2>";
						echo "<h3><a class='title_".$equipe."' href='http://smartbe.be/".$lang_url."/equipe?team=".$equipe."/'>Equipe: " .mb_strtoupper($equipe)."</a></h3>";
						//echo  "<p>" .$mail= get_post_meta($Cons_ID, 'wpcf-mail', true)."</p>";
						echo "<p><a href='mailto:".$mail."'>".c2c_obfuscate_email($mail)."</a></p>";
						echo  "<p>" .$phone= get_post_meta($Cons_ID, 'wpcf-phone', true) ."</p>";
						echo  "<p>" .$langue= get_post_meta($Cons_ID, 'wpcf-lang', true) ."</p>";
						echo "</div >";
						
						?>
						
						</div>
						<div id="txtCons" >
							<?php
								add_filter( 'meta_content', 'wptexturize'        );
								add_filter( 'meta_content', 'convert_smilies'    );
								add_filter( 'meta_content', 'convert_chars'      );
								add_filter( 'meta_content', 'wpautop'            );
								add_filter( 'meta_content', 'shortcode_unautop'  );
								add_filter( 'meta_content', 'prepend_attachment' );

										
								$text= get_post_meta($Cons_ID, 'wpcf-texte-libre', true);
								if($text !=""){
									echo "<div class='well'>";
									echo apply_filters('meta_content',$text);
									echo "</div>";
									
								}
							
							?>
							
							
						</div>
						<?php
						
							//$metadata =  wp_get_attachment_metadata( $Cons_ID	); 
						
						//$postmetattach = get_post_meta($Cons_ID, 'wp_attachment_metadata', true);
					
						//$metadata = get_post_meta($Cons_ID);
						/*
						foreach ( $metadata as $metakey  ){
							foreach ($metakey as $key => $keyval){
								echo "<p> => $key :: $keyval </p>";
								
							}
						}
						*/
						
						?>
					</div>
		    </div>
	  <article>
		
</div> 
 
<?php
 /* get_res is indexed array of associative 
 
 foreach($myres as $key => $key_value) {
    echo "Key=" . $key . ", Value=" . $key_value;
    echo "<br>";
}
*/
 

 

// echo $myres['guid'];
 //echo $myres['ID'];
 

 
 
 

/*
for ($j=2015; $j<2025; $j++){
	for ($i=1; $i<13;$i++) {
		
		if (strlen($i)<2){
			$month_url = "0".$i;
		}else{
			$month_url = $i;
		}
	$pic_url= $upload_dir['baseurl'].'/'. $j ."/".$month_url."/".$filenameConseiller.".jpg";
	if (is_readable($pic_url)) {echo "found" . $pic_url; }
	
	echo "<BR>".$pic_url. "<br>";
	//if (fopen($pic_url,"r")) {echo "<br>found" . $pic_url ."<br>"; }
	
	}
	
}

	
	*/
	
	//$pic_url= $pic_url. $j ."/".$month_url."/".filter_input(INPUT_GET, 'cs').".jpg";
	//echo "\r \r".$pic_url;
	
		/*
		global $wpdb;
		$image_src = $wp_upload_dir['baseurl'] . '/' . _wp_relative_upload_path( "Tad.jpg" );
		//echo $image_src;
		$query = "SELECT COUNT(*) FROM {$wpdb->posts} WHERE guid='$image_src'";
		$count = $wpdb->get_var($query);
	
		echo $count;
		// guid = http://smartbe.be/wordpress/../media/uploads/2015/11/Tad.jpg
	    */
	
	
	 //if (file_exists($pic_url)) {echo "found" . $pic_url; break 2;}
	  //if (url_exists($pic_url)) {echo "found" . $pic_url; break 2;}
	 //$handle = fopen($pic_url,"r");
		//if ($handle) {echo "found" . $pic_url; break 2;}

 

//
//echo $_GET['cs'];
//var_dump($_GET);



?>

