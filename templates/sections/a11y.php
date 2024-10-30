<?php
/**
 * A11y Buttons
 *
 * @package marie-tfp
 * @version 1.0.0
 */

	$a11y_buttons_show = get_theme_mod( 'marie_accessibility_buttons_show_buttons' );

if ( ! $a11y_buttons_show ) {
	return false;
}

	ob_start();
?>
	<div class="marie-a11y-wrap">
		<button class="marie-default-btn marie-btn-blue marie-a11y-btn marie-a11y-text">
			<span class="screen-reader-text"><?php esc_html_e( 'Toggle text size', 'marie' ); ?></span>
			<?php
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in marie_get_theme_svg();.
			echo marie_get_theme_svg( 'text_height' );
			?>
		</button>
		<button class="marie-default-btn marie-btn-blue marie-a11y-btn marie-a11y-contrast">
		<span class="screen-reader-text"><?php esc_html_e( 'Toggle contrast', 'marie' ); ?></span>
			<?php
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in marie_get_theme_svg();.
			echo marie_get_theme_svg( 'contrast' );
			?>
		</button>
	</div>

	<?php
	$output = ob_get_clean();
	if ( $output ) {
		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above and svgs in marie_get_theme_svg();.
		echo $output;
	}
	?>
