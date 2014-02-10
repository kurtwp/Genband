<?php
require_once 'header.html';
$cliEdit = "cli vnet edit";
$vnetName = "";
$vnetIF = "";
$vnetIP = "";
$vnetVLAN = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $vnetName = $_POST['vnetName'];
    $vnetIF = $_POST['vnetIF'];
    $vnetIP = $_POST['vnetIP'];
    $vnetVLAN = $_POST['vnetVLAN'];
    $cliEdit = $cliEdit . " " . $vnetName . " ";
    print "<textarea name='nowrap' rows='20' cols='80'>";
    print "cli vnet add " . $vnetName ."\n";
    print $cliEdit . "vlanid " . $vnetVLAN . "\n";
    print $cliEdit . "ifname " . $vnetIF . "\n";
    print $cliEdit . "primary-gateway " . $vnetIP . "\n";
    echo "</textarea>";
	echo "</div>";
	echo "</body>";
	echo "</html>";
	exit;
}


echo <<<_END
<div id='container'>
<br />

<form id="contactform" action="vnet.php" method="POST">
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
<br />
<input type='submit' class='button' value='Submit' />
</form>
</div>
_END;
?>