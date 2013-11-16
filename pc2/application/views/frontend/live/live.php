<?php
$this->load->helper('form');

echo validation_errors();
echo form_open(current_url());
$checkbox='id="publica" class="checkbox"';
$buton='class="submit"';
$clear='class="cleardefault"';
$nume='id="nume" class="cleardefault"';
$localitate='id="localitate" class="cleardefault"';
$mesaj = 'id="mesaj"';


?>


    <div class="clearBoth" style="height:10px;"></div>
    <div id="PageContent">
<div id="continut" style="width: auto;">
    <div align="center" id="blcPlayer">
    </div>
    <script type="text/javascript" src="http://embed.bisericilive.com/get?cid=poartaceruluiro&w=940&h=528"></script>



        <div class="p_text">
            <div class="i_details" style="margin-bottom: 20px;">
                <p class="mic">-Cerinte minime pentru buna functionare a transmisiei live:</p>
                <p class="mic">- Pentru functionarea transmisiei LIVE, aveti nevoie de Flash Player versiunea 10.1.0 sau superioara;</p>
                <p class="mic">- Pentru orice alte probleme sau sugestii ,ne puteti contacta cu incredere la Yahoo ID: poartacerului.live sau email: poartacerului@gmail.com</p>
      </div>



        <br />

       <div class="i_title">Cerere de rugaciune</div>
  <div class="i_details" >
      <!--   <p style="color: red;"><?php  //echo $this->session->flashdata('cerere'); ?></p>-->
        <p style="font-style: italic;">“Tot ce veti cere cu credinta, prin rugaciune, veti primi” Matei 21:22 </p>
<p>
Daca aveti o cerere de rugaciune sau un motiv de multumire si ati dori sa il impartisiti cu noi, va rugam sa completati mai jos detaliile legate de cererea dumneavoastra si impreuna, ca biserica si familie in Cristos ne vom ruga pentru dumneavoastra.</p>
    </p>
      <div id="flashdata" class="invisibil"> Cererea dumneavoastra a fost trimisa! Biserica se va ruga...! </div>
   <div id="form">
                <?php echo form_input('cerere[nume]', 'Numele si prenumele*', $nume); ?>
<br />

               <?php echo form_input('cerere[localitate]','Localitatea', $localitate); ?>
<br />
               <?php echo form_textarea('cerere[continut]', '', $mesaj); ?>

<br />

           <?php echo form_checkbox('cerere[public]', '1', TRUE, $checkbox); ?>
                <p class="mic">Doresc ca cererea mea de rugaciune sa fie publicata<br/>
pe site-ul bisericii Poarta cerului in cadrul listei de rugaciune</p></td>

<br />

       <div style="display: none;" ><input type="reset" id="form_cereri"></div>
               
        <?php
            echo form_fieldset_close();

          //  echo form_submit('submit', 'Trimite', $buton);

            echo form_close();

       //javascript:void(0)?>
       <div class="p_text">
       <div class="i_title">
<a href="#" id="buton_cerere"  class="but_details submit" style="float: right; width: 47px;">Trimite</a>
       </div>
           </div>

        </div>
             </div>
     <div class="clearBoth"></div>
</div>

  <div class="clearBoth"></div>
</div>

  <div class="clearBoth"></div>


        <!-- start of ANUNT -->
<!---->
<!--        <div class="ui-pnotify ui-widget ui-helper-clearfix" style="width: 300px; opacity: 1; display: block; right: 15px; top: 15px;">-->
<!--            <div class="ui-pnotify-container ui-pnotify-shadow ui-corner-all ui-state-highlight" style="min-height: 16px;">-->
<!--                <div class="ui-pnotify-closer" style="cursor: pointer;">-->
<!--                    <span class="ui-icon ui-icon-circle-close"></span>-->
<!--                </div>-->
<!--                <div class="ui-pnotify-icon">-->
<!--                    <span class="ui-icon ui-icon-info"></span>-->
<!--                </div>-->
<!--                <h4 class="ui-pnotify-title">Anunt</h4>-->
<!--                <div class="ui-pnotify-text">"Avand in vedere ca Biserica Poarta Cerului se afla intr-o saptamana de post si rugaciune, in aceasta serara nu vom transmit Live.<br /><br /> Rugati-va impreuna cu noi."</div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- end of ANUNT -->