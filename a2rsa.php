<?php
require_once 'header.html';
require_once 'functions/GBFunctions.php';
$addCommands = "";
$arrayCount = 0;
$cliEdit = "cli realm edit";
$fail = "";
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
	
// --- Add additional commands ---
	if ($_POST['addCommands'] != "") {	
		$addCommands = explode(",",$_POST['addCommands']);
		$arrayCount = count($addCommands);
	}
// --- End of Additional Commands ---

//---  PHP Validation Sections ---  	
	$fail = validateIP($rsaIP);
    $fail .= validateRSA($rsaName);
    $fail .= validateMP($rsaMediaPool);
    $fail .= validateVNet($rsaVnet);
    $fail .= validateMask($rsaMask);
//--- End Validation Section ---
	if ($fail == "") {
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
		for ($i=0; $i<$arrayCount; $i++) {
            print $cliEdit . $addCommands[$i] . "\n";
        }
		echo "</textarea>" ."\n";
		echo "<h3 class='commh3'> Show Commands for Realms</h3>";
        echo "<textarea rows='7' cols='80'>";
        print "cli realm lkup " . $rsaName . " | more"."\n";
        print "\n";
        print "---------------- OR -------------"."\n";
        print "\n";
        print "cli realm brief" . "\n";
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

<form id="contactform" action="a2rsa.php" method="POST" onSubmit="return gbValidateRSA(this);">
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