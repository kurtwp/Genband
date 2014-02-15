// Validates IP
	function validateIP(field){
	
		var regexp = /^((1?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(1?\d{1,2}|2[0-4]\d|25[0-5])$/;
		
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
				return "Missing Realms or Ports";
			}
		} 
		return "";
	}
// Compare the amout of ports to amount of URIs 
	function compareURIPort(var1,var2) {
		var countURI = var1.split(",");
		var countPort = var2.split(",");
		var sizeURI = countURI.length;
		var sizePort = countPort.length;
		if (sizePort != sizeURI) {
			return "Missing URIs"
		} else {
			return "";
		}
	}
	
	function GBvalidate(form) {
		fail = validatePort(form.epPort.value)
		fail += validateIP(form.epIP.value)
		fail += compareRSAPort(form.epRealm.value,form.epPort.value)
		fail += compareURIPort(form.epURI.value,form.epPort.value)
		if (fail == "") return true
		else { alert(fail); return false }
	}