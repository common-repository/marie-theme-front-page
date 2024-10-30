<?php
/**
 * Crop Image.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Customizer\Inputs;

use WP_Customize_Cropped_Image_Control;

/**
 * Wrap WP_Customize_Cropped_Image_Control for convenience.
 */
class CroppedImage {

	/**
	 * Constructor.
	 *
	 * @param string $section Cropped Image section.
	 * @param object $args Cropped Image args.
	 */
	public function __construct( $section, $args ) {
		$this->section     = $section;
		$this->id          = $args['setting_id'];
		$this->label       = $args['label'];
		$this->capability  = 'edit_theme_options';
		$this->type        = 'theme_mod';
		$this->width       = $args['width'];
		$this->height      = $args['height'];
		$this->flex_width  = ! empty( $args['flex_width'] ) ? $args['flex_width'] : '';
		$this->flex_height = ! empty( $args['flex_height'] ) ? $args['flex_height'] : '';
	}

	/**
	 * Register settings.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer.
	 */
	public function register( $wp_customize ) {
		$wp_customize->add_setting(
			$this->section . '_' . $this->id,
			array(
				'type'              => $this->type,
				'capability'        => $this->capability,
				'sanitize_callback' => 'sanitize_text_field', // it saves the id.

			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				$this->section . '_' . $this->id,
				array(
					'label'       => $this->label,
					'section'     => $this->section,
					'settings'    => $this->section . '_' . $this->id,
					'width'       => $this->width,
					'height'      => $this->height,
					'flex_width'  => $this->flex_width,
					'flex_height' => $this->flex_height,
				)
			)
		);
	}

}
