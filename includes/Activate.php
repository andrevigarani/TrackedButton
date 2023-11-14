<?php

namespace TrackedButton\Includes;

if ( ! defined( 'ABSPATH' )) exit;

class Activate {

	protected function __construct() {
	}

	public static function activate() {

		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'tracked_clicks';

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			click_datetime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			button_id varchar(250) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		flush_rewrite_rules();
	}
}
