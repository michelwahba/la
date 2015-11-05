<?php

class Museums extends MX_Controller
{
function __construct() {
parent::__construct();
}

function handle(){
if( $this->uri->segment(3) == 'profile' ){
		$this->profile();
	}
	elseif( $this->uri->segment(3) == 'reviews' ){
		$this->reviews();
	}
	else { // Listing
		$data['query'] = $this->showall();
		$data['module'] = 'museums';
		$data['view_file'] = 'list';
		echo Modules::run('template/public_view', $data);
		
	}// else	
	
}

function showall(){
$orderby = 'name'; 
$query = $this->get($orderby);
return 	$query;
}

function profile(){
$module = $this->uri->segment(2);	
$product_id = $this->uri->segment(4);
$data['rating'] = $this->_rating($module, $product_id);
$data['module'] = $module;
$data['query'] = $this->get_where($product_id);
$data['view_file'] = 'profile';
echo Modules::run('template/public_view', $data);
}

function reviews(){
$module = $this->uri->segment(2);	
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

function get($order_by){
$this->load->model('mdl_museums');
$query = $this->mdl_museums->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_museums');
$query = $this->mdl_museums->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_museums');
$query = $this->mdl_museums->get_where($id);
return $query;
}


}