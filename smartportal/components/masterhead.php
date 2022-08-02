<script>
	function afficherId(nom_div) { 
		if(document.getElementById(nom_div).style.display==="none") 	{
			document.getElementById(nom_div).style.display="block"; 
		}else  {
			document.getElementById(nom_div).style.display="none";
		} 
	}
</script>	
<?php include('hp_trad.php');?>
<div class="sub-header visible-desktop" >
	<span class="small-chevron-left" >></span> <span  class="sub-header_content1"><?php echo $sub_header;?></span><span  class="sub-header_content2"><a href="https://kronik.smart.coop/?lang=<?php echo ICL_LANGUAGE_CODE;?>" target="_blank">kronik</a></span> <span class="small-chevron-right"><</span>
</div>
<header id="masterhead" role="banner">
  <div>
    <a id="brand" rel="home" href="<?php echo smart_siteurl() ?>" class="hidden-desktop" >
        <h1><?php //echo bloginfo("title"); ?></h1>
    </a>
    <button id="primary-nav-toggle" class="btn btn-small btn-navbar hidden-desktop"> <strong>Menu</strong></button>
    <div class="full-nav" >
      <div class="header_container_logo ">
			<a  rel="home" href="/<?php echo ICL_LANGUAGE_CODE;?>"  >
				<img src="https://smartbe.be/ressources/charte/logos/smart-logo--white-with-padding.svg" width="180px" height="auto" class="hidden-phone hidden-tablet"/>
			</a>
		</div>
		<!-- EO Logos -->
		<div class="float-right se-connecter " >
			<div class="ft-s-s"><?php echo $espace_perso;?></div>
			<?php echo $login;?>
		</div>
		<div class="float-right header_switcher_lg">
			 <?php
			  if (function_exists('icl_get_languages')) {
				  $languages = icl_get_languages('skip_missing=0&orderby=code');
				  
				  if(!empty($languages)){
					echo '<ul id="smartbar-language" class="right">';
					$first = true;
					foreach($languages as $l){
					  $class = '';
					  if($l['active']) $class = 'active';
					  if($first) $class .= " divider";
					  echo '<li class="' . $class . '">';
					  echo '<a title="'.$l['translated_name'].'" href="'.$l['url'].'">';
					  echo $l['language_code'];
					  echo '</a>';
					  echo '</li>';
					  $first = false;
					}
					echo '</ul>';
				  }
				}
			  ?>
		</div>
		<div style="clear:both"></div>
			  <?php 
			  /*$walker = new Walker_Primary_Nav;
			  $args = array(
				'theme_location'  => 'primary',
				'menu'            => '', 
				'container'       => 'nav', 
				'container_class' => 'clearfix', 
				'container_id'    => 'primary-nav',
				'menu_class'      => 'nav', 
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => false,
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul class="nav">%3$s</ul>',
				'depth'           => 1
			  );
			  
			  wp_nav_menu($args);*/
			  if (ICL_LANGUAGE_CODE=='nl'){
				  echo '<nav id="primary-nav" class="clearfix"><ul class="nav"><li id="menu-item-16651" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16651"><a href="/nl/de-cooeperatie-smart-praktisch/">De coöperatie</a></li>
<li id="menu-item-27890" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27890"><a href="/nl/onze-diensten/">Onze diensten</a></li>
<li id="menu-item-2813" class="menu-item-news menu-item menu-item-type-post_type menu-item-object-page menu-item-2813"><a href="/nl/nieuws/">Nieuws</a></li>
<li id="menu-item-4692" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4692"><a href="/nl/wie-zijn-wij/">Wie zijn wij</a></li>
<li id="menu-item-16033" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16033"><a href="/nl/nous-contacter/">Contact</a></li>
</ul></nav>';
			}else if (ICL_LANGUAGE_CODE=='fr'){	
				echo '<nav id="primary-nav" class="clearfix"><ul class="nav"><li id="menu-item-16772" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-16772"><a href="/fr/la-cooperative-2/">Vie coopérative</a></li>
<li id="menu-item-25000" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-25000"><a href="/fr/nos-services">Services</a></li>
<li id="menu-item-1376" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376"><a href="/fr/a-propos/">Qui est Smart ?</a></li>
<li id="menu-item-1660" class="menu-item-news menu-item menu-item-type-post_type menu-item-object-page menu-item-1660"><a href="/fr/actualites/">Actualités</a></li>
<li id="menu-item-25002" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25002"><a href="/fr/publications/">Publications</a></li>
<li id="menu-item-632" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-632"><a href="/fr/contact/">Contact</a></li>
</ul></nav>	';
			}
			  ?>
			  <?php if (function_exists('relevanssi_do_query')) { ?>
				<div  id="searchform-mobile" >
					
					  <form role="search" method="get" class="" action="<?php echo home_url( '/' ); ?>" >
						<label>
							<br/>
						  <input type="search" class="" placeholder="<?php _e('Search','smartportal') ?>" value="" name="s" title="Search for:" />
						</label> 
						<div style="clear:both"></div>
					  </form>
					  <div style="clear:both"></div>
				</div>
      <?php } ?>
			<div class="visible-desktop">
				<a onclick="afficherId('searchform');"><div class="icone-search">
				</div></a>		
			</div>
			<div style="clear:both"></div>
    </div>
	<?php if (function_exists('relevanssi_do_query')) { ?>
		<div id="searchform" style="display:none;">
			
			  <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>" >
				<label>
				  <input type="search" class="search-field input-medium" placeholder="<?php _e('Search','smartportal') ?>" value="" name="s" title="Search for:" />
				</label> 
			  </form>
		</div>
      <?php } ?>
    <div class="site-overlay"></div>
	<div style="clear:both"></div>
  </div>
</header>