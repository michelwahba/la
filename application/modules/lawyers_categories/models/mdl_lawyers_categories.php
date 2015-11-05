<?php

class Mdl_lawyers_categories extends CI_Model {

function __construct() {
parent::__construct();
}

function list_all_categories(){
$mysql_query = 	"SELECT 
lwcategories.name,
lwcategories.id
FROM
lwcategories
ORDER BY
lwcategories.name ASC ";
$query = $this->_custom_query($mysql_query);
return $query;	
}

function list_categories($id){
$mysql_query = 	"SELECT
lwcategories_to_lawyers.lwcategory_id,
lwcategories.id,
lwcategories.name
FROM
lwcategories_to_lawyers
Inner Join lwcategories ON lwcategories.id = lwcategories_to_lawyers.lwcategory_id
WHERE
lwcategories_to_lawyers.lawyer_id = $id ";
$query = $this->_custom_query($mysql_query);
return $query;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}