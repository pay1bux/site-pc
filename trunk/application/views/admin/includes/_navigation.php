<?php 
	/*if(isset($display_filter)) {
 		$display_filter += 1;
	}
 	else $display_filter = 1;*/
	if(! isset($display_filter))
	{
		$display_filter = 0;
	}
?>
        
<div class="page-nav-wrapper">
    <form action="<?php echo $action; ?>" method="post" class="display-filter" id="form-display-filter<?php echo $display_filter; ?>">
        <div>
            <strong>Total: 
                <?php echo $results_count; ?>
        		rezultate	
                / Vezi</strong>
            <label for="display-filter<?php echo $display_filter; ?>">
                Type
            </label>
            <select name="per_page" id="display-filter<?php echo $display_filter; ?>" class="jump-menu">
                <?php $items_per_page = array(1, 25, 50, 75, 100); ?>
                <?php foreach ($items_per_page as $nr): ?>
                <?php
                if ($nr == $per_page)
                    $selected = 'selected="selected"';
                else
                    $selected = "";
                ?>
                <option value="<?php echo $nr; ?>" title="<?php echo $display_filter; ?>" <?php echo $selected; ?>>
                    <?php echo $nr; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <strong>pe pagina</strong>
            <button type="submit" class="submitButton hide-with-js">
                <span>Display</span>
            </button>
        </div>
    </form>
	<?php echo $pagination_links; ?>
	<div class="clear-left"></div>
</div>