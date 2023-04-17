import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks} from '@wordpress/block-editor';

const Render = ( {props} ) => {

	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/product-description', 'vivra/icon-list' ];


	// const template = [
	// 	['core/column', {}, [
	// 		['vivra/product-description'],
	// 	]],
	// 	['core/column', {}, [
	// 		['vivra/icon-list'],
	// 	]],
	// ];

	const template = [
			['vivra/product-description'],
			['vivra/icon-list'],
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
