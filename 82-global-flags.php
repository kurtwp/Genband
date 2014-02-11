<?php

require_once 'header.html';
echo <<<_END
    
    <div id=right_box>
    <h3> A2-S3 Global Settings</h3><br />
    <h2>For SBC Release 8.2</h2><br />
    <textarea name='nowrap' rows='15' cols='80'>
    nxconfig.pl -e obp -v 1
    nxconfig.pl -e allow-dynamicEndpoints -v 1
    nxconfig.pl -e enable-natdetection -v 1
    nxconfig.pl -e im-uri-support -v 1
    nxconfig.pl -e enableheaderpolicy -v 1
    nxconfig.pl -e sip3261dialogidentification -v 1
    nxconfig.pl -e dynamicEndpoints_invitenosdp -v 1
    nxconfig.pl -e pass-zero-mport -v 1
    nxconfig.pl -e sipmaxmsgsize -v 5000
    nxconfig.pl -e max-transport-mtu-size -v 5000
    nxconfig.pl -e forward-OPTIONS -v 1
    nxconfig.pl -e pass-out-of-dialog-info -v 1
    nxconfig.pl -e maddr-domain-routing-support –v 1
    nxconfig.pl -e invalid-mline-count -v 1
    </textarea>
    <br />
    <br />
    <p><h3>Registration Expiry</h3></p>
    <p> The registration expiry on the QUANTiX SBC should typically be a low value (more frequent registration).</p>
	</div> <!-- End of Right Box -->
    </div> <!-- End of Wrapper -->
	</body>
	</html>

    
_END;
?>