<?php

class Mdl_clinics_doctors extends CI_Model {

function __construct() {
parent::__construct();
}

function list_all_doctors(){
$mysql_query = 	"SELECT 
clinics_doctors.name,
clinics_doctors.id
FROM
clinics_doctors
ORDER BY
clinics_doctors.name ASC ";
$query = $this->_custom_query($mysql_query);
return $query;	
}

function list_doctors($id){
$mysql_query = 	"SELECT
doctors.id,
doctors.name,
doctors.title,
clinics.id
FROM
doctors
Inner Join clinics_to_doctors ON doctors.id = clinics_to_doctors.doctor_id
Inner Join clinics ON clinics.id = clinics_to_doctors.clinic_id
WHERE
clinics.id = $id ";
$query = $this->_custom_query($mysql_query);
return $query;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}