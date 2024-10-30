<?php
/**
 * Template ctrl.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Templates;

/**
 * Template Controller.
 */
class TemplateController {

	/**
	 * Array with list of this plugin's page
	 *
	 * @var array $custom_plugin_templates templates.
	 */
	public $custom_plugin_templates;

		/**
		 * Init $custom_plugin_templates and add filters to intercept the loading of page templates.
		 */
	public function register() {

			$this->custom_plugin_templates = array(
				'templates/marie-tfp-frontpage.php' => 'Frontpage Template (Marie TFP Plugin)',
			);

			// Admin. On add/edit page.
			add_filter( 'theme_page_templates', array( $this, 'add_plugin_template_to_theme' ) );
			add_filter( 'template_include', array( $this, 'load_plugin_template' ) );

	}

		/**
		 * Add template to the list of available templates in page dropdown.
		 *
		 * @param array $theme_templates List of available templates.
		 */
	public function add_plugin_template_to_theme( $theme_templates ) {

		$theme_templates = array_merge( $theme_templates, $this->custom_plugin_templates );

		return $theme_templates;
	}

		/**
		 * Intercept the loading of frontpage template. Don't do anything unless it is_front_page and this plugin's template is selected.
		 *
		 * @param string $template The chosen template.
		 */
	public function load_plugin_template( $template ) {

		global $post;

		if ( $post ) {
			// Get name of selected page template. Will be 'templates/marie-tfp-frontpage.php' if ours is selected in wp-admin.
			$template_name = get_post_meta( $post->ID, '_wp_page_template', true );
		}

		// Only if $template matches our 'page-templates/staff-page.php'.
		if ( isset( $template_name ) && isset( $this->custom_plugin_templates[ $template_name ] ) ) {

			if ( is_front_page() ) {
				$file = plugin_dir_path( dirname( __FILE__, 2 ) ) . $template_name;

				if ( file_exists( $file ) ) {
					return $file;
				}
			}
		}

		// Default: return original template.
		return $template;
	}

}
