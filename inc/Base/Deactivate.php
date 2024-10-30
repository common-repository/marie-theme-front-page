<?php
/**
 * On plugin deactivation.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Base;

/**
 * Deactivate plugin class.
 */
class Deactivate {

		/**
		 * On deactivate.
		 */
	public static function deactivate() {

		flush_rewrite_rules();

	}


}
