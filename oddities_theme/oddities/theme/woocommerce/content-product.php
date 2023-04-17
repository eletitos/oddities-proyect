<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'group bg-white w-full md:w-1/2', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10

	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked oddities_template_loop_product_thumbnail, 10
	 * @hooked oddities_shop_onsale_badget, 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	// echo do_shortcode( '[star color="yellow" text="Esto es una prueba" hover-color="lilac"]');
?>


<?php
// echo '<pre>';
// 	print_r($product);
// echo '</pre>';

?>


<div class="product-info flex flex-col items-center pb-10">
	<div class="title text-center text-[25px] ">
	<?php
		the_title( '<h2 class="product_title entry-title font-display text-[25px] uppercase max-w-[250px] mb-2">', '</h2>' );
	?>
</div>
<div class="short-description text-center max-w-[90%]">
	<?php
		oddities_get_archive_product_descritpion()
	?>
</div>
</div>

<div class="add-to-cart flex justify-center">
<div class="envolve flex relative bottom-[21px] bg-white rounded-full z-10">
<?php
	do_action( 'woocommerce_after_shop_loop_item' );
?>
</div>
</div>

</li>
