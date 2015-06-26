<?php
add_theme_support('post-thumbnails');

function remove_menus(){
  remove_menu_page( 'edit-comments.php' );  
}
add_action( 'admin_menu', 'remove_menus' );

function invierta_videos_post() {
    $labels = array(
        'name' => 'Videos',
        'singular_name' => 'Video',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title','editor'),
        'has_archive' => true,
    );

    register_post_type( 'videos', $args );
}
add_action( 'init', 'invierta_videos_post' );

function invierta_portafolio_post() {
    $labels = array(
        'name' => 'Portafolio',
        'singular_name' => 'Portafolio',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title','editor'),
        'has_archive' => true,
    );

    register_post_type( 'portafolio', $args );
}
add_action( 'init', 'invierta_portafolio_post' );

?>