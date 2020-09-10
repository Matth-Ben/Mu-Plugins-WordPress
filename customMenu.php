<?php

add_action( 'init', 'custom_menu' );
function custom_menu() {
    register_nav_menus(array(
        'header-main-menu' => __( 'Main header menu' ),
	    'copyright-menu' => __( 'Copyright Menu' ),
    ));
}
