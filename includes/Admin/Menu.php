<?php 

namespace WeDevs\Academy\Admin;

class Menu{
	
	function __construct(){
		add_action("admin_menu", [$this,'add_menu']);
	}

	public function add_menu(){
		add_menu_page(__('weDevs Academy','wedevs-academy'),__('Academy','wedevs-academy'),'manage_options','wedevs-academy',[$this,'adressbook_page'],'dashicons-admin-generic');
		add_submenu_page('wedevs-academy',__('Address Book','wedevs-academy'),__('Address Book', 'wedevs-academy'),'manage_options','wedevs-academy',[$this,'adressbook_page']) ;
		add_submenu_page('wedevs-academy',__('Settings','wedevs-academy'),__('Settings', 'wedevs-academy'),'manage_options','wedevs-academy-settings',[$this,'settingspage']) ;

	}
	
	public function adressbook_page(){
		$addressbook = new Addressbook();
		$addressbook->plugin_page();
	}
	public function settingspage(){
		echo "Hello from settings";
	}

}