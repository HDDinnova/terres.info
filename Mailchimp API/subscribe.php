<?php
include('./MCwrapper3.0.php');

$MailChimp = new mailchimp('1368c595883a48e0e03f58705f9fad0c-us14');

$listid = "b9d31b6a55"; //Newsletter terres film festival
$emailaddress = filter_input(INPUT_POST,'email');
$status = "subscribed";

$check = $MailChimp->GET_list_members_instance($listid, $emailaddress);

if ($check->status === 404) {
  $res = $MailChimp->PUT_list_members_instance ($listid, $emailaddress, $status, $optional_parameters = array());
  echo json_encode($res);
} else {
  echo $check->status; // retorna 'subscribed'
}
