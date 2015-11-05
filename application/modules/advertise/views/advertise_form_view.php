
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <?php $attributes = array("class" => "form-horizontal", "name" => "contact");
            echo form_open("advertise/index", $attributes);?>
            <fieldset>
            <legend>Advertise Form</legend>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label">Name*</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="email" class="control-label">Email*</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="email" placeholder="Your Email ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-12">
                    <label for="website" class="control-label">Website</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="website" placeholder="Your Website" type="text" value="<?php echo set_value('website'); ?>" />
                    <span class="text-danger"><?php echo form_error('website'); ?></span>
                </div>
            </div>

            

            <div class="form-group">
                <div class="col-md-12">
                    <label for="message" class="control-label">Tell US ABOUT YOUR BUSINESS</label>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="YOUR BUSINESS"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                </div>
            </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
