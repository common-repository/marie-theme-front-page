<?php
/**
 * About Section
 *
 * @package marie-tfp
 * @version 1.0.0
 */

$section_title    = get_theme_mod( 'about_section_title' );
$bg_color         = get_theme_mod( 'about_background_color', '#ffffff' );
$torn             = get_theme_mod( 'about_torn_section' );
$about_full_width = get_theme_mod( 'about_full_width' );
$title_1          = get_theme_mod( 'about_title_1' );
$text_1           = get_theme_mod( 'about_text_1' );
$img_one          = get_theme_mod( 'about_img_one' );
$title_2          = get_theme_mod( 'about_title_2' );
$text_2           = get_theme_mod( 'about_text_2' );
$img_two          = get_theme_mod( 'about_img_two' );
$btn_label        = get_theme_mod( 'about_button_label' );
$btn_label_sr     = get_theme_mod( 'about_button_label_sr' );
$btn_link         = get_theme_mod( 'about_link' );


?>

<section 
	style="<?php echo $bg_color ? 'background:' . esc_attr( $bg_color ) . ';' : null; ?>" 
	class="marie-about-section marie-fp-section <?php echo $about_full_width ? 'marie-full-width' : null; ?>  <?php echo $torn ? 'marie-torn-section' : null; ?> " 
	id="marie-frontpage-about">

	<h2 class="twist"><?php echo esc_html( $section_title ); ?></h2>
		<div class="marie-about-items">

			<div class="marie-about-item-wrap marie-about-item-wrap-one <?php echo empty( $img_one ) ? 'without-img' : null; ?>">
					<?php echo wp_get_attachment_image( $img_one, 'medium' ); ?>
					<div class="marie-about-item-text">
						<?php
						if ( ! empty( esc_html( $title_1 ) ) ) {
							?>
							<h3><?php echo esc_html( $title_1 ); ?></h3>
							<?php
						}
						if ( ! empty( esc_html( $text_1 ) ) ) {
							?>
							<p><?php echo esc_html( $text_1 ); ?></p>
							<?php
						}
						?>
					</div>
			</div>

			<div class="marie-about-item-wrap marie-about-item-wrap-two">
				<div class="marie-about-item-text">
					<?php
					if ( ! empty( esc_html( $title_2 ) ) ) {
						?>
							<h3><?php echo esc_html( $title_2 ); ?></h3>
						<?php
					}
					if ( ! empty( esc_html( $text_2 ) ) ) {
						?>
							<p><?php echo esc_html( $text_2 ); ?></p>
						<?php
					}
					if ( ! empty( esc_html( $btn_link ) ) ) {
						?>
							<a href="<?php echo esc_html( $btn_link ); ?>" class="marie-default-btn marie-btn-green marie-maybe-custom-link">
								<span class="screen-reader-text"><?php echo esc_html( $btn_label_sr ); ?></span>
								<span><?php echo esc_html( $btn_label ); ?></span>
							</a>
						<?php
					}
					?>

				</div>
				<?php echo wp_get_attachment_image( $img_two, 'medium' ); ?>
			</div>

		</div>
</section>
