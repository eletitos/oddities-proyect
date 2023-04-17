/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

const offCanvas = document.getElementById( 'offcanvas' );
const hamburgerButton = document.getElementById( 'hamburger-icon' );
const bodyElement = document.querySelector( 'body' );
const topMenu = document.getElementById( 'top-menu' );

// Toggle the .toggled class and the aria-expanded value each time the hamburgerButton is clicked.
if ( offCanvas && hamburgerButton && bodyElement && topMenu ) {
	hamburgerButton.addEventListener( 'change', function() {
		if ( hamburgerButton.checked ) {
			offCanvas.classList.add( 'active' );
			bodyElement.classList.add( 'toggled' );
			topMenu.classList.add( 'z-20' );
		} else {
			offCanvas.classList.remove( 'active' );
			bodyElement.classList.remove( 'toggled' );
			topMenu.classList.remove( 'z-20' );
		}
	} );
}


//Woocommerce toggle register and login sections.
const loginLink = document.getElementById( 'myaccount_login-link' );
const registerLink = document.getElementById( 'myaccount_register-link' );
const loginForm = document.getElementById( 'myaccount_login-section' );
const registerForm = document.getElementById( 'myaccount_register-section' );


if ( loginLink && registerLink && loginForm && registerForm ) {
	loginLink.addEventListener( 'click', () => {
		loginForm.classList.toggle( 'hidden' );
		registerForm.classList.toggle( 'hidden' );
	} );
	registerLink.addEventListener( 'click', () => {
		loginForm.classList.toggle( 'hidden' );
		registerForm.classList.toggle( 'hidden' );
	} );
}

const addToCartButtons = document.querySelectorAll( '.add_to_cart_button' );

if ( addToCartButtons && addToCartButtons.length > 0 ) {
	const themeUrl = themeData.themeUrl;
	const createCursor = () => {
		const cursorHTML = `<div id="octopus-cursor" class="cursor"><img src="${ themeUrl }/icons/oddities-spritesheet.png"></div>`;
		document.body.insertAdjacentHTML( 'beforeend', cursorHTML );

		const cursor = document.querySelector( '#octopus-cursor' );

		return cursor;
	};

	const cursor = createCursor();

	const onMouseOver = ( ) => {
		if ( ! cursor.classList.contains( 'cursor--visible' ) ) {
			cursor.classList.add( 'cursor--visible' );
		}
		manageDefaultCursor();
	};

	const onMouseMove = ( e ) => {
		cursor.style.left = e.clientX + 'px';
		cursor.style.top = e.clientY + 'px';
	};

	const onMouseOut = () => {
		if ( cursor.classList.contains( 'cursor--visible' ) ) {
			cursor.classList.remove( 'cursor--visible' );
		}
		manageDefaultCursor();
	};

	const onMouseUp = () => {
		cursor.classList.add( 'cursor--clicked' );
		document.addEventListener( 'mousemove', onMouseMove );

		setTimeout( () => {
			cursor.classList.remove( 'cursor--clicked' );
			document.removeEventListener( 'mousemove', onMouseMove );
			manageDefaultCursor();
		}, 700 );
	};

	const manageDefaultCursor = () => {
		if ( cursor.classList.contains( 'cursor--visible' ) ||
        cursor.classList.contains( 'cursor--clicked' ) ) {
			document.body.classList.add( 'has_custom_cursor' );
		} else {
			document.body.classList.remove( 'has_custom_cursor' );
		}
	};

	const addEventListeners = () => {
		addToCartButtons.forEach( ( button ) => {
			button.addEventListener( 'mousemove', onMouseMove );
			button.addEventListener( 'mouseover', onMouseOver );
			button.addEventListener( 'mouseout', onMouseOut );
			button.addEventListener( 'mouseup', onMouseUp );
		} );
	};

	addEventListeners();
}

