
import { __ } from '@wordpress/i18n';
import './editor.scss';
import { NameBarEdit } from './components/NameBar';
import BlockControls from './components/BlockControls';
import  { InnerBlocks } from '@wordpress/block-editor';
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';



export default function Edit( { attributes, setAttributes } ) {
	const { backgroundColor, isExpanded } = attributes;
	const blockProps = useBlockProps({});
	return (
		<div {...blockProps}>
			<BlockControls
				setAttributes={ setAttributes }
				backgroundColor={ backgroundColor }
				isExpanded={ isExpanded }
		/>
			<div
				style={ { backgroundColor: backgroundColor } }
			>
			<NameBarEdit attributes={ attributes } setAttributes={ setAttributes } />
			<InnerBlocks />
		</div>
	</div>
	);
}
