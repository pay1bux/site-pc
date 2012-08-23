    <div class="clearBoth" style="height:10px;"></div>
    <div id="PageContent">
    	<div id="jQueryGallery">
			<div class="i_watermark"></div>
            <div class="i_left">
                <div id="wrapper1">
                    <div class="slider-wrapper theme-default">
                        <div class="ribbon"></div>
                        <div id="slider" class="nivoSlider">
                            <img src="<?php echo IMAGES_PATH;?>gallery3.jpg" width="722" height="406" alt="gallery1" />
                            <img src="<?php echo IMAGES_PATH;?>gallery1.png" width="722" height="406" alt="gallery2" />
                            <img src="<?php echo IMAGES_PATH;?>gallery2.png" width="722" height="406" alt="gallery3" />
                        </div>
                    </div>
                </div>
                <div id="wrapper2">
					<div align="center" id="blcPlayer">
                    </div>
                    <script type="text/javascript" src="http://embed.bisericilive.com/get?cid=poartaceruluiro&w=720&h=404"></script>
                </div>
            </div>
            <div class="i_right">
            	<form class="i_search" method="post" action="">
                	<fieldset>
                    	<button class="i_icon" type="submit" id="buton_sub_buletin">&nbsp;</button>
           <!--codul nostru--><input id="subscribe" type="text" name="buletin" value="Aboneaza-te la buletinul duminical" class="cleardefault i_text" />
                       <!-- <input id="Newsletter" class="i_text" type="text" name="words" value="Aboneaza-te la buletinul duminical" onclick="input_default_text('Newsletter', 'Aboneaza-te la buletinul duminical');" onblur="input_default_text('Newsletter', 'Aboneaza-te la buletinul duminical');" />-->
                    </fieldset>
                </form>
            	<div class="i_item1">
                	<div class="ii_title">Transmisie LIVE Poarta Cerului</div>
                	<div class="ii_title2">Inchinare</div>
                    <span class="but_live" onclick="return hide_show('wrapper1', 'wrapper2');">&nbsp;</span>
                </div>
                <div class="i_item2">
                	<div class="ii_title"><span>&nbsp;Vezi arhiva video&nbsp;<br />&nbsp;Poarta Cerului&nbsp;</span></div>
                    <a class="but_play" href="#">&nbsp;</a>
                </div>
                <div class="i_item3">
                	<div class="ii_title"><span>&nbsp;Asculta arhiva audio&nbsp;<br />&nbsp;Poarta Cerului&nbsp;</span></div>
                    <a class="but_play" href="<?php echo site_url("arhiva-audio"); ?>">&nbsp;</a>
                </div>
            </div>
        </div>
        <div class="BoxInRow">
        	<div class="BIR_T1">
            	<div class="i_title">Devotional</div>
                <div class="i_p1"> <?php echo $devotional["titlu"]; ?></div>
                <div class="i_p2"> <?php echo myTruncate($devotional["continut"], 120, " "); ?></div>
                <a class="but_details" href="<?php echo linkDevotional($devotional["titlu"], $devotional["id"])?>"><strong>Vezi detalii</strong><span class="i_icon">&nbsp;</span></a>
            </div>
            <div class="BIR_T2">
            	<div class="altfel_de_click"><p class="i_p1">In fiecare <strong>vineri</strong><br /><strong>de la 21:30!</strong><br /><em>www.altfeldeclick.ro</em></p></div>
                <a class="but_details" href="#"><strong>Vezi detalii</strong><span class="i_icon">&nbsp;</span></a>
            </div>
            <div class="BIR_T3">
            	<div class="i_title">Urmatoarele transmisii live</div>
                 <?php if ($evenimente != null): ?>
            <?php foreach($evenimente as $eveniment):  ?>
                <div class="i_item">
                	<div class="i_date"><?php echo prepareDate($eveniment["data"]); ?></div>
                    <div class="i_details">
                    	<div class="ii_title"><a href="#"><?php echo $eveniment["titlu"]; ?></a></div>
                        <div class="ii_text"><?php echo $eveniment["continut"]; ?></div>
                    </div>
                    <div class="clearLeft"></div>
                </div>
                   <?php endforeach; ?>
                    <?php else: ?>
              <div class="ii_text">Nu exista transmisii</div>
                  <?php endif; ?>
                <a class="but_details" href="#"><strong>Vezi calendar</strong><span class="i_icon">&nbsp;</span></a>
            </div>
        </div>
        <div class="BoxInRow2">
        	<a class="BIR2_T1" href="#"><img src="<?php echo IMAGES_PATH;?>BIR2_T1.jpg" width="135" height="100" alt="scoala de muzica" title="" /></a>
            <a class="BIR2_T2" href="#"><img src="<?php echo IMAGES_PATH;?>BIR2_T2.jpg" width="135" height="100" alt="scoala biblica" title="" /></a>
            <a class="BIR2_T3" href="<?php echo $buletin["url"]; ?>"><img src="<?php echo IMAGES_PATH;?>BIR2_T3.jpg" width="135" height="100" alt="buletinul duminical" title="" /></a>
            <a class="BIR2_T4" href="#"><img src="<?php echo IMAGES_PATH;?>BIR2_T4.jpg" width="135" height="100" alt="cerere de rugaciune" title="" /></a>
        </div>
        <div class="p_text">
        	<div class="i_title">Biserica Poarta Cerului</div>
            <div class="i_details"><p>Biserica "Poarta Cerului" din Timisoara a luat fiinta prin voia lui Dumnezeu, ca urmare a viziunii pe care El a dat-o pastorului
Nelu Filip în anul 2005.</p>
<p>Împreuna cu un grup de 28 de credinciosi au început sa se adune la partasii de rugaciune timp de câteva luni, perioada în care aceasta viziune s-a cristalizat , iar în 11 decembrie ale aceluiasi an Poarta Cerului si-a deschis portile pentru oameni doritori sa intre pe dorita poarta a cerului, a fericirii vesnice cu Isus Cristos.</p>
<p>Biserica Poarta Cerului este o biserica tânara, formata din familii tinere care si-au pus la dispozitia lui Dumnezeu talentele lor, puterea lor, timpul lor si viata lor.</p></div>
        </div>