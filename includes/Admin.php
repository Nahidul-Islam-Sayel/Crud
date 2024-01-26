<?php 
namespace WeDevs\Academy;
class Admin{
	function __construct(){
		new Admin\Menu();
		$this->dispatch_actions();
	}
	public function dispatch_actions(){
		$addressbook= new Admin\Addressbook();
		add_action('admin_init',[$addressbook,'from_handler']);
	}
}