<?php
add_shortcode('tma_input', 'tma_input');

function tma_input($args) {
	if (isset($_POST['input-submit'])) {
		$options = get_option('tma_settings');
		if ($options) {
			$mode = $options['test_mode'];
			if ($mode == 1) {
				$AccountSid = $options['test_sid'];
				$AuthToken = $options['test_token'];
			}
			else {
				$AccountSid = $options['sid'];
				$AuthToken = $options['token'];
			}
			// Check if url is coming in argument, else use default url
			if (!empty($args) && isset($args['url']) && !empty($args['url'])) {
				$url = $args['url'];
			} else {
				$url = $options['url'];
			}
			$number = $options['number'];
			// Checking if message is coming in argument, else use default message
			if (!empty($args) && isset($args['message']) && !empty($args['message'])) {
				$message = html_entity_decode(stripslashes($args['message']));
			} else {
				$message = html_entity_decode(stripslashes($options['message']));
			}

			$number_one = $_POST['tma-input-1'];
			$number_two = $_POST['tma-input-2'];
			$number_three = $_POST['tma-input-3'];
			$number_four = $_POST['tma-input-4'];
			require "Services/Twilio.php";
			$client = new Services_Twilio($AccountSid, $AuthToken);
			$sms = $client->account->sms_messages->create(
		        // Step 6: Change the 'From' number below to be a valid Twilio number 
		        // that you've purchased, or the (deprecated) Sandbox number
	            '+'.str_replace(array('-', ' ', '.'), '', $number),
	 
	            // the number we are sending to - Any phone number
	            '+'.$number_one.$number_two.$number_three.$number_four,
	 
	            // the sms body
	            $message.' '.$url
	        );
	 
	        // Display a confirmation message on the screen
	        //echo "Sent ".stripslashes($message)." to ".$url;
		}
		else {
			echo 'Please verify plugin settings';
		}
	}
	$output = '<form id="tma-form" method="POST">';
	$output .=  '<input type="text" id="tma-input-1" name="tma-input-1" size="1" value="1" onfocus="if(this.value == \'1\') {this.value = \'\'; }" onblur="if(this.value == \'\') {this.value = \'1\'}"/>-';
	$output .=  '<input type="text" id="tma-input-1" name="tma-input-2" size="3" value="xxx" onfocus="if(this.value == \'xxx\') {this.value = \'\'; }" onblur="if(this.value == \'\') {this.value = \'xxx\'}"/>-';
	$output .=  '<input type="text" id="tma-input-2" name="tma-input-3" size="3" value="xxx" onfocus="if(this.value == \'xxx\') {this.value = \'\'; }" onblur="if(this.value == \'\') {this.value = \'xxx\'}"/>-';
	$output .=  '<input type="text" id="tma-input-3" name="tma-input-4" size="4" value="xxxx" onfocus="if(this.value == \'xxxx\') {this.value = \'\'; }" onblur="if(this.value == \'\') {this.value = \'xxxx\'}"/>';
	$output .= '<input type="submit" id="input-submit" name="input-submit" class="button" value="Send Link"/>';
	$output .= '</form>';
	return $output;
}
?>