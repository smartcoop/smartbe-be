<?php

/** 
 * SMART PORTAL THEME OPTIONS
 * 
 * Add an admin page to manage theme options
 *
 */


/* 
 * Register our settings 
 */

add_action( 'admin_init', 'smartRegisterSettings' );
 
function smartRegisterSettings(){
  register_setting('smart_options', 'typekit_url');
  register_setting('smart_options', 'country_code');
  register_setting('smart_options', 'home_components');
}


/* 
 * Add our custom page to the theme admin menu
 */
 
add_action('admin_menu', 'smartThemeOptionsAdminMenu');
 
function smartThemeOptionsAdminMenu( )
{
   add_theme_page(
      'Options',
      'Options',
      'administrator',
      'smart-theme-options',
      'smartThemeOptions'
   );
}


/* 
 * Generate the theme admin page
 */
 
function smartThemeOptions() {
  global $select_options;
  
  if (!isset($_REQUEST['settings-updated'])) $_REQUEST['settings-updated'] = false;
  ?>
  
  <div class="wrap">
    <?php screen_icon('themes'); ?>
    <?php echo '<h2>' . __('Theme Options', 'smartportal') . '</h2>'; ?>
    
    <?php if (false !== $_REQUEST['settings-updated']) : ?>
      <div id="setting-error-settings_updated" class="updated settings-error">
        <p><strong><?php _e('Options saved.', 'smartportal'); ?></strong></p>
      </div>
    <?php endif; ?>
    
    <form method="post" action="options.php">
      <?php settings_fields('smart_options'); ?>
      
      <table class="form-table">
        <tbody>
          <tr valign="top">
            <th scope="row">
              <label for="country_code"><?php _e('Country code', 'smartportal'); ?></label>
            </th>
            <td>
              <input type="text" name="country_code" id="country_code" class="code" value="<?php esc_attr_e(get_option('country_code')); ?>" size="2">
              <p class="description"><?php _e('Enter the 2 letters country reference for the SMart entity, e.g.: eu, be, fr…', 'smartportal'); ?></p>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row">
              <label for="typekit_url"><?php _e('TypeKit URL', 'smartportal'); ?></label>
            </th>
            <td>
              <input type="text" name="typekit_url" id="typekit_url" class="regular-text code" value="<?php esc_attr_e(get_option('typekit_url')); ?>">
              <p class="description"><?php _e('Enter the URL of the TypeKit JS file to load for webfonts.', 'smartportal'); ?></p>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row">
              <label for="home_components"><?php _e('Home page components order', 'smartportal'); ?></label>
            </th>
            <td>
              <textarea cols="50" rows="10" name="home_components" id="home_components" class="large-text code"><?php esc_attr_e(get_option('home_components')); ?></textarea>
              <p class="description"><?php _e('Enter component names (separated by a comma) in the order in which they must be displayed on the home page.', 'smartportal'); ?></p>
            </td>
        </tbody>
      </table>
      
      <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save changes"></p>
    </form>
  </div>
<?php } ?>