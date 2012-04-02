<?php
$this->load->helper('form');

echo validation_errors();
echo form_open(current_url());
$checkbox='class="checkbox"';
$buton='class="submit"';
$clear='class="cleardefault"';


?>


    <div class="clearBoth" style="height:10px;"></div>
    <div id="PageContent">
<div id="continut" style="width: auto;">
    <object style="margin-top: -10px;" width="940" height="528"> <param name="movie" value="http://www.poartacerului.ro/media/player_live_streaming/player.swf"><param name="flashvars" value="src=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Fwirecast.f4m&poster=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Flogo_live.jpg"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.poartacerului.ro/media/player_live_streaming/player.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="940" height="528" flashvars="src=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Fwirecast.f4m&poster=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Flogo_live.jpg"  wmode="transparent"></embed></object>



        <div class="p_text">
            <div class="i_details" style="margin-bottom: 20px;">
                <p class="mic">-Cerinte minime pentru buna functionare a transmisiei live:</p>
                <p class="mic">- Pentru functionarea transmisiei LIVE, aveti nevoie de Flash Player versiunea 10.1.0 sau superioara;</p>
                <p class="mic">- Pentru orice alte probleme sau sugestii ,ne puteti contacta cu incredere la Yahoo ID: poartacerului.live sau email: poartacerului@gmail.com</p>
      </div>



        <br />

       <div class="i_title">Cerere de rugaciune</div>
  <div class="i_details" >
         <p style="color: red;"><?php echo $this->session->flashdata('cerere'); ?></p>
        <p style="font-style: italic;">“Tot ce veti cere cu credinta, prin rugaciune, veti primi” Matei 21:21 </p>
<p>
Daca aveti o cerere de rugaciune sau un motiv de multumire si ati dori sa il impartisiti cu noi, va rugam sa completati mai jos detaliile legate de cererea dumneavoastra si impreuna, ca biserica si familie in Cristos ne vom ruga pentru dumneavoastra.</p>
    </p>

   <div id="form">
                <?php echo form_input('cerere[nume]', 'Numele si Prenumele*', $clear); ?>
<br />

               <?php echo form_input('cerere[localitate]','Localitate', $clear); ?>
<br />
               <?php echo form_textarea('cerere[continut]'); ?>

<br />

           <?php echo form_checkbox('cerere[public]', '1', TRUE, $checkbox); ?>
                <p class="mic">Doresc ca cererea mea de rugaciune sa fie publicata<br/>
pe site-ul bisericii Poarta cerului in cadrul listei de rugaciune</p></td>

<br />


               
        <?php
            echo form_fieldset_close();

            echo form_submit('submit', 'Trimite', $buton);

            echo form_close(); ?>

        </div>
             </div>
     <div class="clearBoth"></div>
</div>

  <div class="clearBoth"></div>
</div>

  <div class="clearBoth"></div>

        