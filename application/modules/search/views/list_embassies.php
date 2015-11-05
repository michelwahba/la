
<div class="panel" style="padding-left: 16px;">
<h6 style="color:#F00">Embassies found  for "<?php echo $term;?>"</h6>
<hr />

<?php
foreach($embassies->result() as $row){
				echo  '<a href="'.base_url().'services/embassies/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
echo '<hr>';
}
?></div>

