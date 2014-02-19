<?php
require_once 'header.html';
$addCommands = "";
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
    print "<div id='right_box'>"."\n";
    print "<textarea name='nowrap' rows='20' cols='80'>"."\n";
    print "cli realm add " . $rsaName ."\n";
    print $cliEdit . "rsa " . $rsaIP . "\n";
    print $cliEdit . "mask " . $rsaMask . "\n";
    print $cliEdit . "vnet " . $rsaVnet . "\n";
    print $cliEdit . "medpool " . $rsaMediaPool . "\n";
//    print $cliEdit . "imr alwayson \n";
//    print $cliEdit . "emr alwayson" . "\n";
//    print $cliEdit . "natmr alwaysoff" . "\n"; 
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

<form id="contactform" action="rsa.php" method="POST" onSubmit="return gbValidateRSA(this);">
<h3>Genband Realm Configuration</h3>
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
	<input type='text' class='input' size="10" maxlength='10' name='addCommand' value='NOT AVAILABLE'/><br />
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