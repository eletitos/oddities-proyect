<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oddities
 */

// wp_head(  );
 get_header();

 if ( is_user_logged_in() ):

?>


	<section id="primary" class="">
		<main id="main" class="mt-7 md:mt-20 mb-10">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();


else:

	?>
	<section id="login-page" class="bg-blue top-0 bottom-0 w-full fixed overflow-auto">

		<div class="w-full flex flex-col min-h-screen justify-center items-center">
		<div class="login-icon icon mr-2 lg:mr-4 fill-pink w-[75px] pb-8">
					<div class="<?php echo $icon_width ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" xml:space="preserve" class="<?php echo $color_class?>"><path  d="M175.889 158.991h-16.998v16.797h-33.593v16.797H74.501v-16.797H40.908v-16.797H24.111v-33.593H7.314V74.602h16.797V41.009h16.797V24.212h33.593V7.415h50.796v16.797h33.593v16.797h16.998v33.593h16.797v50.796h-16.797v33.593zM74.501 91.4V58.211h-16.39V91.4h16.39zm0 33.593v-16.392h-16.39v16.392h16.39zm50.39 16.797v-16.392H74.907v16.392h49.984zm16.797-50.39V58.211h-16.39V91.4h16.39zm0 33.593v-16.392h-16.39v16.392h16.39z"/></svg>
					</div>
</div>
	<?php
		the_content();
	?>


		</div>
	</section>
	<?php

	wp_footer();

endif;
