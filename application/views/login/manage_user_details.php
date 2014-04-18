<div id="user-form" class="span12">
<script type="text/javascript" language="javascript" src="<?=JS_PATH?>manage_user_details.js"></script>

<?php echo $topMenu;   
	if($this->session->userdata(usertype) == 1) { ?>
<script type="text/javascript" >
$(document).ready(function(){
	$('#prefix').val('<?=$user_details->prefix ;?>');
	$('#communication').val('<?=$user_details->communication ;?>');
	$('#e_prefix').val('<?=$user_details->e_prefix ;?>');
});

</script>



<div  id="e_div"> 
	<form method="post" action="" enctype="multipart/form-data" name="e_form" id="e_form">
 <div class="span6">
  <fieldset id="your_info_fields">
 <legend>School Information</legend> 
<p class="form-tip">&nbsp;</p>

<ul>
    <li><label class="required small-label" for="providers-name">School Name *</label>
    <input  type="text" id="schoolname" name="schoolname" value="<?=$user_details->schoolname ;?>"></li>
 
    <li><label class="required small-label" for="address" id="providers-school_address">Address Line 1*</label>
    <input  type="text" name="add1" id="add1" value="<?=$user_details->add1 ;?>"></li>
    
    <li><label class="small-label" for="address_cont" id="providers-school_address_cont">Address Line 2</label>
    <input  type="text" name="add2" id="add2" value="<?=$user_details->add2 ;?>"></li>
    
    <li><label class="required small-label" for="city" id="providers-school_city">City *</label>
    <input  type="text" name="city" id="city" value="<?=$user_details->city ;?>"></li>
    
    <li><label class="required small-label" for="state" id="providers-school_state">State</label>
    <input  type="text" name="state" id="state" value="<?=$user_details->state ;?>"></li>
    
    <li><label class="required small-label" for="zip_code" id="providers-zip_code">Zip Code *</label>
    <input  type="text" name="zipcode" id="zipcode" value="<?=$user_details->zipcode ;?>"></li>
   
    <li><label class="required small-label" for="phone">School Phone *</label>
    <input  type="text" name="schoolphone" id="schoolphone"  value="<?=$user_details->schoolphone;?>"></li>
    
    <li><label class="small-label" for="providers-fax">School Fax </label>
    <input  type="text" id="schoolfax" name="schoolfax" value="<?=$user_details->schoolfax ;?>"></li>
    
    <li><label class="small-label" for="providers-facebook">District</label>
    <input  type="text" id="district" name="district" value="<?=$user_details->district ;?>"></li>
    
    <li><label class="small-label" for="providers-facebook">Track</label>
    <input  type="text" id="track" name="track" value="<?=$user_details->track ;?>"></li>
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
   <input   type="text" name="first" value="<?=$user_details->first ;?>" id="first">  </li>
   
    <li>
   <label class="required small-label" for="last_name">Middle</label>
   <input   type="text" name="middle" value="<?=$user_details->middle ;?>" id="middle">  </li>
   
  <li>
   <label class="required small-label" for="last_name">Last Name*</label>
   <input   type="text" name="last" value="<?=$user_details->last ;?>" id="last">  </li>
   
   <li>
   <label class="required small-label" for="last_name">Title</label>
   <input   type="text" name="title" value="<?=$user_details->title ;?>" id="title">  </li>
   
   <li>
   <label class="small-label" for="cell_phone">Work Phone *</label>
   <input   type="text" name="workphone" id="workphone" value="<?=$user_details->workphone ;?>">   </li>
   
   <li>
   <label class="small-label" for="cell_phone">Cell Phone *</label>
   <input   type="text" name="cellphone" id="cellphone" value="<?=$user_details->cellphone ;?>">   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Fax *</label>
   <input   type="text" name="e_fax" id="e_fax" value="<?=$user_details->e_fax ;?>">   </li>
     <li>
   <label class="required small-label" for="email">Email Address *</label>
   <input  type="text" name="email" value="<?=$user_details->email ;?>" id="email">
    <input  type="hidden" name="old_email" value="<?=$user_details->email ;?>" id="old_email">
   <p class="form-tip">&nbsp;</p>   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Grade Level *</label>
   <input   type="text" name="gradelevel" id="gradelevel" value="<?=$user_details->gradelevel ;?>">   </li>
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
   <input   type="text" name="e_first" value="<?=$user_details->e_first ;?>" id="e_first">  </li>
   
    <li>
   <label class="required small-label" for="last_name">Middle</label>
   <input   type="text" name="e_middle" value="<?=$user_details->e_middle ;?>" id="e_middle">  </li>
   
  <li>
   <label class="required small-label" for="last_name">Last Name*</label>
   <input   type="text" name="e_last" value="<?=$user_details->e_last ;?>" id="e_last">  </li>
   
   <li>
   <label class="required small-label" for="last_name">Title</label>
   <input   type="text" name="e_title" value="<?=$user_details->e_title ;?>" id="e_title">  </li>
   
   <li>
   <label class="small-label" for="cell_phone">Work Phone *</label>
   <input   type="text" name="a_phone" id="a_phone" value="<?=$user_details->e_workphone ;?>">   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Fax *</label>
   <input   type="text" name="a_fax" id="a_fax" value="<?=$user_details->a_fax;?>">   </li>
   
	
    <li>
   <label class="required small-label" for="email">Email *</label>
   <input  type="text" name="e_email" value="<?=$user_details->e_email ;?>" id="e_email">
   <p class="form-tip">&nbsp;</p>   </li>
   
 </ul>
</fieldset>

  
</div><!--END .span6.last-->

 
  
 <div id="submit_fields" class="span12" >
 	<input type="submit" name='submit'  value="Manage Account">
	<p class="required">Required Fields</p> 
 </div>
</form>
</div> <!--  end of enrollment div-->

<?php } else {?>

<script type="text/javascript" >
$(document).ready(function(){
	$('#prefix').val('<?=$user_details->prefix ;?>');
	$('#addresstype').val('<?=$user_details->addresstype ;?>');
	$('#prefered_phone').val('<?=$user_details->prefered_phone ;?>');
	$('#communication').val('<?=$user_details->communication ;?>');
	$("input[name='agegroup'][value='<?=$user_details->agegroup ;?>']").prop('checked', true);
	 <?php  $values=explode('-',$user_details->availabledays);
	 		foreach($values as $value){
	 ?>
			$("#availabledays option[value='<?=$value; ?>']").attr("selected", true);
			
	<?php 		}	?>
	
 
	 
	 


});

</script>

<div id="v_div"  >
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
   <input   type="text" name="first" value="<?=$user_details->first ;?>" id="first">  </li>
   
    <li>
   <label class="required small-label" for="last_name">Middle</label>
   <input   type="text" name="middle" value="<?=$user_details->middle ;?>" id="middle">  </li>
   
  <li>
   <label class="required small-label" for="last_name">Last Name*</label>
   <input   type="text" name="last" value="<?=$user_details->last ;?>" id="last">  </li>

    <li><label class="required small-label" for="providers-name">Company</label>
    <input  type="text" id="company" name="company" value="<?=$user_details->company ;?>"></li>
    
    <li><label class="required small-label" for="providers-name">Job Title</label>
    <input  type="text" id="title" name="title" value="<?=$user_details->title ;?>"></li>
 
 
    <li><label class="required small-label" for="address" id="providers-school_address">Address Line 1*</label>
    <input  type="text" name="add1" id="add1" value="<?=$user_details->add1 ;?>"></li>
    
    <li><label class="small-label" for="address_cont" id="providers-school_address_cont">Address Line 2</label>
    <input  type="text" name="add2" id="add2" value="<?=$user_details->add2 ;?>"></li>
    
    <li><label class="required small-label" for="city" id="providers-school_city">City *</label>
    <input  type="text" name="city" id="city" value="<?=$user_details->city ;?>"></li>
    
    <li><label class="required small-label" for="state" id="providers-school_state">State</label>
    <input  type="text" name="state" id="state" value="<?=$user_details->state ;?>"></li>
    
    <li><label class="required small-label" for="zip_code" id="providers-zip_code">Zip Code *</label>
    <input  type="text" name="zipcode" id="zipcode" value="<?=$user_details->zipcode ;?>"></li>
   
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
   <input   type="text" name="workphone" id="workphone" value="<?=$user_details->workphone ;?>">   </li>
   
   <li>
   <label class="small-label" for="cell_phone">Cell Phone</label>
   <input   type="text" name="cellphone" id="cellphone" value="<?=$user_details->cellphone ;?>">   </li>
   
    <li>
   <label class="small-label" for="cell_phone">Home Phone</label>
   <input   type="text" name="h_phone" id="h_phone" value="<?=$user_details->h_phone ;?>">   </li>
   
	
    <li>
   <label class="required small-label" for="email">Email Address *</label>
   <input  type="text" name="email" value="<?=$user_details->email ;?>" id="email">
   <input  type="hidden" name="old_email" value="<?=$user_details->email ;?>" id="old_email">
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
 
  
 <div id="submit_fields" class="span12" >
 

 	<input type="submit" name='submit'  value="Manage Account">
	<p class="required">Required Fields</p> 
 </div>
</form>
</div> <!--  end of Volunteer div-->

<?php }?>

</div>
