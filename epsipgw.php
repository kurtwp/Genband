<?php
require_once 'header.html';
require_once 'functions/GBFunctions.php';
$fail = "";
$addCommands = "";
$arrayCount = 0;
$arrayPCount = 0;
$arrayRCount = 0;
$arrayUCount = 0;
$cliEdit = "cli iedge edit";
$endPoint = "";
$epName = "";
$epPort = "";
$epRealm = "";
$epIP = "";
$epTransport = "";
$epType = "sipgw";
$tempPort = 0;
$xCalls = "100";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $epName = $_POST['epName'];
	$epPort = $_POST['epPort'];
    $epIP = $_POST['epIP'];
    
// --- End Point Ports ---
	if ($epPort != "") {	
		$tempPort = explode(",",$epPort);
		$arrayPCount = count($tempPort);
	}
// --- End of Point Ports ---

// --- End Point RSA Name ---
	if ($_POST['epRealm'] != "") {
		$epRealm = explode(",",$_POST['epRealm']);
		$arrayRCount = count($epRealm);
		if ($arrayRCount == 1) {
			for ($r=0;$r<$arrayPCount;$r++) {
				$epRealm[$r] = $_POST['epRealm'];
			}
		}
	}
// --- End of RSA Name ---
// --- Add additional commands ---
	if ($_POST['addCommands'] != "") {	
		$tempCommands = explode(",",$_POST['addCommands']);
		$arrayCount = count($tempCommands);
	}
// --- End of Additional Commands ---

//---  PHP Validation Sections ---  	
	$fail = validateIP($epIP);
	$fail .= validatePort($tempPort);
	$fail .= compareRSACount($arrayPCount,$arrayRCount);
	$fail .= validateEPName($epName);

//--- End Validation Section ---


	if ($fail == "") {
		require_once 'header.html';
		print "<div id='right_box'>";
		print "<h3> Configuration for end point " . $epName . " with Media Anchored.</h3><br />"; 
		print "<textarea name='nowrap' rows='20' cols='80'>";
		for ($k=0; $k<$arrayPCount; $k++) {
			$endPoint = " " . $epName . " " . $tempPort[$k] . " ";
			print "cli iedge add " . $endPoint ."\n";
			print $cliEdit . $endPoint . "realm " . $epRealm[$k] . "\n";
			print $cliEdit . $endPoint . "type " . $epType . "\n";
			print $cliEdit . $endPoint . "static " . $epIP . "\n";
			print $cliEdit . $endPoint . "pass-require-hdr enable" . "\n";
			print $cliEdit . $endPoint . "pass-supported-hdr enable" . "\n";
			print $cliEdit . $endPoint . "rtptimeout default" . "\n";
			print $cliEdit . $endPoint . "rtcptimeout default" . "\n";
			print $cliEdit . $endPoint . "xcalls " . $xCalls . "\n";
			print $cliEdit . $endPoint . "mr enable" . "\n";
			for ($i=0; $i<$arrayCount; $i++) {
				print $cliEdit . $endPoint . $tempCommands[$i] . "\n";
			}
		}
		echo "</textarea>";
		echo "<h3 class='commh3'>Show End Point Commands</h3>";
		echo "<textarea rows='10' cols='80'>";
			for ($p=0;$p<$arrayPCount;$p++){
				print "cli iedge lkup ".$epName." ".$tempPort[$p]." | more"."\n";
			}
		print "\n";
		print "---------------- OR -------------"."\n";
		print "\n";
		print "cli iedge lkup ".$epIP." | more"."\n";
		echo "</textarea>";
		echo "</div> <!-- End of Right Box -->";
		echo "</div> <!-- End of Wrapper -->";
		echo "</body>";
		echo "</html>";
		exit;
		
	} 
}
echo <<<_END
<div id='right_box'>
<h3>$fail</h3>
<br />

<form id='contactform' name='form' action="epsipgw.php" method="post" onSubmit="return gbValidateEP(this);">
<h3>Genband SIP Gateway End Point Configuration</h3>
<div class="field">
	<label for='epName'>End Point Name: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epName' /><br />
</div>
<div class="field">
	<label for='epPort'>End Point Port #: </label>
	<input type='text' class='input' size="20" maxlength='5' name='epPort' value='1'/><br />
</div>
<div class='field'>
	<label for='epRealm'>Realm Name: </label>
	<input type='text' class='input' size="20" maxlength='150' name='epRealm' value='private-access' />
</div>
<div class='field'>
	<label for='epIP'>End Point IP Address: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epIP' /><br />
</div>
<div class='field'>
	<label for='epTransport'>Transport Protocol: </label>
	<input type='text' class='input' size="20" maxlength='50' name='epTransport' value='udp'/><br />
</div>
<div class='field'>
	<label for='addCommands'>Additional Commands: </label>
	<input type='text' class='input' size="10" maxlength='100' name='addCommands' /><br />
</div>
<input type='hidden' name='epTest' value='false' /><br />
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