// Set Preflight flag and Tailwind Typography class name based on the build
// target.
let includePreflight, typographyClassName;
if ( 'editor' === process.env._TW_TARGET ) {
	includePreflight = false;
	typographyClassName = 'block-editor-block-list__layout';
} else {
	includePreflight = true;
	typographyClassName = 'prose';
}

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require( './tailwind-typography.config.js' ),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			fontFamily: {
				display: [ 'Monument', 'sans-serif' ],
				cool: [ 'Palmer-lake', 'sans-serif' ],
				header: [ 'Swear-Text', 'serif' ],
				base: [ 'Bossa', 'sans-serif' ],
			},
			colors: {
				blue: '#2B39D0',
				pink: '#F05C7C',
				yellow: '#E9FAA2',
				lilac: '#D4C2FF',
				red: '#F72F32',
				sky: '#D1DCFF',
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Extract colors and widths from `theme.json`.
		require( '@_tw/themejson' )( require( '../theme/theme.json' ) ),

		// Add Tailwind Typography.
		require( '@tailwindcss/typography' )( {
			className: typographyClassName,
		} ),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/aspect-ratio' ),
		// require( '@tailwindcss/line-clamp' ),
		// require( '@tailwindcss/container-queries' ),
	],
	safelist: [
		'fill-yellow',
		'fill-lilac',
		'group-hover:fill-lilac',
	],
};
