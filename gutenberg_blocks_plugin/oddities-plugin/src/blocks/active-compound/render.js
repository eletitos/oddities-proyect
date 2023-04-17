import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { InnerBlocks } from '@wordpress/block-editor';
import AllStar from './components/AllStar';

const Render = ( {props} ) => {
	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/headed-paragraph-list' ];
	// const template = [
	// 	['core/columns', {},[
	// 		['vivra/headed-paragraph', { title: 'Active compound', text: 'Active compound description' }],
	// 		['vivra/headed-paragraph', { title: 'Active compound', text: 'Active compound description' }],
	// 	]],
	// 	['core/columns', {},[
	// 		['vivra/headed-paragraph', { title: 'Active compound', text: 'Active compound description' }],
	// 		['vivra/headed-paragraph', { title: 'Active compound', text: 'Active compound description' }],
	// 	]]

	// ]

	const template = [
		['vivra/headed-paragraph-list'],
		['vivra/headed-paragraph-list']
	]



	return (
		<div
		{...blockProps}>
			<div className='star-container'>
				<AllStar />
			</div>
		<InnerBlocks
			allowedBlocks={ ALLOWED_BLOCKS }
			template={ template }
			templateLock={ 'all' }
		/>

		</div>
	);
}

export default Render;
