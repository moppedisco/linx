<?php

//error_reporting(E_ALL);
//@ini_set('display_errors', 1);

/*
Plugin Name: Text My App
URI: http://VirtuousGiant.com
Description: Send SMS download links to your customer's cellular devices
Version: 1.0.1
Author: Virtuous Giant
Author URI: http://VirtuousGiant.com
License: GPL2
*/


register_activation_hook(__FILE__,'tma_install');

global $tma_db_version;
$tma_db_version = "1.0.1";
$tma_installed_ver = get_option( "tma_db_version" );

function tma_install () {
    global $wpdb;
    global $tma_db_version;
	
	$table = $wpdb->prefix . "tma_settings";
    
    $sql = "CREATE TABLE " . $table . " (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
	url VARCHAR(250) NOT NULL,
	sid VARCHAR(250) NOT NULL,
	token VARCHAR(250) NOT NULL,
	text_sid VARCHAR(250) NOT NULL,
	test_token VARCHAR(250) NOT NULL,
	test_mode tinyint(1) NOT NULL DEFAULT 0,
	UNIQUE KEY  (id));";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    //dbDelta($sql);
    update_option("tma_db_version", $tma_db_version);
}
include_once 'textmyapp-admin.php';
include_once 'textmyapp-functions.php';

add_action('wp_enqueue_scripts', 'tma_scripts');
add_action('admin_enqueue_scripts', 'tma_scripts');

function tma_scripts() {
	wp_register_style('tma-style', plugins_url('/tma-style.css',__FILE__));
	wp_enqueue_style('tma-style');
}
?>