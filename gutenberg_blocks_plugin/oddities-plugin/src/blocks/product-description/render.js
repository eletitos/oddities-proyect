import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks } from '@wordpress/block-editor';

const Render = ( {props} ) => {
	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/icon-list-item' ];

	const text = wp.data.select('core/editor').getEditedPostAttribute('meta')['_product_description'];

	const values = wp.data.select('core/editor').getCurrentPost();


	console.log(values);


	return (
		<div
		{...blockProps}>
			{ text ? text :__('Product description', 'oddities-plugin') }
		</div>
	);
}

export default Render;
