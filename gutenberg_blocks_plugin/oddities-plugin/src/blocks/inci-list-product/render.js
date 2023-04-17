import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks} from '@wordpress/block-editor';

const Render = ( {props} ) => {

	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/active-compound', 'vivra/headed-paragraph-list' ];


	const template = [
			['vivra/active-compound'],
			['vivra/headed-paragraph-list'
	]
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
