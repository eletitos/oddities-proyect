const colors = require( 'tailwindcss/colors' );

module.exports = {
	theme: {
		extend: {
			typography: ( theme ) => ( {
				/**
				 * Tailwind Typography’s default styles are opinionated, and
				 * you may need to override them if you have mockups to
				 * replicate. You can view the default modifiers here:
				 *
				 * https://github.com/tailwindlabs/tailwindcss-typography/blob/master/src/styles.js
				 */
				base: {
					css: [
						{
							fontSize: '17px',
						},

					],
				},
				DEFAULT: {
					css: [
						{
							/**
							 * By default, max-width is set to 65 characters.
							 * This is a good default for readability, but
							 * often in conflict with client-supplied designs.
							 * A value of false removes the max-width property.
							 */
							maxWidth: false,
							fontSize: '17px',

							/**
							 * You can customize your color theme below. The
							 * initial values are based upon the neutral gray
							 * scale theme, using the `primary` color from
							 * your `theme.json` file for links.
							 */
							'--tw-prose-body': theme( 'colors.blue' ),
							'--tw-prose-headings': theme( 'colors.blue' ),
							'--tw-prose-lead': theme( 'colors.blue' ),
							'--tw-prose-links': theme( 'colors.blue' ),
							'--tw-prose-bold': theme( 'colors.blue' ),
							'--tw-prose-counters': colors.neutral[ 500 ],
							'--tw-prose-bullets': theme( 'colors.blue' ),
							'--tw-prose-hr': theme( 'colors.blue' ),
							'--tw-prose-quotes': theme( 'colors.red' ),
							'--tw-prose-quote-borders': colors.neutral[ 200 ],
							'--tw-prose-captions': theme( 'colors.red' ),
							'--tw-prose-code': theme( 'colors.blue' ),
							'--tw-prose-pre-code': colors.neutral[ 200 ],
							'--tw-prose-pre-bg': colors.neutral[ 800 ],
							'--tw-prose-th-borders': colors.neutral[ 300 ],
							'--tw-prose-td-borders': colors.neutral[ 200 ],
							'--tw-prose-invert-body': colors.neutral[ 300 ],
							'--tw-prose-invert-headings': colors.white,
							'--tw-prose-invert-lead': colors.neutral[ 400 ],
							'--tw-prose-invert-links': colors.white,
							'--tw-prose-invert-bold': colors.white,
							'--tw-prose-invert-counters': colors.neutral[ 400 ],
							'--tw-prose-invert-bullets': theme( 'colors.blue' ),
							'--tw-prose-invert-hr': colors.neutral[ 700 ],
							'--tw-prose-invert-quotes': theme( 'colors.red' ),
							'--tw-prose-invert-quote-borders': colors.neutral[ 700 ],
							'--tw-prose-invert-captions': colors.red,
							'--tw-prose-invert-code': colors.white,
							'--tw-prose-invert-pre-code': colors.neutral[ 300 ],
							'--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
							'--tw-prose-invert-th-borders': colors.neutral[ 600 ],
							'--tw-prose-invert-td-borders': colors.neutral[ 700 ],
						},
					],
				},
			} ),
		},
	},
};
