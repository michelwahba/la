<?php

class information extends MX_Controller{
	
function __construct() {
parent::__construct();
echo Modules::run($this->uri->segment(2).'/handle');
die;
}


}
