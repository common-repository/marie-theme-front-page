<?php
/**
 * Color Picker.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Inputs;

use WP_Customize_Color_Control;

/**
 * Customizer Settings
 */
class ColorPicker {
		/**
		 * Constructor
		 *
		 * @param string $section Section id (created wherever this class is used).
		 * @param mixed  $args Only vital things needed to create input fields. $args ['sanitize'] included for urls only.
		 */
	public function __construct( $section, $args ) {
		$this->section     = $section;
		$this->setting_id  = $args['setting_id'];
		$this->description = $args['description'];
		$this->label       = $args['label'];
		$this->default     = isset( $args['default'] ) ? $args['default'] : '#000000';
	}

		/**
		 * Get appropiate sanitize callback based on $args['field_type'].
		 *
		 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
		 */
	public function register( $wp_customize ) {

		$wp_customize->add_setting(
			$this->setting_id,
			array(
				'default'           => $this->default,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$this->setting_id,
				array(
					'description' => $this->description,
					'label'       => $this->label,
					'section'     => $this->section,
					'settings'    => $this->setting_id,
				)
			)
		);

	}
}
