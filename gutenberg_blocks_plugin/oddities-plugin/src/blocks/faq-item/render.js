import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';
import { useEffect } from 'react';
import { InnerBlocks } from '@wordpress/block-editor';

const Render = ( {props} ) => {
	const { attributes, setAttributes } = props;
	const { listHeading } = attributes;
	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = [ 'core/paragraph' ];
	const template = [
		[ 'core/paragraph', { content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod, tortor at dapibus euismod, tellus lectus venenatis justo, ac maximus velit augue at mauris. Sed dui ligula, pharetra non placerat lobortis, finibus a arcu. Donec cursus ultrices enim, vitae gravida urna ornare laoreet' }],
	];



	const onChangeHeading = ( newHeading ) => {
		setAttributes( { listHeading: newHeading } );
	}


	return (
		<div
		{...blockProps}>
			<details open>

				<RichText
					tagName="summary"
					placeholder={ __( 'List Heading', 'oddities-plugins' ) }
					onChange={ onChangeHeading }
					value={ listHeading }
				/>
				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ template }
					templateLock={ false }
				/>
			</details>
		</div>
	);
}

export default Render;
