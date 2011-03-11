<?php 
if ($sort_order == 'desc') 
{
	$resort_order = 'asc';
} else 
{
	$resort_order = 'desc';
}
?>
		
<thead>
    <tr>
        <?php foreach ($table_columns as $field): ?>
			<?php if($field['name'] == ""): ?>
			<th class="padding-th" width="<?php echo $field['width'];?>"><?php echo $field['title']; ?></th>
		<?php else: ?>
	        <?php if ($sort_field == $field['name']): ?>
	        <?php $class = 'class="'.$sort_order.' tooltip"'; ?>
	        <th class="active" width="<?php echo $field['width']; ?>">
	            <a href="<?php echo $action . '/sort-by-' . $field['name'] . '/' .  $resort_order; ?>"
	               <?php echo $class; ?> 
					title="Sort by <?php echo $field['title']; ?> <?php echo ucfirst($resort_order); ?>"><?php echo $field["title"]; ?>
				</a>
	        </th>
	        <?php else: ?>
	        <th width="<?php echo $field['width'];?>">
	            <a href="<?php  echo $action . '/sort-by-' . $field['name'] . '/asc'; ?>" 
					class="desc tooltip" 
					title="Sort by <?php echo $field['title']; ?> Desc">
	                <?php echo $field['title']; ?>
	            </a>
	        </th>
	        <?php endif; ?>
		<?php endif; ?>
        <?php endforeach; ?>
    </tr>
</thead>