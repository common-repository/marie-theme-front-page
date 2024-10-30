<?php
/**
 * Features Section Cards.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Sections;

/**
 * FeaturesSection Cards.
 */
class FeatureCards {

	/**
	 * Actions
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'features_section_cards' ) );
	}

	/**
	 * Create New section & define inputs for theme Customizer.
	 * Important. Define sanitize for urls. Otherwise MARIE_Input class handles
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function features_section_cards( $wp_customize ) {

		$sections = array(
			'card_one'   => array(
				'card_title' => __( 'Card One', 'marie' ),
				'card_name'  => 'card_one',
			),
			'card_two'   => array(
				'card_title' => __( 'Card Two', 'marie' ),
				'card_name'  => 'card_two',
			),
			'card_three' => array(
				'card_title' => __( 'Card Three', 'marie' ),
				'card_name'  => 'card_three',
			),
			'card_four'  => array(
				'card_title' => __( 'Card four', 'marie' ),
				'card_name'  => 'card_four',
			),
			'card_five'  => array(
				'card_title' => __( 'Card five', 'marie' ),
				'card_name'  => 'card_five',
			),
			'card_six'   => array(
				'card_title' => __( 'Card six', 'marie' ),
				'card_name'  => 'card_six',
			),
		);

		// Define text/checkbox Inputs for each section.
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
				'setting_id' => 'section_link',
				'field_type' => 'url',
				'label'      => __( 'Link (url or /#target-id)', 'marie' ),
				'sanitize'   => 'esc_url_raw',
			),
			array(
				'setting_id' => 'section_link_text',
				'field_type' => 'text',
				'label'      => __( 'Button Label', 'marie' ),
			),
			array(
				'setting_id' => 'section_link_text_sr',
				'field_type' => 'text',
				'label'      => __( 'Screen Reader Button Label', 'marie' ),
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
				'setting_id' => 'section_image',
				'label'      => __( 'Section Image', 'marie' ),
				'width'      => 400,
				'height'     => 400,
			),
		);

		// Create each section.
		foreach ( $sections as $section ) {

			$wp_customize->add_section(
				$section['card_name'],
				array(
					'title'       => ' --- ' . $section['card_title'], // WordPress docs say don't generally put sections in panels, name like this to make Customiser UI clearer.
					'description' => __( 'Edit Card.', 'marie' ),
				)
			);

			// Add inputs to section.
			foreach ( $input_args as $args ) {
				$input = new \MarieTFP\Customizer\Inputs\TextInput( $section['card_name'], $args );
				$input->register( $wp_customize );

			}

			// Add image picker to section.
			foreach ( $img_args as $args ) {
				$img_input = new \MarieTFP\Customizer\Inputs\CroppedImage( $section['card_name'], $args );
				$img_input->register( $wp_customize );

			}
		}

	}
}
