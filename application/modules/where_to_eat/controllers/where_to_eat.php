<?php

class Where_to_eat extends MX_Controller{
	
function __construct() {
parent::__construct();
echo Modules::run($this->uri->segment(2).'/handle');
die;
}



}
