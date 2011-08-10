<div id="wrapper">
    <div class="chenar" style="width:940px; height: 440px;">
        <div class="rotator">
            <ul>
                <li class="show">
                    <a href="javascript:void(0)">
                        <img src="<?php echo FRONTEND_IMAGES; ?>fader/1.png" width="674" height="434" alt="pic1"/>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="<?php echo FRONTEND_IMAGES; ?>fader/2.png" width="674" height="434" alt="pic2"/>
                    </a>
                </li>
            </ul>
        </div>
        <div id="live" class="dreptunghi"><a id="buton_live" href="index.php#"></a></div>
        <div id="video" class="dreptunghi"><a class="buton_arhiva" href="index.php#"></a></div>
        <div id="audio" class="dreptunghi"><a class="buton_arhiva" href="index.php#"></a></div>
    </div>
</div>

<div id="middle">
    <div class="promo">
        <div class="chenar" id="devotional">
            <p class="devotional">
                <?php //echo myTruncate($devotional[0]->continut, 120, " "); ?>
                {elapsed_time}
            </p>

            <a id="buton_devotional" href="index.php#"></a>
        </div>
        <div class="chenar" id="promovare">
            <a id="buton_promovare" href="index.php#"></a>
        </div>
        <div class="clear"></div>
        <a href="index.php#"><div id="mic1" class="chenar mic"></div></a>
        <a href="index.php#"><div id="mic2" class="chenar mic"></div></a>
        <a href="<?php //echo $buletin[0]->url; ?>"><div id="mic3" class="chenar mic"></div></a>
        <a href="index.php#"><div id="mic4" class="chenar mic"></div></a>
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

                    <p class="text">Seara dedicata tuturor tinerilor care vor fii alaturi de noi la programul de
                        lauda
                        si inchiare.
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <div id="calendar" align="right"><a id="buton_calendar" href="index.php#"></a></div>
                </td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
