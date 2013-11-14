<script type="text/javascript" language="javascript" src="<?=JS_PATH?>change_password.js"></script>
<?php echo $topMenu; 

	 if($this->input->post('submit'))
	 {?>
	 <p> Sucessfully changed the password...</p>
<?php } else { ?>
<form method="post" action=""  name="password_form" id="password_form">

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Password</legend> 
	 
 <ul>
  <li>
   <label class="required small-label" for="password">New Password</label>
   <input   type="password" name="password" value="" id="password">  </li>
   
  <li>
   <label class="required small-label" for="password_confirmation">Retype Password</label>
   <input  type="password" name="repassword" value="" id="repassword">  </li>
 </ul>
</fieldset>

  
</div>

<div id="submit_fields" class="span12" >
 	<input type="submit" name='submit'  value="Change">
</div>
</form>

<?php } ?>