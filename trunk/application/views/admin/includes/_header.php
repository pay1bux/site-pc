<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
    	<?php $this->load->view('admin/includes/_head_includes'); ?>
        <script type="text/javascript" src="<?php echo ADMIN_JS; ?>site.js"></script>
    </head>
    <body>
        <!-- Header -->
        <div id="header">
            <div id="header-inner">
                <a href="" id="logo">
            		<img alt="Electrologus.ro" class="fixPNG" src="<?php echo base_url(); ?>/static/admin/images/common/logo.png" class="fixPNG" />        		
                </a>
                <!--  
                <ul id="top-menu-left">
                    <li>
                        <a href="#">My account</a>
                    </li>
                    <li>
                        <a href="#">Change password</a>
                    </li>
                    <li class="last">
						<a href="#">Settings</a>
                    </li>
                </ul>
              -->
                <div id="user-info">
                    <a href="<?php echo site_url('admin/auth/logout') ?>" class="link-header"><span>Logout</span></a>
                    <span class="welcome">Bine ati venit<strong>
                            <?php echo $this->session->userdata('admin_auth_name'); ?>
                        </strong></span>
                </div>
                <?php
               		$this->load->view('admin/includes/_menu');
                ?>
            </div>
        </div>
        <!-- content -->
        <div id="content-wrapper" class="clearfix">