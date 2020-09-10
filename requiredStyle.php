<?php

add_action('wp_enqueue_scripts', 'required_stylesheet');
function required_stylesheet() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array(), null);
}
