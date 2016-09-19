<?php
include('./MCwrapper3.0.php');

$MailChimp = new mailchimp('1368c595883a48e0e03f58705f9fad0c-us14');

$name = "Newsletter terres"; //filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$reminder = "You're receiving this email because you signed up for the newsletter about terres film festival.";
$emailtype = false;
$company = "Filmsnòmades";
$address_street = "Jaume I, n.44, ent 2a";
$address_street2 = "";
$address_city = "Amposta";
$address_state = "Tarragona";
$address_zip = "43870";
$country = "ES";
$from_name = "terres Festival"; // filter_input(INPUT_GET, 'fromName', FILTER_SANITIZE_SPECIAL_CHARS);
$from_email = "festival@terres.info"; // filter_input(INPUT_GET, 'fromEmail', FILTER_SANITIZE_SPECIAL_CHARS);
$subject = "terres film festival Newsletter"; // filter_input(INPUT_GET, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
$language = "en";
$optional_parameters = array('phone' => '+34 977702074');

$res = $MailChimp->POST_lists_collection($name,$reminder,$emailtype,$company,$address_street,$address_street2,$address_city,$address_state,$address_zip,$country,$from_name, $from_email,$subject,$language,$optional_parameters);

return $res;

/*
$name,$reminder,$emailtype,$company,$address_street,$address_street2,$address_city,$address_state,$address_zip,
$country,$from_name, $from_email,$subject,$language,$optional_parameters = array()

{
  "name": "Newsletter terres",
  "contact": {
    "company": "Filmsnòmades",
    "address1": "Jaume I, n.44, ent 2a",
    "address2": "",
    "city": "Amposta",
    "state": "Tarragona",
    "zip": "43870",
    "country": "ES",
    "phone": "+34 977702074"
  },
  "permission_reminder": "You're receiving this email because you signed up for the newsletter about terres film festival.",
  "campaign_defaults": {
    "from_name": "Festival terres",
    "from_email": "festival@terres.info",
    "subject": "Newsletter terres film festival",
    "language": "en"
  },
  "email_type_option": true
}
*/
