<div class="clearBoth"/>
<div class="admin" style="padding-top: 10px;">
<div style="float: left;">   <h2 style="margin: 4px; line-height: 20px; ">ADMINISTRARE <br/> </h2>

	
	</div> <div id="adminAcc">
	<p><?php echo $email;?></p>
	  <div><a style="margin-right: 10px;" href="<?php echo site_url('admin/schimba-parola'); ?>">Schimba parola</a>|
	  <a style="margin-left: 10px;" href="<?php echo site_url('admin/logout'); ?>">Logout</a></div>
	</div>
	
	<div class="clearBoth"/>
   <div class="FooterLine" style=" width: 100%; margin-bottom: 10px;"></div>
<div id="adminpanel">

 <?php if ($administrareResurse): ?>
<div class="adminItem">
<div class="adminItemTitle">Resurse
</div>
<a href="<?php echo site_url('admin/resurse/add'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-resurse/0'); ?>"><div class="adminButtList"></div></a>
</div>

<div class="adminItem">
<div class="adminItemTitle">Autor
</div>
<a href="<?php echo site_url('admin/autori/add'); ?>"><div class="adminButtAdd"></div></a>
<a href="#"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


 <?php if ($buletin): ?>
<div class="adminItem">
<div class="adminItemTitle">Buletin
</div>
<a href="<?php echo site_url('admin/adauga-buletin'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-buletine'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


   <?php if ($eveniment): ?>
<div class="adminItem">
<div class="adminItemTitle">Eveniment
</div>
<a href="<?php echo site_url('admin/adauga-eveniment'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-evenimente'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


<?php if ($devotional): ?>
<div class="adminItem">
<div class="adminItemTitle">Devotional
</div>
<a href="<?php echo site_url('admin/adauga-devotional'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-devotionale'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


 <?php if ($adaugareAudio): ?>
<div class="adminItem">
<div class="adminItemTitle">Audio
</div>
<a href="<?php echo site_url('admin/adauga-audio'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-resurse/0'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


  <?php if ($adaugareVideo): ?>
<div class="adminItem">
<div class="adminItemTitle">Video
</div>
<a href="<?php echo site_url('admin/adauga-video'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-resurse/0'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


<?php if ($imaginePromo): ?>
<div class="adminItem">
<div class="adminItemTitle">Promo
</div>
<a href="<?php echo site_url('admin/adauga-imagine-promo'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-imagini-promo'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>


  <?php if ($administrareUseri): ?>
<div class="adminItem">
<div class="adminItemTitle">Useri
</div>
<a href="<?php echo site_url('admin/adauga-user'); ?>"><div class="adminButtAdd"></div></a>
<a href="<?php echo site_url('admin/lista-useri'); ?>"><div class="adminButtList"></div></a>
</div>
<?php endif; ?>

<div class="clearBoth"/>

 
	</div>
</div>