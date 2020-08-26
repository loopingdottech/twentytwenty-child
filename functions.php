<?php

/**
 * Register and Enqueue Styles.
 */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), 
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

/**
 * Remove unnecessary functionality from Twenty Twenty (parent theme)
 */
add_action( 'after_setup_theme', 'remove_parent_functionality' );
function remove_parent_functionality() {
    // Add remove_action() here
}