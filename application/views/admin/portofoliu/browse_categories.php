<!-- RIGHT -->
<div id="right">
    <!-- Side Menu -->
    <div id="sidemenu">
        <a href="<?php echo site_url('admin/portofoliu/add_category'); ?>" class="link-add"><span>Adauga categorie</span></a>
        <br/>
    </div>
</div>

<div id="left">
    <!-- Content -->
    <div id="content">
        <h1>Portofoliu - Categorii</h1>
        <p class="path">
        </p>
        <?php $this->load->view('admin/includes/_notice'); ?>
        <?php if (count($results) != 0): ?>
        	<?php $this->load->view('admin/includes/_navigation'); ?>
	        <table cellpadding="0" cellspacing="1" class="data-table">
	            <thead>
				    <tr>
						<th class="padding-th" width="40%">Nume</th>
						<th class="padding-th" width="40%">Ordine</th>
						<th class="padding-th" width="20%"></th>
				    </tr>
				</thead>
	            <tbody>
	                <?php foreach ($results as $result): ?>
	                <tr class="highlight-element">
	                	<td>
	                         <strong><?php echo $result['name']; ?></strong>
	                    </td>
	                    <td>
	                         <?php echo $result['sort']; ?>
	                    </td>
	                    <td>
	                        <a href="<?php echo site_url('admin/portofoliu/edit_category/' . $result['id']); ?>">Editeaza</a>
	                    	&nbsp;|&nbsp;
	                    	<a href="<?php echo site_url('admin/portofoliu/delete_category/' . $result['id']); ?>" class="delete">Sterge</a>
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