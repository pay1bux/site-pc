<?php 
	$rclass = $this->router->class;
	$rmethod = $this->router->method;
	$menu['level_1'] = '';
	$menu['level_2'] = ''; 
	
	switch ($rclass) 
	{
		case 'portofoliu':
			$menu['level_1'] = 'portofoliu';
			switch ($rmethod) 
			{
				case 'browse_categories': case 'add_category': case 'edit_category':
					$menu['level_2'] = 'categories';
					break;
				default:
					$menu['level_2'] = 'items';	
			}
			break;
			
		case 'galerie':
			$menu['level_1'] = 'gallery';
			switch ($rmethod) 
			{
				case 'browse_categories': case 'add_category': case 'edit_category':
					$menu['level_2'] = 'categories';
					break;
				default:
					$menu['level_2'] = 'items';	
			}
			break;		
	}
?>


<ul id="main-menu">
		<li>
			<a href="<?php echo site_url('admin/portofoliu/browse'); ?>"<?php echo (! strcmp($menu['level_1'], 'portofoliu')?' class="active"':''); ?>><span>Portofoliu</span></a>
			<?php if(! strcmp($menu['level_1'], 'portofoliu')): ?>
				<div class="submenu">
					<div class="submenu-inner">
						<ul class="clearfix">
							<li class="first">
								<a href="<?php echo site_url('admin/portofoliu/browse'); ?>" <?php echo (! strcmp($menu['level_2'], 'items')?'class="active"':''); ?>>
									<span>Lucrari</span>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/portofoliu/browse_categories'); ?>" <?php echo (! strcmp($menu['level_2'], 'categories')?'class="active"':''); ?>>
									<span>Categorii</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div>
			<?php endif; ?>	
		</li>
		<li>
			<a href="<?php echo site_url('admin/galerie/browse'); ?>"<?php echo (! strcmp($menu['level_1'], 'gallery')?' class="active"':''); ?>><span>Galerie</span></a>
			<?php if(! strcmp($menu['level_1'], 'gallery')): ?>
				<div class="submenu">
					<div class="submenu-inner">
						<ul class="clearfix">
							<li class="first">
								<a href="<?php echo site_url('admin/galerie/browse'); ?>" <?php echo (! strcmp($menu['level_2'], 'items')?'class="active"':''); ?>>
									<span>Imagini</span>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/galerie/browse_categories'); ?>" <?php echo (! strcmp($menu['level_2'], 'categories')?'class="active"':''); ?>>
									<span>Categorii</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div>
			<?php endif; ?>	
		</li>
	
</ul>