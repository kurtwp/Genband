// --- Is RSA Name Present ---
    function validateVNetName(name) {
        if (name != "") {
            return "";
        } else {
            return "Please Enter a VNET Name! \n";
        }
    }
// --- Validate RSA IP ---
    function validateVNetIP(ip) {
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
// --- Validate VLAN ID ---
	function validateVNetVLAN(vlan) {
		
		var regexp = /^\d+$/;
		
		if (vlan == "none") {
			return "";
		}
		if (vlan != "") {
			if (vlan.match(regexp)) {
				return "";
			} else {
				return "VLAN ID must be all Numbers! \n";
			}
		} else {
			return "Please Enter in a VLAN Number! \n";
		}
	}
	
function gbValidateVNet(form) {
    fail = validateVNetName(form.vnetName.value)
    fail += validateVNetIP(form.vnetIP.value)
	fail += validateVNetVLAN(form.vnetVLAN.value)
    if (fail == "") {
        return true;
    } else {
        alert(fail);
        return false;
    }
}