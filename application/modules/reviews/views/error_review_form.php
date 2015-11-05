
        <div class="row well">
     <!--   <h4>leave a review</h4>-->
        
         <span class="text-danger"><?php echo validation_errors(); ?></span>
  
 
              <form class="bs-example form-horizontal" method="post" action="<?php echo base_url().'reviews/';?>create_review/<?=$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5)?>">
                <fieldset>
                
                <input type="hidden" name="product_id" value="<?=$this->uri->segment(5);?>" />
                
                 <div class="form-group">
                    <label for="rating" class="col-lg-2 control-label">Rating<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text"  class="rating rating5" name="rating" value="<?=$this->input->post('rating')?>" />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="name" placeholder="Required" name="name" value="<?=$this->input->post('name')?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="email" placeholder="Required (will not be displayed)" name="email" value="<?=$this->input->post('email')?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Review Title<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="title" placeholder="Please choose a title for your review" name="title" value="<?=$this->input->post('title')?>" >
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="review" class="col-lg-2 control-label">Your Review<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="review" placeholder="Thank you for sharing your thoughts" name="review"><?=$this->input->post('review')?></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
               
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default">Cancel</button> 
                      <button type="submit" class="btn btn-primary">Submit</button> 
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
     