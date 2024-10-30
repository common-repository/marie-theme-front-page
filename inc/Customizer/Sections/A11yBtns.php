<?php
/**
 * A11y Buttons settings.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Sections;

/**
 * .
 */
class A11yBtns {

	/**
	 * Actions
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'a11y_input_fields' ) );
	}

	/**
	 * Create New section & define inputs for theme Customizer.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function a11y_input_fields( $wp_customize ) {

		$section = 'marie_accessibility_buttons';
		$wp_customize->add_section(
			$section,
			array(
				'title'       => __( 'Accessibility Buttons', 'marie' ),
				'description' => __( 'Show/Hide Accessibility Buttons to change text size and contrast.', 'marie' ),
			)
		);

		// Define text/checkbox Inputs.
		$input_args = array(
			array(
				'setting_id' => 'show_buttons',
				'field_type' => 'checkbox',
				'label'      => __( 'Show Buttons', 'marie' ),
			),

		);

		foreach ( $input_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\TextInput( $section, $args );
			$input->register( $wp_customize );

		}

	}
}
