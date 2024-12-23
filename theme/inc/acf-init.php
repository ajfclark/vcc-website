<?php
function my_acf_init() {
	include ("google_api_key.php");
    acf_update_setting('google_api_key', $google_api_key);
}
add_action('acf/init', 'my_acf_init');
