<?php

class Reviews extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get_reviews($module, $id){
$query = $this->_custom_query("SELECT * FROM reviews WHERE product_id = $id AND module = '$module'  ");
return $query;
}

function get_rating($module, $product_id){	// get avg. rating
$query = $this->_custom_query("SELECT AVG(rating) as rating FROM reviews WHERE reviews.module =  '$module' AND reviews.product_id =  '$product_id' ");	
return $query;
}


function create_review(){
// url and form helpers are auto loaded in config
$this->load->library(array('session', 'form_validation', 'email'));

	 $parent_cat = $this->uri->segment(3);
	 $module = $this->uri->segment(4);
	 $product_id = $this->uri->segment(5);
	 
	         //set validation rules
			 $this->form_validation->set_rules('rating', 'Rating', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('review', 'Review', 'trim|required|xss_clean');
		
        if ($this->form_validation->run() == FALSE)
        {
		    $data['module'] = 'reviews';
			$data['view_file'] = 'error_review_form.php';
			echo Modules::run('template/public_view', $data);
			
        }
        else
        {			 			
			 $data['product_id'] = $product_id;
			 $data['module'] = $module;
			 $data['rating'] = $this->input->post('rating', TRUE);
			 $data['name'] = $this->input->post('name', TRUE);
			 $data['email'] = $this->input->post('email', TRUE);
			 $data['title'] = $this->input->post('title', TRUE);
			 $data['review'] = $this->input->post('review', TRUE);
			 $data['published'] = 'no';
			 $data['date_added'] = date("Y-m-d h:i:sa");
			 echo date("d-m-Y h:i:sa");
			 $this->_insert($data);
			 
			
			
			 //send email with link for approval which should update the published field

			 /****
	 		Disabled to be tested upon deployment 
	 $this->load->library('email');

	$this->email->from('uk4arabs@gmail.com', 'Your Name');
	$this->email->to('mesho_w@hotmail.com'); 
	//$this->email->cc('another@another-example.com'); 
	//$this->email->bcc('them@their-example.com'); 
	
	$this->email->subject('New rating from L4A');
	$this->email->message('Testing the email class.');	
	
	$this->email->send();
	
	echo $this->email->print_debugger();
	 ***************/	

redirect(base_url().$parent_cat.'/'.$module.'/reviews/'.$product_id.'/thankyou');
		}
	 
}

function get($order_by){
$this->load->model('mdl_reviews');
$query = $this->mdl_reviews->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_reviews');
$query = $this->mdl_reviews->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_reviews');
$query = $this->mdl_reviews->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_reviews');
$query = $this->mdl_reviews->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_reviews');
$this->mdl_reviews->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_reviews');
$this->mdl_reviews->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_reviews');
$this->mdl_reviews->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_reviews');
$count = $this->mdl_reviews->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_reviews');
$max_id = $this->mdl_reviews->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_reviews');
$query = $this->mdl_reviews->_custom_query($mysql_query);
return $query;
}

}