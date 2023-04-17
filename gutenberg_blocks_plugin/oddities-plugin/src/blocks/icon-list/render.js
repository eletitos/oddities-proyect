import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks } from '@wordpress/block-editor';

const Render = ( {props} ) => {
	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/icon-list-item' ];
	const template = [
		[ 'vivra/icon-list-item', { icon: 'wordpress', size: 'large', color: 'blue' } ],
		[ 'vivra/icon-list-item', { icon: 'wordpress', size: 'large', color: 'blue' } ],
	]



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
