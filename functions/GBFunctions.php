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
// Validate Subnet MAsk
function validateMask($mask) {
    $firstOctet = 0;
    $octet = [0,128,192,224,240,248,252,254,255];
    
    $tempOctet = explode(".",$mask);
    $arrayCount = count($tempOctet);
    if ($arrayCount < 4 || $arrayCount > 4) {
        return "Invalid Subnet Mask! <be />";
    }
    if ($arrayCount == 4) {
        for ($i = 0; $i<$arrayCount; $i++) {
            if ($i == 0) {
                if ($firstOctet == $tempOctet[0]) {
                    return "First Mask Octet is Invalid! <br />";
                }
                $i = 1;
            }
            for ($k=0;$k<9;$k++) {
                if ($tempOctet[$i] == $octet[$k]) {
                    $value = 1;
                    break;
                } else {
                    $value = 0;
                    echo $value;
                }
                
            }
            if ($value == 0 && $k == 9) {
                    return "Invalid Subnet Mask! <br />";
                }
        }
    }
    return "";
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
                return "Port number must be all numbers !<br />";
            }
        } else {
            return "Please enter a Port Number !<br />";
        }
    }
    return;
}
// Validate Media Pool ID
function validateMP($pool) {
    // Reg Ex checks for postive numbers only
    $regexp = '/^\d+$/';
    if ($pool != "") {
        if (preg_match($regexp, $pool)) {
            return "";            
        } else {
            return "Media Pool ID must be a Positive Number! <br />";
        }
    } else {
        return "Please Enter in a Media Pool Number! <br />";
    }
}
// Validate Realm
    function validateRSA($rsa) {
        if ($rsa != "") {
            return "";
        } else {
            return "Please Enter a Realm name! <br />";
        }
    }
// Validate VNet
    function validateVNet($vnet) {
        if ($vnet != "") {
            return "";
        } else {
            return "Please Enter a VNet name! <br />";
        }
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
