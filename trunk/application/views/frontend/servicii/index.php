<div id="container">
<div id="logo">
    </div>
       <div id="top_menu">
        <?php echo 'Top menu' ?>
    </div>
    <div id="banner">
        <center><?php echo 'Player live'; ?></center>
        <div id="first_button">
            <center><?php echo 'First Button'; ?></center>
        </div>

        <div id="second_button">
            <center><?php echo 'Second Button'; ?></center>
        </div>
        <div id="third_button">
<!--            <center>--><?php //echo 'Third Button'; ?><!--</center>-->
            <script type="text/javascript" src="http://www.resursecrestine.ro/web-api-versetul-zilei"></script>
        </div>
    </div>
    <div id="video">
        <center><?php echo 'Video Pastor'; ?></center>
        <div id="urm_eveniment">
            <center><?php echo 'Urmatorul eveniment'; ?></center>
        </div>
        <div id="stiri">
            <center><?php echo 'Ultimele Comentarii'; ?></center>
            <?php if ($query->num_rows() > 0): ?>
                <?php foreach ($query->result() as $row): ?>
                    <p><?php echo $row->body ?></p>
                    <p><?php echo $row->author ?></p>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php
                echo form_open('site/readmore');
                echo form_submit('submit', 'Read More');
                echo form_close();
            ?>
        </div>
    </div>
    <div id="copyright">
        <center><?php echo '&copy 2011 Poarta Cerului. '; ?></center>
    </div>
    <div id="contact">
        <center><?php echo 'Tel: 0256 281 108 Mail: poartacerului@gmail.com'; ?></center>
    </div>
    <div id="linkuri">
        <center><?php echo 'Linkuri utile'; ?></center>
    </div>
    
</div>