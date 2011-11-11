<div id="wrapper">
    <div class="chenar banner" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)">

    </div>

    <div class="continut">

        <table  style="padding-left: 10px;">
            <? foreach ($devotionale as $devotional) : ?>
            <tr>
                <td style="padding: 10px;" width="152" height="130"><img src="<?php echo $devotional['url'];?>"/></td>
                <td style="padding-bottom: 10px;">
                    <h1><?php echo $devotional['titlu'];?></h1>
                    <p class="text"><?php echo  $devotional['data']; ?></p>
<br/>
                    <p class="text"><?php echo  myTruncate($devotional['continut'], 230, " "); ?></p>
                </td>
            </tr>

            <?php endforeach;?>
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
        