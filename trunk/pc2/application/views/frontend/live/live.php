<?php
$this->load->helper('form');

echo validation_errors();
echo form_open(current_url());
$lungi='class="cleardefault  lungi"';
$scurte='class="cleardefault  scurte"';


?>


<div id="wrapper">
    <div class="continut">
 <div id="player">
    <object  style="margin-top: -20px;" width="940" height="528"> <param name="movie" value="http://www.poartacerului.ro/media/player_live_streaming/player.swf"><param name="flashvars" value="src=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Fwirecast.f4m&poster=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Flogo_live.jpg"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.poartacerului.ro/media/player_live_streaming/player.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="940" height="528" flashvars="src=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Fwirecast.f4m&poster=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Flogo_live.jpg"  wmode="transparent"></embed></object>
</div>
        <p class="info" > -Cerinte minime pentru buna functionare a transmisiei live:<br/>
- Pentru functionarea transmisiei LIVE, aveti nevoie de Flash Player versiunea 10.1.0 sau superioara;<br/>
- Pentru orice alte probleme sau sugestii ,ne puteti contacta cu incredere la Yahoo ID: poartacerului.live sau email: poartacerului@gmail.com
</p>
        <br />

        <h1> Cerere de rugaciune</h1>
         <?php echo $this->session->flashdata('cerere'); ?>
        <p class="text" style="font-style: italic;">“Tot ce veti cere cu credinta, prin rugaciune, veti primi” Matei 21:21 </p><br/>
<p class="text" style="width: 800px;">
Daca aveti o cerere de rugaciune sau un motiv de multumire si ati dori sa il impartisiti cu noi, va rugam sa completati mai jos detaliile legate de cererea dumneavoastra si impreuna, ca biserica si familie in Cristos ne vom ruga pentru dumneavoastra.</p>
    </p>

    <table style="margin-top: 30px;">
            <tr>
                <td colspan=2><?php echo form_input('cerere[nume]', 'Numele si Prenumele*', $scurte); ?></td>
            </tr>
            <tr>
                <td colspan=2><?php echo form_input('cerere[localitate]','Localitate', $scurte); ?></td>
            </tr>
            <tr>
                 <td colspan=2><?php echo form_textarea('cerere[continut]', '', $lungi); ?> </td>
            </tr>
            <tr>

                 <td width="20"><?php echo form_checkbox('cerere[public]', '1', TRUE); ?></td>
                <td> <p class="text">Doresc ca cererea mea de rugaciune sa fie publicata<br/>
pe site-ul bisericii Poarta cerului in cadrul listei de rugaciune</p></td>
            </tr>


            <tr height="40">
                <td colspan="2" align="right">
        <?php
            echo form_fieldset_close();

            echo form_submit('sumbit', 'Trimite');

            echo form_close(); ?>
                </td>
            </tr>

        </table>
</div>
    <div class="clear"></div>


    <div class="clear"></div>

</div>
<div class="clear"></div>
        