<?php

if(!function_exists('get_status'))
{
    function get_status($val)
    {
        if($val ==1)
        {
            return "Activate";
        }
        else if($val ==0)
        {
            return "Deactivate";
        }
    }
}

if(!function_exists('get_average'))
{
    function get_average($arr)
	{
	  $sum = 0;
	  $num = 0;
	  foreach($arr as $val)
	  {
	    if(isset($val) && $val >0)
	    {
	      $sum +=$val;
	      $num++; 
	    }
	  }
	  if($sum>0)
	  {
		return $sum/$num;
	  }
	  else
	  {
		return 0;
	  }
	}
}

?>