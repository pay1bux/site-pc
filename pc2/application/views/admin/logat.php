<?php

$username = $this->input->post('username');
?>

<font size="2" color="maroon" > ADMINISTRARE</font><br />
<? echo $username;?>
<br /><br />

<a href="adauga_resursa.php" ><img src="<?php echo BASE_URL(); ?>/static/images/icons/resursa_add.png" > </a>
<a href=# ><img src="<?php echo BASE_URL(); ?>/static/images/icons/resursa_edit.png" > </a>