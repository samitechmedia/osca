<?php

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

function remove_menu_pages() {
    $menu_pages = array(
        'edit.php',
        'edit.php?post_type=page',
        'edit-comments.php',
        'themes.php',
        'plugins.php',
        'tools.php',
    );
    foreach($menu_pages as $page){
        remove_menu_page($page);
    }
}
add_action( 'admin_menu', 'remove_menu_pages' );

function remove_submenu_pages() {
    $submenu_pages = array(
        'options-general.php' => array(
            'options-reading.php',
            'options-writing.php',
            'options-discussion.php',
            'options-permalink.php'
        ),
    );
    foreach($submenu_pages as $m_page => $sm_pages){
        foreach($sm_pages as $page){
            remove_submenu_page($m_page, $page);
        }
    }
}
add_action( 'admin_menu', 'remove_submenu_pages', 999 );

function game_custom_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'image':
                    $thumb = get_post_thumbnail_id($post_id);
                    if($thumb) echo '<img src="'. wp_get_attachment_url($thumb).'" alt="" style="max-width:40%;">';
                    break;
                
                case 'release_date':
                    echo date('m-d-Y', strtotime(get_field('release_date', $post_id)));
                    break;
                    
		case 'jackpot':
                    echo '$'.number_format(get_field('jackpot', $post_id));
                    break;
                
                case 'payouts':
                    echo get_field('payouts', $post_id);
                    break;
	}
}
add_action( 'manage_game_posts_custom_column' , 'game_custom_columns', 10, 2 );

function add_game_columns( $columns ) {
    return array(
        'cb' => '<input type="checkbox" />',
        'image' => 'Image',
        'title' => 'Title',
        'release_date' => 'Release Date',
        'jackpot' => 'Jackpot',
        'payouts' => 'Payouts',
        'date' => 'Posted'
    );
}
add_filter( 'manage_game_posts_columns' , 'add_game_columns' );

function celc_save_post(){
    $args = array(
        'post_type' => 'game',
        'posts_per_page' => -1
    );
    $query = new WP_Query($args);
    
    $data = array();
    
    if($query->have_posts()){ while ($query->have_posts()){ $query->the_post();
        $fields = get_fields();
        
        if(!$fields['iframe']) continue;
        
        $thumb = get_post_thumbnail_id();
        $data[] = array(
            'title' => html_entity_decode(get_the_title()),
            'iframe' => $fields['iframe'],
            'release_date' => $fields['release_date'],
            'rating' => $fields['rating'],
            'jackpot' => $fields['jackpot'],
            'payouts' => $fields['payouts'],
            'thumb' => $thumb ? wp_get_attachment_url($thumb) : $thumb
        );
    }} wp_reset_postdata();
    
    $handle = fopen(ABSPATH . 'json/data.json', 'w');
    fwrite($handle, json_encode($data));
    fclose($handle);
}
add_action('save_post', 'celc_save_post');
