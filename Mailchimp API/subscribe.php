<?php
include('./MCwrapper3.0.php');

$MailChimp = new mailchimp('1368c595883a48e0e03f58705f9fad0c-us14');

$listid = "b9d31b6a55"; //Newsletter terres film festival
$status = "subscribed";

$post = file_get_contents('php://input');
$user = json_decode($post,true);

$optional_parameters = array(
  "merge_fields" => array(
    "FNAME" => $user['name'],
    "LNAME" => $user['surname'],
    "LANG" => $user['lang']
  )
);

$check = $MailChimp->GET_list_members_instance($listid, $user['mail']);

if ($check->status === 404) {
  $res = $MailChimp->PUT_list_members_instance ($listid, $user['mail'], $status, $optional_parameters);
  echo json_encode($res);
} else {
  echo $check->status; // retorna 'subscribed'
}
