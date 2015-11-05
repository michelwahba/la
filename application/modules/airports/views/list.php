
<div class="panel" style="padding-left: 16px;">

<h2><?php echo ucfirst($this->uri->segment(2));?> in london</h2>
<br />
<br />


<?php
foreach($query->result() as $row){
				echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
				
				if($row->telephone) echo '<strong>Tel:</strong> <a href="tel:'.ltrim($row->telephone, '0').'"> '.$row->telephone.'</a><br />';
					
				if($row->arrivals_link){echo  '<br />'. '<a target="_blank" href="http://'.$row->arrivals_link.'">Link To Live Arrivals</a><br />';}
				
				if($row->departures_link){echo  ''. '<a target="_blank" href="http://'.$row->departures_link.'">Link To Live Departure</a><br />';}
				
				if($row->remarks){
					echo  '<br />'.$row->remarks;
				}

				
				echo '<hr>';
						}
    
    
?>
</div>