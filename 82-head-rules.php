<?php
require_once 'header.html';
echo "<div id='right_box'>";
echo "<h3> A2-S3 Global Header Rule Settings</h3><br />";
echo "<h2>For SBC Release 8.2</h2><br />";
print "<textarea name='nowrap' rows='60' cols='102'>" . "\n";
print "cli hdrrule add x-nt-location" . "\n";
print "cli hdrrule edit x-nt-location method ALL header-element fullheader method-type both response ALL header x-nt-location operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-location ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-alter-id " . "\n";
print "cli hdrrule edit x-nt-alter-id method ALL header-element fullheader method-type both response ALL header x-nt-alter-id operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-alter-id ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-call-duration" . "\n";
print "cli hdrrule edit x-nt-call-duration method ALL header-element fullheader method-type both response ALL header x-nt-call-duration operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-call-duration ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-calling-id" . "\n";
print "cli hdrrule edit x-nt-calling-id method ALL header-element fullheader method-type both response ALL header x-nt-calling-id operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-calling-id ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-cd3-count" . "\n";
print "cli hdrrule edit x-nt-cd3-count method ALL header-element fullheader method-type both response ALL header x-nt-cd3-count operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-cd3-count ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-corr-id" . "\n";
print "cli hdrrule edit x-nt-corr-id method ALL header-element fullheader method-type both response ALL header x-nt-corr-id operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-corr-id ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-guid" . "\n";
print "cli hdrrule edit x-nt-guid method ALL header-element fullheader method-type both response ALL header x-nt-guid operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-guid ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-mas-sid" . "\n";
print "cli hdrrule edit x-nt-mas-sid method ALL header-element fullheader method-type both response ALL header x-nt-mas-sid operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-mas-sid ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-party-id" . "\n";
print "cli hdrrule edit x-nt-party-id method ALL header-element fullheader method-type both response ALL header x-nt-party-id operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-party-id ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-resource-priority" . "\n";
print "cli hdrrule edit x-nt-resource-priority method ALL header-element fullheader method-type both response ALL header x-nt-resource-priority operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-resource-priority ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-service" . "\n";
print "cli hdrrule edit x-nt-service method ALL header-element fullheader method-type both response ALL header x-nt-service operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-service ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-useruser" . "\n";
print "cli hdrrule edit x-nt-useruser method ALL header-element fullheader method-type both response ALL header x-nt-useruser operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-useruser ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-xlainfo" . "\n";
print "cli hdrrule edit x-nt-xlainfo method ALL header-element fullheader method-type both response ALL header x-nt-xlainfo operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-xlainfo ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add x-nt-locname" . "\n";
print "cli hdrrule edit x-nt-locname method ALL header-element fullheader method-type both response ALL header x-nt-locname operation PASS-IGN-ERR" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add x-nt-locname ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_contact" . "\n";
print "cli hdrrule edit pass_contact method ALL method-type both  header-element parameter header contact param-type hdr operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_contact ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_contact_uri" . "\n";
print "cli hdrrule edit pass_contact_uri method ALL method-type req header-element parameter header contact param-type uri param ALL operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_contact_uri ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_encod" . "\n";
print "cli hdrrule edit   pass_encod method ALL method-type both header-element fullheader  header e operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_encod ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add Pass-Accept-Encoding" . "\n";
print "cli hdrrule edit   Pass-Accept-Encoding method ALL method-type both header-element fullheader  header accept-encoding operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add Pass-Accept-Encoding ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add Pass-Content-Encoding" . "\n";
print "cli hdrrule edit   Pass-Content-Encoding method ALL method-type both header-element fullheader  header content-encoding operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add Pass-Content-Encoding ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_o" . "\n";
print "cli hdrrule edit   pass_o method ALL method-type both header-element fullheader  header o operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_o ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_Accept-Language" . "\n";
print "cli hdrrule edit   pass_Accept-Language method ALL method-type both header-element fullheader  header Accept-Language operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_Accept-Language ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_subject" . "\n";
print "cli hdrrule edit pass_subject method ALL method-type both header subject   header-element fullheader operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_subject ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass_s" . "\n";
print "cli hdrrule edit pass_s method ALL method-type both header s header-element fullheader operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass_s ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add k" . "\n";
print "cli hdrrule edit k method ALL header-element fullheader method-type both response ALL header k operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add k ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass-Geolocation" . "\n";
print "cli hdrrule edit pass-Geolocation method ALL method-type both header-element fullheader  header Geolocation operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass-Geolocation ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass-Geolocation-Error" . "\n";
print "cli hdrrule edit pass-Geolocation-Error method ALL method-type both header-element fullheader  header Geolocation-Error operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass-Geolocation-Error ruletype DESTHDRRULE" . "\n";
print "cli hdrrule add pass-Geolocation-Routing" . "\n";
print "cli hdrrule edit pass-Geolocation-Routing method ALL method-type both header-element fullheader  header Geolocation-Routing operation PASS-VALID" . "\n";
print "cli hdrpolicy edit System_Header_Policy_Profile add pass-Geolocation-Routing ruletype DESTHDRRULE" . "\n";
echo "</textarea>" ."\n";
echo "</div> <!-- End of Right Box -->";
echo "</div> <!-- End of Wrapper -->"."\n";
echo <<<_END
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
_END;
echo "</body>"."\n";
echo "</html>"."\n";
exit;
?>
