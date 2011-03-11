<?php if (validation_errors()!='' || isset($errors)): ?>
	<div class="errorMsg">
	    <div>
	        Eroare completare formular
	    </div>
	    <ol>
	    <?php 
	    	if(validation_errors()!='') 
	    	{
	        	echo validation_errors('<li>','</li>');
	    	}
	    	if (isset($errors))
	    	{
	    		if (is_array($errors))
	    		{
		    		foreach ($errors as $error)
		    		{
		    			echo '<li>'.$error.'</li>';
		    		}
	    		}
	    		else echo $errors;
	    	}
	    ?>	
	     </ol>
	    
	</div>
<?php endif; ?>