<script type="text/javascript" language="javascript" src="<?=JS_PATH?>signup.js"></script>

<div id="user-form" class="span12">

<fieldset>
   <legend class="required">I am a:</legend>
   <label class="radio" for="type-teacher">
    <input type="radio" id="type-teacher" name="type" value="1" class="usertype">Teacher</label>
   <label class="radio" for="type-provider">
    <input type="radio" id="type-provider" name="type" value="2" class="usertype">Volunteer</label>
 </fieldset>
<div style="display:none" id="e_div"> 
	<form method="post" action="" enctype="multipart/form-data" name="e_form" id="e_form">
    <input type="hidden" name="usertype" value="1" id="e_type"/>
 <div class="span6">
  <fieldset id="your_info_fields">
 <legend>School Information</legend> 
<p class="form-tip">&nbsp;</p>

<ul>
    <li><label class="required small-label" for="providers-name">School Name *</label>
    <input  type="text" id="schoolname" name="schoolname" value=""></li>
 
    <li><label class="required small-label" for="address" id="providers-school_address">Address Line 1*</label>
    <input  type="text" name="add1" id="add1" value=""></li>
    
    <li><label class="small-label" for="address_cont" id="providers-school_address_cont">Address Line 2</label>
    <input  type="text" name="add2" id="add2" value=""></li>
    
    <li><label class="required small-label" for="city" id="providers-school_city">City *</label>
    <input  type="text" name="city" id="city" value=""></li>
    
    <li><label class="required small-label" for="state" id="providers-school_state">State</label>
    <input  type="text" name="state" id="state" value=""></li>
    
    <li><label class="required small-label" for="zip_code" id="providers-zip_code">Zip Code *</label>
    <input  type="text" name="zipcode" id="zipcode" value=""></li>
   
    <li><label class="required small-label" for="phone">School Phone *</label>
    <input  type="text" name="schoolphone" id="schoolphone"  value=""></li>
    
    <li><label class="small-label" for="providers-fax">School Fax </label>
    <input  type="text" id="schoolfax" name="schoolfax" value=""></li>
    
    <li><label class="small-label" for="providers-facebook">District</label>
    <input  type="text" id="district" name="district" value=""></li>
    
    <li><label class="small-label" for="providers-facebook">Track</label>
    <input  type="text" id="track" name="track" value=""></li>
    </ul>


  
</fieldset>

  
</div><!--END .span6-->  

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Contact Information</legend> 
	<p class="form-tip">&nbsp;</p>
 <ul>
        
      <li>
   <label class="required small-label" for="first_name">Prefix</label>
   <select  name="prefix" id="prefix">
    <option value="">Select option</option>
     <option value="Mr">Mr.</option>
     <option value="Ms">Ms.</option>
     <option value="Mrs">Mrs.</option>
   </select>   </li>
    	<li>
   <label class="required small-label" for="first_name">First Name*</label>
   <input   type="text" name="first" value="" id="first">  </li>
   
    <li>
   <label class="required small-label" for="last_name">Middle</label>
   <input   type="text" name="middle" value="" id="middle">  </li>
   
  <li>
   <label class="required small-label" for="last_name">Last Name*</label>
   <input   type="text" name="last" value="" id="last">  </li>
   
   <li>
   <label class="required small-label" for="last_name">Title</label>
   <input   type="text" name="title" value="" id="title">  </li>
   
   <li>
   <label class="small-label" for="cell_phone">Work Phone *</label>
   <input   type="text" name="workphone" id="workphone" value="">   </li>
   
   <li>
   <label class="small-label" for="cell_phone">Cell Phone *</label>
   <input   type="text" name="cellphone" id="cellphone" value="">   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Fax *</label>
   <input   type="text" name="e_fax" id="e_fax" value="">   </li>
     <li>
   <label class="required small-label" for="email">Email Address *</label>
   <input  type="text" name="email" value="" id="email">
   <p class="form-tip">&nbsp;</p>   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Grade Level *</label>
   <input   type="text" name="gradelevel" id="gradelevel" value="">   </li>
    <li>
    
   <label class="small-label" for="cell_phone">Preferred method of communication *</label>
   <select  id="communication" name="communication">
     <option value="">Select option</option>
     <option value="1">Work Phone</option>
     <option value="2">Cell Phone</option>
     <option value="3">Fax</option>
     <option value="4">Email</option>
   </select>   </li>
  
