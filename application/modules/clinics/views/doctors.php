
<?php foreach($query->result() as $row){?>

    <div class="row well">
<h2><?php echo $name;?></h2>
<?php if($rating > 0){?>
<input type="text" value="<?=$rating?>" class="rating rating5" />
<? } ?> 
</div>
    
    <div class="row well">    
        <div class="span4">
          <ul class="nav nav-pills">
            <li><a href="<?php echo base_url().$this->uri->segment(1).'/profile/'.$this->uri->segment(3).'/'.$this->uri->segment(4);?>">Location</a></li>
            <li class="active"><a href="<?php echo base_url().$this->uri->segment(1).'/doctors/'.$this->uri->segment(3).'/'.$this->uri->segment(4);?>">Doctors</a></li>
            <li><a href="<?php echo base_url().$this->uri->segment(1).'/reviews/'.$this->uri->segment(3).'/'.$this->uri->segment(4);?>">Reviews</a></li>
          </ul>
        </div>    
  	</div>
    <br />
    <div class="alert alert-success">
        <ul><?php
		foreach($doctors->result() as $docs_raw){
			$doc_id = $docs_raw->id;
			$doc_name = $docs_raw->name;
		 // echo '<a href="'.base_url().'doctors/profile/'.$doc_id.'" target="_blank"><h6>'.$docs_raw->name.'</h6></a><br />';		
		 
		  echo '<a href="#modal-'.$doc_id.'"><h6>'.$doc_name.'</h6></a><br />';	 
?>
    <div class="remodal" data-remodal-id="modal-<?php echo $doc_id;?>">
        <h1><?php echo $doc_name;?></h1>
        <?php 
		foreach($doc_profile->result() as $profile_row){
			echo '<h2>'.$profile_row->title.'</h2>';
			if($profile_row->speciality){ echo "<h3>$profile_row->speciality</h3>";}
			if($profile_row->comments){ echo "<p>$profile_row->comments</p>";}
		}
			?>	
        <br>
        <a class="remodal-cancel" href="#">Close</a>
       <!-- <a class="remodal-confirm" href="#">OK</a>-->
    </div>
<?php 		
		}
		?>
        </ul>
      </div>

<?php }?>