<script type="text/javascript"  src="<?=JS_PATH?>jquery.js"></script>
<script type="text/javascript"  src="<?=JS_PATH?>table/jquery.dataTables1.js"></script>	
<script type="text/javascript"  src="<?=JS_PATH?>table_sorter.js"></script>	

 
<script>
    $(document).ready(function(){ 
        $("#search_data_previous").hide(); 
		
		$("#list_user").dataTable({
        	"sPaginationType": "full_numbers",
			"bDestroy": true

        }); 
		
		$('.checkbox_class').change(function(){
			var user_id=$(this).attr('id');
			var user_status=( $( this ).is( ":checked" ) )?'0':'1'; 
			
			 $.post(baseurl+'remote/change_user_status', {user_id: user_id, user_status: user_status }, function(response)
             {  //alert(response);
                alert('User Status has been changed sucessfully....');
            });
			
		});  
    });
  
 
</script>

<section id="main" class="column">
			<article class="module width_full">        
		<header>
        	<h3 class="tabs_involved">Users List</h3>
        </header>
           
		 <div class="tab_container"></div>
          
            <input id="volunteers" type="checkbox" checked="checked">
          	<input id="teachers" type="checkbox" checked="checked">
          <div class="clear"></div> 
          <div id="filers_list" style="float: none; width:25%; display:block; position:absolute; z-index:1; margin:13px 0 0 250px; display:none;">
           <input type="checkbox" id="active" onclick="filter('active')">Active
           <input type="checkbox" id="Inactive" onclick="filter('Inactive')">Inactive
           </div>
         <div id="final">
         	<div class='tab_container'><div id='tab1' class='tab_content'>  
                <table id='list_user' class='tablesorter'>
                <thead><tr> <th>Name</th><th>Email</th> <th>Details</th> <th>Active</th> <th >status</th> </tr> </thead>
                <tbody>               
                <?php    foreach($users as $user) {?>		
                <tr >
                <td><?=$user->prefix.' '.$user->first.' '.$user->middle.' '.$user->last ?></td>
                <td><?= $user->email ?></td>  
                <td><?= $user->workphone  ?> <br/> Cell Phone<?= $user->cellphone  ?></td> 
                <td><?PHP if(strlen($user->activation_key) >2)
						  {
						      echo 'Registered User';
						  }else{
						  	$status=($user->activation_key == '0')? 'checked="checked"':''; ?>
                            <input type='checkbox' class="checkbox_class" id="<?= $user->id  ?>"  <?= $status  ?>>
						  		
					<?php	  }   ?>
				</td>
                <td > <?= $user->usertype; ?> </td>
                </tr>
                <?php  } ?>	
                 
                </tbody>
                </table>
             </div>
         
         
         
         </div>
         
		</article>		
	<div class="spacer"></div>
</section>

          <div class="clear"></div>

<!-- popup -->
<div class="backdrop"></div>
	<div class="box">
    <div class="close"><a href="javascript:void(0);"><img src="<?=IMAGE_PATH?>icn_alert_error.png" alt="close" border="0" /></a></div>
	   <div id="users"></div>       
       <div id="banks"></div>
	   <div id="stds"></div>
       <div id="insts"></div>
<div class="clear"></div>
        
	</div>
<!-- popup -->