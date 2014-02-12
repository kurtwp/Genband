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
	
	function GBvalidate(form) {
		fail  = validateIP(form.epIP.value)
		if (fail == "") return true
		else { alert(fail); return false }
	}