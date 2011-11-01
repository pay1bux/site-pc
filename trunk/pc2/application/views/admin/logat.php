<?php

$username = $this->input->post('username');
?>

<font size="2" color="maroon" > ADMINISTRARE</font><br />
<? echo $username;?>
<br /><br />

<a href="<?php echo site_url('admin/resurse/add'); ?>" >
    <img src="<?php echo base_url(); ?>static/images/icons/resursa_add.png" border="0">
</a>
&nbsp;&nbsp;
<a href="#" >
    <img src="<?php echo base_url(); ?>static/images/icons/resursa_edit.png" border="0">
</a>
&nbsp;&nbsp;
<a href="<?php echo site_url('admin/autori/add'); ?>">
    <img src="<?php echo base_url(); ?>static/images/icons/autor_add.png" border="0">
</a>