<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<div class="content-box">
<div class="flex justify-center">
	<img src="<?php echo get_template_directory_uri(); ?>/icons/you.svg" alt="you-icon" width="85px" class="-translate-x-[100px]">
</div>
	<form method="post" class="woocommerce-ResetPassword lost_reset_password max-w-3xl">


			<input class="woocommerce-Input woocommerce-Input--text input-text w-full" type="email" name="user_login" id="user_login" autocomplete="username" placeholder="MAIL" />


		<div class="clear"></div>

		<?php do_action( 'woocommerce_lostpassword_form' ); ?>


			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="woocommerce-Button button w-full uppercase<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>


		<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

		<div class="w-full">
			<p class="text-pink mt-5"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>
		</div>

	</form>
</div>
<?php
do_action( 'woocommerce_after_lost_password_form' );
