<?php
$mbox = imap_open("{outlook.office365.com:993/imap/ssl/novalidate-cert}", "chicken-it@hotmail.com", "(GGt;pw*A6,![eG&")or die("Can't connect: " . imap_last_error());



//  $num = imap_num_msg($mbox);

//      if( $num >0 ) { 
//           //read that mail recently arrived 
//           echo imap_qprint(imap_body($mbox, $num)); 
//      } 
// echo "<h1>Headers in INBOX</h1>\n";
// $headers = imap_headers($mbox);


// if ($headers == false) {
//     echo "Call failed<br />\n";
// } else {
//     foreach ($headers as $val) {
//         echo $val;
//         echo "<br><br>";
//     }
// }
$MC = imap_check($mbox);
$result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
foreach ($result as $overview) {
if($overview->subject == "Welcome to your new Outlook.com account"){
var_dump($overview->msgno);
imap_delete($mbox, $overview->msgno);
}
var_dump($overview);
}



imap_close($mbox);
?>