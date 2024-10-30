/* eslint-disable computed-property-spacing */
function a11yBtns() {
	const textBtn = document.querySelector( '.marie-a11y-text' );
	const contrastBtn = document.querySelector( '.marie-a11y-contrast' );

	if ( textBtn ) {
		textBtn.addEventListener( 'click', function toggleTextSize() {
			const textClass = 'marie-big-text';
			const body = document.getElementsByTagName( 'body' )[0];
			if ( ! body.classList.contains( textClass ) ) {
				body.classList.add( textClass );
				document.documentElement.style.setProperty( 'font-size', '140%' );
			} else {
				body.classList.remove( textClass );
				document.documentElement.style.setProperty( 'font-size', '100%' );
			}
		} );
	}
	if ( contrastBtn ) {
		contrastBtn.addEventListener( 'click', function toggleContrast() {
			const contrastClass = 'marie-high-contrast';
			const body = document.getElementsByTagName( 'body' )[0];
			if ( ! body.classList.contains( contrastClass ) ) {
				body.classList.add( contrastClass );
			} else {
				body.classList.remove( contrastClass );
			}
		} );
	}
}

a11yBtns();