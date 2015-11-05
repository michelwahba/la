<?php

class Where_to_stay extends MX_Controller{
	
function __construct() {
parent::__construct();
//echo Modules::run($this->uri->segment(2).'/handle');
}

function hotels(){
	echo Modules::run('hotels/handle');
}


}
