<?php

class Search extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->model('mdl_search');
}


function find(){
	$section = $this->input->get('section');
	$term = strtolower($this->input->get('term'));
	$data['module'] = 'search';
	
	switch ($section) {
		
		case 'Banks':
			$data['banks'] = $this->find_banks($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_banks';
		break;
		
		case 'embassies':
			$data['embassies'] = $this->find_embassies($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_embassies';
		break;
		
		case 'clinics':
			$data['clinics'] = $this->find_clinics($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_clinics';
		break;
		
		case 'doctors':
			$data['doctors'] = $this->find_doctors($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_doctors';
		break;
		
		case 'hotels':
			$data['hotels'] = $this->find_hotels($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_hotels';
		break;
		
		case 'restaurants':
			$data['restaurants'] = $this->find_restaurants($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_restaurants';
		break;
		
		case 'societies':
			$data['societies'] = $this->find_societies($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_societies';
		break;
		
		case 'parks':
			$data['parks'] = $this->find_parks($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_parks';
		break;
		
		case 'palaces':
			$data['palaces'] = $this->find_palaces($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_palaces';
		break;
		
		case 'attractions':
			$data['attractions'] = $this->find_attractions($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_attractions';
		break;		
		case 'lawyers':
			$data['lawyers'] = $this->find_lawyers($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_lawyers';
		break;
		case 'museums':
			$data['museums'] = $this->find_museums($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_museums';
		break;
		
		default: // all
			$data = $this->combine_search($term);
			$data['term']  = $term;
			$data['view_file'] = 'list_all';		
		}
	// echo $this->db->last_query();
	echo Modules::run('template/public_view', $data);
		
}

function combine_search($term){
	$data['banks'] = $this->find_banks($term);
	$data['embassies'] = $this->find_embassies($term);
	$data['clinics'] = $this->find_clinics($term);
	$data['doctors'] = $this->find_doctors($term);
	$data['hotels'] = $this->find_hotels($term);
	$data['restaurants'] = $this->find_restaurants($term);
	$data['societies'] = $this->find_societies($term);
	$data['attractions'] = $this->find_attractions($term);
	$data['palaces'] = $this->find_palaces($term);
	$data['parks'] = $this->find_parks($term);
	$data['museums'] = $this->find_museums($term);
	return $data;
}

function find_museums($term){
	$query = $this->mdl_search->search_museums($term);
	return $query;
}


function find_banks($term){
	$query = $this->mdl_search->search_banks($term);
	return $query;
}

function find_lawyers($term){
	$query = $this->mdl_search->search_lawyers($term);
	return $query;	
}

function find_embassies($term){
	$query = $this->mdl_search->search_embassies($term);
	return $query;
}

function find_clinics($term){
	$query = $this->mdl_search->search_clinics($term);
	return $query;
}

function find_doctors($term){
	$query = $this->mdl_search->search_doctors($term);
	return $query;
}

function find_hotels($term){
	$query = $this->mdl_search->search_hotels($term);
	return $query;
}


function find_restaurants($term){
	$query = $this->mdl_search->search_restaurants($term);
	return $query;
}

function find_societies($term){
	$query = $this->mdl_search->search_societies($term);
	return $query;
}
function find_palaces($term){
	$query = $this->mdl_search->search_palaces($term);
	return $query;
}
function find_parks($term){
	$query = $this->mdl_search->search_parks($term);
	return $query;
}
function find_attractions($term){
	$query = $this->mdl_search->search_attractions($term);
	return $query;
}

}

