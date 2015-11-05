<?php

class Autocomplete extends MX_Controller
{

function __construct() {
parent::__construct();
}
function autocomplete_restaurants()
{	
$keyword = str_replace("%20" , " ", $this->uri->segment(3));

$query = $this->db->query("SELECT name FROM restaurants where name like '".$keyword."%' order by name  limit 10");

	if ($query->num_rows() > 0)
	{
		foreach($query->result() as $row){			
				$data[]=array(
						'value'=> $row->name,
						'label'=>$row->name//." - ".$row->id
							);			
			}
	echo json_encode($data);
	}
	else{  // prevent errors when no results found
		$data=array(
						'value'=> '',
						'label'=>''
							);
		echo json_encode($data);
	}
}
 
function autocompletecomp()
{	
$keyword = str_replace("%20" , " ", $this->uri->segment(3));
$query = $this->db->query("SELECT DISTINCT
companies.name FROM companies where name like '%".$keyword."%' order by name  limit 10");
	if ($query->num_rows() > 0)
	{
		foreach($query->result() as $row){			
				$data[]=array(
						'value'=> $row->name,
						'label'=>$row->name//." - ".$row->id
							);			
			}
		echo json_encode($data);
	}
	else{  // prevent errors when no results found
		$data=array('value'=> '','label'=>'');
		echo json_encode($data);
		}
	}
	 
}