<?php

$username = $this->input->post('username');
?>

<font size="2" color="maroon" > ADMINISTRARE</font><br />
<? echo $username;?>
<br /><br />

<a href="adauga_resursa" ><img src="<?php echo BASE_URL(); ?>/static/images/icons/resursa_add.png" > </a>
<a href=# ><img src="<?php echo BASE_URL(); ?>/static/images/icons/resursa_edit.png" > </a>
    <a href="adauga_autor" ><img src="<?php echo BASE_URL(); ?>/static/images/icons/autor_add.png" > </a>