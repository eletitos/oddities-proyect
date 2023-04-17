<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<!-- Product image  -->
<div class="w-full pt-[100%] sm:pt-[40%] relative">


<?php
	woocommerce_show_product_sale_flash();
?>


	<?php oddities__product_image(); ?>
</div>


<!-- Product addBar -->
<div class="add-bar content-box grid justify-items-center mb-6">


<div class="title lg:row-start-2 lg:col-start-1">
	<?php
		the_title( '<h1 class="product_title entry-title font-display text-[25px] uppercase text-center lg:text-left">', '</h1>' );
	?>
</div>

<div class="short-description font-display uppercase text-[25px] lg:row-start-2 lg:col-start-3 text-center lg:text-right">
	<?php
		if($product->get_short_description()){
			echo $product->get_short_description('edit');
		}
	?>
</div>

<div class=" lg:col-start-2">
	<?php
		woocommerce_template_single_rating();
	?>
</div>

<div class="add-to-cart lg:row-start-2 lg:col-start-2 mt-5 lg:mt-0">
	<?php
	if($product->is_in_stock()):
		woocommerce_template_loop_add_to_cart();
	else:
		oddities_no_stock_product_button();
	endif;
	?>
</div>


</div>



<!-- Contenido -->
<div class="entry-content">
	<?php
		the_content();
	?>
</div>

<?php
	// @hooked woocommerce_output_product_data_tabs - 10
	do_action( 'oddities_after_single_product_summary' );
?>

<div class="pairin-is-caring bg-pink border-y-blue border-t-2 flex flex-col items-center px-5 py-7 md:p7-10 xl:py-14">
	<span class="font-header text-[80px] xl:text-[120px]  text-center leading-none">
		Pairing is Caring
	</span>
	<p class="text-center mt-7"><?php
		echo __('Our products are great alone, but better together', 'oddities')
	?></p>
</div>

<?php
	echo do_shortcode('[products limit=4 category=pack]')
?>


</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
