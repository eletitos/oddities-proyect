<?php

// Enable Gutenberg editor for WooCommerce
add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
add_theme_support( 'woocommerce' );
}

function j0e_activate_gutenberg_product( $can_edit, $post_type ) {
	if ( $post_type == 'product' ) {
		   $can_edit = true;
	   }
	   return $can_edit;
   }
   add_filter( 'use_block_editor_for_post_type', 'j0e_activate_gutenberg_product', 10, 2 );


// Product image

if ( ! function_exists( 'oddities__product_image' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views
	 */
	function oddities__product_image() {
		if ( ! oddities__can_show_post_thumbnail() ) {
			return;
		}

			?>

			<figure class="absolute -inset-px">
				<?php the_post_thumbnail('large', array( 'class' => 'max-w-full max-h-full w-full object-contain')); ?>
			</figure><!-- .post-thumbnail -->

			<?php

	}
endif;
// change button text

add_filter('woocommerce_product_add_to_cart_text', 'oddities_addtocart_text',10,2);

function oddities_addtocart_text($buton, $product){

	if($product->is_in_stock()){
		$price = $product->get_price();
		$button_price = apply_filters( 'oddities_wc_button_price', $price, $product );
		$button_price = sprintf('%0.2f', $button_price);
		$currency = get_woocommerce_currency_symbol();
		// $buton = sprintf( esc_html( __( 'Grab it &nbsp; — &nbsp; %1$s%2$s', 'oddities' ) ), $price, $currency );
		$buton = 'Grab it &nbsp;&nbsp; — &nbsp;&nbsp;'. $button_price . get_woocommerce_currency_symbol();
	}
	return $buton;
}

//Hook data tabs in single product page
add_action( 'oddities_after_single_product_summary', 'comments_template', 10 );


//Remove woocommerce actions.

add_action('woocommerce_init', 'oddities_remove_woocommerce_actions', 11);
function oddities_remove_woocommerce_actions(){

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

	//remove checkout coupon action
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );


}

//Add oddities actions.
add_action('woocommerce_init', 'oddities_add_woocommerce_actions', 11);
function oddities_add_woocommerce_actions(){

	add_action( 'woocommerce_before_shop_loop_item_title', 'oddities_template_loop_product_thumbnail', 10 );

	add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 11 );

}


if ( ! function_exists( 'oddities_template_loop_product_thumbnail' ) ) {


	function oddities_template_loop_product_thumbnail( ) {
		global $product;
		$hover_image = $product->get_gallery_image_ids();

		?>
		<div class="img-container relative">



			<?php
				if($hover_image):
					$hover_image_url = wp_get_attachment_image_src($hover_image[0])[0]
			?>

			<span class="hover-img first-letter inset-0 absolute bg-cover bg-center invisible group-hover:visible" style="background-image:url(<?php echo $hover_image_url ?>)"></span>

			<?php
				endif;
			?>
			<figure class="">

				<?php the_post_thumbnail('woocommerce_thumbnail', array( 'class' => 'min-w-full min-h-full w-full object-cover')); ?>

			</figure>




		</div>

		<?php

	}
}


	function oddities_onsale_badget_text(){
		global $product;
		if($product->is_on_sale()){
			return 'on sale';
		}
	}

	function oddities_shop_onsale_badget(){
		global $product;
		$onsale_text = oddities_onsale_badget_text();
		$is_highlight= has_term('highlight', 'product_cat', $product->get_id());
		$color_class= $is_highlight ? 'bg-yellow' : 'bg-sky';


		if($onsale_text){

			?>
			<div class="sale-badget flex justify-center py-4">
				<span class="px-8 py-2 inline-block rounded-[50%] border-2 border-blue group-hover:bg-lilac <?php echo $color_class ?>">
					<?php
						echo $onsale_text;
					?>
				</span>
			</div>
			<?php
		}
	}

	//Create needed product categories

	add_action('registered_taxonomy', 'oddities_create_product_categories', 10);
	function oddities_create_product_categories(){
		if(!term_exists('Highlight', 'product_cat')){
			wp_insert_term( 'Highlight', 'product_cat',array(
				'description' => 'Highlight sale',
				'slug' => 'highlight'
				));
		}
		if(!term_exists('Pack', 'product_cat')){
			wp_insert_term( 'Pack', 'product_cat',array(
				'description' => 'Packs',
				'slug' => 'pack'
				));
		}
	}

//add pack category to all pack products
add_action('woocommerce_update_product', 'oddities_add_pack_category', 10, 2);

function oddities_add_pack_category($post_id, $product){
	if($product->is_type('woosb')){
	$new_term = get_term_by('slug', 'pack', 'product_cat');
	$new_term = $new_term->term_id;
	$term_ids= array($new_term);

	$terms = wp_get_object_terms( $post_id, 'product_cat' );
	if ( count( $terms ) > 0 ) {
		foreach( $terms as $item ) {
			if($item !== $new_term){
			$term_ids[] = $item->term_id;
			}
	}
}
		wp_set_object_terms( $post_id, $term_ids, 'product_cat' );

	}
}




