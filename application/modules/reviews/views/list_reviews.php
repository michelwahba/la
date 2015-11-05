
<? if($query->result()){?>
<div class="row well" style="margin-top:2%">
    <div class="col-md-12">
<?php foreach($query->result() as $row){
	
		echo '<h4><strong>'.$row->title.'</strong></h4>
		 <div class="review_time">'.$row->date_added.'</div>
		<span><input type="text" value="'.$row->rating.'" class="rating rating5" /> </span>';
	  	echo $row->review.'<br /><hr />';
 }?>        
  
    </div>
</div>
<? } else {?>
   <div class="row well" style="margin-top:2%">
    <div class="col-md-12">
<p><h2>Be The first to leave a review</h2></p>      
  
    </div>
</div> 
    
<? }?>