<?php
/**
 * Funders Section (Front Page).
 *
 * @package marie-tfp
 * @version 1.0.0
 */

$funders_title = get_theme_mod( 'funders_section_title' );
$funders_text  = get_theme_mod( 'funders_section_p' );

// Get small logos.
$logo_1  = get_theme_mod( 'funders_section_image-1' );
$logo_2  = get_theme_mod( 'funders_section_image-2' );
$logo_3  = get_theme_mod( 'funders_section_image-3' );
$logo_4  = get_theme_mod( 'funders_section_image-4' );
$logo_5  = get_theme_mod( 'funders_section_image-5' );
$logo_6  = get_theme_mod( 'funders_section_image-6' );
$logo_7  = get_theme_mod( 'funders_section_image-7' );
$logo_8  = get_theme_mod( 'funders_section_image-8' );
$logo_9  = get_theme_mod( 'funders_section_image-9' );
$logo_10 = get_theme_mod( 'funders_section_image-10' );
$logo_11 = get_theme_mod( 'funders_section_image-11' );
$logo_12 = get_theme_mod( 'funders_section_image-12' );

// Get large image (multiple logos).
$funders_image_id = get_theme_mod( 'funders_section_image' );

?>
	<section class="funders-section marie-fp-section" id="marie-frontpage-funders"> 

		<h2 class="twist"><?php echo esc_html( $funders_title ); ?></h2>

		<p><?php echo esc_html( $funders_text ); ?></p>

		<div class="funders-wrap">
			<?php echo wp_get_attachment_image( $logo_1, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_2, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_3, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_4, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_5, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_6, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_7, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_8, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_9, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_10, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_11, 'medium' ); ?>
			<?php echo wp_get_attachment_image( $logo_12, 'medium' ); ?>
		</div>

		<?php echo wp_get_attachment_image( $funders_image_id, 'full' ); ?>

	</section>

	<?php
