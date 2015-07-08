<?php 
add_action('admin_menu', 'SavvyIDX_setup_menu');
function SavvyIDX_setup_menu(){
add_menu_page('SavvyIDX Plugin Page', 'SavvyIDX Plugin', 'manage_options', 'SavvyIDX_Plugin', 'SavvyIDX_Plugin','',72 );
      //  add_menu_page( 'SavvyIDX Plugin Page', 'SavvyIDX Plugin', 'manage_options', 'my_cool_plugin_settings_page', 'SavvyIDX_init' );
	//call register settings function
add_action( 'admin_init', 'SavvyIDX_init' );
}
function SavvyIDX_init() {
	//register our settings
	register_setting( 'SavvyIDX-plugin-settings-group', 'google_id' );
	register_setting( 'SavvyIDX-plugin-settings-group', 'map_key' );
}
function SavvyIDX_Plugin() {
?>
<div class="wrap">
<h2>SavvyIDX Plugin</h2>
<form method="post" action="#">
    <?php settings_fields( 'SavvyIDX-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'SavvyIDX-plugin-settings-group' ); ?>
    <input type="hidden" name="action" value="save_google_option" />
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enter Google ID</th>
        <td><input type="text" name="google_id" value="<?php echo esc_attr( get_option('google_id') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Enter Google Map Key</th>
        <td><input type="text" name="map_key" value="<?php echo esc_attr( get_option('map_key') ); ?>" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php } ?>
