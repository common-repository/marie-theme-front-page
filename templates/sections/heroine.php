<?php
/**
 * Heroine Section ( Front Page ).
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

$img_url     = wp_get_attachment_url( get_theme_mod( 'heroine_blob_image' ) );
$heroine_img = get_theme_mod( 'heroine_blob_image' );

$bg_color   = get_theme_mod( 'marie_heroine_background_color', '#04d89d' );
$text_color = get_theme_mod( 'marie_heroine_text_color', '#444242' );

$show_stripes = get_theme_mod( 'heroine_show_stripes' );
$stripe_1     = get_theme_mod( 'marie_heroine_stripes_1', '#fdc800' );
$stripe_2     = get_theme_mod( 'marie_heroine_stripes_2', '#c21f63' );
$stripe_3     = get_theme_mod( 'marie_heroine_stripes_3', '#ffffff' );

?>

<div class="marie-heroine-section" style="<?php echo $bg_color ? 'background:' . esc_attr( $bg_color ) . ';' : null; ?> " > 

	<div class="heroine-svg-wrap">

	<?php

	if ( $show_stripes ) {
		?>
			<svg viewBox="0 0 100 100" preserveAspectRatio="none" style="position:relative;z-index:1;" aria-hidden="true">
				<polygon points="0,0 100,0 80,10 0,10" style="<?php echo isset( $stripe_1 ) ? 'fill:' . esc_attr( $stripe_1 ) . ';' : null; ?>" />
				<polygon points="0,10 80,10 60,20 0,20" style="<?php echo isset( $stripe_2 ) ? 'fill:' . esc_attr( $stripe_2 ) . ';' : null; ?>"/>
				<polygon points="0,20 60,20 40,10 0,40" style="<?php echo isset( $stripe_3 ) ? 'fill:' . esc_attr( $stripe_3 ) . ';' : null; ?>"/>
		</svg>
		<?php
	}
	?>

	</div>

	<div class="heroine-area-left" style="<?php echo $bg_color ? 'background:' . esc_attr( $bg_color ) . ';' : null; ?> ">
		<div class="heroine-text">
			<?php
					// 1. Show right heading (& hightlighted span) if it exists.
					// 2. If no heading, use site title (if show site title & tagline checked).
					// 3. Else show nothing.
			if ( ! empty( $right_heading ) ) :
				?>
				<h1 style="<?php echo $text_color ? 'color:' . esc_attr( $text_color ) . ';' : null; ?>"><?php echo esc_html( $right_heading ); ?></h1>
				<?php

			elseif ( empty( $right_heading ) && $show_title_tagline && ! empty( get_bloginfo( 'name' ) ) ) :
				?>
				<h1 style="<?php echo $text_color ? 'color:' . esc_attr( $text_color ) . ';' : null; ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
				<?php
			endif;

			// 1. Show alt tagline if it exists.
			// 2. If no alt tagline text, use tagline/description instead (if show site title & tagline checked).
			// 3. Else show nothing.
			if ( ! empty( $alt_tagline ) ) :
				?>
						<p style="<?php echo $text_color ? 'color:' . esc_attr( $text_color ) . ';' : null; ?>"><?php echo esc_html( $alt_tagline ); ?> <span></span></p>
					<?php
				elseif ( empty( $alt_tagline ) && $show_title_tagline && ! empty( get_bloginfo( 'description' ) ) ) :
					?>
						<p style="<?php echo $text_color ? 'color:' . esc_attr( $text_color ) . ';' : null; ?>"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
						<?php
			endif;
				?>
		</div><!-- .heroine-text -->


	</div><!--.heroine-area-left -->



	<div class="heroine-box heroine-right-top">
		<div class="headlines">
			<?php
			if ( ! empty( $cta_one_text ) && ! empty( $cta_one_url ) ) {
				?>
					<div class="headline headline-1">
						<a href="<?php echo esc_url( $cta_one_url ); ?>" class="marie-maybe-custom-link">
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
	</div><!-- .heroine-right-top -->
	<?php
		require plugin_dir_path( dirname( __FILE__, 2 ) ) . '/templates/sections/a11y.php';
	?>
	<div  class="heroine-image" 
				style="<?php echo $bg_color ? 'background-color:' . esc_attr( $bg_color ) . ';' : null; ?> background-image:url(<?php echo esc_url( $img_url ); ?>);  background-repeat: no-repeat;background-position: bottom 0rem right 0px;background-size:contain"

	>
	</div>
</div><!-- .heroine-section -->
