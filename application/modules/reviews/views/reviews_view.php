
<br /><br /><div>
<input type="text" value="3" class="rating rating5" />             
</div>

<div class="row well" style="margin-top:2%">

    <div class="col-md-12">
<?php foreach($query->result() as $row){?>

<?php echo $row->title.'<br />'.$row->content.'<br />';


 }?>        
 <hr /> 
    </div>



</div>
        <div class="row well">
        <div class="row well">
              <form class="bs-example form-horizontal" method="post" action="">
                <fieldset>
                 <div class="form-group">
                    <label for="rating" class="col-lg-2 control-label">Rating</label>
                    <div class="col-lg-10">
                      <input type="text" value="3" class="rating rating5" />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Review Title</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="title" placeholder="Title" name="title" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Your review</label>
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
        </div>
