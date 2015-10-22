<?php
/*
* Plugin Name: Gravity Forms Disable Autofill Add-On
* Plugin URI: http://andrewmgunn.com/gravity-forms-disable-autofill-add-on/
* Description: Disable the browser's ability to autofill forms and input fields on selected Gravity Forms. Ideal for forms with sensitive information and provides extra level of form submission security.
* Version: 1.4.1
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: gravity-forms-disable-autofill-add-on
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
//include('inc/options.php');

add_action( 'admin_init', 'require_gravity_forms' );
add_action( 'init', 'register_gfdaa_scripts' );

function require_gravity_forms() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
        add_action( 'admin_notices', 'add_on_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) );

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}
function add_on_plugin_notice() {
	echo '<div class="error"><p>Gravity Forms must be installed and activated to use this plugin!</p></div>';
}

function register_gfdaa_scripts() {
	wp_register_script( 'gfdaa_script', plugins_url('inc/plugin-scripts.js', __FILE__), array('jquery'));
	wp_register_style( 'gfdaa_style', plugins_url('inc/plugin-styles.css', __FILE__));
	wp_enqueue_script( 'gfdaa_script' );
	wp_enqueue_style( 'gfdaa_style' );
}

function gf_disable_autofill_action_links( $links ) {
   //$links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=gf_disable_autofill') ) .'">Settings</a>';
   //return $links;
}
