<script type="text/javascript" language="javascript" src="<?=JS_PATH?>login.js"></script>
<script type="text/javascript">var activation_key = '<?php echo $activation_key; ?>';</script>

<a href="<?=base_url()."login/signup/";?>" >Sign Up</a>
<a href = "javascript:void(0)" class="login_links_on" > Sign in</a>

<div id="login_div" style="display:none; margin-top:30px;">
<p style="display:none" id='registered_div'>Please login to activate your account</p>
User Name   <input type="text" name="userid" id="userid" value="<?php if(!empty($_COOKIE["Cuname"]))echo $_COOKIE["Cuname"]; ?>" /> <br/>
Password <input type="password"  name="password" id="password" value="<?php if(!empty($_COOKIE["Cpassword"]))echo $_COOKIE["Cpassword"]; ?>" />
<br/>

<samp><input name="" type="checkbox" value="" id="remember" />Remember Me</samp> <br/>
<input type="hidden" name="r_key" value="<?php echo $activation_key; ?>" id="r_key" />

<input type="button" name="login" id="login" value="login" class="check_login" />
<samp class="serror error_mess" style="color:red !important; font-size:11px !important;"></samp>

 <div class="bottom_box">
        	Forgot your password? <a href="javascript:void(0)"  id="forget_pwd" >click here</a>
        </div>
</div>

<div id="forget_box" style="display:none; margin-top:30px;">   
    <h3 style="margin-right:10px">Forgot Password</h3>
    <div class="login_main" id="">	
		 <div class="left_box" style="height:159px !important;">
             <span id="Ferror"></span><span id="Ferror2" style='color:green !important;'></span>
    	    <div class="textbox"><input name="" id="email" type="text" placeholder="Email" /></div>	       
            <div class="login">
				<input name="Fsubmit" type="button" value="Submit" class="Fcheck_user" />
			</div>
			<div class="login">
    		 	<input name="Fcancel" type="button" value="Cancel" class="Fcheck" id="Fcancel" /></div>
        	</div>
	</div>
</div>



