<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="" id="customer_login">

	<div id="myaccount_login-section">

<?php endif; ?>

<div class="flex justify-center">
	<img src="<?php echo get_template_directory_uri(); ?>/icons/you.svg" alt="you-icon" width="85px" class="-translate-x-[100px]">
</div>
		<form class="woocommerce-form woocommerce-form-login login w-full" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>



				<input type="text" class="w-full rounded-full font-display text-blue" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="USERNAME" /><?php // @codingStandardsIgnoreLine ?>

				<input class="w-full rounded-full font-display text-blue mt-6" type="password" name="password" id="password" autocomplete="current-password" placeholder="PASSWORD" />



			<?php do_action( 'woocommerce_login_form' ); ?>


				<!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span class="text-pink"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label> -->
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> w-full rounded-full font-display text-blue uppercase bg-yellow" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Submit', 'woocommerce' ); ?></button>





			<?php do_action( 'woocommerce_login_form_end' ); ?>

			<div class="flex flex-col md:flex-row items-center w-full pt-6 justify-around">

				<div class="text-pink block underline cursor-pointer  pb-3">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot password?', 'woocommerce' ); ?></a>
				</div>

				<div id="myaccount_login-link" class="create-account text-pink underline block cursor-pointer pb-3">
				<?php esc_html_e( 'Create an account', 'woocommerce' ); ?>
				</div>

			</div>

		</form>


<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div id="myaccount_register-section" class="hidden">

	<div class="flex justify-center">
	<img src="<?php echo get_template_directory_uri(); ?>/icons/you.svg" alt="you-icon" width="85px" class="-translate-x-[100px]">
</div>
		<form method="post" class="woocommerce-form woocommerce-form-register register w-full" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<input type="text" class="w-full rounded-full font-display text-blue" name="username" id="reg_username" placeholder="USERNAME" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>


			<?php endif; ?>

				<input type="email" class="w-full rounded-full font-display text-blue px-4 py-3" name="email" id="reg_email" placeholder="EMAIL" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>


			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>


					<input type="password" class="w-full rounded-full font-display text-blue mt-6 mb-3" name="password" placeholder="PASSWORD" id="reg_password" autocomplete="new-password" />

					<input type="checkbox" name="terms" id="terms" required id="">
					<label for="terms" class="text-pink"><?php esc_attr_e( 'I accept terms and conditions', 'woocommerce' ) ?></label>



			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>


				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit  w-full rounded-full font-display text-blue uppercase bg-yellow" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

			<div class="flex flex-col md:flex-row items-center w-full pt-6 justify-around">


				<div id="myaccount_register-link" class="create-account text-pink underline block cursor-pointer pb-3">
				<?php esc_html_e( 'Login', 'woocommerce' ); ?>
				</div>

			</div>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
