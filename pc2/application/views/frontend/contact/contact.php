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

     <div id="continut" style="width: 940px;">
<div style="float: left; width: 480px;">
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

   </div>



         </div>
 </div>


         <div style="float:left; margin-top: 10px;">
             <div class="p_text">
                 <div class="i_title">Biserica Penticostala Poarta Cerului</div>
                 <div class="i_details">
                     <p class="mic ">Str.Banul Maracine nr.25</p>
                     <p class="mic ">Timisoara</p>
                     <p class="mic ">0256-472002</p>
                     <br/>

                     </div>
                 </div>

            <img class="rama" src="<?php echo IMAGES_PATH; ?>contact/harta.png" />

         </div>
     </div>


   <div class="clearBoth"></div>
</div>