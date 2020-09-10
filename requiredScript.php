<?php

add_action('wp_enqueue_scripts', 'required_script');
function required_script() {
    wp_enqueue_script('script-bootstrap', get_stylesheet_directory_uri() . '/public/js/preload.js');
    wp_enqueue_script('script-custom', get_stylesheet_directory_uri() . '/public/js/index.js');
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/0ba6930fe0.js');
}

function mind_defer_scripts( $tag, $handle, $src ) {
    $defer = array(
        'script-bootstrap',
        'script-custom',
        'fontawesome'
    );
    if ( in_array( $handle, $defer ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );