<?php

class lawyers_categories extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->model('mdl_lawyers_categories');
}

//	List all cats
function list_all_categories(){
$query = $this->mdl_lawyers_categories->list_all_categories();
return $query;
}

//	List categories for a lawyer by lawyer ID
function list_categories($id){
$query = $this->mdl_lawyers_categories->list_categories($id);
return $query;
}


}