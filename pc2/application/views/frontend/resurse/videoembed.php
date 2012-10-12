<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>util-functions.js"></script>

    <style type="text/css">
      p{
          color: white;
      }
    </style>

</head>
<body>
<center><?php echo $atasament['embed']; ?></center>

<p style="font-size: 14px; line-height: 15px;  font-family: 'Open Sans', sans-serif; margin-top: 15px"><?php echo prepareDateWithYear($videoinfo[0]['data']).' - '.$videoinfo[0]['titlu']; ?>
<br/><?php echo 'Predica '.$videoinfo[0]['nume_autor']; ?></p>

</body>