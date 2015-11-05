<div class="row well" style="padding-top: 30px;">
<?php
if($this->uri->segment(3) == 'list_by_service'){
	echo '<h1 style="padding-left:23px">'.str_replace('_', ' ', $this->uri->segment(5)).' '.$this->uri->segment(2);?> in london</h1><hr />
   <?php  }	else {
	   echo '<h1  style="padding-left:23px">'.$this->uri->segment(2).' in london</h1><br />';
   }
?>
	    <div class="col-lg-9">
    
<?php   			
foreach($query->result() as $row){
				echo  '<a href="'.base_url().'services/clinics/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '_', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$row->name)).'"><h4>'.$row->name.'</h4></a>';
				
				if($row->telephone) {echo '<strong>Tel:</strong> <a href="tel: +44'.ltrim($row->telephone, '0').'"> '.$row->telephone.'</a><br />';	}
				if($row->comments){echo  '<br />'. $row->comments.'<br />';}
				echo '<hr>';
				} ?>
	</div>
    
	<div class="col-lg-3">
		<div class="row well" style="padding: 8px 0;">
        <ul class="nav nav-list">
          <?php 
		  $this->load->module('clinics_categories');
		  $cats = $this->clinics_categories->list_all_categories();
			
			foreach($cats->result() as $cat_row){
					if($this->uri->segment(4) == $cat_row->id){
					echo '<li class="active_li"><a href="'.base_url().'services/clinics/list_by_service/'.$cat_row->id.'/'.str_replace(' ', '_', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$cat_row->name)).'">'.$cat_row->name.'</a></li>';
					}else{
						echo '<li><a href="'.base_url().'services/clinics/list_by_service/'.$cat_row->id.'/'.str_replace(' ', '_', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$cat_row->name)).'">'.$cat_row->name.'</a></li>';
						
					}		
			}
		  ?>
        </ul>
      </div>

    </div>

</div>				
				