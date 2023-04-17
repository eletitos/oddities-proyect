/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import { NameBarSave } from './components/NameBar';
const { InnerBlocks } = wp.blockEditor;

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save( { attributes, className } ) {
	const { backgroundColor, isExpanded, title } = attributes;
	const blockProps = useBlockProps.save({
		className: 'alignfull'
	});


	return (
		<details
			{ ...blockProps }
			data-color={backgroundColor}
			style={ {
				backgroundColor: backgroundColor,
			} }
			open={ isExpanded }
		>
			<NameBarSave title={ title } />

			<div
				className="contenido content-box"
			>
				<InnerBlocks.Content />
			</div>
		</details>
	);
}
