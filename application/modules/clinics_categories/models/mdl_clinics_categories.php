<?php

class Mdl_clinics_categories extends CI_Model {

function __construct() {
parent::__construct();
}

function list_all_categories(){
$mysql_query = 	"SELECT 
clinics_categories.name,
clinics_categories.id
FROM
clinics_categories
ORDER BY
clinics_categories.name ASC ";
$query = $this->_custom_query($mysql_query);
return $query;	
}

function list_categories($id){
$mysql_query = 	"SELECT
clinics_categories_to_clinics.clinic_categories_id,
clinics_categories.id,
clinics_categories.name
FROM
clinics_categories_to_clinics
Inner Join clinics_categories ON clinics_categories.id = clinics_categories_to_clinics.clinic_categories_id
WHERE
clinics_categories_to_clinics.clinic_id = $id ";
$query = $this->_custom_query($mysql_query);
return $query;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}