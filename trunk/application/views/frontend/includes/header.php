<div id="header-wrapper">
	<div id="header">
		<a id="logo" href="<?php echo site_url(''); ?>">
			<img src="<?php echo FRONTEND_IMAGES; ?>common/logo.png" alt="Electrologus" class="fixPNG"/>
		</a>
		
		<div id="lamp">
			<img src="<?php echo FRONTEND_IMAGES; ?>common/lamp.png" alt="Electrologus" class="fixPNG"/>
		</div>
		
		<div id="tools">
			<img src="<?php echo FRONTEND_IMAGES; ?>common/tools.png" alt="Electrologus" class="fixPNG"/>
		</div>
		
		<?php $rclass = $this->router->class; ?>
		<ul id="main-menu">
			<li><a href="<?php echo site_url('servicii'); ?>" class="fixPNG item1<?php echo ($rclass=='servicii'?'-active':''); ?>">Despre noi</a></li>
			<li><a href="<?php echo site_url('portofoliu'); ?>" class="fixPNG item2<?php echo ($rclass=='portofoliu'?'-active':''); ?>">Portofoliu</a></li>
			<li><a href="<?php echo site_url('galerie'); ?>" class="fixPNG item3<?php echo ($rclass=='galerie'?'-active':''); ?>">Galerie</a></li>
			<li><a href="<?php echo site_url('contact'); ?>" class="fixPNG item4<?php echo ($rclass=='contact'?'-active':''); ?>">Contact</a></li>
		</ul>	
		
		<div id="banner">
			<ul id="banner_header" style="list-style-type: none;">
				<li id="banner_header1">
					<img src="<?php echo FRONTEND_IMAGES; ?>common/banner.png" alt="Electrologus" class="fixPNG"/>
				</li>
				<li id="banner_header2" style="display: none;">
					<img src="<?php echo FRONTEND_IMAGES; ?>common/banner2.png" alt="Electrologus" class="fixPNG"/>
				</li>	
			</ul>	
		</div>
	</div>
	
	<div id="content-wrapper" class="fixPNG">
		<div id="content">
			<div id="content-middle">