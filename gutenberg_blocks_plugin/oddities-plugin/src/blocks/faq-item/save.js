import { useBlockProps } from '@wordpress/block-editor';
import { RichText } from '@wordpress/block-editor';
import { InnerBlocks } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save(props) {
	const { listHeading, listText, id } = props.attributes;
	return (
		<details
			{...useBlockProps.save()}
		 >
		 <summary>
		 <div className="button"></div>
		 <RichText.Content
				value={ listHeading }
			/>
		</summary>
		<div className="faq-answer">
			<InnerBlocks.Content />
		</div>

		</details>
	);

}
