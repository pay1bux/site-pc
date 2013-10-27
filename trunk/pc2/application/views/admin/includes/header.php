<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header" style="width: 100%">

        <a class="navbar-brand" href="<?php echo site_url("pcadmin"); ?>">Poarta Cerului <i>admin</i></a>

        <div class="pull-right">
        <a  href="http://www.poartacerului.ro"><button type="button" class="btn btn-default navbar-btn">Inapoi la site</button></a>
        <?php
            if(isset($email)):
        ?>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo $email;?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li> <a href="<?php echo site_url('admin/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Deconectare</a></li>
                <li> <a href="<?php echo site_url('admin/schimba-parola'); ?>"><span class="glyphicon glyphicon-user"></span> Schimba parola</a></li>

            </ul>
        </div>
        <?php endif;
        ?>
        </div>
    </div>


</nav>


<div class="container">