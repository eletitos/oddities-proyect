const { __ } = wp.i18n; // Import __() from wp.i18n
import { InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { ToggleControl, PanelBody } from '@wordpress/components';

const BlockControls = ( { backgroundColor, isExpanded, setAttributes } ) => {
	const onChangeBackgroundColor = ( newBackgroundColor ) => setAttributes( { backgroundColor: newBackgroundColor } );

	const onToggleExpanded = ( ) => setAttributes( { isExpanded: ! isExpanded } );

	return (
		<InspectorControls>
			<PanelColorSettings
				title={ __( 'Background Color', 'oddities-blocks' ) }
				initialOpen={ false }
				colorSettings={ [
					{
						value: backgroundColor,
						onChange: onChangeBackgroundColor,
					},
				] 	}
			/>

			<PanelBody>
				<ToggleControl
					label={ __( 'Expanded', 'oddities-blocks' ) }
					help={ __( 'Select if the block is expanded on loading', 'oddities-blocks' ) }
					onChange={ onToggleExpanded }
					checked={ isExpanded }
				/>
			</PanelBody>

		</InspectorControls>
	);
};

export default BlockControls;

