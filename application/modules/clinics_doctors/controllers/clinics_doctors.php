<?php

class Clinics_doctors extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->model('mdl_clinics_doctors');
}

//	List all cats
function list_all_doctors(){
$query = $this->mdl_clinics_doctors->list_all_doctors();
return $query;
}

//	List doctors for a clinic by  ID
function list_doctors($id){
$query = $this->mdl_clinics_doctors->list_doctors($id);
return $query;
}


}