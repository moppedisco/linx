<?php

add_action('admin_menu', 'tma_settings_menu');

function tma_settings_menu() {
	add_submenu_page('plugins.php', 'Text My App Settings', 'Text My App', 'manage_options', 'tma-settings', 'tma_settings');
}

function tma_settings() {
	$settings = get_option('tma_settings');
	if ($settings) {
		$url = $settings['url'];
		$number = $settings['number'];
		$message = stripslashes($settings['message']);
		$sid = $settings['sid'];
		$token = $settings['token'];
		$test_sid = $settings['test_sid'];
		$test_token = $settings['test_token'];
		$test_mode = $settings['test_mode'];
	}
	else {
		$url = null;
		$number = null;
		$message = null;
		$sid = null;
		$token = null;
		$test_sid = null;
		$test_token = null;
		$test_mode = 0;
	}

	if (isset($_POST['tma-submit'])) {
		$url = $_POST['url'];
		$number = $_POST['number'];
		$message = $_POST['message'];
		$sid = $_POST['sid'];
		$token = $_POST['token'];
		$test_sid = $_POST['test-sid'];
		$test_token = $_POST['test-token'];
		if (isset($_POST['test-mode'])) {
			$test_mode = $_POST['test-mode'];
		}
		else {
			$test_mode = 0;
		}

		$options = array('url' => esc_attr($url),
			'number' => $number,
			'message' => htmlspecialchars($message),
			'sid' => $sid,
			'token' => $token,
			'test_sid' => $test_sid,
			'test_token' => $test_token,
			'test_mode' => $test_mode);
		update_option('tma_settings', $options);
	}
	include 'templates/admin/_tmaSettings.php';
}
?>