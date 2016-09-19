<?php
include('./MCwrapper3.0.php');

$MailChimp = new mailchimp('1368c595883a48e0e03f58705f9fad0c-us14');

$res = $MailChimp->GET_lists_collection();

// foreach ($res->lists as $l) {
//   var_dump($l);
//   echo '<br>';echo '<br>';
// }

return json_encode($res);