function oddities_get_archive_product_descritpion(){
	global $product;
	if($product->is_type('woosb')){
		$products = $product->get_items();
		foreach($products as $item){
			$item=wc_get_product($item['id']);
			echo $item->get_name();
			echo '<br>';
		}
	}else{
		echo $product->get_short_description('edit');
	}

}

//Allow only rates in reviews (empty comment)
add_filter('allow_empty_comment', '__return_true');


function oddities_no_stock_product_button(){
	if(is_product()):
		global $product;
		$price = $product->get_price();
		$price = sprintf('%0.2f', $price);
		$currency = get_woocommerce_currency_symbol();
		$button_text = sprintf( esc_html( __( 'Out of stock &nbsp; — &nbsp; %1$s%2$s', 'oddities' ) ), $price, $currency );
	?>
	<button class="rounded-full border-2 border-blue opacity-50 cursor-not-allowed uppercase font-display text-[13px] py-3 w-80"> <?php echo $button_text ?></button>

	<?php
	endif;
}




// Define general fields
add_filter( 'woocommerce_default_address_fields' , 'oddities_general_fields', 999, 1 );

function oddities_general_fields( $fields ) {
	//unset address 2
	unset($fields['address_2']);

	//Change placeholders
	$fields['first_name']['placeholder'] = 'First Name*';
	$fields['last_name']['placeholder'] = 'Last Name*';
	$fields['company']['placeholder'] = 'Company Name (optional)';
	$fields['address_1']['placeholder'] = 'Address*';
	$fields['address_1']['class'] = array( 'form-row-wide', 'address-field', 'hola' );
	$fields['city']['placeholder'] = 'City*';
	$fields['postcode']['placeholder'] = 'Postcode / ZIP*';
	$fields['state']['placeholder'] = 'State / Region*';
	$fields['email']['placeholder'] = 'Email Addressfdre*';

	return $fields;
};
//Remove adress 2 field from checkout

//Remove downloads from my account

add_filter( 'woocommerce_account_menu_items', 'oddities_remove_my_account_links' );

function oddities_remove_my_account_links( $menu_links ){

	unset( $menu_links['downloads'] ); // Remove Downloads

	return $menu_links;

}

//Change woocommerce email field placeholder

add_filter( 'woocommerce_form_field_args', 'oddities_change_email_placeholder', 10, 3 );

function oddities_change_email_placeholder( $args, $key, $value ) {
	if ( $key == 'billing_email' ) {
		$args['placeholder'] = 'Email*';
		$args['class'] = array( 'form-row-last' );
	}elseif( $key == 'shipping_email' ){
		$args['placeholder'] = 'Email*';
	}elseif ( $key == 'billing_phone' ) {
		$args['placeholder'] = 'Phone*';
		$args['class'] = array( 'form-row-first' );
	}
	return $args;
}




add_filter( 'woocommerce_min_password_strength', '__return_zero' );


//Display featured product in shop page

function oddities_display_featured_product_on_shop_header(){

	//get featured product id from the customizer
	$featured_product_id = get_theme_mod('shop_featured_product');
	$product = $featured_product_id ? wc_get_product( $featured_product_id ): null;

	if(!$product){
		return;
	}
		//sale budget
	if($product->is_on_sale()){
		echo do_shortcode( '[star product-id="'. $featured_product_id .'"]' );
		// echo $onsale_text;
	}

	//get product name

	$button_text = sprintf( esc_html( __( '%1$s &nbsp; — &nbsp; %2$s%3$s', 'oddities' ) ), $product->get_name(), $product->get_price(), get_woocommerce_currency_symbol() );

	//Add to cart link
	//$button_link = $product->add_to_cart_url();
	//echo $button_link;


	// $html_button = '<a href="'. get_permalink($featured_product_id) .'" class="uppercase font-display text-[13px] py-3 w-80 bg-blue text-white rounded-full border-2 border-blue hover:bg-transparent hover:text-blue transition duration-300 ease-in-out">'. $button_text .'</a>';
	// echo $html_button;

	// $html_button = '<a href="?add-to-cart=283" class="uppercase font-display text-[13px] py-3 w-80 bg-blue text-white rounded-full border-2 border-blue hover:bg-transparent hover:text-blue transition duration-300 ease-in-out add_to_cart_button ajax_add_to_cart" data-product_id="283" data-quantity="1">'. $button_text .'</a>';
	// echo $html_button;

	echo oddities_add_ajax_button($featured_product_id, $button_text);



}

function oddities_add_ajax_button($product_id, $button_text){

	$button_link = '?add-to-cart='.$product_id;
	// $html_button = '<a href="'. $button_link .'" class="uppercase font-display text-[13px] py-3 w-80 bg-blue text-white rounded-full border-2 border-blue hover:bg-transparent hover:text-blue transition duration-300 ease-in-out add_to_cart_button ajax_add_to_cart added" data-product_id="283" data-quantity="1">Bundle precio fijo &nbsp; — &nbsp; 15€</a>';

	$ajax_class = 'odd-button button wp-element-button add_to_cart_button ajax_add_to_cart';

	$html_button = '<a href="' . $button_link . '" data-quantity="1" class="'. $ajax_class . '"
		data-product_id="'. $product_id .'" rel="nofollow">'. $button_text .'</a>';
	return $html_button;
}



