<?php
// first chek if funciton is already exists or not
if(!function_exists('date_difference')) {
	// so function demo is not existed //
	function date_difference($date1, $date2)
	{
		$days = (strtotime($date1) - strtotime($date2)) / (60 * 60 * 24);
		return $days;
	}
	
	
	function todaydate()
	{
		
		$datestring="%Y-%m-%d";
		$time = time();
        //load date helper in controller
		$tdate=mdate($datestring, $time);
		
		return $tdate;
	}
	
	function present_time()
	{
		
		$timestring = "%h:%i:%a";
		$now = time();
		$present_time=mdate($timestring, $now);
		
		return $present_time;
	}
}

if(!function_exists('date_conversion')) {
    function date_conversion($or_date){
        
    $dob= explode(' ',$or_date);
    $dobmonth=date('m', strtotime($dob[1]));
    $dobval=$dob['2'].'-'.$dobmonth.'-'.$dob['0'];   
     
    return $dobval;
    }
}
//returns Age from Dob
if(!function_exists('age_conversion')) {
	function age_conversion($bithdayDate)
	{
		//$date = new DateTime($bithdayDate);
		//$now = new DateTime();
		//$interval = $now->diff($date);
		$then = date('Ymd', strtotime($bithdayDate));
    	$diff = date('Ymd') - $then;
    	return substr($diff, 0, -4);
		//echo $bithdayDate.'vaule'.$interval->y;exit;
		//return $interval->y;
	}
}

function d($res)
{
    echo "<pre>";print_r($res);echo "</pre>";
}
  
function e($res)
{
    echo "<pre>";print_r($res);echo "</pre>";exit;
}

