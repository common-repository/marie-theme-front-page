<?php
/**
 * Heroine Alternative Version.
 *
 * @package marie-tfp
 * @version 1.0.0
 */

// WordPress Settings.
$show_title_tagline = get_theme_mod( 'header_text' );


$alt_tagline   = get_theme_mod( 'heroine_tagline_1' );
$right_heading = get_theme_mod( 'heroine_right_heading' );

$cta_one_text   = get_theme_mod( 'heroine_cta_one_text' );
$cta_one_url    = get_theme_mod( 'heroine_cta_one_url' );
$cta_two_text   = get_theme_mod( 'heroine_cta_two_text' );
$cta_two_url    = get_theme_mod( 'heroine_cta_two_url' );
$cta_three_text = get_theme_mod( 'heroine_cta_three_text' );
$cta_three_url  = get_theme_mod( 'heroine_cta_three_url' );

$img_url = wp_get_attachment_url( get_theme_mod( 'heroine_blob_image' ) );
?>

<div class="marie-heroine-section-alt">
	<div class="heroine-right" > 
		<?php
		if ( ! empty( $img_url ) ) :
			?>
			<div class="heroine-img" style="background: url(<?php echo esc_url( $img_url ); ?>);"></div>
			<?php
		endif;
		?>

		<div class="heroine-overlay"></div>

		<div class="heroine-right-text">
			<?php

			// 1. Show right heading if it exists.
			// 2. If no heading, use site title (if show site title & tagline checked).
			// 3. Else show nothing.
			if ( ! empty( $right_heading ) ) :
				?>
				<h1 class="heading-jumbo"><?php echo esc_html( $right_heading ); ?></h1>
				<?php
			elseif ( empty( $right_heading ) && $show_title_tagline && ! empty( get_bloginfo( 'name' ) ) ) :
				?>
				<h1 class="heading-jumbo"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
				<?php
			endif;

			if ( ! empty( $alt_tagline ) ) :
				?>
				<p><?php	echo ! empty( $alt_tagline ) ? esc_html( $alt_tagline ) : null; ?></p>
				<?php
			elseif ( empty( $alt_tagline ) && $show_title_tagline && ! empty( get_bloginfo( 'description' ) ) ) :
				?>
				<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
				<?php
			endif;
			?>

		</div> <!-- .heroine-text-right -->

		<div class="headlines">
			<?php
			if ( ! empty( $cta_one_text ) && ! empty( $cta_one_url ) ) {
				?>
				<div class="headline headline-1">
					<a href="<?php echo esc_url( $cta_one_url ); ?>" class="marie-maybe-custom-link" >
						<span><?php echo esc_html( $cta_one_text ); ?></span>
					</a>
				</div>
				<?php
			}

			if ( ! empty( $cta_two_text ) && ! empty( $cta_two_url ) ) {
				?>
				<div class="headline headline-2">
					<a href="<?php echo esc_url( $cta_two_url ); ?>" class="marie-maybe-custom-link" >
						<span><?php echo esc_html( $cta_two_text ); ?></span>
					</a>
				</div>
				<?php
			}

			if ( ! empty( $cta_three_text ) && ! empty( $cta_three_url ) ) {
				?>
				<div class="headline headline-3">
					<a href="<?php echo esc_url( $cta_three_url ); ?>" class="marie-maybe-custom-link" >
						<span><?php echo esc_html( $cta_three_text ); ?></span>
					</a>
				</div>
				<?php
			}
			?>
		</div><!-- .headlines -->


	</div> <!-- .heroine-right -->

</div> <!-- .heroine-section -->
