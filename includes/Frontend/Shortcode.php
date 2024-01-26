<?php 

namespace WeDevs\Academy\Frontend;

class Shortcode{
	function __construct(){	
		add_shortcode('wedevs-academy',[$this,'render_shortcode']);
	}
	public function render_shortcode($atts, $content=''){
		return "Hello From Shortcode";
	}
}