<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */
 
 /*
 
Template Name: RGPD

*/
//RGPD : Récupérer la key - récupérer accept
global $wpdb;
$key=$_GET['key'];
$accept=$_GET['accept'];
$current_date=time();

/*
$wpdb->update(
    $wpdb->'rgpd_acceptation',
    array('key' => $key),
    array('acceptation' => true)	
);*/


$wpdb->update('rgpd_acceptation', array('acceptation'=>$accept), array('UUID'=>$key));
/*// Print last SQL query string
				echo $wpdb->last_query;
				// Print last SQL query result
				echo $wpdb->last_result;
				// Print last SQL query Error
				echo $wpdb->last_error;*/
				
get_header(); 


/* Check if there is a menu for this page */
$menu_name = get_post_meta(get_the_ID(), "menu", true);
$display_date = types_render_field("display-last-updated", array("output" => "raw"));

if(!$menu_name) $menu_name = get_post_meta(get_the_ID(), "wpcf-menu", true);

if (ICL_LANGUAGE_CODE == 'fr'){
	$remerciement="<b>Merci, nous avons bien enregistré votre choix.</b>";
} else{
	$remerciement="<b>Bedankt, we hebben uw keuze goed genoteerd.</b>";
}
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
			
			
			
          </div>
          <?php
        }
        ?> 
        <div class="span8">
          <div class="article">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php echo $remerciement; ?>
		  <?php echo "<br/><br/>"; ?>
		  
		  <?php echo ""; ?>
		  <?php // echo '<br>'.$key; ?>
		  <?php // echo '<br>'.$accept; 
				
		  
		  ?>
		  <?php
	error_reporting(1);
	//$string = file_get_contents("http://public.smartbe.be/coop/shareholdersCount.json");
	//$json = json_decode($string, true);
	/*
	$url = 'http://public.smartbe.be/coop/shareholdersCount.json';
	$request = wp_remote_get( 'https://public.smartbe.be/coop/shareholdersCount.json' );

	if( is_wp_error( $request ) ) {
		echo 'trouve rien!';
		//print $request[ 'body' ];
	}

	$body = wp_remote_retrieve_body( $request );

	$json = json_decode( $body, true );*/
	
	//phpinfo();
	
	 // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "public.smartbe.be/coop/shareholdersCount.json"); 

        //return the transfer as a string 
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
       $json = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch); 
	
	
?>
          </div>
        </div>
      </div>
      
    </article>
  
  <?php endwhile; ?>
  
  <?php //get_sidebar('subfooter'); ?>

</div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>