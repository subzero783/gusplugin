<?php // gusplugin - Core Functionality

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// custom login logo url
function gusplugin_custom_login_url( $url ) {
	
	$options = get_option( 'gusplugin_options', gusplugin_options_default() );
	
	if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {
		
		$url = esc_url( $options['custom_url'] );
		
	}
	
	return $url;
	
}
add_filter( 'login_headerurl', 'gusplugin_custom_login_url' );




// custom login styles
function gusplugin_custom_login_styles() {
	
	$styles = false;
	
	$options = get_option( 'gusplugin_options', gusplugin_options_default() );
	
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
		
		wp_enqueue_style( 'gusplugin', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/gusplugin-login.css', array(), null, 'screen' );
		
		wp_enqueue_script( 'gusplugin', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/gusplugin-login.js', array(), null, true );
		
	}
	
}
add_action( 'login_enqueue_scripts', 'gusplugin_custom_login_styles' );





// custom login message
function gusplugin_custom_login_message( $message ) {
	
	$options = get_option( 'gusplugin_options', gusplugin_options_default() );
	
	if ( isset( $options['custom_message'] ) && ! empty( $options['custom_message'] ) ) {
		
		$message = wp_kses_post( $options['custom_message'] ) . $message;
		
	}
	
	return $message;
	
}
add_filter( 'login_message', 'gusplugin_custom_login_message' );




