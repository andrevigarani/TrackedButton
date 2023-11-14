<?php
/**
 * Plugin Name:       Tracked Button
 * Description:       Este plugin implementa o design de um shortcode responsável por detectar e gravar informações de data e hora na utilização de botões que podem estar espalhados pelo site. Com isso, por meio de métricas, é possível abstrair informações a respeito de conversões à produtos, índices de interesse em posts, etc.
 * Version:           0.0.1
 * Requires at least: 5.6
 * Author:            André F. Vigarani
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tracked-button
 *
 * @package         Tracked_Button
 */

if ( ! defined( 'ABSPATH' )) exit;

define('TB_PLUGIN_FILE', __FILE__);
define('TB_PLUGIN_PATH', untrailingslashit( plugin_dir_path( TB_PLUGIN_FILE) ));
define('TB_PLUGIN_URL', untrailingslashit( plugins_url( '/', TB_PLUGIN_FILE) ));

require_once TB_PLUGIN_PATH. '/includes/TrackedButton.php';
require_once TB_PLUGIN_PATH. '/includes/Activate.php';
require_once TB_PLUGIN_PATH. '/includes/Deactivate.php';

if (class_exists('TrackedButton')){

	function TrackedButton() {
		return TrackedButton::getInstance();
	}

	function loadLibs () {

		// CSS
		wp_enqueue_style('tbcss', TB_PLUGIN_URL . '/css/button.css', null, time(), 'all');

		// JS
		wp_enqueue_script('tbjs', TB_PLUGIN_URL . '/js/button.js', array('jquery'), '1.0', true);

		// Localiza a URL AJAX
		wp_localize_script('tbjs', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	}

	// Cria o shortcode para o botão
	add_shortcode('tracked_button', array(TrackedButton(), 'getButton'));

	add_action('plugins_loaded', array(TrackedButton(), 'init'));
	add_action('wp_enqueue_scripts', 'loadLibs');

	// Registro de click
	add_action('wp_ajax_register_click',  array(TrackedButton(), 'saveClick'));
	add_action('wp_ajax_nopriv_register_click',  array(TrackedButton(), 'saveClick'));


	// activation
	register_activation_hook(TB_PLUGIN_FILE, array(TrackedButton(), 'activate'));

	// deactivation
	register_deactivation_hook(TB_PLUGIN_FILE, array(TrackedButton(), 'deactivate'));

}



