<?php

function bemax_required_files()
{
    $requires = array(
        'bemax-sidebar',
        'bemax-scrollbar',
        'bemax-tilt',
        'bemax-particles',
        'bemax-youtube',
        'bemax-proparticles',
        'bemax-geometry',
        'bemax-waterpipe',
        'bemax-starswarp',
        'bemax-stacks',
        'bemax-tilted',
        'bemax-sparkles'
    );
    foreach ( $requires as $require ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . $require . '/' . $require . '.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . $require . '/' . $require . '.php';
        }
    }
}

bemax_required_files();
function bemax_enhancer_scripts_and_styles()
{
    wp_enqueue_script( 'jquery' );
    //free styles
    wp_enqueue_style(
        'bemax-jquery-mCustomScrollbar',
        plugin_dir_url( __FILE__ ) . 'styles/jquery.mCustomScrollbar.min.css',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_style(
        'bemax-jquery-freecss',
        plugin_dir_url( __FILE__ ) . 'styles/bemaxfreestyles.css',
        '',
        rand( 0, 100 )
    );
    //free scripts
    wp_enqueue_script(
        'bemax-jquery-mCustomScrollbar-concat',
        plugin_dir_url( __FILE__ ) . 'scripts/jquery.mCustomScrollbar.concat.min.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'bemax-tilt',
        plugin_dir_url( __FILE__ ) . 'scripts/tilt.jquery.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'bemax-miguras-offCanvas',
        plugin_dir_url( __FILE__ ) . 'scripts/miguras-offCanvas.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'bemax-particleground',
        plugin_dir_url( __FILE__ ) . 'scripts/jquery.particleground.min.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'bemax-youtubebg',
        plugin_dir_url( __FILE__ ) . 'scripts/jquery.youtubebackground.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'bemax-freefrontend',
        plugin_dir_url( __FILE__ ) . 'scripts/bemaxfree_scripts.js',
        '',
        rand( 0, 100 )
    );
}

add_action( 'wp_enqueue_scripts', 'bemax_enhancer_scripts_and_styles', 99 );