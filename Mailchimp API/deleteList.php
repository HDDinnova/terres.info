<?php
include('./MCwrapper3.0.php');

$MailChimp = new mailchimp('1368c595883a48e0e03f58705f9fad0c-us14');

$res = $MailChimp->DELETE_lists_instance ('921e9732ec');

var_dump($res);
