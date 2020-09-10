<?php

function custom_breadcrumbs() {
    $url_home = get_home_url();
    $breadcrumb = '<a href="'. $url_home .'">'. __('Home', 'site-name') .'</a>';

    $post_ID = get_queried_object_id();
    $post = get_post($post_ID);

    if ( 'page' == $post->post_type ) {
        $ancestor = get_post($post->ID);
        $post_url = get_permalink($post_ID);
        if ($ancestor->ancestors) {
            $ancestor_ID = $ancestor->ancestors[0];
            $ancestor = get_post($ancestor_ID);
            $ancestor_title = $ancestor->post_title;
            $ancestor_url = get_permalink($ancestor_ID);

            $breadcrumb .= '<span class="separator-breadcrumbs"> / </span><a href="'. $ancestor_url .'">'. $ancestor_title .'</a>';
        }

        $breadcrumb .= '<span class="separator-breadcrumbs"> / </span><a href="' . $post_url . '"><ins>' . $post->post_title .'</ins></a>';
    }

    return $breadcrumb;
}
