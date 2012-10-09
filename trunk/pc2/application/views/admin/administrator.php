<div class="clearBoth"/>
<div class="admin">
    <h1>ADMINISTRARE</h1>

    <h2><?php echo $email;?></h2>
    <br/>

    <?php if ($administrareResurse): ?>
        <a href="<?php echo site_url('admin/resurse/add'); ?>">
            <img src="<?php echo base_url(); ?>static/images/icons/resursa_add.png" border="0">
        </a>
        &nbsp;&nbsp;
        <a href="<?php echo site_url('admin/lista-resurse/0'); ?>">
            <img src="<?php echo base_url(); ?>static/images/icons/resursa_edit.png" border="0">
        </a>
        &nbsp;&nbsp;
        <a href="<?php echo site_url('admin/autori/add'); ?>">
            <img src="<?php echo base_url(); ?>static/images/icons/autor_add.png" border="0">
        </a>
    <?php endif; ?>

    <?php if ($buletin): ?>
        <div>
            <div><a href="<?php echo site_url('admin/adauga-buletin'); ?>">Adaugare buletin</a></div>
            <div><a href="<?php echo site_url('admin/lista-buletine'); ?>">Lista buletine</a></div>
        </div>
    <?php endif; ?>
    <br />
    <?php if ($eveniment): ?>
        <div>
            <div><a href="<?php echo site_url('admin/adauga-eveniment'); ?>">Adaugare eveniment</a></div>
            <div><a href="<?php echo site_url('admin/lista-evenimente'); ?>">Lista evenimente</a></div>
        </div>
    <?php endif; ?>
    <br />
    <?php if ($devotional): ?>
        <div>
            <div><a href="<?php echo site_url('admin/adauga-devotional'); ?>">Adaugare devotional</a></div>
            <div><a href="<?php echo site_url('admin/lista-devotionale'); ?>">Lista devotionale</a></div>
        </div>
    <?php endif; ?>
    <br />
    <?php if ($adaugareAudio): ?>
        <div>
            <div><a href="<?php echo site_url('admin/adauga-audio'); ?>">Adaugare audio</a></div>
        </div>
    <?php endif; ?>
    <br />
    <?php if ($adaugareAudio): ?>
        <div>
            <div><a href="<?php echo site_url('admin/adauga-video'); ?>">Adaugare video</a></div>
        </div>
    <?php endif; ?>
    <br />
    <?php if ($imaginePromo): ?>
        <div>
            <div><a href="<?php echo site_url('admin/lista-imagini-promo'); ?>">Lista imagini promo</a></div>
            <div><a href="<?php echo site_url('admin/adauga-imagine-promo'); ?>">Adauga imagine promo</a></div>
        </div>
    <?php endif; ?>
    <br />
    <div><a href="<?php echo site_url('admin/logout'); ?>">Logout</a></div>
</div>