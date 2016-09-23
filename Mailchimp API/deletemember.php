<?php
include('./MCwrapper3.0.php');

$MailChimp = new mailchimp('1368c595883a48e0e03f58705f9fad0c-us14');

$res = $MailChimp->DELETE_list_members_instance ("b9d31b6a55",'jordi.ruizp@gmail.com');

echo json_encode($res);
