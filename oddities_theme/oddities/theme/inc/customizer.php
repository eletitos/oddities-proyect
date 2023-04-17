<?php


function oddities__customizer_registration( $wp_customize ) {
	$wp_customize->add_panel( 'oddities_custom_options', array(
	  'title' => __( 'Oddities', 'oddities' ),
	  'priority' => 160,
	  'capability' => 'edit_theme_options',
	));

	// Blog section
	$wp_customize->add_section( 'blog_section' , array(
	  'title' => __( 'Blog', 'oddities' ),
	  'panel' => 'oddities_custom_options',
	  'priority' => 1,
	  'capability' => 'edit_theme_options',
	));


	// Blog title
	$wp_customize->add_setting( 'blog_archive_title', array(
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'oddities_sanitize_text',
	));

	$wp_customize->add_control('blog_archive_title', array(
	  'label' => __( 'Blog archive Title', 'oddities' ),
	  'section' => 'blog_section',
	  'priority' => 1,
	  'type' => 'text',
	));



	// Blog image
	$wp_customize->add_setting( 'blog_archive_image', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	  ));

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'blog_archive_image',
	array(
		'label'    => __( 'Header blog archive image', 'oddities' ),
		'section'  => 'blog_section',
		'settings' => 'blog_archive_image',
		'mime_type' => 'image'
	)
	) );

	// Blog section
	$wp_customize->add_section( 'shop_section' , array(
		'title' => __( 'Shop', 'oddities' ),
		'panel' => 'oddities_custom_options',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	  ));

	// Shop top image
	$wp_customize->add_setting( 'shop_top_image', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	  ));

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'shop_top_image',
	array(
		'label'    => __( 'Header shop image', 'oddities' ),
		'section'  => 'shop_section',
		'settings' => 'shop_top_image',
		'mime_type' => 'image'
	)
	) );

	// Shop ongrid image
	$wp_customize->add_setting( 'shop_ongrid_image', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	  ));


	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'shop_ongrid_image',
	array(
		'label'    => __( 'Ongrid shop image', 'oddities' ),
		'section'  => 'shop_section',
		'settings' => 'shop_ongrid_image',
		'mime_type' => 'image'
	)
	) );

	// Shop Id of the featured product
	$wp_customize->add_setting( 'shop_featured_product', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'oddities_sanitize_number',
	  ));

	$wp_customize->add_control('shop_featured_product', array(
		'label' => __( 'Featured product ID', 'oddities' ),
		'section' => 'shop_section',
		'priority' => 1,
		'type' => 'text',
	  ));



  }
  add_action( 'customize_register', 'oddities__customizer_registration' );


