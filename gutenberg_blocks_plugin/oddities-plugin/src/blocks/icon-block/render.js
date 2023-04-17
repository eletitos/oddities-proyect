import { useBlockProps } from '@wordpress/block-editor';

const Render = ( {props} ) => {
	const { color, size, iconSlug } = props.attributes;
	const blockProps = useBlockProps();



	return (
		<div
		{...blockProps}>
			<span
				className={ `icon-${iconSlug}` }
				style={
					{
						color: color,
						fontSize: size,
					} }
			></span>
		</div>
	);
}

export default Render;
