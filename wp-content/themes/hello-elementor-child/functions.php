<?php
// Parent and child theme styles
function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');

// Custom Post Type
function create_deer_tests_cpt() {
    $labels = array(
        'name' => _x('Deer Tests', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Deer Test', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => __('Deer Tests', 'textdomain'),
        'all_items' => __('All Deer Tests', 'textdomain'),
        'add_new_item' => __('Add New Deer Test', 'textdomain'),
        'edit_item' => __('Edit Deer Test', 'textdomain'),
    );

    $args = array(
        'label' => __('Deer Test', 'textdomain'),
        'description' => __('Custom post type for Deer Tests', 'textdomain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-site',
        'has_archive' => true,
        'rewrite' => array('slug' => 'deer-tests'),
    );

    register_post_type('deer_test', $args);
}
add_action('init', 'create_deer_tests_cpt', 0);