<?php

function my_theme_enqueue_styles() {

    $parenthandle = 'parent-style'; 

    $theme = wp_get_theme();

    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),        
        $theme->parent()->get('Version')
    ); 

    if ( is_page_template( 'landing1.php')){ 
        wp_enqueue_style( 'bootstrap', get_stylesheet_uri() . '/css/bootstrap.min.css',
            array( $parenthandle ),
            '5.1.3', //Currently bootstrap
            'all', // view for all device 
            $theme->get('Version') 
        );
    }
    

    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );

} 

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
