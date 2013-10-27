<?php
$this->load->helper('form');
echo validation_errors();
echo form_open('login-form');

?>


<div class="form-group col-md-4 col-md-push-4">
<h2>Logheaza-te aici</h2>
<div class="row">
    <div class="form-group col-md-12">
        Email
        <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>"/>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        Parola
        <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>"/>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">

        <input type="submit" class="btn btn-default" value="Login"/>


    </div>
</div>

</form>
    </div>



