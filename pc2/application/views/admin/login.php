<?php
$this->load->helper('form');


echo validation_errors(); 
echo form_open('admin/administrator'); ?>

<font size="2" color="maroon" > ADMINISTRARE</font><br />

Email
<input type="text" name="username" value="" size="50" />

Password
<input type="password" name="password" value="" size="50" />

<div><input type="submit" value="Login" /></div>

</form>

</body>
</html>