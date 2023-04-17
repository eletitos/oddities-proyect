<?php
/**
 * Plugin Name:       Oddities plugin of funtionalities
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.2
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       oddities-plugin
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */


// Create a block category


function elena_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'vivra-blocks',
				'title' => __( 'Oddities', 'oddities-plugin' ),
			),
		)
	);
}

add_filter( 'block_categories_all', 'elena_block_category', 10, 2);


function create_block_elena_block_block_init() {
	register_block_type( __DIR__ . '/build/blocks/icon-block' );
	register_block_type( __DIR__ . '/build/blocks/icon-list-item' );
	register_block_type( __DIR__ . '/build/blocks/icon-list' );
	register_block_type( __DIR__ . '/build/blocks/headed-paragraph-item' );
	register_block_type( __DIR__ . '/build/blocks/accordion' );
	register_block_type( __DIR__ . '/build/blocks/product-description', array(
		'render_callback' => 'oddities_render_product_description',
	) );
	register_block_type( __DIR__ . '/build/blocks/all-about-product' );
	register_block_type( __DIR__ . '/build/blocks/active-compound' );
	register_block_type( __DIR__ . '/build/blocks/headed-paragraph-list' );
	register_block_type( __DIR__ . '/build/blocks/inci-list-product' );
	register_block_type( __DIR__ . '/build/blocks/what-do-product' );
	register_block_type( __DIR__ . '/build/blocks/faq-item' );

	//Pass some datas to a block

	// wp_localize_script(
	// 	'active-compound',
	// 	'data',
	// 	array(
	// 		'prueba' => 'Prueba de recogida de datos'
	// 	));

}
add_action( 'init', 'create_block_elena_block_block_init' );


function oddities_render_product_description( ) {
	global $post;
	//if is a product
	$html = '<div class="product-description">';
	if ( 'product' === $post->post_type ) {
		//get the product
		$product_description = get_post_meta( $post->ID, '_product_description', true );

		if($product_description) {
			$html .= '<p>' . str_replace(PHP_EOL, "</p><p>", $product_description) . '</p>' ;

		}

	}
	$html .= '</div>';
	return $html;
}

