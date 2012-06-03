<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
<div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)">

</div>

    <div id="continut">

        <div class="p_text">
        <div class="i_title" style="margin-bottom: 0px;"><?php echo $devotionale['titlu'];?></div>
        <div class="i_details">
            <p class="mic" ><?php echo prepareDateWithYear($devotionale['data']);?></p>
            <br/>

            <p><?php echo $devotionale['continut'];?> </p>




             <?php if ($prev != 0): ?>
                    <p align="left">
                        <a class="buton_prev" href="<?php echo site_url('devotional/' . $prev['id']); ?>"/> &laquo; <?php echo $prev['titlu']; ?> </a>
                    </p>

                <?php endif; ?>

                <?php if ($next != 0): ?>

                    <p align="right">
                        <a class="buton_next" href="<?php echo site_url('devotional/' . $next['id']); ?>"/> <?php echo $next['titlu'];?> &raquo; </a>
                         </p>

                <?php endif; ?>


        </div>
            <div class="clearBoth"></div>
  </div>
         <div class="clearBoth"></div>



</div>


<div id="right">
    <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
    <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
    <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>


<div >

                   <p class="mediu">Postari recente</p>
 
    <div class="ModuleLine"></div>

    </div>


    </div>


  <div class="clearBoth"></div>

</div>


