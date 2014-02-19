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

function gbValidateRSA(form) {
    fail = validateRSAName(form.rsaName.value)
    fail += validateRSAVnet(form.rsaVnet.value)
    fail += validateRSAIP(form.rsaIP.value)
    if (fail == "") {
        return true;
    } else {
        alert(fail);
        return false;
    }
}