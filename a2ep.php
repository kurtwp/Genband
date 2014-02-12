<?php
require_once 'header.html';
require_once 'functions/GBFunctions.php';
$fail = "";
$addCommands = "";
$arrayCount = 0;
$cliEdit = "cli iedge edit";
$endPoint = "";
$epName = "";
$epPort = "";
$epRealm = "";
$epIP = "";
$epTransport = "";
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
	
// --- Add additional commands ---
	if ($_POST['addCommands'] != "") {
		
	$tempCommands = explode(",",$_POST['addCommands']);
	$arrayCount = count($tempCommands);
	}
// --- End of Additional Commands ---

//---  PHP Validation Sections ---  	
	$fail = validateIP($epIP);
	$fail .= validatePort($epPort);
//--- End Validation Section ---

	if ($fail == "") {
		require_once 'header.html';
		print "<div id='right_box'>";
		print "<textarea name='nowrap' rows='20' cols='80'>";
		print "cli iedge add " . $endPoint ."\n";
		print $cliEdit . $endPoint . "realm " . $epRealm . "\n";
		print $cliEdit . $endPoint . "type " . $epType . "\n";
		print $cliEdit . $endPoint . "static " . $epIP . "\n";
		print $cliEdit . $endPoint . "uri " . $epURI . "\n";
		print $cliEdit . $endPoint . "pass-require-hdr enable" . "\n";
		print $cliEdit . $endPoint . "pass-supported-hdr enable" . "\n";
		for ($i=0; $i<$arrayCount; $i++) {
			print $cliEdit . $endPoint . $tempCommands[$i] . "\n";
		}
		echo "</textarea>" ."\n";
		echo "</div> <!-- End of Right Box -->"."\n";
		echo "</div> <!-- End of Wrapper -->"."\n";
		echo "</body>"."\n";
		echo "</html>"."\n";
		exit;
	} 
}

echo <<<_END
<div id='right_box'>
<p><h3>$fail</h3></p>
<br />

<form id='contactform' name='form' action="a2ep.php" method="post" onSubmit="return GBvalidate(this);">
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
	<input type='text' class='input' size="20" maxlength='50' name='epIP' value='$epIP'/><br />
</div>
<div class='field'>
	<label for='epTransport'>Transport Protocol: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epTransport' value='udp'/><br />
</div>
<div class='field'>
	<label for='epURI'>End Point URI: </label>
	<input type='text' class='input' size="10" maxlength='10' name='epURI' /><br />
</div>
<div class='field'>
	<label for='addCommands'>Additional Commands: </label>
	<input type='text' class='input' size="10" maxlength='100' name='addCommands' /><br />
</div>
<input type='submit' class='button' value='submit' />
</form>
</div> <!-- End of Right Box -->
</div> <!-- End of Wrapper -->
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