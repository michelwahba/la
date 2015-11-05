<?php 
if($this->uri->segment(5) == 'thankyou'){?>
<script type="text/javascript">
alert("Thank you for your review");
</script>

<?php }?>
<div class="row well">
<h2><?php echo $name;?></h2>
<? if ($rating > 0){?>
<input type="text" value="<?php echo $rating; ?>" class="rating rating5" />
<? } ?>
</div>

<div class="row well" style="height:80px">    
    <div class="span4">
      <ul class="nav nav-pills">
        <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.$this->uri->segment(4);?>">Location</a></li>
        <li class="active"><a href="#">Reviews</a></li>
      </ul>
    </div>
</div>



<?php 
		$this->reviews->load->view('list_reviews');
		$this->reviews->load->view('review_form');
		?>

