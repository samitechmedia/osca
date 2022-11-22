<?php
function create_post_types() {

    /***********************Games*******************************************/
    $labels = array(
        'name' => _x('Games', 'post type general name'),
        'singular_name' => _x('Game', 'post type singular name'),
        'add_new' => __('Add new'),
        'add_new_item' => __('Add New Game'),
        'edit_item' => __('Edit Game'),
        'new_item' => __('New Game'),
        'all_items' => __('All Games'),
        'view_item' => __('View Game'),
        'search_items' => __('Search Games'),
        'not_found' => __('Games not found'),
        'not_found_in_trash' => __('Games not found on the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Games'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'rewrite' => array('slug' => 'games'),
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('game', $args);
    /********************************************************************************************/
}
add_action('init', 'create_post_types');

function custom_taxonomies() {
    //===================================New Taxonomy===================================//

    //======================================================================//
}
add_action('init', 'custom_taxonomies');
