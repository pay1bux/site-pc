<!-- RIGHT -->
<div id="right">
    <!-- Side Menu -->
    <div id="sidemenu">
        <a href="<?php echo site_url('admin/galerie/add'); ?>" class="link-add"><span>Adauga Imagine</span></a>
        <br/>
    </div>
</div>

<div id="left">
	<?php $this->load->view('admin/search/gallery'); ?>
    <!-- Content -->
    <div id="content">
        <h1>Galerie - Imagini</h1>
        <p class="path">
        </p>
        <?php $this->load->view('admin/includes/_notice'); ?>
        <?php if (count($results) != 0): ?>
        	<?php $this->load->view('admin/includes/_navigation'); ?>
	        <table cellpadding="0" cellspacing="1" class="data-table">
	            <thead>
				    <tr>
						<th class="padding-th" width="30%">Imagine</th>
						<th class="padding-th" width="30%">Categorie</th>
						<th class="padding-th" width="20%">Ordine</th>
						<th class="padding-th" width="20%"></th>
				    </tr>
				</thead>
	            <tbody>
	                <?php foreach ($results as $result): ?>
	                <tr class="highlight-element">
	                	<td>
	                         <a href="#"  class="screenshot" rel="<?php echo get_image_path($result['filename'], 'normal'); ?>">
		                    	<?php echo render_image($result['filename'], 'thumb', array('alt' => '')); ?>
		                    </a>

	                    </td>
	                    <td>
	                         <?php echo $result['category']; ?>
	                    <td>
	                        <?php echo $result['sort']; ?>
	                    <td>
	                        <a href="<?php echo site_url('admin/galerie/edit/' . $result['id']); ?>">Editeaza</a>
	                    	&nbsp;|&nbsp;
	                    	<a href="<?php echo site_url('admin/galerie/delete/' . $result['id']); ?>" class="delete">Sterge</a>
	                    </td>
	                </tr>
	                <?php endforeach; ?>
	            </tbody>
	        </table>
	       <?php $this->load->view('admin/includes/_navigation', array('display_filter' => 1)); ?>
        <?php else : ?>
	        <div class="warningMsg">
	            <p>
	                Nu exista rezultate.
	            </p>
	        </div>
        <?php endif; ?>
    </div>
</div>