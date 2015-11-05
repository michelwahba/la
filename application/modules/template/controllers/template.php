<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

	function __construct() {
	parent::__construct();
	}
	
    function public_view($data){
     
		$section = $this->uri->segment(1);
				
		 $this->load->module('site_nav');
         
         $data['nav'] = $this->site_nav->get_menu($section);
		 
			// make background image var
			$mod = $this->router->fetch_method();
			$this->load->module('bg_image');
			$data['image_query'] = array('image' => 'defualt.jpg');
			$data['image_query'] = $this->bg_image->get_bg_image($mod);
			
		$this->load->view('home_view', $data);
    }
    
	

}

