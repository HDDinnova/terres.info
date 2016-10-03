<?php
require 'flight/Flight.php';

$dbuser = 'zk1woweu_admin';
$dbpass = '6S8,fs)u.9Ra';

///////
// Connection to database
///////
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=zk1woweu_terres',$dbuser,$dbpass),
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);

///////
// Function to send HTML email
///////
Flight::map('htmlmail', function($name,$email,$password,$nfilms,$dni,$section){

  $adate = new DateTime();
  $ldate = new DateTime('2016-12-31');
  if ($section == 1) {
    if ($adate > $ldate) {
      $import = $nfilms * 90;
    } else {
      $import = $nfilms * 60;
    }
  } else {
    $import = $nfilms * 150;
  }

  $subject = "terres register confirmation";

  $htmlContent = '
  <html>
    <body>
      <h3>Thank you <i>'.$name.'</i></h3>
      <h4>User created successfully</h4>
      <hr>
      <p>Your personal information is:</p>
      <table style="border: 1px solid black;" cellspacing="0">
        <thead>
          <tr style="background-color: #eceff1;">
            <th style="padding: 10px;"><strong>User</strong></td>
            <th style="padding: 10px;"><strong>Password</strong></td>
            <th style="padding: 10px;"><strong>N. of films</strong></td>
            <th style="padding: 10px;"><strong>Amount</strong></td>
          </tr>
        </thead>
        <tbody>
          <tr style="">
            <td style="padding: 10px;">'.$email.'</td>
            <td style="padding: 10px;">'.$password.'</td>
            <td style="padding: 10px;">'.$nfilms.'</td>
            <td style="padding: 10px;">'.$import.'</td>
          </tr>
        </tbody>
      </table>
      <p>Your link to your personal account is <a href="http://terres.info/users/'.$dni.'">http://terres.info/users/'.$dni.'</a></p>
      <img src="http://terres.info/img/logo-terres.png" style="height: 110px" />
    </body>
  </html>';

  // Set content-type header for sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // Additional headers
  $headers .= 'From: terres International Film Festival<info@terres.info>' . "\r\n";
  $headers .= 'Bcc: info@makeinapps.com' . "\r\n";

  // Send email
  if(mail($email,$subject,$htmlContent,$headers)):
    echo 'emailOK';
  else:
    echo 'emailKO';
  endif;
});

Flight::route('/', function(){
    echo 'terres';
});

Flight::route('/newCompetitor', function(){
    $db = Flight::db();

    ///////
    // Function to generate a random password at registry
    ///////
    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    $dades = file_get_contents('php://input');
    $dades = mb_convert_encoding($dades, 'HTML-ENTITIES', "UTF-8");

    $post = json_decode($dades,true);

    ///////
    // Check if user is registered
    ///////
    $sql = "SELECT * FROM competitors WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $post['email']);
    $check->execute();
    $count = $check->rowCount();

    if ($count === 0){
      $sql = "INSERT INTO competitors(section, nfilms, fullName, comName, vat, address, zip, city, country, phone, email, date, website, facebook, password) VALUES (:section, :nfilms, :fullName, :comName, :vat, :address, :zip, :city, :country, :phone, :email, :date, :website, :facebook, :password)";

      $newpass = randomPassword();

      $new = $db->prepare($sql);
      $new->bindParam(':section', $post['section']);
      $new->bindParam(':nfilms', $post['nfilms'], PDO::PARAM_INT);
      $new->bindParam(':fullName', $post['pname']);
      $new->bindParam(':comName', $post['cname']);
      $new->bindParam(':vat', $post['vat']);
      $new->bindParam(':address', $post['address']);
      $new->bindParam(':zip', $post['zip']);
      $new->bindParam(':city', $post['city']);
      $new->bindParam(':country', $post['country']);
      $new->bindParam(':phone', $post['phone']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':date', $post['date']);
      $new->bindParam(':website', $post['web']);
      $new->bindParam(':facebook', $post['facebook']);
      $new->bindParam(':password', $newpass);

      try {
        if ($new->execute()) {
          $mail = Flight::htmlmail($post['pname'],$post['email'],$newpass,$post['nfilms'],$post['vat'],$post['section']);
          echo $mail;
        } else {
          echo false;
        }
      } catch (Exception $e) {
        echo 'Exception: ',  $e->getMessage();
      }
    } else {
      echo 'exist';
    }

    $db = NULL;

});

Flight::start();
