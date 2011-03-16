<div id="main_content">
    <div id="articles">
    <p>
        <?php if ($records->num_rows() > 0): ?>
            <?php foreach ($records->result() as $row): ?>
                <p><?php echo $row->title ?></p>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php echo $this->pagination->create_links(); ?>
    </p>
</div>
</div>