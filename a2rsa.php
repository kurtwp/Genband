<?php
require_once 'header.html';
$cliEdit = "cli realm edit";
$rsaName = "";
$rsaVnet = "";
$rsaMediaPool = "";
$rsaIP = "";
$rsaMask = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rsaName = $_POST['rsaName'];
    $rsaVnet = $_POST['rsaVnet'];
    $rsaMediaPool = $_POST['rsaMediaPool'];
    $rsaMask = $_POST['rsaMask'];
    $rsaIP = $_POST['rsaIP'];
    $cliEdit = $cliEdit . " " . $rsaName . " ";
	print "<div id='right_box'>";
    print "<textarea name='nowrap' rows='20' cols='80'>";
    print "cli realm add " . $rsaName ."\n";
    print $cliEdit . "rsa " . $rsaIP . "\n";
    print $cliEdit . "mask " . $rsaMask . "\n";
    print $cliEdit . "vnet " . $rsaVnet . "\n";
    print $cliEdit . "medpool " . $rsaMediaPool . "\n";
    print $cliEdit . "imr alwayson \n";
    print $cliEdit . "emr alwayson" . "\n";
    print $cliEdit . "natmr alwaysoff" . "\n";
    print $cliEdit . "sipauth all" . "\n";
    print $cliEdit . "realm-panasonic enable" . "\n";
    echo "</textarea>" ."\n";
	echo "</div> <!-- End of Right Box -->"."\n";
	echo "</div> <!-- End of Wrapper -->"."\n";
	echo "</body>"."\n";
	echo "</html>"."\n";
	exit;
}


echo <<<_END
<div id='right_box'>
<br />

<form id="contactform" action="a2rsa.php" method="POST">
<h3>Genband A2 Realm Configuration</h3>
<div class="field">
	<label for='rsaName'>Realm Name: </label>
	<input type='text' class='input' size="20" maxlength='50' name='rsaName' /><br />
</div>
<div class="field">
	<label for='rsaVnet'>VNET Name: </label>
	<input type='text' class='input' size="20" maxlength='50' name='rsaVnet' /><br />
</div>
<div class='field'>
	<label for='rsaMediaPool'>Media Pool ID: </label>
	<input type='text' class='input' size="20" maxlength='150' name='rsaMediaPool' value='$rsaMediaPool' />
</div>
<div class='field'>
	<label for='rsaIP'>Realm IP Address: </label>
	<input type='text' class='input' size="20" maxlength='50' name='rsaIP' /><br />
</div>
<br />
<div class='field'>
	<label for='rsaMask'>Realm Subnet Mask: </label>
	<input type='text' class='input' size="20" maxlength='50' name='rsaMask' /><br />
</div>
<br />
<input type='submit' class='button' value='Submit' />
</form>
</div> <!-- End of Right Box -->
</div> <!-- End or Wrappper -->
</body>
</html>
_END;
?>