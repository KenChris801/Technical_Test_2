<?php

class Statistic {

	public function average($arr)
	{
    	return ($arr)?array_sum($arr)/count($arr):0;
	}

	public function percentile($percent,$arr)
	{
		sort($arr);
	    $index = ($percent/100)*(count($arr)-1);
	    if (floor($index)==$index) 
	    {
	        $result = ($arr[$index-1]+$arr[$index])/2;
	    }
	    else 
	    {
	        $result = $arr[floor($index)];
	    }
	    return $result;
	}

	public function median($arr)
	{
		if($arr)
		{
	        $count = count($arr);
	        sort($arr);
	        $mid = floor(($count-1)/2);
	        return ($arr[$mid]+$arr[$mid+1-$count%2])/2;
	    }
	    return 0;
	}
}
?>