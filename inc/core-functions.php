<?php
// Sky-custom - Core Functionality



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// custom login logo url
function sky_custom_custom_login_url( $url ) {

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {

		$url = esc_url( $options['custom_url'] );

	}

	return $url;

}
add_filter( 'login_headerurl', 'sky_custom_custom_login_url' );



// custom login logo title
function sky_custom_custom_login_title( $title ) {

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_title'] ) && ! empty( $options['custom_title'] ) ) {

		$title = esc_attr( $options['custom_title'] );

	}

	return $title;

}
add_filter( 'login_headertext', 'sky_custom_custom_login_title' );



// custom login styles
function sky_custom_custom_login_styles() {

	$styles = false;

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_style'] ) && ! empty( $options['custom_style'] ) ) {

		$styles = sanitize_text_field( $options['custom_style'] );

	}

	if ( 'enable' === $styles ) {

		/*

		wp_enqueue_style(
			string           $handle,
			string           $src = '',
			array            $deps = array(),
			string|bool|null $ver = false,
			string           $media = 'all'
		)

		wp_enqueue_script(
			string           $handle,
			string           $src = '',
			array            $deps = array(),
			string|bool|null $ver = false,
			bool             $in_footer = false
		)

		*/

		wp_enqueue_style( 'sky_custom', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/sky_custom_login.css', array(), null, 'screen' );

		wp_enqueue_script( 'sky_custom', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/sky_custom_login.js', array(), null, false );

	}

}
add_action( 'login_enqueue_scripts', 'sky_custom_custom_login_styles' );



// custom login message
function sky_custom_custom_login_message( $message ) {

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_message'] ) && ! empty( $options['custom_message'] ) ) {

		$message = wp_kses_post( $options['custom_message'] ) . $message;

	}

	return $message;

}
add_filter( 'login_message', 'sky_custom_custom_login_message' );



// custom admin footer
function sky_custom_custom_admin_footer( $message ) {

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_footer'] ) && ! empty( $options['custom_footer'] ) ) {

		$message = sanitize_text_field( $options['custom_footer'] );

	}

	return $message;

}
add_filter( 'admin_footer_text', 'sky_custom_custom_admin_footer' );



// custom toolbar items
function sky_custom_custom_admin_toolbar() {

	$toolbar = false;

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_toolbar'] ) && ! empty( $options['custom_toolbar'] ) ) {

		$toolbar = (bool) $options['custom_toolbar'];

	}

	if ( $toolbar ) {

		global $wp_admin_bar;

		$wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'new-content' );

	}

}
add_action( 'wp_before_admin_bar_render', 'sky_custom_custom_admin_toolbar', 999 );



// custom admin color scheme
function sky_custom_custom_admin_scheme( $user_id ) {

	$scheme = 'default';

	$options = get_option( 'sky_custom_options', sky_custom_options_default() );

	if ( isset( $options['custom_scheme'] ) && ! empty( $options['custom_scheme'] ) ) {

		$scheme = sanitize_text_field( $options['custom_scheme'] );

	}

	$args = array( 'ID' => $user_id, 'admin_color' => $scheme );

	wp_update_user( $args );

}
add_action( 'user_register', 'sky_custom_custom_admin_scheme' );
