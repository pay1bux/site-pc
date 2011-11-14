<?php
$this->load->helper('form');



echo validation_errors();
echo form_open(current_url());
$lungi='class="cleardefault  lungi"';
$scurte='class="cleardefault  scurte"';

?>

<div id="wrapper">
    <div class="chenar banner" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/contact.png)">

    </div>

    <div class="continut">
        <h1> Contact</h1>
        <p class="text" >Daca aveti intrebari, idei sau sugestii, scrieti-ne un mesaj</p>
        <?php echo $this->session->flashdata('contact'); ?> <br/>
        <table>
            <tr>
                <td><?php echo form_input('contact[nume]', 'Numele si Prenumele*', $scurte); ?></td>
            </tr>
            <tr>
                <td><?php echo form_input('contact[email]','Email (nu va fi publicat)', $scurte); ?></td>
            </tr>
            <tr>
                <td><?php echo form_dropdown('contact[destinatar]', $destinatari, $scurte); ?></td>
            </tr>
            <tr>
                 <td><?php echo form_textarea('contact[mesaj]', '', $lungi); ?> </td>
            </tr>


            <tr>
                <td colspan="2">
        <?php
            echo form_fieldset_close();

            echo form_submit('sumbit', 'Trimite');

            echo form_close(); ?>
                </td>
            </tr>

        </table>


    </div>
    <div class="right">
        <div class="chenar" style="background-image: url(<?php echo IMAGES_PATH; ?>right/4.png)"></div>

    </div>


    <div class="clear"></div>


    <div class="clear"></div>

</div>
<div class="clear"></div>
        