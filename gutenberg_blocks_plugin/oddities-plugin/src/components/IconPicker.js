import { __ } from '@wordpress/i18n';
import { Dropdown, Button, MenuGroup, MenuItem} from '@wordpress/components';

const IconPicker = ( { iconsData, fontClass, onChange } ) => {
	return (
		<Dropdown
		contentClassName='custom-icon-picker'
		position='bottom center'
		renderToggle={ ( { isOpen, onToggle } ) => (
			<Button
				className='custom-icon-picker__button'
				variant="primary"
				onClick={ onToggle }
				aria-expanded={ isOpen }
			>
				{ __( 'Select Icon', 'oddities-plugins' ) }
			</Button>
		) }
		renderContent={ ( {onClose} ) => (
			<MenuGroup>
				{iconsData.map( ( iconData ) => {
					return (
						<MenuItem
							key={ iconData.name }
							iconData={ iconData }
							onClick={ () => {
								onChange(iconData.css);
								onClose();
							 } }
						>
						<span class={ `icon-${iconData.css}  ${fontClass}`} ></span>{iconData.name}
						</MenuItem>
						);
					})}
			</MenuGroup>
		) }
		/>
	);
}

export default IconPicker;

