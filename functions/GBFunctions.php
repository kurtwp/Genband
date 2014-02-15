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
// Validate Port Numbers and Positive Numbers only
function validatePort($port) {
    
    // Reg Ex checks for postive numbers only
    $regexp = '/^\d+$/';
    $arraySize = count($port);
    for ($f=0; $f<$arraySize; $f++) {
        if ($port[$f] != "") {
            if (preg_match($regexp, $port[$f]))
            {
               
            } else {
                return "Port number must be all numbers !";
            }
        } else {
            return "Please enter a Port Number !<br />";
        }
    }
    return;
}
// Compare Port Count with Realm Count
function compareRSACount($PCount,$RCount) {
    if ($PCount != $RCount) {
        if ($RCount ==1 ) {
            return "";
        } else {
            return "Missing Realm or Ports";
        }
    }
    return "";
}
// Compare Port Count with URI Count
function compareURICount($PCount,$UCount) {
    if ($PCount != $UCount) {
        if ($UCount ==1 ) {
            return "";
        } else {
            return "Missing URI or Ports";
        }
    }
    return "";
}
?>
