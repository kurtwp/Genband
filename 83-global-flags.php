<?php

require_once 'header.html';
echo <<<_END
    
    <div id=right_box>
    <h3> A2-S3 Global Settings</h3><br />
    <h2>For SBC Release 8.3</h2><br />
    <textarea rows='12' cols='80'>
nxconfig.pl -e obp -v 1
nxconfig.pl -e allow-dynamicendpoints -v 1
nxconfig.pl -e enable-natdetection -v 1
nxconfig.pl -e im-uri-support -v 1
nxconfig.pl -e enableheaderpolicy -v 1
nxconfig.pl -e dynamicendpoints_invitenosdp -v 1
nxconfig.pl -e pass-zero-mport -v 1
nxconfig.pl -e max-transport-mtu-size -v 5000
nxconfig.pl -e forward-OPTIONS -v 1
nxconfig.pl -e pass-out-of-dialog-info -v 1
nxconfig.pl -e invalid-mline-count -v 1
nxconfig.pl -e norequriport -v 1
    </textarea>
    <br />
    <br />
    <p>When entering in the below global parameter it might prompt for a value.  If it does prompt for a value, enter in "1" and press return.</p>
    <br />
    <textarea rows='1' cols='80'>
nxconfig.pl -e maddr-domain-routing-support -v 1
    </textarea>
    <br />
    <br />
    <p> The next two parameters require a restart of the SBC GIS processes.  Restarting of the GIS processes can cause calls to be dropped depending on protocol being used.
    When prompted to restart, enter the letter "n" to not restart the GIS application for both parameters below.  Manually do a "allstop;allstart" during
    low traffic traffic volumes or in a maintenance window.</p>
    <br />
    <textarea rows='2' cols='80'>
nxconfig.pl -e sip3261dialogidentification -v 1
nxconfig.pl -e sipmaxmsgsize -v 5000
    </textarea>
    <br />
    <br />
    <p><h3>Registration Expiry</h3></p>
    <p> The registration expiry on the QUANTiX SBC should typically be a low value (more frequent registration) for the following reasons:.</p>
    <br />
    <p>
        <ul>
            <li class='gbulindent' >SIP Register is often used by some clients as a firewall keep-alive
mechanism. The recommendation is to set the client to <900
(180seconds).</li>
            <li class='gbulindent'>The QUANTiX SBC does not currently support the sip.instance
parameter. Therefore, if the same client (mobile) registers from a
different address, the old registration should expire so that it can be
cleaned up. There are dependencies between the Registration Expiries
on the EXPERiUS AS and the QUANTiX SBC.
<p>The registration interval on the EXPERiUS AS should typically be a
higher value (lessons) so the EXPERiUS AS can support more subscribe.</p</li>
        </ul>
    </p>
    <br />
    <textarea rows='2' cols='80'>
nxconfig.pl -e age-timeout -v 3600
nxconfig.pl -e obpxfactor -v 180
    </textarea>
    <p>The values above are suggested. <p
    <br />
    <br />
    <p><h3>Additional Optional Global Settings</h3></p>
    <textarea rows='9' cols='80'>
nxconfig.pl -e leading-plus-sign-in-uri -v 1
nxconfig.pl -e siptimer-shorthunt -v 5
nxconfig.pl -e siptrans-invitec -v 3
nxconfig.pl -e hidesrcrsa -v 1
nxconfig.pl -e maxhunts -v 3
nxconfig.pl -e mqm -v 1
nxconfig.pl -e sipusecontactintohdr -v 1
nxconfig.pl -e sip-options-ping -v 1
nxconfig.pl -e enableportmapping -v 1
    </textarea>
    <br />
    <br />
    <p> To view any of the above parameter explanation use the following command: </p>
    <textarea rows='20' cols='80'>
    nxconfig.pl -s <paramater name>
         
         SBC0:~ # nxconfig.pl -s sipusecontactintohdr

                ----------------------------------------------------------
                                Attribute Information
                ----------------------------------------------------------
                Process Name  : gis
                Attr. Category: sip
                Attr. Name    : sipusecontactintohdr
                Attr. Value   : 1
                Attr. Default : 0
                Attr. Min Val : 0
                Attr. Max Val : 1
                Attr. Type    : bool
                Attr. Descr.  : Use Contact in To header in SIP messages.
                Valid Values: 1 (Enable) | 0 (Disable)
                Needs iServer Restart : no
                ----------------------------------------------------------
        SBC0:~ #
    </textarea>

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