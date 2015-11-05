<?php

class Mdl_bg_image extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "bg_image";
return $table;
}

function get_where($mod){
$table = $this->get_table();
$this->db->where('module', $mod);
$query=$this->db->get($table);
return $query;
}

}