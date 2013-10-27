<div class="clearBoth"/>
<div class="admin" style="padding-top: 10px;">


<div id="adminpanel">


    <div class="row">
        <div class="col-md-2">

            <?php if ($administrareResurse): ?>
                <div class="adminItem">
                    <div class="adminItemTitle">Resurse
                    </div>
                    <a href="<?php echo site_url('admin/resurse/add'); ?>"><div class="adminButtAdd"></div></a>
                    <a href="<?php echo site_url('admin/lista-resurse/0'); ?>"><div class="adminButtList"></div></a>
                </div>
            <?php endif; ?>

        </div>
        <div class="col-md-2">

            <?php if ($administrareResurse): ?>
                <div class="adminItem">
                    <div class="adminItemTitle">Autor
                    </div>
                    <a href="<?php echo site_url('admin/autori/add'); ?>"><div class="adminButtAdd"></div></a>
                    <a href="<?php echo site_url('admin/autori/lista'); ?>"><div class="adminButtList"></div></a>
                </div>
            <?php endif; ?>
        </div>


        <div class="col-md-2">

            <?php if ($buletin): ?>
                <div class="adminItem">
                    <div class="adminItemTitle">Buletin
                    </div>
                    <a href="<?php echo site_url('admin/adauga-buletin'); ?>"><div class="adminButtAdd"></div></a>
                    <a href="<?php echo site_url('admin/lista-buletine'); ?>"><div class="adminButtList"></div></a>
                </div>
            <?php endif; ?>

        </div>

        <div class="col-md-2">

            <?php if ($eveniment): ?>
                <div class="adminItem">
                    <div class="adminItemTitle">Eveniment
                    </div>
                    <a href="<?php echo site_url('admin/adauga-eveniment'); ?>"><div class="adminButtAdd"></div></a>
                    <a href="<?php echo site_url('admin/lista-evenimente'); ?>"><div class="adminButtList"></div></a>
                </div>
            <?php endif; ?>

        </div>

        <div class="col-md-2">

            <?php if ($devotional): ?>
                <div class="adminItem">
                    <div class="adminItemTitle">Devotional
                    </div>
                    <a href="<?php echo site_url('admin/adauga-devotional'); ?>"><div class="adminButtAdd"></div></a>
                    <a href="<?php echo site_url('admin/lista-devotionale'); ?>"><div class="adminButtList"></div></a>
                </div>
            <?php endif; ?>

        </div>

        <div class="col-md-2">

            <?php if ($adaugareAudio): ?>
                <div class="adminItem">
                    <div class="adminItemTitle">Audio
                    </div>
                    <a href="<?php echo site_url('admin/adauga-audio'); ?>"><div class="adminButtAdd"></div></a>
                    <a href="<?php echo site_url('admin/lista-resurse/0'); ?>"><div class="adminButtList"></div></a>
                </div>
            <?php endif; ?>

        </div>



    </div>

        <div class="row">

            <div class="col-md-2">

                <?php if ($adaugareVideo): ?>
                    <div class="adminItem">
                        <div class="adminItemTitle">Video
                        </div>
                        <a href="<?php echo site_url('admin/adauga-video'); ?>"><div class="adminButtAdd"></div></a>
                        <a href="<?php echo site_url('admin/lista-resurse/0'); ?>"><div class="adminButtList"></div></a>
                    </div>
                <?php endif; ?>

            </div>

            <div class="col-md-2">

                <?php if ($imaginePromo): ?>
                    <div class="adminItem">
                        <div class="adminItemTitle">Promo
                        </div>
                        <a href="<?php echo site_url('admin/adauga-imagine-promo'); ?>"><div class="adminButtAdd"></div></a>
                        <a href="<?php echo site_url('admin/lista-imagini-promo'); ?>"><div class="adminButtList"></div></a>
                    </div>
                <?php endif; ?>

            </div>

            <div class="col-md-2">

                <?php if ($administrareUseri): ?>
                    <div class="adminItem">
                        <div class="adminItemTitle">Useri
                        </div>
                        <a href="<?php echo site_url('admin/adauga-user'); ?>"><div class="adminButtAdd"></div></a>
                        <a href="<?php echo site_url('admin/lista-useri'); ?>"><div class="adminButtList"></div></a>
                    </div>
                <?php endif; ?>

            </div>

            <div class="col-md-2">

                <?php if ($administrareCereri): ?>
                    <div class="adminItem">
                        <div class="adminItemTitle">Cereri
                        </div>
                        <a href="#"><div class="adminButtAdd"></div></a>
                        <a href="<?php echo site_url('admin/lista-cereri'); ?>"><div class="adminButtList"></div></a>
                    </div>
                <?php endif; ?>

            </div>

        </div>


 
	</div>
</div>