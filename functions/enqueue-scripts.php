<?php

// Load theme scripts
function theme_scripts() {

  // $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

  // // Main script path
  // $path = get_template_directory_uri() . "/assets/dist/js/test-user{$min}.js";

  // Register and Enqueue
	wp_register_script( 'test-user', $path, array('jquery'), null, true );
	wp_enqueue_script( 'js-03', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	wp_enqueue_script( 'js-02', get_template_directory_uri() . '/assets/js/app.fa143e5c.js', array('jquery') );
	wp_enqueue_script( 'js-01', get_template_directory_uri() . '/assets/js/1.5830686c.chunk.js', array('jquery') );

}

// Load theme conditional scripts
function theme_conditional_scripts() { }

// Load theme conditional styles
function theme_conditional_styles() {
	wp_enqueue_style('styl-glowny', get_template_directory_uri() . '/assets/bundle.css');
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Add Theme Scripts
add_action( 'wp_enqueue_scripts', 'theme_conditional_scripts' ); // Add Theme Conditionals Scripts
add_action( 'wp_enqueue_scripts', 'theme_conditional_styles' ); // Add Theme Conditionals Scripts
