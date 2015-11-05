<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bg_image extends MX_Controller {

	function __construct() {
	parent::__construct();
	}
	
    function get_bg_image($mod){
	$this->load->model('mdl_bg_image');
	$bg_image = $this->mdl_bg_image->get_where($mod);
	return $bg_image;
	}
	
}