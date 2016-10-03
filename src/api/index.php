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
    $import = $nfilms * 90;
  }



  $subject = "terres register confirmation";

  $htmlContent = '
    <html>
    <head>
      <img src="http://terres.info/img/terres.png" />
    </head>
    <body>
      <p>Thank you <i>'.$name.'</i></p>
      <br/>
      <p>User created successfully</p>
      <br/><br/>
      <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
        <th>
          <td>User</td>
          <td>Password</td>
          <td>N. of films</td>
          <td>Amount</td>
        </th>
        <tr>
          <td>'.$email.'</td>
          <td>'.$password.'</td>
          <td>'.$nfilms.'</td>
          <td>'.$import.'</td>
        </tr>
      </table>
      <p>Your link to your personal account is <a href="http://terres.info/users/'.$dni.'"></a></p>
    </body>
    </html>';

  // Set content-type header for sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // Additional headers
  $headers .= 'From: terres International Film Festival<info@terres.info>' . "\r\n";
  $headers .= 'Bcc: info@filmsnomades.com.com' . "\r\n";

  // Send email
  if(mail($email,$subject,$htmlContent,$headers)):
    $successMsg = 'Email has sent successfully.';
  else:
    $errorMsg = 'Email sending fail.';
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
          echo true;
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
