<?php
/**
 * Company Customizer settings.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Sections;

/**
 * Company Dets.
 */
class Company {

	/**
	 * Actions
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'company_input_fields' ) );
	}

	/**
	 * Create New section & define inputs for theme Customizer.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function company_input_fields( $wp_customize ) {

		$section = 'marie_company_settings';
		$wp_customize->add_section(
			$section,
			array(
				'title'       => __( 'MARIE Company Settings', 'marie' ),
				'description' => __( 'Edit Company & Charity settings.', 'marie' ),
			)
		);

		// Text Inputs.
		$input_args = array(

			array(
				'setting_id' => 'address_1',
				'field_type' => 'text',
				'label'      => __( 'Address Line 1', 'marie' ),
			),
			array(
				'setting_id' => 'chy_no_title',
				'field_type' => 'text',
				'label'      => __( 'CHY Number Title', 'marie' ),
			),
			array(
				'setting_id' => 'chy_no',
				'field_type' => 'text',
				'label'      => __( 'CHY Number', 'marie' ),
			),
			array(
				'setting_id' => 'charity_reg_title',
				'field_type' => 'text',
				'label'      => __( 'Charity Reg Title', 'marie' ),
			),
			array(
				'setting_id' => 'charity_reg',
				'field_type' => 'text',
				'label'      => __( 'Charity Reg', 'marie' ),
			),
			array(
				'setting_id' => 'company_no_title',
				'field_type' => 'text',
				'label'      => __( 'Company Number Title', 'marie' ),
			),
			array(
				'setting_id' => 'company_no',
				'field_type' => 'text',
				'label'      => __( 'Company Number', 'marie' ),
			),
			array(
				'setting_id' => 'company_phone',
				'field_type' => 'tel',
				'label'      => __( 'Company Phone Number (numbers only)', 'marie' ),
			),
		);

		foreach ( $input_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\TextInput( $section, $args );
			$input->register( $wp_customize );
		}

	}
}
