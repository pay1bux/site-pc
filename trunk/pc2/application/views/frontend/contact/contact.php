<?php
$this->load->helper('form');

echo validation_errors();
echo form_open(current_url());
$dest = 'id="contact_dest" class="dropdown"';
$nume = 'id="contact_nume" class="cleardefault"';
$email = 'id="contact_email" class="cleardefault"';
$mesaj = 'id="contact_msg" class="cleardefault"';
$clear = 'class="cleardefault"';
$buton = 'class="submit"';

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
                    <p class="mic ">Dacă aveți întrebări, idei sau sugestii, scrieți-ne un mesaj</p>

                    <div id="flashdata" class="invisibil"> Mesajul a fost trimis! </div>


                    <div id="form">
                        <table>
                            <tr>
                                <td><?php echo form_input('contact[nume]', 'Numele si Prenumele*', $nume); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo form_input('contact[email]', 'Email (nu va fi publicat)', $email); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo form_dropdown('contact[destinatar]', $destinatari, '', $dest); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo form_textarea('contact[mesaj]', '', $mesaj); ?> </td>
                            </tr>


                            <tr>
                                <td colspan="2">

                                    <?php
                                    echo form_fieldset_close();

                                  //  echo form_submit('submit', 'Trimite', $buton);

                                    echo form_close(); ?>
                                    <div style="display: none;" ><input type="reset" id="form_contact"></div>
                                            <a href="#" id="buton_contact"  class="but_details submit" style="float: right; width: 47px;">Trimite</a>

                                </td>
                            </tr>

                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div style="float:left; margin-top: 10px;">
            <div class="p_text" style="float: none;">
                <div class="i_title">Biserica Penticostală Poarta Cerului</div>
                <div class="i_details" style="float:left">
                    <p class="mic ">Str. Banul Mărăcine nr.25</p>

                    <p class="mic ">Timișoara</p>

                    <p class="mic ">0256-472002</p>
                    <br/>
                </div>
                <div class="i_details" style="float:right">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="LQ82KWP92D7AJ">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>

            <img class="rama" src="<?php echo IMAGES_PATH; ?>contact/harta.png"/>

        </div>
    </div>


    <div class="clearBoth"></div>
</div>