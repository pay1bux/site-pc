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
    <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/despre.png)"></div>

    <div id="continut">

        <div class="p_text">
            <div class="i_title">Cereri de rugaciune</div>
            <div class="i_details">
                <?php  foreach ($cereri as $cerere): ?>
                <p style="margin-bottom: 5px;margin-top: 10px;"><span
                    style="color: #adb164; font-weight: bold; "><?php echo $cerere['nume'];?></span><?php echo ' - ' . $cerere['localitate'] . ' | ' . prepareDateWithYear($cerere['data']);?>
                </p>
                <p class="intins"><?php echo $cerere['continut'];?></p>

                <?php endforeach;?>
            </div>
             <div style="margin: 0px auto; width: 155px; margin-bottom: 100px; margin-top: 30px;">
                <?php
                if (isset($paginare)) {
                    echo $paginare;
                }
                ?>
            </div>


            <div class="i_title">Cerere de rugaciune</div>
            <div class="i_details" >
                <!--   <p style="color: red;"><?php  //echo $this->session->flashdata('cerere'); ?></p>-->
                <p style="font-style: italic;">“Tot ce veti cere cu credinta, prin rugaciune, veti primi” Matei 21:21 </p>
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

        </div>




    </div>

    <div id="right">
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
    </div>
</div>

<div class="clearBoth"></div>

