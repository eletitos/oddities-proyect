<?php

add_action('init', 'oddities_register_blocks_styles');


function oddities_register_blocks_styles(){

	//Heading big swear-text;
	register_block_style('core/heading', [
		'name' => 'big-heading',
		'label' => 'Big Heading'
	]);

	//Contact form;

	register_block_style('contact-form-7/contact-form-selector', [

			'name' => 'oddities-form',
			'label' => 'Oddities Default',
			'default' => true
	]);

	register_block_style('contact-form-7/contact-form-selector', [

			'name' => 'oddities-form-blue',
			'label' => 'Oddities Blue',
			'default' => true
	]);

	// Main container
	register_block_style('core/group', [

		'name' => 'full-with-content',
		'label' => 'Full with content',
	]);
}
