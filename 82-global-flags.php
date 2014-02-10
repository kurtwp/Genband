<?php

require_once 'header.html';
    echo "<h3> A2-S3 Global Settings</h3><br />";
    echo "<h2>For SBC Release 8.2</h2><br />";
    print "<textarea name='nowrap' rows='20' cols='80'>";
    print "nxconfig.pl -e obp -v 1"."\n";
    print "nxconfig.pl -e allow-dynamicEndpoints -v 1"."\n";
    print "nxconfig.pl -e enable-natdetection -v 1"."\n";
    print "nxconfig.pl -e im-uri-support -v 1"."\n";
    print "nxconfig.pl -e enableheaderpolicy -v 1"."\n";
    print "nxconfig.pl -e sip3261dialogidentification -v 1"."\n";
    print "nxconfig.pl -e dynamicEndpoints_invitenosdp -v 1"."\n";
    print "nxconfig.pl -e pass-zero-mport -v 1"."\n";
    print "nxconfig.pl -e sipmaxmsgsize -v 5000"."\n";
    print "nxconfig.pl -e max-transport-mtu-size -v 5000"."\n";
    print "nxconfig.pl -e forward-OPTIONS -v 1"."\n";
    print "nxconfig.pl -e pass-out-of-dialog-info -v 1"."\n";
    print "nxconfig.pl -e maddr-domain-routing-support –v 1"."\n";
    print "nxconfig.pl -e invalid-mline-count -v 1"."\n";
    echo "</textarea>" ."\n";
	echo "</div> <!-- End of Wrapper -->"."\n";
	echo "</body>"."\n";
	echo "</html>"."\n";
	exit;
?>