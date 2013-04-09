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
                                    <img src="<?php echo BASE_URL . $ip['url'] ?>" width="722" height="406" alt="promo<?php echo $key; ?>"/>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="wrapper2">
<!--                    <div class="i_watermark"></div>-->
                    <div align="center" id="blcPlayer">
                    </div>
                    <script type="text/javascript"
                            src="http://embed.bisericilive.com/get?cid=poartaceruluiro&w=720&h=404&sc=false"></script>
                </div>
            </div>
            <div class="i_right">
                <form class="i_search" method="post" action="">
                    <fieldset>
                        <button class="i_icon" type="submit" id="buton_sub_buletin">&nbsp;</button>
                        <!--codul nostru--><input id="subscribe" type="text" name="buletin"
                                                  value="Abonează-te la buletinul duminical"
                                                  class="cleardefault i_text"/>
                        <!-- <input id="Newsletter" class="i_text" type="text" name="words" value="Aboneaza-te la buletinul duminical" onclick="input_default_text('Newsletter', 'Aboneaza-te la buletinul duminical');" onblur="input_default_text('Newsletter', 'Aboneaza-te la buletinul duminical');" />-->
                    </fieldset>
                </form>
                <div class="i_item1">
                    <div class="ii_title">Transmisie LIVE Poarta Cerului</div>
                    <div class="ii_title2">Închinare</div>
                    <span class="but_live" onclick="return hide_show('wrapper1', 'wrapper2');">&nbsp;</span>
                </div>
                <div class="i_item2">
                    <div class="ii_title"><span>&nbsp;Vezi arhiva video&nbsp;<br/>&nbsp;Poarta Cerului&nbsp;</span>
                    </div>
                    <a class="but_play" href="<?php echo site_url("arhiva-video")?>">&nbsp;</a>
                </div>
                <div class="i_item3">
                    <div class="ii_title"><span>&nbsp;Ascultă arhiva audio&nbsp;<br/>&nbsp;Poarta Cerului&nbsp;</span>
                    </div>
                    <a class="but_play" href="<?php echo site_url("arhiva-audio"); ?>">&nbsp;</a>
                </div>
            </div>
        </div>
        <div class="BoxInRow">
            <div class="BIR_T1">
                <div class="i_title">Devoțional</div>
                <div class="i_p1"> <?php echo $devotional["titlu"]; ?></div>
                <div class="i_p2"> <?php echo myTruncate($devotional["continut"], 120, " "); ?></div>
                <a class="but_details"
                   href="<?php echo linkDevotional($devotional["titlu"], $devotional["id"])?>"><strong>Vezi
                    detalii</strong><span class="i_icon">&nbsp;</span></a>
            </div>
           <a href="http://www.youtube.com/poartacerului" target="_blank" title="Canalul Youtube Poarta Cerului"><div class="BIR_T2">


            </div></a>
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
                <a class="but_details" href="<?php echo site_url("lista-evenimente") ?>"><strong>Vezi calendar</strong><span class="i_icon">&nbsp;</span></a>
            </div>
        </div>
        <div class="BoxInRow2">
            <a class="BIR2_T1" href="http://scoalacrestinademuzica.ro/" target="_blank"><img src="<?php echo IMAGES_PATH;?>BIR2_T1.jpg" width="135" height="100"
                                             alt="scoala de muzica" title=""/></a>
            <a class="BIR2_T2" href="<?php echo site_url("scoala-biblica")?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T2.jpg" width="135" height="100"
                                             alt="scoala biblica" title="Scoala Biblica Timisoara"/></a>
            <a class="BIR2_T3" href="<?php echo site_url("buletin-duminical"); ?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T3.jpg"
                                                                          width="135" height="100"
                                                                          alt="buletinul duminical" title=""/></a>
            <a class="BIR2_T4" href="<?php echo site_url("cereri-rugaciune"); ?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T4.jpg" width="135" height="100"
                                             alt="cerere de rugaciune" title=""/></a>
        </div>
        <div class="p_text">
            <div class="i_title">Biserica Poarta Cerului</div>
            <div class="i_details"><p class="intins">Biserica "Poarta Cerului" din Timișoara a luat ființă prin voia lui Dumnezeu, ca
                urmare a viziunii pe care El a dat-o păstorului
                Nelu Filip în anul 2005.</p>

                <p class="intins">Împreună cu un grup de 28 de credincioși au început să se adune la părtășii de rugaciune timp de
                    câteva luni, perioadă în care această viziune s-a cristalizat, iar în 11 decembrie ale aceluiași an
                    Poarta Cerului și-a deschis porțile pentru oameni doritori să intre pe dorita poarta a cerului, a
                    fericirii veșnice cu Isus Cristos.</p>

                <p class="intins">Biserica Poarta Cerului este o biserica tânără, formată din familii tinere care și-au pus la
                    dispoziția lui Dumnezeu talentele lor, puterea lor, timpul lor și viața lor.</p></div>
        </div>
    </div>
<div class="clearBoth"/>