</ul>
</fieldset>

  
</div><!--END .span6.last-->

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Authorizing Administrator</legend> 
	<p class="form-tip">&nbsp;</p>
 <ul>
        
      <li>
   <label class="required small-label" for="first_name">Prefix</label>
   <select  id="e_prefix" name="e_prefix">
    <option value="">Select option</option>
     <option value="Mr">Mr.</option>
     <option value="Ms">Ms.</option>
     <option value="Mrs">Mrs.</option>
   </select>   </li>
    	<li>
   <label class="required small-label" for="first_name">First Name*</label>
   <input   type="text" name="e_first" value="" id="e_first">  </li>
   
    <li>
   <label class="required small-label" for="last_name">Middle</label>
   <input   type="text" name="e_middle" value="" id="e_middle">  </li>
   
  <li>
   <label class="required small-label" for="last_name">Last Name*</label>
   <input   type="text" name="e_last" value="" id="e_last">  </li>
  
   <li>
   <label class="required small-label" for="last_name">Title</label>
   <input   type="text" name="e_title" value="" id="e_title">  </li>
   
   <li>
   <label class="small-label" for="cell_phone">Work Phone *</label>
   <input   type="text" name="a_phone" id="a_phone" value="">   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Fax *</label>
   <input   type="text" name="a_fax" id="a_fax" value="">   </li>
   
	
    <li>
   <label class="required small-label" for="email">Email *</label>
   <input  type="text" name="e_email" value="" id="e_email">
   <p class="form-tip">&nbsp;</p>   </li>
   
 </ul>
</fieldset>

  
</div><!--END .span6.last-->

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Password</legend> 
	<p class="form-tip">&nbsp;</p>
 <ul>
        
   <li>
   <label class="required small-label" for="password">User Name</label>
   <input   type="text" name="username" value="" id="username">  </li>  
     
    
  <li>
   <label class="required small-label" for="password">Choose a Password</label>
   <input   type="password" name="password" value="" id="password">  </li>
   
  <li>
   <label class="required small-label" for="password_confirmation">Retype Password</label>
   <input  type="password" name="repassword" value="" id="repassword">  </li>
 </ul>
</fieldset>

  
</div><!--END .span6.last-->
  
 <div id="submit_fields" class="span12" >
 
 <span class="inputtext3">
<div id="captcha_e"></div>
</span>
<span class="inputtext6">
 <div class="number">
     <a href="javascript:void(0);"><img src="<?php echo $version; ?>images/refresh.png" alt="refresh" style="float:left;" border="0" width="28" height="28" class="create_captcha" />
     </a>
 </div>
</span>
<samp></samp>
<span class="entertextbox">
    <input name="captcha_word_e" id="captcha_word_e" type="text" placeholder="Enter the text from above image" class="form-poshytip" title="Enter the text as shown in the above image">
	  <div class="error_mess"></div>
</span>
<p>
 
</p>
<div class="error_7">

<span class="inputtext3" style=" color:red;font: 76.25% arial, helvetica, sans-serif;" id="captcha_error_e"></span>
</div>
 
 	<input type="submit" name='submit'  value="Create Account">
	<p class="required">Required Fields</p> 
 </div>
</form>
</div> <!--  end of enrollment div-->

<div id="v_div"  style="display:none">
	<form method="post" action="" enctype="multipart/form-data" name="volunteer_form" id="volunteer_form">
    <input type="hidden" name="usertype" value="2" id="v_type"/>
 <div class="span6">
  <fieldset id="your_info_fields">
 <legend>Name and Address </legend> 
<p class="form-tip">&nbsp;</p>



<ul>
	 <li>
   <label class="required small-label" for="first_name">Prefix</label>
   <select name="prefix" id="prefix">
    <option value="">Select option</option>
     <option value="Mr">Mr.</option>
     <option value="Ms">Ms.</option>
     <option value="Mrs">Mrs.</option>
   </select>   </li>
    	<li>
   <label class="required small-label" for="first_name">First Name*</label>
   <input   type="text" name="first" value="" id="first">  </li>
   
    <li>
   <label class="required small-label" for="last_name">Middle</label>
   <input   type="text" name="middle" value="" id="middle">  </li>
   
  <li>
   <label class="required small-label" for="last_name">Last Name*</label>
   <input   type="text" name="last" value="" id="last">  </li>

    <li><label class="required small-label" for="providers-name">Company</label>
    <input  type="text" id="company" name="company" value=""></li>
    
    <li><label class="required small-label" for="providers-name">Job Title</label>
    <input  type="text" id="title" name="title" value=""></li>
 
 
    <li><label class="required small-label" for="address" id="providers-school_address">Address Line 1*</label>
    <input  type="text" name="add1" id="add1" value=""></li>
    
    <li><label class="small-label" for="address_cont" id="providers-school_address_cont">Address Line 2</label>
    <input  type="text" name="add2" id="add2" value=""></li>
    
    <li><label class="required small-label" for="city" id="providers-school_city">City *</label>
    <input  type="text" name="city" id="city" value=""></li>
    
    <li><label class="required small-label" for="state" id="providers-school_state">State</label>
    <input  type="text" name="state" id="state" value=""></li>
    
    <li><label class="required small-label" for="zip_code" id="providers-zip_code">Zip Code *</label>
    <input  type="text" name="zipcode" id="zipcode" value=""></li>
   
    <li><label class="required small-label" for="phone">Address Type *</label>
    <select name="addresstype" id="addresstype">
    <option value="">Select option</option>
     <option value="1">Home</option>
     <option value="2">Work</option>
     <option value="3">Mailing</option>
   </select> 
    </li>
    
     
    </ul>


  
