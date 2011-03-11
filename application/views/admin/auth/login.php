
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  	<head>
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
            	if(isset($page_title))
					echo $page_title . ', ';  
            	echo SITE_TITLE;
            ?>
        </title>
        
        <link href="<?php echo ADMIN_CSS; ?>clearfix.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>uni-form.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>site-buttons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_CSS; ?>site-index.css" rel="stylesheet" type="text/css" />
  	</head>
	<body>
		<div id="wrapper">	
		<a href="" id="logo">
			<img alt="Electrologus.ro" class="fixPNG" src="<?php echo base_url(); ?>/static/admin/images/index/logo.png" />
		</a>
			<!-- START Login Box -->
			<div class="login-box">
				<div class="bg">
					<div class="content">
						<?php $this->load->view('admin/includes/_form_errors.php'); ?>
						<form action="<?php echo site_url('admin/auth/login'); ?>" method="post" class="uniForm" id="formLogin">						
							<fieldset class="inlineLabels">
								<div class="ctrlHolder clearfix ">
									<label for="login_username">Username</label>			
									<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="textInput" id="login_username" />		
								</div>
						
								<div class="ctrlHolder clearfix ">
									<label for="login_password">Password</label>			
									<input type="password" name="password" class="textInput" id="login_password" />		
								</div>
								<br/>
								<!-- <p class="formHint"><a href="">Forgot my password</a></p> -->
								<div class="checkbox-wrapper clearfix">
									<input type="checkbox" name="remember_me" class="checkbox" id="remember_me" value="1" checked="<?php set_value('remember_me'); ?>"/>			
									<label class="checkbox-label" for="login_remember_me">Remember me</label>
								</div>
						
							<div class="buttonHolder">
								<button type="submit" class="buttonLogin"><span>Login</span></button>
							</div>
						</form>    
						
					</div>
				</div>
			</div>
			<!-- END Login Box -->
		</div>	
	</body>
</html>