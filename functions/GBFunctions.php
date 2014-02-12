<?php

// Validates IP
function validateIP($ip)
{
    $regexp = '/^((1?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(1?\d{1,2}|2[0-4]\d|25[0-5])$/';
    
    if (preg_match($regexp, $ip))
    {
        return "";
    } elseif ($ip == "") {
	return "Please enter an IP address ! <br />";
    } else {
	return $ip . " is not a valid IP address ! <br />";
    }
}
function validatePort($port) {
    
    // Reg Ex checks for postive numbers only
    $regexp = '/^\d+$/';
    
    if ($port != "") {
        if (preg_match($regexp, $port))
        {
            return "";
        } else {
            return "Port number must be all numbers !";
        }
    } else {
        return "Please enter a Port Number !<br />";
    }
}
?>