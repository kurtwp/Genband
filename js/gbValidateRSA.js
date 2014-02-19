// --- Is RSA Name Present ---
    function validateRSAName(name) {
        if (name != "") {
            return "";
        } else {
            return "Please Enter a Realm Name! \n";
        }
    }
// --- Is RSA VNET Name Present ---
    function validateRSAVnet(vnet) {
        if ((vnet != "")) {
            return "";
        } else {
            return "Please Enter VNET Name! \n";
        }
    }
// --- Validate RSA IP ---
    function validateRSAIP(ip) {
        var regexp = /^((1?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(1?\d{1,2}|2[0-4]\d|25[0-5])$/;
		if (ip == "NA") {
			return "";
		}
		if (ip != "") {
			if (ip.match(regexp)) {
				return "";
			} else {
				return "Please enter a Valid IP address! \n";
			}
		} else {
			return "Please enter a IP address! \n";
		}
	}
// --- Validate Subnet Mask ---
    function validateRSAMask(mask) {
        var firstOctect = 0;
        var octect = [0,128,192,224,240,248,252,254,255];
        
        var tempArray = mask.split(".");
        var arrayCount = tempArray.length;
        if (arrayCount < 4 || arrayCount > 4) {
            return "Invalid Subnet mask \n";
        }
        if (arrayCount == 4) {
            for (i=0;i<4;i++) {
                if (i == 0) {
                    if (firstOctect == tempArray[0]) {
                        return "First Mask Octect in Invalid! \n";
                    }
                    for (k=1;k<4;k++) {
                        for (o=0;o<10;o++) {
                            if (tempArray[k] == octect[o]) {
                                var value = 1;
                                break;
                            } else {
                                var value = 0;
                            }
                        }
                        if (value == 0 && o == 10) {
                            return "Invalid Subnet Mask"
                        }
                    }
                }
            }
        }
        return "";
    }
    
function gbValidateRSA(form) {
    fail = validateRSAName(form.rsaName.value)
    fail += validateRSAVnet(form.rsaVnet.value)
    fail += validateRSAIP(form.rsaIP.value)
    fail += validateRSAMask(form.rsaMask.value)
    if (fail == "") {
        return true;
    } else {
        alert(fail);
        return false;
    }
}