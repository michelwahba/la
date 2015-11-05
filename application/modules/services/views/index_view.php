<div class="row">
<?php 
 foreach($nav->result() as $row){
?>
	<div class="col-lg-4">
		<div class="bs-component">           
            <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $row->category?></h3>
                  </div>
                  <div class="panel-body box-bg">                
   					 <div><img src="<?php echo base_url().'assets/img/'.$row->category_image?>" style="width:100%"></div>
                     <div class="cat_min_desc"><?php echo $row->category_description?></div>                    <p><a href="<?php  echo basename($_SERVER['PHP_SELF']) . '/'. $row->category;?>" class="btn btn-primary btn-lg">Learn more</a></p>
                 </div>
             </div>       
		</div>
	</div>
<?php } 
?>      
</div>