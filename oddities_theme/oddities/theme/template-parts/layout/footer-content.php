<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oddities
 */

?>

<footer id="colophon w-screen relative text-pink">

<div class="font-cool text-red text-4xl md:text-6xl text-center sm:text-right md:px-8 px-5">
<?php esc_attr_e( 'Follow us in @odditieskin', 'oddities' ); ?>
</div>

<div class="instagram-grid relative z-[5]">
<?php if ( is_active_sidebar( 'footer-instagram' ) ) : ?>
				<?php dynamic_sidebar( 'footer-instagram' ); ?>
		<?php endif; ?>
</div>

<div class="bg-blue relative z-10">
<div class="brandmark absolute -top-6 left-4 md:-top-10 md:left-6 ">
			<img class="w-[92px] md:w-[135px]" src="<?php echo get_template_directory_uri(); ?>/icons/brandmark.svg"" alt="Oddities Logo">
		</div>



	<div class="footer-content flex flex-wrap  pt-16 md:px-8 px-5 md:pt-36">



		<div class="footer-menu w-full md:w-1/4">
		<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'oddities' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'menu_class'     => 'footer-menu',
						'link_before' => '<span class="font-display text-2xl uppercase text-pink sm:hover:border-b-2 sm:hover:border-b-pink leading-10">',
						'link_after' => '</span>'
					)
				);
				?>
			</nav>
		<?php endif; ?>
		</div>


		<div class="aditional-content w-full md:w-1/4 mt-16 md:mt-0">

		<?php if ( is_active_sidebar( 'footer-content' ) ) : ?>

				<?php dynamic_sidebar( 'footer-content' ); ?>

		<?php endif; ?>

		</div>


		<div class="newsletter md:w-1/2 flex justify-center mt-8 md:mt-0">
		<div class="max-w-[580px] text-pink">
			<?php if ( is_active_sidebar( 'footer-newsletter' ) ) : ?>
					<?php dynamic_sidebar( 'footer-newsletter' ); ?>
			<?php endif; ?>
		</div>

		</div>



		<div class="logo w-full mt-10 md:mt-5">
			<img src="<?php echo get_template_directory_uri(); ?>/icons/logo.svg" alt="Oddities Logo">
		</div>


		<div class="bottom-menu w-full mt-5 mb-16">
			<nav aria-label="<?php esc_attr_e( 'Product Menu', 'oddities' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'bottom-footer-menu',
						'menu_class'     => 'bottom-footer',
						'items_wrap'     => '<ul id="%1$s" class="%2$s flex flex-wrap justify-between" aria-label="submenu">%3$s</ul>',
						'link_before' => '<span class="font-display text-xs md:text-sm uppercase text-pink sm:hover:bg-lilac sm:hover:text-blue sm:hover:border-lilac block text-center  py-3 rounded-full border-pink border tracking-[3px] w-full">',
						'link_after' => '</span>'
					)
				);
				?>
			</nav>
		</div>

	</div>

</div>







</footer><!-- #colophon -->
