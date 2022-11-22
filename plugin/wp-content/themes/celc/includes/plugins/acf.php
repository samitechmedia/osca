<?php
define('WPP_ACF_DIR', "/includes/plugins/acf/");

if(!is_plugin_active(THEME_DIR . WPP_ACF_DIR ."acf.php")){

    add_filter('acf/settings/path', 'celc_acf_settings_path');
    function celc_acf_settings_path( $path ) {
        return THEME_DIR . WPP_ACF_DIR;
    }

    add_filter('acf/settings/dir', 'celc_acf_settings_dir');
    function celc_acf_settings_dir( $dir ) {
        return THEME_URI . WPP_ACF_DIR;
    }

    define( 'ACF_LITE', true );

    include_once(THEME_DIR . WPP_ACF_DIR ."acf.php");
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_game-settings',
		'title' => 'Game Settings',
		'fields' => array (
			array (
				'key' => 'field_56fcf2b31296d',
				'label' => 'Iframe URL',
				'name' => 'iframe',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56fcf21e12969',
				'label' => 'Release Date',
				'name' => 'release_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_56fcf23d1296a',
				'label' => 'Rating',
				'name' => 'rating',
				'type' => 'number',
				'default_value' => '2.5',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => 5,
				'step' => '0.01',
			),
			array (
				'key' => 'field_56fcf2651296b',
				'label' => 'Jackpot',
				'name' => 'jackpot',
				'type' => 'number',
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_56fcf27e1296c',
				'label' => 'Payouts',
				'name' => 'payouts',
				'type' => 'number',
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => '',
				'step' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'game',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


