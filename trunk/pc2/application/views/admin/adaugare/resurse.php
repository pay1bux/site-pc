<?php
$this->load->helper('form');

echo form_fieldset('Adauga resursa');

echo form_open('admin/adaugare');

echo form_label('Autor', 'autor');
echo form_input('numele'); 
echo form_label('Categoria', 'categoria'); 
echo form_input('categorie'); 

echo form_fieldset_close(); 

echo form_submit('sumbit', 'Save'); 

echo form_close();

?>