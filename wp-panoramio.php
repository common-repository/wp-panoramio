<?php
/*
Plugin Name: WP Panoramio
Plugin URI: http://www.sutanaryan.com/freebies/plugins/wp-panoramio/
Description: A very simple plugin that display photos worldwide in gallery, slideshow, photo and list style.
Author: Ryan Sutana
Version: 1.0.0
Author URI: http://www.sutanaryan.com/
*/

require_once ( 'inc/func.php' );

add_action('admin_menu','panoramio_admin_menu');
function panoramio_admin_menu()
{ 
	add_menu_page("WP Panoramio", "Panoramio", 5, __FILE__, "wp_panoramio", plugins_url('/images/menu.png', __FILE__), 120);
}

add_action('admin_enqueue_scripts', 'panoramio_style');
function panoramio_style(){
	wp_register_style( 'panoramio_css', plugins_url('/css/wp-panoramio.css', __FILE__) . '', false, '1.0.0' );
	wp_enqueue_style( 'panoramio_css' );
}

function wp_panoramio()
{
	//include panoramio form
	include_once 'panoramio.php';
}

register_activation_hook(__FILE__,'panoramio_table');
function panoramio_table()
{
    global $wpdb;
	
    $table = $wpdb->prefix."panoramio";
    $structure = "
	CREATE TABLE IF NOT EXISTS $table (
        ID INT(11) NOT NULL AUTO_INCREMENT,
		style VARCHAR(225) NOT NULL,
		tag VARCHAR(225) NOT NULL,
		width INT(11) NOT NULL,
		height INT(11) NOT NULL,
		bgcolor VARCHAR(225) NOT NULL,
		position VARCHAR(225),
		list_size INT(11),
		columns INT(11),
		rows INT(11),
		orientation VARCHAR(225),
		PRIMARY KEY(ID)
    );";
    $wpdb->query( $structure );
	
	//insert default value
	$wpdb->insert("{$wpdb->prefix}panoramio", array(
		'style'			=> "photo_list",
		'tag'			=> "philippines",
		'width'			=> "450",
		'height'		=> "350",
		'bgcolor'		=> "0d0d0d",
		'position'		=> "right",
		'list_size'		=> "4",
		'columns'		=> "4",
		'rows'			=> "2",
		'orientation'	=> "horizontal",
	));
}

?>