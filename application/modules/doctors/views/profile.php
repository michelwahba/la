

<?php foreach($query->result() as $row){?>

    <div class="row well">
    	<h2><?php echo $row->name;?></h2>  
        <div>
        <?php if($rating > 0){?>
<input type="text" value="<?=$rating?>" class="rating rating5" />
<? } ?>
		</div>             
    </div>
    
    <div class="row well">    
        <div class="span4">
          <ul class="nav nav-pills fix_height">
            <li class="active"><a href="#">Profile</a></li>
            <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/reviews/'.$this->uri->segment(4);?>">Reviews</a></li>
          </ul>
        </div>    
  	</div>

	<div class="row well" style="margin-top:2%">

    	<div class="col-md-6">  
     <?php
	 echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$row->name)).'"><h4>'.$row->name.'</h4></a><h4><strong>'.$row->title.'</strong></h4>';					
				if($row->speciality){echo  '<strong><h5>Speciality:</h5> </strong> '. $row->speciality.'<br /><br />';}				
				if($row->comments){echo  '<strong><h5>Profile:</h5> </strong> '. $row->comments.'<br />';}
				//  clinics
				if ($doctor_clinics->num_rows() > 0){
					foreach($doctor_clinics->result() as $cli_row){
						echo '<h6>Clinics:</h6>';					
						echo '<a href="'.base_url().'services/clinics/profile/'.$cli_row->clinic_id.'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$cli_row->name)).'" target="_blank"><h5>'.$cli_row->name.'</h5></a>';						
					}
				}
	?>
    	</div>

      <div class="col-md-6" style="height:100%">
        	<div class="google-map-canvas" id="map-canvas" style="height:250px"></div>      
      </div>

<br /><br />
<br />
<br />

	</div>
<?php }?>