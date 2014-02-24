// Validates IP
	function validateIP(field){
	
		var regexp = /^((1?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(1?\d{1,2}|2[0-4]\d|25[0-5])$/;
		if (field == "NA") {
			return "";
		}
		if (field != "") {
			if (field.match(regexp)) {
				return "";
			} else {
				return "Please enter a Valid IP address! \n";
			}
		} else {
			return "Please enter a IP address! \n";
		}
	}
	
// Validate Port Numbers and Positive Numbers
	function validatePort(field) {
		var regexp = /^\d+$/;
		var tempArray = field.split(",");
		var arraySize = tempArray.length;
			for (i=0;i<arraySize;i++) {
				if (tempArray[i] != "") {
					if (tempArray[i].match(regexp)) {
						
					} else {
						return "Port number must be all numbers! \n";
					}
				} else {
					return "Please enter a Port Number(s)! \n";
				}
			}
		return "";
		
	}
// Compare the amout of ports to amount of RSA 
	function compareRSAPort(var1,var2) {
		var countRSA = var1.split(",");
		var countPort = var2.split(",");
		var sizeRSA = countRSA.length;
		var sizePort = countPort.length;
		if (sizePort != sizeRSA) {
			if (sizeRSA == 1) {
				return "";
			} else {
				return "Missing Realms or Ports! \n";
			}
		} 
		return "";
	}

// Validate if Realm Field is Filled In
    function validateRSA(rsa) {
        if (rsa != "") {
            return "";
        } else {
            return "Missing Realm Name! \n";
        }
    }
// Validate if End Point Name Field is Filled In
    function validateEPName(name) {
        if (name != "") {
            return "";
        } else {
            return "Please Enter in an End Point Name! \n";
        }
    }
   
	function gbValidateEP(form) {
		fail = validateEPName(form.epName.value)
		fail += validatePort(form.epPort.value)
		fail += validateIP(form.epIP.value)
		fail += validateRSA(form.epRealm.value)
		fail += compareRSAPort(form.epRealm.value,form.epPort.value)
		if (fail == "") return true
		else { alert(fail); return false }
	}
