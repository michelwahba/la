
<div class="panel" style="padding-left: 16px;">
<h6 style="color:#F00">Attractions found for "<?php echo $term;?>" </h6>
<hr />

<?php
foreach($attractions->result() as $row){
				echo  '<a href="'.base_url().'things-to-do/attractions/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
echo '<p>'.$row->description.'</p>';
echo '<hr>';
}
?></div>

