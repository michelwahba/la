<?php

class Tube_map extends MX_Controller
{
function __construct() {
parent::__construct();
}

function handle(){
	
$data['module'] = 'tube_map';
$data['view_file'] = 'map';
echo Modules::run('template/public_view', $data);
	
}


}