<?php

namespace TrackedButton\Includes;

if ( ! defined( 'ABSPATH' )) exit;

class Deactivate {

	protected function __construct() {
	}

	public static function deactivate() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'tracked_clicks';
		$sql = "DROP TABLE IF EXISTS $table_name ;";

		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
			$wpdb->query("DROP TABLE $table_name");
		}

		flush_rewrite_rules();
	}
}
