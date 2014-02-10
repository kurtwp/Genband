<?php
require_once 'header.html';
$cliEdit = "cli iedge edit";
$cliEditPhone = "cli iedge phones";
$endPoint = "";
$epName = "";
$epPort = "";
$epRealm = "";
$epEXT = "";
$epType = "ipphone";
$xCalls = "1";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $epName = $_POST['epName'];
    $epPort = $_POST['epPort'];
    $epRealm = $_POST['epRealm'];
    $epEXT = $_POST['epEXT'];
    $endPoint = " " . $epName . " " . $epPort . " ";
    print "<textarea name='nowrap' rows='20' cols='80'>";
    print "cli iedge add " . $endPoint ."\n";
    print $cliEdit . $endPoint . "realm " . $epRealm . "\n";
    print $cliEdit . $endPoint . "type " . $epType . "\n";
    print $cliEditPhone . $endPoint . $epEXT . "\n";
	print $cliEdit . $endPoint . "mr enable" . "\n";
	print $cliEdit . $endPoint . "natdetect enable" . "\n";
	print $cliEdit . $endPoint . "sip enable" . "\n";
	print $cliEdit . $endPoint . "xcalls " . $xCalls . "\n";
    echo "</textarea>" ."\n";
	echo "</div> <!-- End of Wrapper -->"."\n";
	echo "</body>"."\n";
	echo "</html>"."\n";
	exit;
}


echo <<<_END
<div id='container'>
<br />

<form id='contactform' action="ipphone.php" method="POST">
<h3>Genband Soft Phone End Point Configuration</h3>
<div class="field">
	<label for='epName'>End Point Name: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epName' value='7555' /><br />
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
	<label for='epEXT'>End Point Extension: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epEXT' value='7555'/><br />
</div>
<br />
<div class='field'>
	<label for='xCalls'>Max Calls Allowed: </label>
	<input type='text' class='input' size="20" maxlength='50' name='xCalls' value='1'/><br />
</div>
<br />
<input type='submit' class='button' value='Submit' />
</form>
</div> <!-- End of Container -->
_END;
?>