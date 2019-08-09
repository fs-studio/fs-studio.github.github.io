<?php

	add_action( 'wp_enqueue_scripts', 'theme_styles' );
	add_action( 'wp_enqueue_scripts', 'theme_scripts' );
	add_action( 'after_setup_theme', 'theme_register_nav_menu' );

	function theme_styles() {
		wp_enqueue_style( 'styles', get_stylesheet_uri() );
		wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
		wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=cyrillic' );
		wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );

		if(is_page( 'hinged-equipment' )) {
			wp_enqueue_style( 'slick', get_template_directory_uri() . '/slick/slick.css' );
			wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/slick/slick-theme.css' );
		}
	}

	function theme_scripts() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bg-slider', get_template_directory_uri() . '/js/bg-slider.js', ['jquery'], null, true );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', ['jquery'], null, true );
		wp_enqueue_script( 'contactform', get_template_directory_uri() . '/js/contactform.js', ['jquery'], null, true );

		if(is_page( 'hinged-equipment' )) {
			wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', ['jquery'], null, true );
			wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/slider.js', ['jquery'], null, true );
		}
	}

	function theme_register_nav_menu() {
		register_nav_menu( 'top', 'Меню в шапке' );
		// register_nav_menu( 'bottom', 'Меню в подвале' );
	}

	remove_filter( 'the_content', 'wpautop' ); // Отключаем автоформатирование в полном посте
	remove_filter( 'the_excerpt', 'wpautop' ); // Отключаем автоформатирование в кратком(анонсе) посте
	remove_filter( 'comment_text', 'wpautop' ); // Отключаем автоформатирование в комментариях[/crayon]

	remove_filter( 'the_content', 'wptexturize' ); // Отключаем автоформатирование в полном посте
	remove_filter( 'the_excerpt', 'wptexturize' ); // Отключаем автоформатирование в кратком(анонсе) посте
	remove_filter( 'comment_text', 'wptexturize' ); // Отключаем автоформатирование в комментариях

	add_shortcode( 'template_url_shortcode', 'template_url' );
	add_shortcode( 'get_bloginfo_template_directory_shortcode', 'get_bloginfo_template_directory' );

	function template_url() {
		return get_template_directory_uri();
	}

	function get_bloginfo_template_directory() {
		get_bloginfo('template_directory');
	}