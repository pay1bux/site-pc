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
 <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/contact.png)">

 </div>

     <div id="continut">

         <div class="p_text">
         <div class="i_title">Contact</div>
         <div class="i_details">
             <p class="mic ">Daca aveti intrebari, idei sau sugestii, scrieti-ne un mesaj</p>
            <?php echo $this->session->flashdata('contact'); ?> <br/>
             <div id="form">
    <table>
            <tr>
                <td><?php echo form_input('contact[nume]', 'Numele si Prenumele*', $clear ); ?></td>
            </tr>
            <tr>
                <td><?php echo form_input('contact[email]','Email (nu va fi publicat)', $clear); ?></td>
            </tr>
            <tr>
                <td><?php echo form_dropdown('contact[destinatar]', $destinatari,'', $dropdown); ?></td>
            </tr>
            <tr>
                 <td><?php echo form_textarea('contact[mesaj]', ''); ?> </td>
            </tr>


            <tr>
                <td colspan="2">
        <?php
            echo form_fieldset_close();

            echo form_submit('sumbit', 'Trimite', $buton);

            echo form_close(); ?>
                </td>
            </tr>

        </table>
         </div>
             <div class="clearBoth"></div>
   </div>
          <div class="clearBoth"></div>


         </div>
 </div>


 <div id="right">
     <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
     <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
     <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
 </div>

   <div class="clearBoth"></div>
</div>