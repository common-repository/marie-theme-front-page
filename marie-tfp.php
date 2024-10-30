<?php
/**
 * Plugin Name:       Marie Theme Front Page
 * Description:       Customize Marie theme front page sections.
 * Version:           1.0.0
 * Author:            marieoh
 * Author URI: 				https://marie.ie
 * License:           GPL v2 or later
 *
 * @package marie-tfp
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; // Exit if accessed directly.
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	include_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * On plugin Activate
 */
function marie_tfp_activate() {

	MarieTFP\Base\Activate::activate();

}
register_activation_hook( __FILE__, 'marie_tfp_activate' );

/**
 * On plugin Deactivate
 */
function marie_tfp_deactivate() {
	MarieTFP\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'marie_tfp_deactivate' );

$theme      = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$arr = array( 'Marie' );
if ( class_exists( 'MarieTFP\\Init' ) && 'Marie' === $theme_name ) {
	MarieTFP\Init::register_services();

}
