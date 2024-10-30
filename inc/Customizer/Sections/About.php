<?php
/**
 * About Section Customizer settings.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Sections;

/**
 * About Section.
 */
class About {

	/**
	 * Actions
	 */
	public function register() {

		add_action( 'customize_register', array( $this, 'about_input_fields' ) );
	}

	/**
	 * Create About section & define inputs for theme Customizer.
	 * Important. Define sanitize for urls. Otherwise MARIE_Input class handles
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function about_input_fields( $wp_customize ) {

		$section = 'about';
		$wp_customize->add_section(
			$section,
			array(
				'title'       => __( 'About Section', 'marie' ),
				'description' => __( 'Edit the Front Page About Section.', 'marie' ),
			)
		);

		// Text Inputs.
		$input_args = array(

			array(
				'setting_id' => 'section_title',
				'field_type' => 'text',
				'label'      => __( 'Section Title', 'marie' ),
			),
			array(
				'setting_id' => 'title_1',
				'field_type' => 'text',
				'label'      => __( 'Title 1', 'marie' ),
			),
			array(
				'setting_id' => 'text_1',
				'field_type' => 'textarea',
				'label'      => __( 'Text 1', 'marie' ),
			),
			array(
				'setting_id' => 'title_2',
				'field_type' => 'text',
				'label'      => __( 'Title 2', 'marie' ),
			),
			array(
				'setting_id' => 'text_2',
				'field_type' => 'textarea',
				'label'      => __( 'Text 2', 'marie' ),
			),
			array(
				'setting_id' => 'button_label',
				'field_type' => 'text',
				'label'      => __( 'Button Label', 'marie' ),
			),
			array(
				'setting_id' => 'button_label_sr',
				'field_type' => 'text',
				'label'      => __( 'Screen Reader Button Label', 'marie' ),
			),
			array(
				'setting_id' => 'link',
				'field_type' => 'url',
				'label'      => __( 'Link', 'marie' ),
				'default'    => '',
				'sanitize'   => 'esc_url_raw',
			),
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

		// Image Inputs.
		$img_args = array(
			array(
				'setting_id' => 'img_one',
				'label'      => __( 'About Section Image Image', 'marie' ),
				'width'      => 900,
				'height'     => 600,
			),
			array(
				'setting_id' => 'img_two',
				'label'      => __( 'About Section Image Image', 'marie' ),
				'width'      => 900,
				'height'     => 600,
			),

		);

		$color_picker_args = array(
			array(
				'setting_id'  => 'about_background_color',
				'description' => __( 'Set the about section background color.', 'marie' ),
				'label'       => __( 'Background Color', 'marie' ),
				'default'     => '#ffffff',
			),
		);

		foreach ( $img_args as $args ) {
			$img_input = new \MarieTFP\Customizer\Inputs\CroppedImage( $section, $args );
			$img_input->register( $wp_customize );

		}
		foreach ( $input_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\TextInput( $section, $args );
			$input->register( $wp_customize );
		}

		foreach ( $color_picker_args as $args ) {
			$input = new \MarieTFP\Customizer\Inputs\ColorPicker( $section, $args );
			$input->register( $wp_customize );
		}

	}
}
