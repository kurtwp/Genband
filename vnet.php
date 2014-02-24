<?php
require_once 'header.html';
require_once 'functions/GBFunctions.php';
$addCommands = "";
$cliEdit = "cli vnet edit";
$fail = "";
$vnetName = "";
$vnetIF = "";
$vnetIP = "";
$vnetVLAN = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $vnetName = $_POST['vnetName'];
    $vnetIF = $_POST['vnetIF'];
    $vnetIP = $_POST['vnetIP'];
    $vnetVLAN = $_POST['vnetVLAN'];
	
// --- Add additional commands ---
	if ($_POST['addCommands'] != "") {	
		$addCommands = explode(",",$_POST['addCommands']);
		$arrayCount = count($addCommands);
	}
// --- End of Additional Commands ---

//---  PHP Validation Sections ---  	
	$fail = validateIP($vnetIP);
	$fail .= validateVNet($vnetName);
	$fail .= validateIF($vnetIF);
	$fail .= validateVLAN($vnetVLAN);
//--- End Validation Section ---

	if ($fail == "") {
		$cliEdit = $cliEdit . " " . $vnetName . " ";
		print "<div id='right_box'>"."\n";
		print "<textarea name='nowrap' rows='7' cols='80'>"."\n";
		print "cli vnet add " . $vnetName ."\n";
		if ($vnetVLAN != "none") {
			print $cliEdit . "vlanid " . $vnetVLAN . "\n";
		}
		print $cliEdit . "ifname " . $vnetIF . "\n";
		print $cliEdit . "primary-gateway " . $vnetIP . "\n";
		for ($i=0; $i<$arrayCount; $i++) {
				print $cliEdit . $addCommands[$i] . "\n";
		}
		echo "</textarea>"."\n";
		echo "<h3 class='commh3'> Show Commands for VNets</h3>";
        echo "<textarea rows='2' cols='80'>";
        print "cli vnet list "."\n";
        print "\n";
        echo "</textarea>";
		echo "</div> <!-- End of Right Box -->"."\n";
		echo "</div> <!-- End of Wrapper -->"."\n";
		echo "</body>"."\n";
		echo "</html>";
		exit;
	}
}


echo <<<_END
<div id='right_box'>
<h3>$fail</h3>
<br />

<form id="contactform" action="vnet.php" method="POST" onSubmit="return gbValidateVNet(this);">
<h3>Genband VNET Configuration</h3>
<div class="field">
	<label for='vnetName'>VNET Name: </label>
	<input type='text' class='input' size="20" maxlength='50' name='vnetName' /><br />
</div>
<div class="field">
	<label for='vnetIF'>VNET Interface: </label>
	<input type='text' class='input' size="20" maxlength='50' name='vnetIF' value='eth2'/><br />
</div>
<div class='field'>
	<label for='vnetIP'>VNET Gateway IP: </label>
	<input type='text' class='input' size="20" maxlength='150' name='vnetIP' value='$vnetIP' />
</div>
<div class='field'>
	<label for='vnetVLAN'>VNET VLAN ID: </label>
	<input type='text' class='input' size="20" maxlength='50' name='vnetVLAN' value='none'/><br />
</div>
<div class='field'>
	<label for='addCommand'>Additional Commands: </label>
	<input type='text' class='input' size="10" maxlength='150' name='addCommands' /><br />
</div>
<br />
<input type='submit' class='button' value='Submit' />
</form>
</div> <!-- End of Right Box -->
</div> <!-- End or Wrappper -->
<!-- Google Analytics -->
    <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-15306775-1");
    pageTracker._trackPageview();
    } catch(err) {}</script>
<!-- End of Google Analytics -->

</body>
</html>
_END;
?>