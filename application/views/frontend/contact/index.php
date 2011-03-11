<h1>Contact</h1>

<div class="clearfix">
	<div id="content-left">
		<div class="dotted-bottom"><br /></div>
			
			<br/>
			<p>
				Va stam la dispozitie pentru oferirea oricaror informatii de care 
				aveti nevoie.
				<br/> 
				Ne puteti contacta la numarul de telefon <strong>0727 580 358</strong> 
				sau trimiteti un mesaj direct din aceasta pagina, completand formularul de mai jos.
				<br/>
				Va multumim!
				
			</p>
			<br/>
			<br/>
				
			<?php $this->load->view('frontend/includes/notice.php'); ?>
			<?php $this->load->view('frontend/includes/form_errors.php'); ?>
			<form action="<?php echo current_url(); ?>" class="uniForm clearfix" method="post" enctype="multipart/form-data">
			    <fieldset class="inlineLabels">
			    	
					<div class="ctrlHolder clearfix<?php if(form_error('contact[name]')!='') echo ' error';?>">
						<?php echo form_label('Nume', 'contact_name'); ?>
						<?php echo form_input(array('name'=>'contact[name]', 'id'=>'contact_name', 'value'=> set_value('contact[name]'), 'class'=>'textInput', 'style'=>'width: 180px;')); ?>
					</div>
					
					<div class="ctrlHolder clearfix<?php if(form_error('contact[email]')!='') echo ' error';?>">
						<?php echo form_label('Email', 'contact_email'); ?>
						<?php echo form_input(array('name'=>'contact[email]', 'id'=>'contact_email', 'value'=> set_value('contact[email]'), 'class'=>'textInput', 'style'=>'width: 180px;')); ?>
					</div>
			
					<div class="ctrlHolder clearfix<?php if(form_error('contact[message]')!='') echo ' error';?>">
						<?php echo form_label('Mesaj', 'contact_message'); ?>
						<?php echo form_textarea(array('name'=>'contact[message]', 'id'=>'contact_message', 'value'=> set_value('contact[message]'), 'class'=>'textarea', 'rows'=>'5', 'cols'=>'100', 'style'=>'width: 400px;')); ?>
					</div>

			        <div class="buttonHolder">
			            <button type="submit" class="submitButton">
			                <span>Trimite</span>
			            </button>
			        </div>
			    </fieldset>
			</form>
					
			<div id="content-right">

			</div>
			<br/><br/><br/>
</div>
				