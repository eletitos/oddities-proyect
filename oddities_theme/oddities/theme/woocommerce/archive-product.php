<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
<div class="blog-header relative">
				<div class="pt-[132%] sm:pt-[45%] relative overflow-hidden">
					<div class="absolute top-0 bottom-0 rigth-0 left-0 w-full">

						<?php echo wp_get_attachment_image( get_theme_mod('shop_top_image'), "", "", array( "class" => "object-cover min-h-full min-w-full", 'loading' => 'eager' )  )?>



					</div>
					<div class="featured-product-content absolute bottom-0">
						<?php

							oddities_display_featured_product_on_shop_header();
						?>
					</div>
				</div>

			</div>

</header>
<?php

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	// do_action( 'woocommerce_before_shop_loop' );

	$simple_products       = wc_get_products(array(
		'status'               => 'publish',
		'limit' 	   => -1,
		'type'                 => array('simple'),
		'paginate'             => false,
		'return'               => 'ids',
	  ));



	if ( $simple_products ) {
		woocommerce_product_loop_start();
		foreach($simple_products as $product_id){
			$post_object = get_post( $product_id );

			//Set global variable

			setup_postdata($GLOBALS['post'] =& $post_object);
			wc_get_template_part( 'content', 'product' );

		}
		wp_reset_postdata();
		woocommerce_product_loop_end();

	}

	//MArquee between types of products
	?>
	<div class="pb-2 border border-blue pt-3 relative z-[7] bg-white">
	<?php

	echo do_shortcode('[marquee text="Pairing is caring - this is a cold world, bundle up - great alone, better together"]');

	?>
	</div>
	<?php



	$pack_products       = wc_get_products(array(
		'status'               => 'publish',
		'limit' 	   => -1,
		'type'                 => array('woosb'),
		'paginate'             => false,
		'return'               => 'ids',
	  ));


	  if ( $pack_products ) {
		woocommerce_product_loop_start();
		foreach($pack_products as $product_id){
			$post_object = get_post( $product_id );

			$product=wc_get_product($post_object);

			// var_dump($product->get_type());
			//Set global variable

			setup_postdata($GLOBALS['post'] =& $post_object);

			wc_get_template_part( 'content', 'product' );

		}
		wp_reset_postdata();
		woocommerce_product_loop_end();

	}



	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
