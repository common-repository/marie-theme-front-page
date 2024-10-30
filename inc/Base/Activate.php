<?php
/**
 * On plugin activation.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Base;

/**
 * Activate plugin class.
 */
class Activate {

		/**
		 * On activate.
		 */
	public static function activate() {
		flush_rewrite_rules();
	}
}
