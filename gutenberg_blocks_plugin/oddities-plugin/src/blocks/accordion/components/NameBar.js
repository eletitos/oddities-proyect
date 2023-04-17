import { RichText } from '@wordpress/block-editor';

// For Edit
export const NameBarEdit = ( { attributes, setAttributes } ) => {
	// const blockProps = useBlockProps();
	const onChangeTitle = ( newTitle ) => setAttributes( { title: newTitle } );
	return (
		<div>
			<RichText
				// { ...blockProps }

				tagName="h2"
				placeholder="Section Title"
				value={ attributes.title }
				onChange={ onChangeTitle }
			/>
		</div>
	);
};

// For save
export const NameBarSave = ( { title, isExpanded, setAttributes } ) => {


	return (
		<summary
			className="alignfull"
		>
			<div className="namebar flex justify-between content-box">
				<div className="arrow">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79 42"><path style="fill:#2b39d0" d="M39.4 41.2.1 1.9 1.9 0l37.5 37.4L76.8 0l1.9 1.9z"/></svg>
				</div>
				<RichText.Content
					tagName="h2"
					value={ title }
					className='font-display capitalize md:text-[85px]'
				/>
			</div>
		</summary>
	)
}


