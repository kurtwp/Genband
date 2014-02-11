<?php
require_once 'header.html';
$cliEdit = "cli iedge edit";
$endPoint = "";
$epName = "";
$epPort = "";
$epRealm = "";
$epIP = "";
$epType = "sipproxy";
$epURI = "";
$xcalls = "100";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $epName = $_POST['epName'];
    $epPort = $_POST['epPort'];
    $epRealm = $_POST['epRealm'];
    $epIP = $_POST['epIP'];
    $epURI = $_POST['epURI'];
    $endPoint = " " . $epName . " " . $epPort . " ";
	print "<div id='right_box'>";
    print "<textarea name='nowrap' rows='20' cols='80'>";
    print "cli iedge add " . $endPoint ."\n";
    print $cliEdit . $endPoint . "realm " . $epRealm . "\n";
    print $cliEdit . $endPoint . "type " . $epType . "\n";
    print $cliEdit . $endPoint . "static " . $epIP . "\n";
    print $cliEdit . $endPoint . "uri " . $epURI . "\n";
    print $cliEdit . $endPoint . "pass-require-hdr enable" . "\n";
    print $cliEdit . $endPoint . "pass-supported-hdr enable" . "\n";
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

<form id='contactform' action="a2ep.php" method="POST">
<h3>Genband SESM (A2) End Point Configuration</h3>
<div class="field">
	<label for='epName'>End Point Name: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epName' value='SESM1' /><br />
</div>
<div class="field">
	<label for='epPort'>End Point Port #: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epPort' value='0'/><br />
</div>
<div class='field'>
	<label for='epRealm'>Realm Name: </label>
	<input type='text' class='input' size="20" maxlength='150' name='epRealm' value='private-access' />
</div>
<div class='field'>
	<label for='epIP'>End Point IP Address: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epIP' /><br />
</div>
<br />
<div class='field'>
	<label for='epURI'>End Point URI: </label>
	<input type='text' class='input' size="10" maxlength='10' name='epURI' /><br />
</div>
<input type='submit' class='button' value='Submit' />
</form>
</div> <!-- End of Right Box>
_END;
?>