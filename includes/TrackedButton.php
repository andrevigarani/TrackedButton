<?php

use TrackedButton\Includes\Activate;
use TrackedButton\Includes\Deactivate;

if ( ! defined( 'ABSPATH' )) exit;

final class TrackedButton {

	private $version = "0.0.1";

	private static $_instance = null;

	/**
	 * O construtor Singleton deve ser sempre privado de modo a evitar chamadas diretas ao
	 * construtor por meio do operador 'new'
	 */
	protected function __construct() {

	}

	/**
	 * Singletons não devem ser clonados.
	 */
	protected function __clone() { }

	/**
	 * Singletons não devem ser acessados via strings.
	 */
	protected function __wakeup() { }

	public static function getInstance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function init() {

	}

	public function activate() {
		Activate::activate();
	}

	public function deactivate() {
		Deactivate::deactivate();
	}

	public function getButton($atts, $label = null) {
		$a = shortcode_atts(
			array(
				'id' => null,
			),
			$atts,
			'tracked_button'
		);

		$htmlButton = "<div><button class=\"tracked-button\" id=\"{$a["id"]}\">". $label ."</button></div>";

		return $htmlButton;
	}

	public function saveClick() {

		if (isset($_POST['button_id'])) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'tracked_clicks';
			$datetime = current_time('mysql');
			$wpdb->insert($table_name, array('click_datetime' => $datetime, 'button_id' => $_POST['button_id']));
			echo $_POST['button_id'];
			wp_die();
		}
	}

}
