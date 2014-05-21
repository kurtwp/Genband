<?php
require_once 'header.html';
require_once 'functions/GBFunctions.php';
$addCommands = "";
$arrayCount = 0;
$arrayPCount = 0;
$arrayRCount = 0;
$cliEdit = "cli iedge edit";
$cliEditPhone = "cli iedge phones";
$endPoint = "";
$epMedia = "yes";
$epName = "";
$epPort = "";
$epRealm = "";
$epEXT = "";
$epType = "ipphone";
$fail = "";
$tempPort = 0;
$xCalls = 1;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$epMedia = $_POST['epMedia'];
    $epName = $_POST['epName'];
    $epPort = $_POST['epPort'];
    $epRealm = $_POST['epRealm'];
    $epEXT = $_POST['epEXT'];

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
		$addCommands = explode(",",$_POST['addCommands']);
		$arrayCount = count($addCommands);
	}
// --- End of Additional Commands ---

//---  PHP Validation Sections ---  	
	$fail = validatePort($tempPort);
	$fail .= validateRSA($epRealm);

//--- End Validation Section ---
	
	if ($fail == "") {
		require_once 'header.html';
		print "<div id='right_box'>";
		
		print "<textarea name='nowrap' rows='20' cols='80'>" ."\n";
		for ($i=0;$i<$arrayPCount;$i++) {
			$endPoint = " " . $epName . " " . $tempPort[$i] . " ";
			print "cli iedge add " . $endPoint ."\n";
			print $cliEdit . $endPoint . "realm " . $epRealm[$i] . "\n";
			print $cliEdit . $endPoint . "type " . $epType . "\n";
			print $cliEditPhone . $endPoint . $epEXT . "\n";
			print $cliEdit . $endPoint . "mr enable" . "\n";
			print $cliEdit . $endPoint . "natdetect enable" . "\n";
			print $cliEdit . $endPoint . "sip enable" . "\n";
			for ($k=0;$k<$arrayCount;$k++) {
				print $cliEdit .  $endPoint . $addCommands[$k] . "\n";
			}
			print $cliEdit . $endPoint . "xcalls " . $xCalls . "\n";
			if ($epMedia == "yes") {
				print $cliEdit . $endPoint . "mr enable" . "\n";
			} else {
				print $cliEdit . $endPoint . "nmr enable" . "\n";
			}
		}
		echo "</textarea>" ."\n";
		echo "<h3 class='commh3'>Show End Point Commands</h3>";
			echo "<textarea rows='10' cols='80'>";
			for ($p=0;$p<$arrayPCount;$p++){
				print "cli iedge lkup ".$epName." ".$tempPort[$p]." | more"."\n";
			}
		print "\n";
		echo "</textarea>";
		echo "</div> <!-- End of Right Box -->"."\n";
		echo "</div> <!-- End of Wrapper -->"."\n";
		echo "</body>"."\n";
		echo "</html>"."\n";
		exit;
	}
}


echo <<<_END
<div id='right_box'>
<h3>$fail</h3>
<br />
<form id='contactform' action="ipphone.php" method="POST" onSubmit="return GBvalidate(this);">
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
	<input type='text' class='input' size="20" maxlength='150' name='epRealm' value='private-access'/>
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
<div class='field'>
	<label for='epMedia'> Anchor Media: </label>
	<input type="radio" name="epMedia" value="yes" checked/>Yes
	<input type="radio" name="epMedia" value="no" />No
</div>
<div class='field'>
	<label for='addCommand'>Additional Commands: </label>
	<input type='text' class='input' size="10" maxlength='100' name='addCommands' /><br />
</div>
<input type='hidden' name='epIP' value='NA'/>
<input type='hidden' name='epURI' value='NA'/>
<input type='hidden' name='epTest' value='true' />
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