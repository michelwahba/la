
        <div class="row well">
        <h4>leave a review</h4>

              <form class="bs-example form-horizontal" method="post" action="<?php echo base_url().'reviews/';?>create_review/<?php echo $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(4);?>">
                <fieldset>
                 <div class="form-group">
                    <label for="rating" class="col-lg-2 control-label">Rating<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text"  class="rating rating5" name="rating" />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="name" placeholder="Required" name="name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="email" placeholder="Required (will not be displayed)" name="email" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Review Title<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="title" placeholder="Please choose a title for your review" name="title" />
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="review" class="col-lg-2 control-label">Your Review<span class="text-danger"> *</span></label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="review" placeholder="Thank you for sharing your thoughts" name="review"></textarea>
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
     