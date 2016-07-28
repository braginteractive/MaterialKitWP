<?php
/**
 * Enqueue scripts and styles.
 */
function mvpwp_scripts() {

  wp_enqueue_style( 'mvpwp-material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), '1.0.0' );

  wp_enqueue_style( 'mvpwp-roboto-font', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700', array(), '1.0.0' );

  wp_enqueue_style( 'mvpwp-style', get_stylesheet_directory_uri() . '/style.min.css', array(), '1.0.0' );

  wp_enqueue_script( 'mvpwp-bootstrap', get_template_directory_uri() . '/js/dist/scripts.min.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'mvpwp-material', get_template_directory_uri() . '/js/material.min.js', '1.0.0', true );

  wp_enqueue_script( 'mvpwp-nouislder', get_template_directory_uri() . '/js/nouislider.min.js', '1.0.0', true );

  wp_enqueue_script( 'mvpwp-datepicker', get_template_directory_uri() . '/js/bootstrap-datepicker.js', '1.0.0', true );

  wp_enqueue_script( 'mvpwp-material-kit', get_template_directory_uri() . '/js/material-kit.js', '1.0.0', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'mvpwp_scripts' );