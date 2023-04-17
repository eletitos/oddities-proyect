import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks} from '@wordpress/block-editor';

const Render = ( {props} ) => {

	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/headed-paragraph' ];
	const template = [
		['vivra/headed-paragraph', { heading: 'Heading', text: 'Text' } ],
	];


	return (
		<div
		{...blockProps}>

				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ template }
					templateLock={ '' }
				/>

		</div>
	);
}

export default Render;
