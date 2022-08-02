<div id="smartbar">
  <div class="container">
    <?php
      $region = get_option('country_code') ? get_option('country_code') : '';
      $flag = $region ? $region : 'eu';
      $siteurl = smart_siteurl();
    ?>
    <a class="brand <?php echo $region ?>" href="<?php echo $siteurl; ?>"><?php echo get_bloginfo('name'); ?></a>
    <span class="region">
      <a href="#" class="" data-toggle="dropdown">
        <span><i class="iconflag-<?php echo $flag ?>"><?php echo strtoupper($region) ?></i><b class="caret"></b></span>
      </a>
      <ul class="dropdown-menu">
        <?php if($region == 'be'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-be"></i> Belgique / België</a></li><?php } ?>
        <?php if($region == 'de'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-de"></i> Deutschland</a></li><?php } ?>
      <!--  <?php if($region == 'dk'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-dk"></i> Danmark</a></li><?php } ?> -->
        <?php if($region == 'fr'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-fr"></i> France</a></li><?php } ?>
        <?php if($region == 'ib'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-ib"></i> Iberica</a></li><?php } ?>
        <?php if($region == 'it'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-it"></i> Italia</a></li><?php } ?>
        <?php if($region == 'hu'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-hu"></i> Magyarország</a></li><?php } ?>
        <?php if($region == 'nl'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-nl"></i> Nederland</a></li><?php } ?>
        <?php if($region == 'at'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-at"></i> Österreich</a></li><?php } ?>
        <?php if($region == 'sw'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-sw"></i> Sverige</a></li><?php } ?>
      <!--  <?php if($region == 'uk'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-uk"></i> United Kingdom</a></li><?php } ?> -->
        <?php if($region == 'eu'){ ?><li><a href="<?php echo $siteurl ?>"><i class="iconflag-eu"></i> SMart Europe</a></li><?php } ?>
        <?php if($region != ''){ ?><li class="divider"></li><?php } ?>
        <?php if($region != 'be'){ ?><li><a href="http://smartbe.be"><i class="iconflag-be"></i> Belgique / België</a></li><?php } ?>
        <?php if($region != 'de'){ ?><li><a href="http://smart-de.org"><i class="iconflag-de"></i> Deutschland</a></li><?php } ?>
       <!--  <?php if($region != 'dk'){ ?><li><a href="http://smart-dk.org"><i class="iconflag-dk"></i> Danmark</a></li><?php } ?>  -->
        <?php if($region != 'fr'){ ?><li><a href="http://smartfr.fr"><i class="iconflag-fr"></i> France</a></li><?php } ?>
        <?php if($region != 'ib'){ ?><li><a href="http://smart-ib.org"><i class="iconflag-ib"></i> Iberica</a></li><?php } ?>
        <?php if($region != 'it'){ ?><li><a href="http://smart-it.org"><i class="iconflag-it"></i> Italia</a></li><?php } ?>
        <?php if($region != 'hu'){ ?><li><a href="http://smart-hu.org"><i class="iconflag-hu"></i> Magyarország</a></li><?php } ?>
        <?php if($region != 'nl'){ ?><li><a href="http://smart-nl.org"><i class="iconflag-nl"></i> Nederland</a></li><?php } ?>
        <?php if($region != 'at'){ ?><li><a href="http://smart-at.org"><i class="iconflag-at"></i> Österreich</a></li><?php } ?>
        <?php if($region != 'sw'){ ?><li><a href="http://smart-se.org"><i class="iconflag-se"></i> Sverige</a></li><?php } ?>
     <!--   <?php if($region != 'uk'){ ?><li><a href="http://smartuk.org.uk"><i class="iconflag-uk"></i> United Kingdom</a></li><?php } ?> -->
        <?php if($region != 'eu'){ ?>
          <li class="divider"></li>
          <li><a href="http://smart-eu.org"><i class="iconflag-eu"></i> SMart Europe</a></li>
        <?php } ?>
      </ul>
    </span>

    
    <?php 
    $args = array(
      'theme_location'  => 'smartbar-links',
      'menu'            => '', 
      'container'       => '', 
      'container_class' => '', 
      'container_id'    => '',
      'menu_class'      => 'menu', 
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => false,
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
      'depth'           => 2,
			'walker'	 => new SMartbar_Walker_Nav_Menu()
    );
    
    wp_nav_menu($args);
    ?>
    
    <?php
    /*if (function_exists('icl_get_languages')) {
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
    }*/
    ?>
    
  </div>
</div>