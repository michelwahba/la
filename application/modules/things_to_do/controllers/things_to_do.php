<?php

class Things_to_do extends MX_Controller{
	
function __construct() {
parent::__construct();
echo Modules::run($this->uri->segment(2).'/handle');
die;
}

function index(){ // this index page is  not working now
$data = array();
$data['module'] = 'things_to_do';
$data['view_file'] = 'index_view';
echo Modules::run('template/public_view', $data);
}


}
