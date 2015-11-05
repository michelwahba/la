<?php

class Mdl_information extends CI_Model {

function __construct() {
parent::__construct();
}

function get_nav_table() {
$table = "site_nav";
return $table;
}

function get_airports_table() {
$table = "airports";
return $table;
}

function get_menu($section){
$query = $this->get_where_custom('section', $section);
return $query;	
}

function get_where_custom($col, $value) {
$table = $this->get_nav_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function get_where($id){
$table = $this->get_nav_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_airport($id){
$table = $this->get_airports_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}