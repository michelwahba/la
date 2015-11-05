




        <div class="panel" style="padding-left: 16px;">
<?php
foreach($query->result() as $row){
				echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'/'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
				
				echo '<strong>Tel:</strong> <a href="tel: +44'.ltrim($row->telephone, '0').'"> '.$row->telephone.'</a>';	
				if($row->cuisinType){echo  '<strong style="margin-left:2%;">Cuisine:</strong> '. $row->cuisinType.'<br />';}

				echo '<hr>';
						}
    
    
?></div>