<?php

function active_theme_plugins(){
    
    if(!function_exists('is_plugin_active')){
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    
    include_once THEME_DIR .'/includes/plugins/acf.php';
}
add_action('after_setup_theme', 'active_theme_plugins');
