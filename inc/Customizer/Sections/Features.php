<?php
/**
 * Features Section Customizer settings.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Sections;

/**
 * Features Section.
 */
class Features {

	/**
	 * Actions
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'features_input_fields' ) );
	}

	/**
	 * Create New section & define inputs for theme Customizer.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function features_input_fields( $wp_customize ) {

		$section = 'features';
		$wp_customize->add_section(
			$section,
			array(
				'title'       => __( 'Features Section', 'marie' ),
				'description' => __( 'Show/Hide Features Section.', 'marie' ),
			)
		);

		// Define text/checkbox Inputs.
		$input_args = array(
			array(
				'setting_id' => 'full_width',
				'field_type' => 'checkbox',
				'label'      => __( 'Full Width', 'marie' ),
			),
			array(
				'setting_id' => 'torn_section',
				'field_type' => 'checkbox',
				'label'      => __( 'Torn Effect', 'marie' ),
			),
			array(
				'setting_id' => 'show_section',
				'field_type' => 'checkbox',
				'label'      => __( 'Show Section', 'marie' ),
				'default'    => false,
			),
		);

		$what_color_picker_args = array(
			array(
				'setting_id'  => 'features_background_color',
				'description' => __( 'Set the Features section background color.', 'marie' ),
				'label'       => __( 'Background Color', 'marie' ),
				'default'     => '#ffffff',
			),
		);

		foreach ( $input_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\TextInput( $section, $args );
			$input->register( $wp_customize );

		}

		foreach ( $what_color_picker_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\ColorPicker( $section, $args );
			$input->register( $wp_customize );
		}
	}
}
