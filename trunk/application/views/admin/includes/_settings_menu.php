<?php 
$rclass = $this->router->class; ?>
<ul class="clearfix">
	<li >
		<a href="<?php echo site_url('admin/stores/browse'); ?>"<?php echo (! strcmp($rclass, 'stores')?' class="active"':''); ?>><span>Stores</span></a>
	</li>
	<li class="last">
		<a href="<?php echo site_url('admin/languages/browse'); ?>"<?php echo (! strcmp($rclass, 'languages')?' class="active"':''); ?>><span>Languages</span></a>
	</li>
</ul>