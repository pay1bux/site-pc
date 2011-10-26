<?php
$this->load->helper('form');

echo form_fieldset('Adauga autori');

echo form_open('admin/adaugare');

echo form_label('Autor', 'autor');
echo form_input('autor');
echo form_fieldset_close(); 

echo form_submit('sumbit', 'Adauga');

echo form_close();

?>