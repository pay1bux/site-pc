<!-- RADIO -->
<link href="<?php echo CSS_PATH; ?>jplayer.radio.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){

        $("#jquery_jplayer_1").jPlayer({
            ready: function (event) {
                $(this).jPlayer("setMedia", {
                    m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
                    oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
                });
            },
            swfPath: "js",
            supplied: "m4a, oga",
            wmode: "window",
            smoothPlayBar: true,
            keyEnabled: true
        });
    });
    //]]>
</script>
<!-- /RADIO -->
<div class="clearBoth" style="height:10px;"></div>
    <div id="PageContent">
        <div id="jQueryGallery">
<!--            <div class="i_watermark"></div>-->
            <div class="i_left">
                <div id="wrapper1">
                    <div class="slider-wrapper theme-default">
                        <div class="ribbon"></div>
                        <div id="slider" class="nivoSlider">
                            <?php if ($imaginiEvenimente != null): ?>
                                <?php foreach ($imaginiEvenimente as $key => $ie): ?>
                                    <img src="<?php echo BASE_URL . $ie['url'] ?>" width="722" height="406" alt="evenimente<?php echo $key; ?>"/>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($imaginiPromo != null): ?>
                                <?php foreach ($imaginiPromo as $key => $ip): ?>
                                    <?php if(isset($ip['r_url'])): ?>
                                        <a href="<?php echo $ip['r_url'];?>" target="_blank">
                                          <img src="<?php echo BASE_URL . $ip['url'] ?>" width="722" height="406" alt="promo<?php echo $key; ?>"/>
                                        </a>
                                    <?php else: ?>
                                          <img src="<?php echo BASE_URL . $ip['url'] ?>" width="722" height="406" alt="promo<?php echo $key; ?>"/>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="wrapper2">
