<?php get_header(); ?>

<?php
$args = array(
  'post_type' => 'contact-office',
  'orderby'   => 'menu_order',
  'order'     => 'ASC'
);
$query = new WP_Query($args);
$offices = array();

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
    
    $offices[] = array(
      'office_name'        => get_the_title(),
      'office_address'     => get_post_meta(get_the_ID(), 'wpcf-contact-office-address', true),
	  'office_desc'        => get_post_meta(get_the_ID(), 'wpcf-contact-office-desc', true),
      'office_address_raw' => preg_replace('/\s+/', ' ', preg_replace('/\n|\r/', ' ', strip_tags(get_post_meta(get_the_ID(), 'wpcf-contact-office-address', true)))),
      'office_email'       => get_post_meta(get_the_ID(), 'wpcf-contact-office-email', true),
      'office_phone'       => get_post_meta(get_the_ID(), 'wpcf-contact-office-phone', true),
      'office_mobile'      => get_post_meta(get_the_ID(), 'wpcf-contact-office-mobile', true),
      'office_fax'         => get_post_meta(get_the_ID(), 'wpcf-contact-office-fax', true),
      'person_name'        => get_post_meta(get_the_ID(), 'wpcf-contact-person-name', true),
      'person_title'       => get_post_meta(get_the_ID(), 'wpcf-contact-person-title', true),
      'person_picture'     => get_post_meta(get_the_ID(), 'wpcf-contact-person-picture', true)
    );
  }
}
?>

<?php if (sizeof($offices) > 0) : ?>
  <div id="content" role="main" class="container">
    <article>
      <div class="row">
        <div class="span2">
          <ul class="nav nav-chevron offices-nav hidden-phone">
            <?php $i = 0; ?>
            
            <?php foreach ($offices as $office) : ?>
              <li class="<?php if ($i == 0) : ?>active<?php endif; ?>"><a href="#tab<?php echo $i; ?>" data-toggle="tab"><?php echo $office['office_name']; ?></a></li>
              
              <?php $i++; ?>
            <?php endforeach; ?>
          </ul>
          
          <select id="office-select" class="nav-select visible-phone span4">
            <?php $i = 0; ?>
            
            <?php foreach ($offices as $office) : ?>
              <option data-url="#tab<?php echo $i; ?>"><?php echo $office['office_name']; ?></option>
              
              <?php $i++; ?>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div class="span10">
          <div class="tab-content">
            <?php $i = 0; ?>
            
            <?php foreach ($offices as $office) : ?>
              <div class="tab-pane<?php if ($i == 0) : ?> active<?php endif; ?>" id="tab<?php echo $i; ?>">
                <!--header class="page-leader">
                  <h1><?php echo $office['office_name']; ?></h1>
                </header-->
                
                
                
                <div class="row">
                  <div class="span4">
                    <div class="map" id="map-<?php echo $i; ?>" data-office-address="<?php echo $office['office_address_raw']; ?>"></div>
                  </div>
                  <div class="span6">
                    
                    <h2 class="infos-heading"><?php echo __('Contact informations', 'smartportal'); ?></h2>
                    
                    <ul class="infos-list">
					
					  <?php if (isset($office['office_desc']) && $office['office_desc'] !== '') : ?>
                        <li class="infos-address"><?php echo nl2br($office['office_desc']); ?></li>
                      <?php endif; ?>
					  
                      <?php if (isset($office['office_address']) && $office['office_address'] !== '') : ?>
                        <li class="infos-address"><?php echo nl2br($office['office_address']); ?></li>
                      <?php endif; ?>
                      <?php if (isset($office['office_email']) && $office['office_email'] !== '') : ?>
                        <li class="infos-email"><a href="mailto:<?php echo $office['office_email']; ?>"><?php echo $office['office_email']; ?></a></li>
                      <?php endif; ?>
                      <?php if (isset($office['office_phone']) && $office['office_phone'] !== '') : ?>
                        <li class="infos-phone"><?php echo __('T.', 'smartportal'); ?>: <?php echo $office['office_phone']; ?></li>
                      <?php endif; ?>
                      <?php if (isset($office['office_mobile']) && $office['office_mobile'] !== '') : ?>
                        <li class="infos-mobile"><?php echo __('M.', 'smartportal'); ?>: <?php echo $office['office_mobile']; ?></li>
                      <?php endif; ?>
                      <?php if (isset($office['office_fax']) && $office['office_fax'] !== '') : ?>
                        <li class="infos-fax"><?php echo __('F.', 'smartportal'); ?>: <?php echo $office['office_fax']; ?></li>
                      <?php endif; ?>
                    </ul>
                  
                    <?php 
                    /*
                    <h2 class="infos-heading"><?php echo __('Your contact', 'smartportal'); ?></h2>
                    
                    <ul class="infos-list">
                      <li class="infos-name"><?php echo $office['person_name']; ?></li>
                      <li class="infos-title"><?php echo $office['person_title']; ?></li>
                      <li class="infos-contact"><a href="#" data-office-name="<?php echo $office['office_name']; ?>"><?php echo __('Contact us', 'smartportal'); ?></a></li>
                    </ul>
                    */
                    ?>
                  </div>
                </div>
              </div>
              
              <?php $i++; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </article>
  </div><!-- /content -->
<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>