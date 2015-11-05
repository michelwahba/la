<?php

class Services extends MX_Controller{
	
function __construct() {
parent::__construct();
$this->load->model('mdl_services');

}

function index(){
$data = array();

$data['module'] = 'services';
$data['view_file'] = 'index_view';
echo Modules::run('template/public_view', $data);
}

function lawyers(){
	echo Modules::run('lawyers/handle');
}

function embassies(){
	echo Modules::run('embassies/handle');
}

function societies(){
	echo Modules::run('societies/handle');
}



function clinics(){
	if( $this->uri->segment(3) == 'profile' ){
		$this->profile();
	}
	elseif( $this->uri->segment(3) == 'reviews' ){
		$this->reviews();
	}
	else { // Listing
		$this->load->module('clinics');
		$data['query'] = $this->clinics->showall();
/*		$data['module'] = 'clinics';
		$data['view_file'] = 'list';
		echo Modules::run('template/public_view', $data);*/
	}// else
}

function banks(){
	echo Modules::run('banks/handle');
}

function doctors(){
	echo Modules::run('doctors/handle');
}

function profile(){
$module = $this->uri->segment(2);	
$pid = explode('-', $this->uri->segment(4));
$product_id = $pid[0];

$data['rating'] = $this->_rating($module, $product_id);
$this->load->module($module);
$data['query'] = $this->$module->get_where($product_id);
 		if($module == 'clinics' ){
		$this->load->module($module.'_categories');
		$data['categories'] = $this->clinics_categories->list_categories($product_id);
		}
		
		
		
		if( $module == 'lawyers' ){
		$this->load->module('lawyers_categories');
		$data['categories'] = $this->lawyers_categories->list_categories($product_id);
		}
$data['module'] = $module;
$data['view_file'] = 'profile';
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


}
