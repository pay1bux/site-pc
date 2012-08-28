<div class="clearBoth"/>
<div class="admin">
    <?php
        $this->load->helper('form');
        echo validation_errors();
        echo form_open('login-form');
    ?>

    <h1>ADMINISTRARE</h1>

    Email
    <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50"/>

    Password
    <input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50"/>

    <div><input type="submit" value="Login"/></div>

    </form>
</div>