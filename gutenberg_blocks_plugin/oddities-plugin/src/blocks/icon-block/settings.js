import IconPicker from "../../components/IconPicker";
import { __ } from '@wordpress/i18n';
import { InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { FontSizePicker, PanelBody } from '@wordpress/components';
import iconsData from './data/iconsData'
import { fontSizes } from './data/preset';


const Settings = ( { props } ) => {
	const { attributes, setAttributes } = props;
	const { color, size} = attributes;
	const { fontClass, icons } = iconsData;

	//Handlers
	const onChangeIconColor = ( newIconColor ) => setAttributes( { color: newIconColor } );

	const onChangeIconSize = ( newIconSize ) => setAttributes( { size: newIconSize } );
	const onChangeIcon = ( newIcon ) => {
		setAttributes({ iconSlug: newIcon });
	}



	return (
		<InspectorControls>
			<PanelBody title={ __( 'Icon', 'oddities-plugins' ) }>
				<IconPicker
					iconsData={ icons }
					fontClass={ fontClass }
					onChange={ onChangeIcon }
				/>
			</PanelBody>
			<PanelColorSettings
				title={ __( 'Icon Color', 'oddities-blocks' ) }
				initialOpen={ false }
				colorSettings={ [
					{
						value: color,
						onChange: onChangeIconColor,
					},
				] }
			/>
			<PanelBody title={ __( 'Icon Size', 'oddities-plugins' ) }>

			<FontSizePicker
				fontSizes={ fontSizes }
				value={ size }
				onChange={ onChangeIconSize }
			/>

			</PanelBody>
		</InspectorControls>
	);
}

export default Settings;
