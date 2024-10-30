<?php
/**
 * Funders Section Customizer settings.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Sections;

/**
 * Funders Section.
 */
class Funders {

	/**
	 * Actions
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'funders_input_fields' ) );
	}

	/**
	 * Create New section & define inputs for theme Customizer.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function funders_input_fields( $wp_customize ) {

		$section = 'funders';
		$wp_customize->add_section(
			$section,
			array(
				'title'       => __( 'Funders Section', 'marie' ),
				'description' => __( 'Edit Funders Section. For logos, add either a single wide image or up to 12 small logos.', 'marie' ),
			)
		);

		// Define text/checkbox Inputs.
		$input_args = array(
			array(
				'setting_id' => 'section_title',
				'field_type' => 'text',
				'label'      => __( 'Section Title', 'marie' ),
			),
			array(
				'setting_id' => 'section_p',
				'field_type' => 'textarea',
				'label'      => __( 'Section Text', 'marie' ),
			),
			array(
				'setting_id' => 'show_section',
				'field_type' => 'checkbox',
				'label'      => __( 'Show Section', 'marie' ),
				'default'    => false,
			),

		);

		// Define Image Inputs.
		$img_args = array(
			array(
				'setting_id'  => 'section_image',
				'label'       => __( 'Single Wide Image', 'marie' ),
				'flex_width'  => true,
				'flex_height' => true,
				'width'       => 3000,
				'height'      => 400,
			),
		);

		foreach ( $input_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\TextInput( $section, $args );
			$input->register( $wp_customize );

		}

		// Add single cropped image imput for large image containing multiple logos.
		foreach ( $img_args as $args ) {
			$img_input = new \MarieTFP\Customizer\Inputs\CroppedImage( $section, $args );
			$img_input->register( $wp_customize );

		}

		// Add 12 cropped image inputs for individual logos.
		$num_img_imputs = 1;
		do {
			$test_args = array(
				'setting_id'  => 'section_image-' . $num_img_imputs,
				'label'       => __( 'Small Image', 'marie' ) . $num_img_imputs,
				'height'      => 150,
				'width'       => 300,
				'flex_width'  => true,
				'flex_height' => false,
			);
			$img_input = new \MarieTFP\Customizer\Inputs\CroppedImage( $section, $test_args );
			$img_input->register( $wp_customize );
			$num_img_imputs++;
		} while ( $num_img_imputs <= 13 );

	}
}
