<h1>Portofoliu</h1>

<div class="clearfix">
	<div id="content-left">
		<div class="dotted-bottom"><br /></div>
		
		<br/>
		
		<?php foreach($results as $result): ?>
			<h2><?php echo $result['name']; ?></h2>
			<ul class="portofoliu">
				<?php foreach($result['items'] as $item): ?>
					<li><?php echo $item['name']; ?></li>
				<?php endforeach; ?>
			</ul>
			<br/>
		<?php endforeach; ?>
		
	</div>
	<div id="content-right">
	

	
	</div>
</div>