<?php

	add_action( 'init', 'oddities_add_custom_shortcode' );

	function oddities_add_custom_shortcode() {
		add_shortcode( 'marquee', 'oddities_marquee_shortcode' );
		add_shortcode( 'star', 'oddities_star_shortcode' );
		add_shortcode( 'home-links', 'oddities_home_links_shortcode' );
		add_shortcode( 'home-roadmap', 'oddities_home_roadmap_shortcode' );
		add_shortcode( 'home-blog', 'oddities_home_blog_shortcode' );
		add_shortcode( 'faq-form', 'oddities_faq_form_shortcode' );
	}



	function oddities_marquee_shortcode($atts){
		$atts = shortcode_atts( array(
			'text' => ''
		), $atts, 'marquee' );



		ob_start();
			get_template_part( 'template-parts/shortcodes/marquee', '', $atts );


		return ob_get_clean();

	}

	function oddities_star_shortcode($atts){
		$atts = shortcode_atts( array(
			'color' => 'pink',
			'text' => 'prueba',
			'product-id' => '',
		), $atts, 'star' );

		ob_start();
			get_template_part( 'template-parts/shortcodes/star', '', $atts );


		return ob_get_clean();

	}

	function oddities_home_links_shortcode(){

		ob_start();
			get_template_part( 'template-parts/shortcodes/home', 'links' );

		return ob_get_clean();

	}

	function oddities_home_roadmap_shortcode(){

		ob_start();
			get_template_part( 'template-parts/shortcodes/home', 'roadmap' );

		return ob_get_clean();

	}

	function oddities_home_blog_shortcode(){

		ob_start();
			get_template_part( 'template-parts/shortcodes/home', 'blog' );

		return ob_get_clean();

	}

	function oddities_faq_form_shortcode($atts){
		$atts = shortcode_atts( array(
			'form-id' => '',
			'form-title' => ''
		), $atts, 'faq-form' );



		ob_start();
			get_template_part( 'template-parts/shortcodes/faq-form', '', $atts );


		return ob_get_clean();

	}
