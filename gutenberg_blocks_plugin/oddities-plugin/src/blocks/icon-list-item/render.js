import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks} from '@wordpress/block-editor';

const Render = ( {props} ) => {

	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/custom-icon' ];
	const template = [
		['vivra/custom-icon', { iconSlug: 'smile', size: '33px', color: '#2B39D0' } ],
		['vivra/headed-paragraph', { heading: 'Heading', text: 'Text' } ]
	];


	return (
		<div
		{...blockProps}>

				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ template }
					templateLock={ 'all' }
				/>

		</div>
	);
}

export default Render;
