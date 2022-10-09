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

?>