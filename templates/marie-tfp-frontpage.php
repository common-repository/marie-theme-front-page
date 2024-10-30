<?php
/**
 * Template Name: Frontpage
 *
 * @package marie-tfp
 * @version 1.0.0
 */

// Get should_show_section for each section. 'What' section handles itself.

$use_alt_heroine   = get_theme_mod( 'heroine_use_alt_heroine' );
$show_heroine      = get_theme_mod( 'heroine_show_section' );
$show_about        = get_theme_mod( 'about_show_section', false );
$show_features     = get_theme_mod( 'features_show_section', false );
$show_funders      = get_theme_mod( 'funders_show_section', false );
$show_widget_one   = get_theme_mod( 'widget-section-one_show_section', false );
$show_widget_two   = get_theme_mod( 'widget-section-two_show_section', false );
$show_widget_three = get_theme_mod( 'widget-section-three_show_section', false );

?>
<?php get_header(); ?>
	<?php
	if ( $show_heroine ) {
		if ( $use_alt_heroine ) {
			require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/heroine-alt.php';
		} else {

			require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/heroine.php';
		}
	}
	?>
	<div class="frontpage-content-wrap marie-content-wrap">
		<?php
		if ( $show_about ) {
			require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/about.php';
		}
		if ( $show_features ) {
				require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/features.php';
		}
		if ( $show_widget_one ) {
				require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/marie-frontpage-widget-one.php';
		}
		if ( $show_widget_two ) {
				require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/marie-frontpage-widget-two.php';
		}
		if ( $show_widget_three ) {
				require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/marie-frontpage-widget-three.php';
		}

		if ( $show_funders ) {
				require plugin_dir_path( dirname( __FILE__, 1 ) ) . '/templates/sections/funders.php';
		}
		?>
	</div><!-- .marie-content-wrap -->

	<?php

	get_footer();
