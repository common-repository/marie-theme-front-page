<?php
/**
 * Enqueue styles & scripts.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Base;

/**
 * Enqueue files.
 */
class Enqueue {

	/**
	 * Called in Init. Add actions to enqueue js & css.
	 */
	public function register() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueue clientside style & script (on all clientside pages!).
	 */
	public function enqueue() {
		wp_enqueue_style( 'marie-tfp-client-style', plugin_dir_url( dirname( __FILE__, 2 ) ) . 'dist/css/marie-tfp.css', array(), '1.0.0', 'all' );

		wp_enqueue_script( 'marie-tfp-client-script', plugin_dir_url( dirname( __FILE__, 2 ) ) . 'dist/js/marie-tfp.js', null, '1.0.0', true );
	}

}
