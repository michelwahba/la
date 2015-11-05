<?php
// This module is to display sub menue for parent categories
// This module is now disabled because all categories
// has beeen added to the main navigation menue
class Site_nav extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->model('mdl_site_nav');
}

//	List all  menu cats for parants
function get_menu($section){
$query = $this->mdl_site_nav->get_menu($section);
return $query;
}




}