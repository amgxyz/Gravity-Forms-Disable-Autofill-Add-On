<?php
/*
*
*
*/

add_action('admin_menu', 'create_gf_disable_autofill_settings_menu');

function create_gf_disable_autofill_settings_menu() {
	/*add_menu_page('WP Disable Autofill', 'Generate Alt Tags', 'administrator', 'generate-image-alt-tags-settings',
	 							'gen_alt_tag_settings_page' , plugins_url('/options/images/icon-16.png', dirname(__FILE__))  );*/
  //add_submenu_page( 'options-general.php', 'Gravity Forms Disable Autofill Add-On', 'Disable Autofill Add-On', 'administrator',
	 //									'gravity-forms-disable-autofill-settings', 'create_gf_disable_autofill_settings_page');
	//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);*/
	//add_action( 'admin_init', 'register_disable_autofill_settings' );
	//add_action( 'admin_init', 'register_disable_autofill_includes' );
  add_filter( 'gform_addon_navigation', 'add_menu_item' );
function add_menu_item( $menu_items ) {
    $menu_items[] = array( "name" => "gf_disable_autofill", "label" => "Disable Autofill",
     "callback" => "create_gf_disable_autofill_settings_page", "permission" => "administrator" );
    return $menu_items;
}
}
add_action('admin_init', 'register_gf_disable_autofill_settings' );

function create_gf_disable_autofill_settings_page() {
	gf_disable_autofill_settings_page();
}
function register_gf_disable_autofill_settings() {
	register_setting( 'disable-gf-autofill-settings-group', 'gfda_disable_all_forms' );
}



function gf_disable_autofill_settings_page() {
?>
<div class="wrap">
<h2>Gravity Forms Disable Autofill Add-On</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'disable-gf-autofill-settings-group' ); ?>
    <?php do_settings_sections( 'disable-gf-autofill-settings-group' ); ?>
    <h3>Coming soon</h3>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Disable Autofill on all forms</th>
        <td><input type="checkbox" name="gfda_disable_all_forms" value="<?php echo esc_attr( get_option('gfda_disable_all_forms') ); ?>" /></td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