<!--                    <div class="i_watermark"></div>-->

                </div>
            </div>
            <div class="i_right">

                <div class="i_item1">
                    <div class="ii_title">TRANSMISIE</div>
                    <div class="ii_title2">LIVE</div>
                    <span class="but_live">&nbsp;</span>
                </div>
                <div class="i_item2">
                    <div class="ii_title">ARHIVA<br/>
                        <span>VIDEO</span>
                    </div>
                    <a class="but_play" href="<?php echo site_url("arhiva-video")?>">&nbsp;</a>
                </div>
                <div class="i_item3">
                    <div class="ii_title">ASCULTA ARHIVA AUDIO<br/><span>POARTA CERULUI</span>
                    </div>
                    <a class="but_play" href="<?php echo site_url("arhiva-audio"); ?>">&nbsp;</a>
                </div>
            </div>
        </div>
        <div class="BoxInRow">
            <div class="BIR_T1">
                <div class="i_title">DEVOTIONAL</div>
                <div class="i_p1"> <?php echo $devotional["titlu"]; ?></div>
                <div class="i_p2"> <?php echo myTruncate($devotional["continut"], 120, " "); ?></div>
              <center> <a class="but_details"
                   href="<?php echo linkDevotional($devotional["titlu"], $devotional["id"])?>"><strong>CITESTE ARTICOLUL</strong></a></center>
            </div>


               <div class="BIR_T2">
                   <div id="radioBox">
                       <div class="top"></div>

                       <div id="jquery_jplayer_1" class="jp-jplayer"></div>

                       <div id="jp_container_1" class="jp-audio">
                           <div class="jp-type-single">
                               <div class="jp-gui jp-interface">
                                   <div id="player">
                                       <ul class="jp-controls">
                                           <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                           <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                           <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                                           <li>&nbsp; | &nbsp; </li>
                                           <li><a href="#" id="radioExpand"></a></li>
                                       </ul>
                                       <div class="jp-volume-bar">
                                           <div class="jp-volume-bar-value"></div>
                                       </div>
                                   </div>
                               </div>
                               <div id="playerInfo">
                                   <div class="jp-gui jp-interface">
                                       <ul class="jp-controls" style="width: 73px; float: left;">
                                           <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                           <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>

                                       </ul>
                                       <div class="jp-title" style="float:left;">
                                           <ul>
                                               <li>Asculti: Numai T...</li>
                                           </ul>
                                       </div>
                                   </div>
                                   <div class="clearLeft"></div>




                                   <div class="jp-no-solution">
                                       <span>Update Required</span>
                                       To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
            </div>


            <div class="BIR_T3">
                <div class="i_title">Următoarele transmisii live</div>
                <?php if ($evenimente != null): ?>
                <?php foreach ($evenimente as $eveniment): ?>

                    <div class="i_item">
                        <div class="i_date"><?php echo prepareDate($eveniment["data"]); ?></div>
                        <div class="i_details">
                           <a href="<?php echo site_url('lista-evenimente').'/'.prepareDateDMY($eveniment['data']);?>" > <div class="ii_title"><?php echo $eveniment["titlu"]; ?><span style="color: gray;"><?php echo '  '.$eveniment["ora_inceput"].' - '.$eveniment["ora_sfarsit"];?></span> </div></a>
                            <div class="ii_text"><?php echo myTruncate($eveniment["continut"], 100, " "),' '; ?></div>
                        </div>
                        <div class="clearLeft"></div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <div class="ii_text">Nu există transmisii</div>
                <?php endif; ?>
                <a class="but_details" href="<?php echo site_url("lista-evenimente") ?>"><strong>VEZI CALENDAR</strong></a>
            </div>
        </div>
        <div class="BoxInRow2">
            <a class="BIR2_T1" href="http://scoalacrestinademuzica.ro/" target="_blank"><img src="<?php echo IMAGES_PATH;?>BIR2_T1.png" width="135" height="100"
                                             alt="scoala de muzica" title=""/></a>
            <a class="BIR2_T2" href="<?php echo site_url("scoala-biblica")?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T2.png" width="135" height="100"
                                             alt="scoala biblica" title="Scoala Biblica Timisoara"/></a>
            <a class="BIR2_T3" href="<?php echo site_url("buletin-duminical"); ?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T3.png"
                                                                          width="135" height="100"
                                                                          alt="buletinul duminical" title=""/></a>
            <a class="BIR2_T4" href="<?php echo site_url("cereri-rugaciune"); ?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T4.png" width="135" height="100"
                                             alt="cerere de rugaciune" title=""/></a>
        </div>
        <div id="i_home" class="p_text">
            <div class="i_title">Biserica Poarta Cerului</div>
            <div class="i_details i_home"><p class="intins">Biserica "Poarta Cerului" din Timișoara a luat ființă prin voia lui Dumnezeu, ca
                urmare a viziunii pe care El a dat-o păstorului
                Nelu Filip în anul 2005.

              Împreună cu un grup de 28 de credincioși au început să se adune la părtășii de rugaciune timp de
                    câteva luni, perioadă în care această viziune s-a cristalizat, iar în 11 decembrie ale aceluiași an
                    Poarta Cerului și-a deschis porțile pentru oameni doritori să intre pe dorita poarta a cerului, a
                    fericirii veșnice cu Isus Cristos.<br/>

                Biserica Poarta Cerului este o biserica tânără, formată din familii tinere care și-au pus la
                    dispoziția lui Dumnezeu talentele lor, puterea lor, timpul lor și viața lor.</p></div>
        </div>


    </div>

<div class="clearBoth"/>


<!-- start of ANUNT -->

<!--<div class="ui-pnotify ui-widget ui-helper-clearfix" style="width: 300px; opacity: 1; display: block; right: 15px; top: 15px;">-->
<!--    <div class="ui-pnotify-container ui-pnotify-shadow ui-corner-all ui-state-highlight" style="min-height: 16px;">-->
<!--        <div class="ui-pnotify-closer" style="cursor: pointer; visibility: visible;">-->
<!--            <span class="ui-icon ui-icon-circle-close"></span>-->
<!--        </div>-->
<!--        <div class="ui-pnotify-icon">-->
<!--            <span class="ui-icon ui-icon-info"></span>-->
<!--        </div>-->
<!--        <h4 class="ui-pnotify-title">Anunt</h4>-->
<!--        <div class="ui-pnotify-text">"Avand in vedere ca Biserica Poarta Cerului se afla intr-o saptamana de post si rugaciune, in aceasta serara nu vom transmit Live.<br /><br /> Rugati-va impreuna cu noi."</div>-->
<!--    </div>-->
<!--</div>-->

<!-- end of ANUNT -->
