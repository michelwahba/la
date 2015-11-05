<?php

class mdl_autocomplete extends CI_Model {

function __construct() {
parent::__construct();
}

function get_autocomplete($keyword){
    
    $query = $this->db->query("SELECT * FROM classifications where name like '%".$keyword."%' order by name  limit 10");
    foreach($query->result() as $row){
            //$data[$row['friendly_name']];
            $data['name'] = $row;
			
        }
        return $data;
       // return $query;
/*        
$query = $this->input->post('classsearch');
return $this->db->query("SELECT * FROM classifications WHERE name LIKE '%$query%' limit 10");
*/
}
}