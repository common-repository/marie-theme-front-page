<?php
/**
 * Register a widget area and add the finderfrom the plugin.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

$widget_one_show   = get_theme_mod( 'widget-section-one_show_section' );
$widget_full_width = get_theme_mod( 'widget-section-one_full_width' );
$bg_color          = get_theme_mod( 'widget-section-one_background_color', '#ffffff' );
$text_color        = get_theme_mod( 'widget-section-one_text_color', '#444242' );
$torn              = get_theme_mod( 'widget-section-one_torn_section' );
// If show section not ticked in theme customiser, do nothing.
if ( ! $widget_one_show ) {
	return;
}

// Get title and text.
$widget_one_section_title = get_theme_mod( 'widget-section-one_section_title' );
$widget_one_section_text  = get_theme_mod( 'widget-section-one_section_p' );

?>

<section 
style="<?php echo $bg_color ? 'background:' . esc_attr( $bg_color ) . ';' : null; ?> margin-top:3rem;" 
class="marie-frontpage-widget-section marie-fp-section marie-frontpage-widget-section-one <?php echo $widget_full_width ? 'marie-full-width' : null; ?> <?php echo $torn ? 'marie-torn-section' : null; ?> "  
id="marie-frontpage-widget-section-one">
	<?php
	if ( $widget_one_section_title ) {
		?>
		<h2 class="twist" <?php echo $bg_color ? 'style="color:' . esc_attr( $text_color ) . ';"' : null; ?>>
			<?php echo esc_html( $widget_one_section_title ); ?>
		</h2>
		<?php
	}
	if ( $widget_one_section_text ) {
		?>
		<p <?php echo $text_color ? 'style="color:' . esc_attr( $text_color ) . ';"' : null; ?>><?php echo esc_html( $widget_one_section_text ); ?></p>
		<?php
	}

	if ( function_exists( 'dynamic_sidebar' ) ) {
		dynamic_sidebar( 'marie_frontpage_widget_area_one' );
	}
	?>

</section>
