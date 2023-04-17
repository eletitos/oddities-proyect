import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';

const Render = ( {props} ) => {
	const { attributes, setAttributes } = props;
	const { listHeading, listText } = attributes;
	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'vivra/custom-icon' ];
	const template = [
		[ 'vivra/custom-icon', { icon: 'wordpress', size: 'large', color: 'blue' } ],
	];



	const onChangeHeading = ( newHeading ) => {
		setAttributes( { listHeading: newHeading } );
	}

	const onChangeText = ( newText ) => {
		setAttributes( { listText: newText } );
	}



	return (
		<div
		{...blockProps}>
			<div>
				<RichText
					tagName="h3"
					placeholder={ __( 'List Heading', 'oddities-plugins' ) }
					onChange={ onChangeHeading }
					value={ listHeading }
				/>
				<RichText
					tagName="p"
					placeholder={ __( 'List Text', 'oddities-plugins' ) }
					onChange={ onChangeText }
					value={ listText }
				/>
			</div>
		</div>
	);
}

export default Render;
