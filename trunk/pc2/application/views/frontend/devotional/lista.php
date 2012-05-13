<?php
$this->load->helper('form');



echo validation_errors();
echo form_open(current_url());
$dropdown = 'class="dropdown"';
$clear='class="cleardefault"';
$buton='class="submit"';

?>
<div class="clearBoth" style="height:10px;"></div>
 <div id="PageContent">
 <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)">

 </div>

     <div id="continut">





            <?php  foreach ($devotionale as $devotional) : ?>
             <div class="articol">
   <a href="<?php echo site_url('devotional/'.$devotional['r_id']);  ?>">
                <img class="imgdev" src="<?php echo IMAGES_PATH.$devotional['thumb'];?>"/>
 </a>

                     <div class="p_text" style="margin-top: 0px;">

                   <a href="<?php echo site_url('devotional/'.$devotional['r_id']);  ?>">
                       <div class="i_title" style="margin-bottom: 0;"><?php echo $devotional['titlu'];?></div>
                   </a>
        <div class="i_details">


                    <p class="mic"><?php echo  prepareDateWithYear($devotional['data']); ?></p> <br/>
  <p class="mic"><?php echo  myTruncate($devotional['continut'], 230, " "); ?></p>
               <a href="<?php echo site_url('devotional/'.$devotional['r_id']);  ?>">
                   <p class="mic" style="text-align: right; text-decoration: underline;">Citeste articolul</p>
                   </a>
                    </div>



                    </div>

         </div>
         <div class="clearBoth"></div>
 

            <?php endforeach;?>
         


 </div>

 




<div id="right">
    <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
    <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
    <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
 </div>






   <div class="clearBoth"></div>
</div>


        