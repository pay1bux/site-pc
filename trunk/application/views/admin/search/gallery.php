<div id="search">
    <div id="search-inner">
        <div id="search-forms"<?php echo (($this->session->userdata('admin_filter_gallery') != FALSE)?'':' style="display: none;"') ?>>
            <form action="<?php echo $action; ?>" method="post">
                <div class="input-holder clearfix">
                    <div>
		            	<?php echo form_label('Categorie', 'admin_filter_gallery_id_cat', array('class'=>'label')); ?>
		            	<?php echo form_dropdown('admin_filter_gallery[id_cat]', $categories_dropdown, isset($form_values['admin_filter_gallery']['id_cat'])?$form_values['admin_filter_gallery']['id_cat']:'', 'id="admin_filter_gallery_id_cat"'); ?>
		            </div>
                </div>
                <div class="submit-holder clearfix">
                    <button type="submit" class="submitButton">
                        <span>Cauta</span>
                    </button>
                    <br/>
                    <?php if ($this->session->userdata('admin_filter_gallery') != FALSE): ?>
                    <button type="submit" class="submitButton" name="reset" value="reset">
                        <span>Sterge filtru</span>
                    </button>
                    <?php endif; ?>
                </div>
                <div class="clear-left">
                </div>
            </form>
        </div>
        <div class="toggle-search-holder">
	        <?php if ($this->session->userdata('admin_filter_gallery') != FALSE): ?>
	            <a href="#" class="link-toggle-search tooltip" title="Toggle the search form" rel="Show search"><span><em class="up">Hide Search</em></span></a>
	        <?php else: ?>
	        	<a href="#" class="link-toggle-search tooltip" title="Toggle the search form" rel="Hide search"><span><em class="down">Show Search</em></span></a>
	        <?php endif; ?>
        </div>
    </div>
</div>