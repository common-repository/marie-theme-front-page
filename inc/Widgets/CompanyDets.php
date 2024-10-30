<?php
/**
 * Widget to show company details in footer.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

namespace MarieTFP\Widgets;

use WP_Widget;

/**
 * CompanyDets class
 */
class CompanyDets extends WP_Widget {

	/**
	 * Var for widget setup
	 *
	 * @var $widget_id Desc.
	 */
	public $widget_id;

	/**
	 * Var for widget setup
	 *
	 * @var $widget_name Desc.
	 */
	public $widget_name;

	/**
	 * Var for widget setup
	 *
	 * @var $widget_options Desc.
	 */
	public $widget_options = array();

	/**
	 * Var for widget setup
	 *
	 * @var $control_options Desc.
	 */
	public $control_options = array();


	/**
	 * CompanyDets class constructor
	 */
	public function __construct() {
		$this->widget_id       = 'marie_tfp_company_dets_widget';
		$this->widget_name     = 'Company Details Widget';
		$this->widget_options  = array(
			'classname'                   => $this->widget_id,
			'description'                 => $this->widget_name,
			'customize_selective_refresh' => true,
		);
		$this->control_options = array(
			'width'  => 400, // refers to form in admin->appearence->widgets.
			'height' => 350, // refers to form in admin->appearence->widgets.
		);
	}

	/**
	 * FinderWidget class
	 */
	public function register() {

		parent::__construct( $this->widget_id, $this->widget_name, $this->widget_options, $this->control_options );

		add_action( 'widgets_init', array( $this, 'widgetInit' ) );

	}

	/**
	 * Register the widget - callback fn for widgets_init action.
	 */
	public function widgetInit() {
		register_widget( $this );

	}

	/**
	 * Required widget() function.
	 * Render widget on front end.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args New version.
	 * @param array $instance old version.
	 */
	public function widget( $args, $instance ) {

		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

		}
		// The content of the widget.
		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $this->render_company_dets();

		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $args['after_widget'];
	}

	/**
	 * Required form() function.
	 * Render widget form in wp admin.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance current instance.
	 */
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html_e( '', 'marie-tfp' );

		$title_id = $this->get_field_id( 'title' );

		$title_name = $this->get_field_name( 'title' );

		?>
		<p>
			<label for="<?php echo esc_attr( $title_id ); ?>">Title</label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $title_id ); ?>" name="<?php echo esc_attr( $title_name ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	/**
	 * Required update() function.
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $updated_instance New version.
	 * @param array $old_instance old version.
	 */
	public function update( $updated_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $updated_instance['title'] );

		return $instance;
	}

		/**
		 * Render company details.
		 */
	public function render_company_dets() {

		// Company details values.
		$chy_no_title      = get_theme_mod( 'marie_company_settings_chy_no_title' );
		$chy_no            = get_theme_mod( 'marie_company_settings_chy_no' );
		$charity_reg_title = get_theme_mod( 'marie_company_settings_charity_reg_title' );
		$charity_reg       = get_theme_mod( 'marie_company_settings_charity_reg' );
		$company_reg_title = get_theme_mod( 'marie_company_settings_company_no_title' );
		$company_reg       = get_theme_mod( 'marie_company_settings_company_no' );

		// Don't do anything if no details set.
		if ( empty( $chy_no )
			&& empty( $charity_reg ) && empty( $company_red ) ) {
			return;
		}
		ob_start();
		?>
		<div class="footer-nums-wrap">
					<?php
					if ( ! empty( esc_html( $chy_no_title ) ) ) {
						?>
						<span><strong>
							<?php echo esc_html( $chy_no_title ); ?>
						</strong></span>
						<?php
					}

					if ( ! empty( esc_html( $chy_no ) ) ) {
						?>
						<span class="marie-pipe"><?php echo esc_html( $chy_no ); ?></span>
						<?php
					}

					if ( ! empty( esc_html( $charity_reg_title ) ) ) {
						?>
						<span><strong><?php echo esc_html( $charity_reg_title ); ?></strong></span>
						<?php
					}
					if ( ! empty( esc_html( $charity_reg ) ) ) {
						?>
						<span class="marie-pipe"><?php echo esc_html( $charity_reg ); ?></span>
						<?php
					}
					if ( ! empty( esc_html( $company_reg_title ) ) ) {
						?>
						<span><strong><?php echo esc_html( $company_reg_title ); ?></strong></span>
						<?php
					}
					if ( ! empty( esc_html( $company_reg ) ) ) {
						?>
						<span><?php echo esc_html( $company_reg ); ?></span>
						<?php
					}
					?>
				</div>
		<?php
		$address_output = ob_get_clean();

		if ( $address_output ) {
			return $address_output;
		}
	}
}
