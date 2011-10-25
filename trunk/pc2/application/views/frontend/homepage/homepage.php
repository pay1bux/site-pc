<script type="text/javascript" src="<?php echo JS_PATH; ?>util-functions.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>clear-default-text.js"></script>
<div id="wrapper">
    <div class="chenar" style="width:940px; height: 406px;">

        <!-- █ FADER IMAGINI █  -->

          <div class="rotator">
            <ul>
                <li class="show">
                    <a href="javascript:void(0)">
                        <img src="<?php echo IMAGES_PATH; ?>fader/1.png" width="720" height="405" alt="pic1"/>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="<?php echo IMAGES_PATH; ?>fader/2.png" width="720" height="405" alt="pic2"/>
                    </a>
                </li>
            </ul>
        </div>

   <!--   █ PLAYER LIVE █  -->
<!--
        <div id="player">
    <object width="720" height="405"> <param name="movie" value="http://www.poartacerului.ro/media/player_live_streaming/player.swf"></param><param name="flashvars" value="src=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Fwirecast.f4m&poster=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Flogo_live.jpg"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.poartacerului.ro/media/player_live_streaming/player.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="720" height="405" flashvars="src=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Fwirecast.f4m&poster=http%3A%2F%2Fwww.poartacerului.ro%2Fmedia%2Fplayer_live_streaming%2Flogo_live.jpg"></embed></object>
</div>
-->
        <div id="live" class="dreptunghi"><a id="buton_live" href="#"></a></div>
        <div id="video" class="dreptunghi"><a class="buton_arhiva" href="#"></a></div>
        <div id="audio" class="dreptunghi"><a class="buton_arhiva" href="#"></a></div>
    </div>
    <div id="sub_buletin" style="width:224px; height:40px"><a id="buton_sub_buletin" href="#"></a><input id="subscribe" type="text" name="buletin" value="Aboneaza-te la buletinul duminical" class="cleardefault" /> </div>
</div>


<div id="middle">
    <div class="promo">
        <div class="chenar" id="devotional">
            <p class="devotional">
                <?php echo myTruncate($devotional[0]->continut, 120, " "); ?>
            </p>

            <a id="buton_devotional" href="#"><img src=" <?php echo IMAGES_PATH; ?>buttons/citeste.png"/></a>
        </div>
        <div class="chenar" id="promovare">
            <a id="buton_promovare" href="#"></a>
        </div>
        <div class="clear"></div>
        <a href="#"><div id="mic1" class="chenar mic"></div></a>
        <a href="#"><div id="mic2" class="chenar mic"></div></a>
        <a href="<?php echo $buletin[0]->url; ?>"><div id="mic3" class="chenar mic"></div></a>
        <a href="#"><div id="mic4" class="chenar mic"></div></a>
    </div>
    <div id="evenimente">
        <br/><br/>
        <table>
            <tr>
                <td class="data" valign=top>
                    <p>18 AUG</p>
                </td>
                <td>
                    <p class="eveniment">Conferinta Nationala de tineret</p>

                    <p class="text">Seara dedicata tuturor tinerilor care vor fii alaturi de noi la programul de
                        lauda
                        si inchiare.
                </td>
            </tr>
            <tr>
                <td class="data" valign=top>
                    <p>21 SEP</p>
                </td>
                <td>
                    <p class="eveniment">Masa rotunda</p>

                    <p class="text">Seara dedicata tuturor tinerilor care vor fii alaturi de noi la programul de
                        lauda
                        si inchiare.
                </td>
            </tr>
            <tr>
                <td class="data" valign=top>
                    <p>04 DEC</p>
                </td>
                <td>
                    <p class="eveniment">Concert Adi Gliga</p>

                    <p class="text">Seara dedicataara dedicata  tuturor tinerilor care vor fii alaturi de noi la programul de
                        lauda dedicataara dedicata  tuturor tinerilor care vor fii alaturi de noi la programul de
                        lauda
                        si inchinara dedicata ara dedicata ara dedicata ara dedicata ara dedicata are.
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <div id="calendar" align="right"><a id="buton_calendar" href="#"></a></div>
                </td>
            </tr>
        </table >
    </div>
    <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <h1>Biserica Poarta Cerului</h1><br />
    <h2>Biserica „Poarta Cerului” din Timisoara a luat fiinta prin voia lui Dumnezeu, ca urmare a viziunii pe care El a dat-o pastorului
Nelu Filip în anul 2005. <br /><br />
Împreuna cu un grup de 28 de credinciosi au început sa se adune la partasii de rugaciune timp de câteva luni, perioada în care aceasta viziune s-a cristalizat , iar în 11 decembrie ale aceluiasi an Poarta Cerului si-a deschis portile pentru oameni doritori sa intre pe dorita poarta a cerului, a fericirii vesnice cu Isus Cristos.
<br /><br />
Biserica Poarta Cerului este o biserica tânara, formata din familii tinere care si-au pus la dispozitia lui Dumnezeu talentele lor, puterea lor, timpul lor si viata lor.
</h2>
</div>
<div class="clear"></div>
        