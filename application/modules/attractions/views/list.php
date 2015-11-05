
<div class="panel" style="padding-left: 16px;">

<h2><?php echo ucfirst($this->uri->segment(2));?> in london</h2>
<br />
<br />


<?php
foreach($query->result() as $row){
				echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
				echo '<p>'.$row->description.'</p>';
				echo '<hr>';
						}  
?>
</div>