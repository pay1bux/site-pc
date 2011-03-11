<script>
			$(document).ready(function(){
				$("a[rel='gallery']").colorbox({opacity: 0.6, current: "imaginea {current} din {total}"});
			});
		</script>

<h1>Galerie</h1>


<div class="clearfix">
	<div id="content-left">
		<div class="dotted-bottom"><br /></div>
		
		<br/>
		<?php if (count($images) > 0): ?>
		<ul class="gallery clearfix">
			<?php foreach($images as $image): ?>
			<li>
				<a href="<?php echo base_url(); ?>uploads/images/zoom/<?php echo $image['filename']; ?>" rel="gallery" title="">
					<img src="<?php echo base_url(); ?>uploads/images/thumb/<?php echo $image['filename']; ?>" alt="Electrologus"/>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
			Nu exista imagini in aceasta categorie.
		<?php endif; ?>
	</div>
	<div id="content-right">
		<br/>
		<ul class="albume">
			<?php foreach($categories as $cat): ?>
				<li>
					<a href="<?php echo site_url('galerie/'.$cat['id'].'/'.url_title($cat['name'], 'dash', TRUE)); ?>"<?php echo ($id_category == $cat['id']?' class="active"':''); ?>>
						<?php echo $cat['name']; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

	
	
			
			