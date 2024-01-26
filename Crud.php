<?php


/*
 * Plugin Name:CRUD
 * Description: This is a simple todo plugin.
 * Version: 1.0.0
 * Author: Nahidul Islam Sayel
 * Author URI: http://www.nahidulislamsayel.com
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ .'/vendor/autoload.php';

final class WeDevs_Academy{	
	//The main plugin version
	const version = '1.0';
	/**
	 * class construct
	 *
	 * 
	 */
	private function __construct() {
		$this->define_constants();
		 register_activation_hook( __FILE__, [$this, 'activate'] );
		 add_action('plugins_loaded',[$this, 'init_plugin']);
	}	 
	/**
	 * Method init
	 *
	 * @return \weDevs_Acadent
	 */
	public static function init(){
	     static $instance = false;
		 if ( ! $instance ) {
			$instance = new self();
		 }
		
		 return $instance;
	}
	public function define_constants() {
		define('WD_ACADEMY_VERSION', self::version);
		define('WD_ACADEMY_FILE', __FILE__);
		define('WD_ACADEMY_PATH', __DIR__);
		define('WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE));
		define('WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
	}

	public function activate() {
		$installed = get_option('wd_academy_installed');
		if ( ! $installed ) {
			update_option( 'wd_academy_installed' , time() );
		}
		
		update_option('wd_academy_version',WD_ACADEMY_VERSION);
		
	}
	/**
 * intiallized 
 *
 * @return void
 */
	function init_plugin(){
		if(is_admin()){
			new WeDevs\Academy\Admin();
		}
		else{
			new WeDevs\Academy\Frontend();
		}

	}
}



function weDevs_academy(){
	return WeDevs_Academy::init();
}


// kick-off the plugin
weDevs_academy();