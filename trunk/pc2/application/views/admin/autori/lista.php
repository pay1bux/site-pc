<h2>Lista Autorilor</h2>
<br />
    <p > <a href="<?php echo BASE_URL();?>index.php/admin/adauga-autori/">(+) Adauga autor</a> </p>
<br />
    
<table class="lista">
      <?php
            foreach($autori as $autor)
            {?>

                   <tr >
                      <td class="lista" >
                         <?php echo $autor['nume']; ?> <br /><?php
                    ?></td>
                       <td class="lista">
                         <center>  <a href="<?php echo BASE_URL();?>index.php/admin/editeaza-autori/<?php echo $autor['id']; ?>" />EDIT</center>
                       </td>
                       <td class="lista">
                          <center>DELETE</center> 
                       </td>
                   </tr>
      <?php }?>
</table>