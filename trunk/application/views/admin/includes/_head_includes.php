       	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       	<link href="images/favicon.ico" rel="shortcut icon" />
        <meta name="description" lang="en" content="" />
        <meta name="keywords" lang="en" content="" />
        <meta name="language" content="en_US" />
        <meta name="distribution" content="Global" />
        <meta name="revisit" content="30 days" />
        <meta name="rating" content="General" />
        <meta name="robots" content="INDEX,FOLLOW" />
        <title>
            <?php 
            	if (isset($page_title))
            	{
					echo $page_title . ', ';  
            	}
				echo SITE_TITLE;
            ?>
        </title>
        
        <link href="<?php echo ADMIN_CSS; ?>clearfix.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>site-buttons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>site-styling.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>site-template.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>uni-form.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>cupertino/ui.datepicker.css" rel="stylesheet" type="text/css" />
     
      	<script type="text/javascript">
      		var path = '<?php echo base_url(); ?>';
      	</script>
      	  
        <script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.ui.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.tooltip.js"></script>
	
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.highlight.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.autocomplete.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.popup.image.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery-ui-datepicker.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.popupHtml.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>jquery.scrollTo.js"></script>
		
		
        <link href="<?php echo ADMIN_JS; ?>/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>colorpicker/colorpicker.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>colorpicker/eye.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS; ?>colorpicker/utils.js"></script>
