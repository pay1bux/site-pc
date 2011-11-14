<div id="wrapper">
    <div class="chenar banner" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)">

    </div>

    <div class="continut" style="padding-left: 15px;">

        <h1><?php echo $devotionale['titlu'];?></h1>

        <h2><?php echo prepareDateWithYear($devotionale['data']);?></h2>
        <br/>

        <p class="text"><?php echo $devotionale['continut'];?></p>
        <br/>
        <table style="width:100%;">
            <tr>
                <?php if ($prev != 0): ?>
                <td style="width:50%;">
                    <p class="text" align="left"><<
                        <a href="<?php echo site_url('devotional/' . $prev['id']); ?>"/> <?php echo $prev['titlu']; ?> </a>
                    </p>
                </td>
                <?php endif; ?>

                <?php if ($next != 0): ?>
                <td style="width:50%;">
                    <p class="text" align="right">
                        <a href="<?php echo site_url('devotional/' . $next['id']); ?>"/> <?php echo $next['titlu'];?> </a>
                        >> </p>
                </td>
                <?php endif; ?>
            </tr>

        </table>
    </div>
    <div class="right">
        <div class="chenar" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
        <div class="chenar" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="chenar" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
    </div>


    <div class="clear"></div>


    <div class="clear"></div>

</div>
<div class="clear"></div>
        