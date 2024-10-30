<?php
/**
 * Features Section -Front Page
 *
 * @package marie-tfp
 * @version 1.0.0
 */

$bg_color            = get_theme_mod( 'features_background_color', '#ffffff' );
$torn                = get_theme_mod( 'features_torn_section' );
$features_full_width = get_theme_mod( 'features_full_width' );
?> 
<section 
	style="<?php echo $bg_color ? 'background:' . esc_attr( $bg_color ) . ';' : null; ?> " 
	class="marie-features-section marie-fp-section <?php echo $features_full_width ? 'marie-full-width' : null; ?>  <?php echo $torn ? 'marie-torn-section' : null; ?> " id="marie-frontpage-features" 
> 

	<?php

		$strs = array( 'card_one', 'card_two', 'card_three', 'card_four', 'card_five', 'card_six' );
		ob_start();
	foreach ( $strs as $str ) {
		$feature_title        = get_theme_mod( $str . '_section_title' );
		$feature_text         = get_theme_mod( $str . '_section_p' );
		$feature_link         = get_theme_mod( $str . '_section_link' );
		$feature_link_text    = get_theme_mod( $str . '_section_link_text' );
		$feature_link_text_sr = get_theme_mod( $str . '_section_link_text_sr' );
		$feature_show         = get_theme_mod( $str . '_show_section' );
		$feature_image        = wp_get_attachment_image( get_theme_mod( $str . '_section_image' ) );

		include locate_template( 'template-parts/marie-components/marie-feature.php', false, false );

	}

	$features_output = ob_get_clean();
	if ( $features_output ) {
		echo wp_kses_post( $features_output );
	}

	?>
</section>

<?php
