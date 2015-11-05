<?php

class clinics_categories extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->model('mdl_clinics_categories');
}

//	List all cats
function list_all_categories(){
$query = $this->mdl_clinics_categories->list_all_categories();
return $query;
}

//	List categories for a clinic by  ID
function list_categories($id){
$query = $this->mdl_clinics_categories->list_categories($id);
return $query;
}


}