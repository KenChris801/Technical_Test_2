<?php

class Global_function {

	function secondsToTime($inputSeconds) 
	{
	    $secondsInAMinute = 60;
	    $secondsInAnHour  = 60 * $secondsInAMinute;
	    $secondsInADay    = 24 * $secondsInAnHour;

	    $days = (int) floor($inputSeconds / $secondsInADay);

	    $hourSeconds = $inputSeconds % $secondsInADay;
	    $hours = (int) floor($hourSeconds / $secondsInAnHour);

	    $minuteSeconds = $hourSeconds % $secondsInAnHour;
	    $minutes = (int) floor($minuteSeconds / $secondsInAMinute);

	    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
	    $seconds = (int) ceil($remainingSeconds);

	    $result = '';
	    if($days>0)
	    {
	    	$result .= $days." days ";
	    }
	    if($hours>0)
	    {
	    	$result .= $hours." hours ";
	    }
	   	if($minutes>0)
	    {
	    	$result .= $minutes." minutes ";
	    }
	    if($seconds>0)
	    {
	    	$result .= $seconds." seconds ";
	    }
	    return $result;
	}
}
?>