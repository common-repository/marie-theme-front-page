<?php
/**
 * Register a widget area
 *
 * @package marie-tfp
 * @version 1.0.0
 */

$widget_three_show = get_theme_mod( 'widget-section-three_show_section' );
$widget_full_width = get_theme_mod( 'widget-section-three_full_width' );
$bg_color          = get_theme_mod( 'widget-section-three_background_color', '#ffffff' );
$text_color        = get_theme_mod( 'widget-section-three_text_color', '#444242' );
$torn              = get_theme_mod( 'widget-section-three_torn_section' );

// If show section not ticked in theme customiser, do nothing.
if ( ! $widget_three_show ) {
	return;
}

// Get title and text.
$widget_three_section_title = get_theme_mod( 'widget-section-three_section_title' );
$widget_three_section_text  = get_theme_mod( 'widget-section-three_section_p' );

?>

<section 
style="<?php echo $bg_color ? 'background:' . esc_attr( $bg_color ) . ';' : null; ?> <?php echo $text_color ? 'color:' . esc_attr( $text_color ) . ';' : null; ?> "
class="marie-frontpage-widget-section marie-fp-section marie-frontpage-widget-section-three <?php echo $widget_full_width ? 'marie-full-width' : null; ?> <?php echo $torn ? 'marie-torn-section' : null; ?> "  id="marie-frontpage-widget-section-three">
	<div class="marie-frontpage-widget-three-text">

		<?php
		if ( $widget_three_section_title ) {
			?>
			<h2 class="twist" <?php echo $bg_color ? 'style="color:' . esc_attr( $text_color ) . ';"' : null; ?>>
				<?php echo esc_html( $widget_three_section_title ); ?>
			</h2>
			<?php
		}
		if ( $widget_three_section_text ) {
			?>
			<p <?php echo $text_color ? 'style="color:' . esc_attr( $text_color ) . ';"' : null; ?>><?php echo esc_html( $widget_three_section_text ); ?></p>
			<?php
		}
		?>
	</div>
	<?php
	if ( function_exists( 'dynamic_sidebar' ) ) {
		?>
			<div class="marie-frontpage-widget-three-wrap">
			<?php
			dynamic_sidebar( 'marie_frontpage_widget_area_three' );
	}
	?>
		</div>
</section>
