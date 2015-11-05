<?php

class Mdl_site_nav extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "site_nav";
return $table;
}

function get_menu($section){
$query = $this->get_where_custom('section', $section);
return $query;	
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$this->db->where('status', 1); 
$query=$this->db->get($table);
return $query;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}