<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Help extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
	   
	function privacy_policy(){
		$data['module'] = 'help';
		$data['view_file'] = 'privacy_policy';
		echo Modules::run('template/public_view', $data);	
	}
	
	function cookie_policy(){		
		$data['module'] = 'help';
		$data['view_file'] = 'cookie_policy';
		echo Modules::run('template/public_view', $data);	
	}
	
	function terms(){		
		$data['module'] = 'help';
		$data['view_file'] = 'terms';
		echo Modules::run('template/public_view', $data);	
	}
}