</fieldset>

  
</div><!--END .span6-->  

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Contact Information</legend> 
	<p class="form-tip">&nbsp;</p>
 <ul>
  <li>
   <label class="small-label" for="cell_phone">Work Phone</label>
   <input   type="text" name="workphone" id="workphone" value="">   </li>
   
   <li>
   <label class="small-label" for="cell_phone">Cell Phone</label>
   <input   type="text" name="cellphone" id="cellphone" value="">   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Home Phone</label>
   <input   type="text" name="h_phone" id="h_phone" value="">   </li>
   
	
    <li>
   <label class="required small-label" for="email">Email Address *</label>
   <input  type="text" name="email" value="" id="email">
   <p class="form-tip">&nbsp;</p>   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Preferred phone number *</label>
   <select name="prefered_phone" id="prefered_phone">
    <option value="">Select option</option>
     <option value="1">Home</option>
     <option value="2">Work</option>
     <option value="3">Cell</option>
   </select>   </li>
    <li>
    
   <label class="small-label" for="cell_phone">Preferred method of communication *</label>
   <select name="communication" id="communication">
    <option value="">Select option</option>
     <option value="1">Phone</option>
     <option value="2">Email</option>
   </select>   </li>
  
</ul>

</fieldset>

  
</div><!--END .span6.last-->

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Availability</legend> 
	<p class="form-tip">&nbsp;</p>
 <ul>
        
      <li>
   <label class="required small-label" for="first_name">Are you over 18: *  </label>
   Yes <input name="agegroup" type="radio" value="1" /> No <input name="agegroup" type="radio" value="0" />
     </li>
    	<li>
   <label class="required small-label" for="first_name">What days are you available *</label>
   <select name="availabledays[]" id="availabledays" multiple="true" >
    <option value="">Select option</option>
     <option value="1">Monday</option>
     <option value="2">Tuesday</option>
     <option value="3">Wednesday</option>
      <option value="4">Thursday</option>
     <option value="5">Friday</option>
     <option value="6">Saturday</option>
     <option value="7">Sunday</option>
   </select>   </li>
    
 </ul>
</fieldset>

  
</div><!--END .span6.last-->

<div class="span6">
  <fieldset id="your_info_fields">
 <legend>Password</legend> 
	<p class="form-tip">&nbsp;</p>
 <ul>
        
   <li>
   <label class="required small-label" for="password">User Name qq</label>
   <input   type="text" name="username" value="" id="username_v">  </li>     
    
  <li>
   <label class="required small-label" for="password">Choose a Password</label>
   <input   type="password" name="password" value="" id="password_v">  </li>
   
  <li>
   <label class="required small-label" for="password_confirmation">Retype Password</label>
   <input  type="password" name="repassword" value="" id="repassword_v">  </li>
 </ul>
</fieldset>

  
</div><!--END .span6.last-->
  
 <div id="submit_fields" class="span12" >
 
 <span class="inputtext3">
<div id="captcha_v"></div>
</span>
<span class="inputtext6">
 <div class="number">
     <a href="javascript:void(0);"><img src="<?php echo $version; ?>images/refresh.png" alt="refresh" style="float:left;" border="0" width="28" height="28" class="create_captcha" />
     </a>
 </div>
</span>
<samp></samp>
<span class="entertextbox">
    <input name="captcha_word_v" id="captcha_word_v" type="text" placeholder="Enter the text from above image">
	  <div class="error_mess"></div>
</span>
<p>

</p>
<div class="error_7">

<span class="inputtext3" style=" color:red;font: 76.25% arial, helvetica, sans-serif;" id="captcha_error_v"></span>
</div>
 
 	<input type="submit" name='submit'  value="Create Account">
	<p class="required">Required Fields</p> 
 </div>
</form>
</div> <!--  end of Volunteer div-->



</div>
