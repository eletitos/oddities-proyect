import { useBlockProps } from '@wordpress/block-editor';
// import { RichText } from '@wordpress/block-editor';
import { InnerBlocks } from '@wordpress/block-editor';
import AllStar from './components/AllStar';


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
	const { listHeading, listText } = props.attributes;
	return (
		<div
			{...useBlockProps.save()}
		 >
			<div className='star-container'>
				<AllStar />
			</div>
			<div className="compound-wrap">
				<InnerBlocks.Content/>
			</div>

		</div>
	);

}
