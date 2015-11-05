
<div class="panel" style="padding-left: 16px;">
<h6 style="color:#F00">Results found for hotels in london</h6>
<hr />

<?php
foreach($lawyers->result() as $row){
				echo  '<a href="'.base_url().'where-to-stay/hotels/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
echo '<hr>';
}
?></div>

