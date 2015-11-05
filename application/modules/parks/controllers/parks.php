<?php

class Parks extends MX_Controller
{

function __construct() {
parent::__construct();
}

function showall(){
$orderby = 'name'; 
$query = $this->get($orderby);
return 	$query;
}

function _get_module(){
$module = $this->uri->segment(2);
return $module;
}

function handle(){
	$module = $this->_get_module();
	if( $this->uri->segment(3) == 'profile' ){
		$this->profile();
	}
	elseif( $this->uri->segment(3) == 'reviews' ){
		$this->reviews();
	}
	else { // Listing
		$data['query'] = $this->showall();
		$data['module'] = $module;
		$data['view_file'] = 'list';
		echo Modules::run('template/public_view', $data);
	}// else
}

function get($order_by){
$model_name = 'mdl_'.$this->uri->segment(2);	
$this->load->model($model_name);
$query = $this->$model_name->get($order_by);
return $query;
}

function profile(){
$module = $this->_get_module();	
$product_id = $this->uri->segment(4);
$data['rating'] = $this->_rating($module, $product_id);
$data['module'] = $module;
$data['query'] = $this->get_where($product_id);
$data['view_file'] = 'profile';
echo Modules::run('template/public_view', $data);
}

function reviews(){
$module = $this->_get_module();	
$pid = explode('-', $this->uri->segment(4));
$product_id = $pid[0];
array_shift($pid);
$data['name'] = implode(" ", $pid);
$this->load->module('reviews');
$data['rating'] = $this->_rating($module, $product_id);
$data['query'] = $this->reviews->get_reviews($module, $product_id);
$data['module'] = $module;
$data['view_file'] = 'reviews';
echo Modules::run('template/public_view', $data);	
}

function _rating($module, $product_id){
$this->load->module('reviews');
$query = $this->reviews->get_rating($module, $product_id);	
if ( $query->num_rows() > 0 )
{
	foreach($query->result() as $row)
	{
	$rating = $row->rating;	
	}
} 
else 
{
	$rating = 0;
} 
	return $rating;
}

function get_where($id){
$model_name = 'mdl_'.$this->uri->segment(2);	
$this->load->model($model_name);
$query = $this->$model_name->get_where($id);
return $query;
}


}