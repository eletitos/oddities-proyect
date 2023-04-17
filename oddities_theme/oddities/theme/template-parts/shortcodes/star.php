<?php
	$bg_class = 'fill-' . $args['color'];
	$inside_text = $args['text'];
	$product_id = $args['product-id'];
	$product = null;

	if($product_id !== ''){
		$product = wc_get_product($product_id);
	}
	if($product){
		global $post;
		$inside_text = apply_filters( 'woocommerce_sale_flash',  __('Sale', 'oddities') , $post, $product );
	}
?>



<div class="star-container relative flex w-full h-full">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 645.604 423.224" xml:space="preserve"><path class="<?php echo $bg_class ?>" stroke="#4050A2" stroke-width="5.477" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="m638.038 175.396-117-12.546 70.154-58.012-123.256 22.987 63.881-116.341-135.255 96.873-13.524-78.821-64.121 69.15-68.438-89.844-8.469 99.97L93.534 37.544l79.976 90.115-95.504-4.445 50.529 50.212-120.969 8.385s108.517 36.252 108.571 38.183l-67.973 27.35 88.17 12.649-96.188 80.965s98.252-26.368 150.843-43.086l-17.788 61.564 86.743-36.887 9.732 92.809 69.053-84.839 63.319 53.377 14.915-62.757 129.233 76.927-62.73-96.178 110.519 21.208-72.535-65.935 89.533-10.904-68.251-37.113 95.306-33.748z"/></svg>
	<div class="start-content absolute inset-0 flex justify-center items-center">
	<div class="star-text"><?php echo $inside_text; ?></div>
	</div>

</div>
