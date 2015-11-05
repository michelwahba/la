<div class="row">
<div class="col-lg-8">
        <div class="panel" style="padding-left: 16px;">
<?php
foreach($query->result() as $row){
				echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'/'.str_replace(' ', '_', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$row->name)).'"><h4>'.$row->name.'</h4></a><h4>'.$row->title.'</h4>';
				
					
				if($row->speciality){echo  '<strong>Speciality: </strong>'. $row->speciality.'<br />';}
				
				if($row->comments){echo $row->comments.'<br />';}

				echo '<hr>';
						}
                    
                
            echo '</div>';
?>
</div>
    <div class="col-lg-1" style="width:5%"></div>
    <div class="col-lg-3 panel">
		<div class="container" style="min-height:600px">Advertisments</div>
    </div>
</div>	