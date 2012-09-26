<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
    <div style="margin: 0 auto; width: 200px; height: 400px;">
        <?php
        $this->load->helper('form');
        echo validation_errors();
        echo form_open('login-form');
        ?>

        <h1>ADMINISTRARE</h1>
    <br/>
        <h2>Logheaza-te aici</h2>
<table>
     <tr>
         <td>Email</td>
         <td> <input type="text" class="camp" name="email" value="<?php echo set_value('email');?>"   /></td>
     </tr>
    <tr>
       <td> Parola</td>
      <td>  <input type="password" class="camp" name="password" value="<?php echo set_value('password'); ?>" />
      </td>
    </tr>
    <tr>

        <td colspan="2" style="text-align: right;">
            <input type="submit" value="Login" style="background-color: #acb139; width: 50px; height: 20px;" />

        </td>
    </tr>


        </form>
</div>
</table>
    </div>




        <div class="clearBoth"></div>
