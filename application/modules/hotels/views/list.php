
<div class="panel" style="padding-left: 16px;">

<h2><?php echo ucfirst($this->uri->segment(2));?> in london</h2>
<br />
<br />


<?php
foreach($query->result() as $row){
				echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
				
				if($row->telephone) echo '<strong>Tel:</strong> <a href="tel: +44'.ltrim($row->telephone, '0').'"> '.$row->telephone.'</a><br />';	
				if($row->amenities){echo  '<br /><strong><h4>Amenities:</h4></strong> '. nl2br($row->amenities).'<br />';}

				echo '<hr>';
						}
    
    
?></div>