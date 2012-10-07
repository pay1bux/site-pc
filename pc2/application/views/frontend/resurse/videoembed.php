<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>util-functions.js"></script>
</head>
<body>
<center><?php echo $atasament['embed']; ?></center>

<p style="font-size: 14px; line-height: 15px;  font-family: 'Open Sans', sans-serif;";"><?php echo prepareDateWithYear($videoinfo[0]['data']).' - '.$videoinfo[0]['titlu']; ?>
<br/><?php echo 'Predica '.$videoinfo[0]['nume_autor']; ?></p>

</body>