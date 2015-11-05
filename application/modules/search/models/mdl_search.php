<?php

class Mdl_search extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "tablename";
return $table;
}

function search_museums($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(description) LIKE '%{$term}%')");
$query = $this->db->get('museums');
return $query;	
}

function search_parks($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(description) LIKE '%{$term}%')");
$query = $this->db->get('parks');
return $query;	
}

function search_palaces($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(description) LIKE '%{$term}%')");
$query = $this->db->get('palaces');
return $query;	
}

function search_attractions($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(description) LIKE '%{$term}%')");
$query = $this->db->get('attractions');
return $query;	
}

function search_lawyers($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(address) LIKE '%{$term}%')");
$query = $this->db->get('lawyers');
return $query;	
}

function search_banks($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(address1) LIKE '%{$term}%')");
$query = $this->db->get('banks');
return $query;	
}

function search_embassies($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(address) LIKE '%{$term}%')");
$query = $this->db->get('embassies');
return $query;	
}

function search_clinics($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(address) LIKE '%{$term}%')");
$query = $this->db->get('clinics');
return $query;
}

function search_doctors($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(speciality) LIKE '%{$term}%')");
$query = $this->db->get('doctors');
return $query;	
}

function search_hotels($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(address) LIKE '%{$term}%')");
$query = $this->db->get('hotels');
return $query;	
}

function search_restaurants($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(cuisinType) LIKE '%{$term}%')");
$query = $this->db->get('restaurants');
return $query;	
}

function search_societies($term){
$this->db->where("(LOWER(name) LIKE '%{$term}%' OR LOWER(remarks) LIKE '%{$term}%')");
$query = $this->db->get('societies');
return $query;	
}
/*$query_string = "(SELECT id, name, 'address1' as type FROM banks WHERE name LIKE '%" . 
           $term . "%' OR address1 LIKE '%" . $term ."%') 
           UNION
           (SELECT id, name, 'address' as type FROM accountants WHERE name LIKE '%" . 
           $term . "%' OR address LIKE '%" . $term ."%') 
           UNION
           (SELECT id, name, 'address' as type FROM clinics WHERE name LIKE '%" . 
           $term . "%' OR address LIKE '%" . $term ."%')";*/
function search_all_tables($term){

}

function get($order_by){
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id){
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}