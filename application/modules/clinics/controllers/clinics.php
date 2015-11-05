<?php

class Clinics extends MX_Controller
{

function __construct() {
parent::__construct();
}

function index(){
$this->showall();	
}

function list_by_service(){
$id = $this->uri->segment(3);	
$data['query'] = $this->get_list_by_category($id);
$data['module'] = 'clinics';
$data['view_file'] = 'list';
echo Modules::run('template/public_view', $data);	
}

function showall(){
$data['query'] = $this->get('name');
$data['module'] = 'clinics';
$data['view_file'] = 'list';
echo Modules::run('template/public_view', $data);	
}

function doctors(){
$module = $this->uri->segment(1);	
$product_id = $this->uri->segment(3);
$data['rating'] = $this->rating($module, $product_id);
$this->load->module('doctors');   
$data['doc_profile'] = $this->doctors->get_where($product_id);
$this->load->module('clinics_doctors');
$data['doctors'] = $this->clinics_doctors->list_doctors($product_id);
$data['query'] = $this->get_where($product_id);
$data['module'] = 'clinics';
$data['view_file'] = 'doctors';
echo Modules::run('template/public_view', $data);	
}



function get($order_by){
$this->load->model('mdl_clinics');
$query = $this->mdl_clinics->get($order_by);
return $query;
}


function get_where($id){
$this->load->model('mdl_clinics');
$query = $this->mdl_clinics->get_where($id);
return $query;
}
function get_list_by_category($id){
$this->load->model('mdl_clinics');
$query = $this->mdl_clinics->get_list_by_category($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_clinics');
$query = $this->mdl_clinics->get_where_custom($col, $value);
return $query;
}



function _custom_query($mysql_query) {
$this->load->model('mdl_clinics');
$query = $this->mdl_clinics->_custom_query($mysql_query);
return $query;
}

}