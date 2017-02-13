<div id="icon-options-general" class="icon32"></div><h2>Text My App Settings</h2>
<div id="wrap">
	<div class="postbox-container" style="width:65%; margin-right: 5%">
		<div class="metabox-holder">
			<div class="meta-box-sortables" style="min-height:0;">
				<div class="postbox">
					<h3 class="hndle"><span>Plugin Settings</span></h3>
					<div class="inside">
						<p>To use this plugin, visit <a href="http://twilio.com" target="_blank">Twilio</a> and sign up for a free account.</p>
						<p>Enter shortcode <span class="shortcode">[tma_input]</span> on any post or page.</p>
						<p>Use arguments URL or MESSAGE to pass in the shortcode for custom App URL and Message<br/> <span class="shortcode">[tma_input url="http://example.com/app" message="Hello World!"]</span></p>
						<form id="idtsettings" action="" method="POST">
							<div class="left">
								<div>
									<label for="url">App URL: </label><br/>
									<input type="text" name="url" id="app-url" value="<?php echo (isset($url) ? $url : "Enter App URL"); ?>" onfocus="if(this.value == 'Enter App URL') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter App URL'}"/>
								</div>
								<div>
									<label for="message">Message (100 characters): </label><br/>
									<input type="text" name="message" id="message" value="<?php echo (isset($message) ? stripslashes($message) : "Enter Message"); ?>" onfocus="if(this.value == 'Enter Message') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter Message'}"/>
								</div>
								<div>
									<label for="token">Account Token: </label><br/>
									<input type="text" name="token" id="account-token" value="<?php echo (isset($token) ? $token : "Enter Account Token"); ?>" onfocus="if(this.value == 'Enter Account Token') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter Account Token'}"/>
								</div>
								<div>
									<label for="test-token">Account Test Token: </label><br/>
									<input type="text" name="test-token" id="test-token" value="<?php echo (isset($test_token) ? $test_token : "Enter Test Token"); ?>" onfocus="if(this.value == 'Enter Test Token') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter Test Token'}"/>
								</div>
							</div>
							<div class="right">
								<div>
									<label for="number">Twilio Number (x-xxx-xxx-xxxx): </label><br/>
									<input type="text" name="number" id="number" value="<?php echo (isset($number) ? $number : "Enter Twilio Number"); ?>" onfocus="if(this.value == 'Enter Twilio Number') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter Twilio Number'}"/>
								</div>
								<div>
									<label for="sid">Account SID: </label><br/>
									<input type="text" name="sid" id="account-sid" value="<?php echo (isset($sid) ? $sid : "Enter Account SID"); ?>" onfocus="if(this.value == 'Enter Account SID') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter Account SID'}"/>
								</div>
								<div>
									<label for="test-sid">Account Test SID: </label><br/>
									<input type="text" name="test-sid" id="test-sid" value="<?php echo (isset($test_sid) ? $test_sid : "Enter Test SID"); ?>" onfocus="if(this.value == 'Enter Test SID') {this.value = ''; }" onblur="if(this.value == '') {this.value = 'Enter Test SID'}"/>
								</div>
							</div>
							<br style="clear: both;"/>
							<div>
								<label for="test-mode">Test Mode: </label>
								<input type="checkbox" name="test-mode" id="test-mode" value="1" <?php echo (isset($test_mode) && $test_mode == 1 ? 'checked="checked"' : ''); ?>/>
							</div>
							<div>
								<input type="submit" name="tma-submit" id="tma-submit" class="button button-large " value="Save Settings"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="postbox-container" style="width:20%;">
		<div class="metabox-holder">
			<div class="meta-box-sortables" style="min-height:0;">
				<div class="postbox">
					<h3 class="hndle"><span>About This Plugin</span></h3>
					<div class="inside">
						<p>Twilio for ID is designed and developed by <a href="http://virtuousgiant.com?r=adnwp">Virtuous Giant</a>.</p>
						<p>Get in touch with us on <a href="https://www.facebook.com/virtuousgiant">Facebook</a>, Twitter <a href="http://twitter.com/virtuousgiant">@virtuousgiant</a>, or App.net <a href="http://alpha.app.net/vg">@VG</a>.</p>
					</div>
				</div>
			</div>
			<div class="meta-box-sortables" style="min-height:0;">
				<div class="postbox">
					<h3 class="hndle"><span>Support this Plugin</span></h3>
					<div class="inside">
						<div style="text-align: center;">
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="AYQCM6XAX5BTL">
								<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="meta-box-sortables" style="min-height:0;">
				<div class="postbox">
					<h3 class="hndle"><span>Links</span></h3>
					<div class="inside">
						<ul>
							<li>IgnitionDeck - <a href="http://ignitiondeck.com?r=adnwp">Crowdfunding for Wordpress</a></li>
							<li>Virtuous Giant - <a href="http://VirtuousGiant.com?r=adnwp">Virtuous Giant</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
