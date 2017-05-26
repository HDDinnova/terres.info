<?php
require 'flight/Flight.php';
require 'flight/helpers.php';
//require_once 'passwordHash.php';

$dbuser = 'zk1woweu_admin';
$dbpass = '6S8,fs)u.9Ra';

Flight::set('secret_key', '##_T3rr35DOT1nf0@%%#');

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
Flight::map('htmlmail', function($name,$email,$password){

  $subject = "terres register confirmation";

  $htmlContent = '
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="height: 100% !important; width: 100% !important; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin: 0 auto; padding: 0;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
  </head>
  <body width="100%" bgcolor="#FFFFFF" style="height: 100% !important; width: 100% !important; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin: 0 auto; padding: 0;">
    <style type="text/css">
      .button-td:hover { background: #555555 !important; border-color: #555555 !important; }
      .button-a:hover { background: #555555 !important; border-color: #555555 !important; }
    </style>
    <center style="width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
      <div style="max-width: 680px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin: auto;">
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td style="text-align: center; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 20px 0;" align="center">
            <img src="http://terres.info/img/logo-terres.png" width="200px" alt="Logo terres" border="0" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-interpolation-mode: bicubic;" />
          </td>
        </tr>
      </table>
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td bgcolor="#ffffff" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;">
            <img src="http://terres.info/img/Amp_MG_1390.jpg" width="680" height="" alt="Foto del delta del Ebro" border="0" align="center" style="width: 100% !important; max-width: 100% !important; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-interpolation-mode: bicubic; height: auto !important; margin-left: auto !important; margin-right: auto !important; background-color: #dddddd;" />
          </td>
        </tr>
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td bgcolor="#ffffff" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
              <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <td style="text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px;" align="center">
                  <h3>Hola <i>'.$name.'</i></h3>
                  <h4>Gràcies per inscriure\'t a terres Catalunya. Per acabar el procés i poder pujar les teves pel·lícules, accedeix a la <a href="http://terres.info/login">intranet</a> amb les següents dades</h4>
                </td>
              </tr>
              <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <td style="text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px;" align="center">
                  <h3>Hola <i>'.$name.'</i></h3>
                  <h4>Gracias por inscribirte en <strong>terres Catalunya</strong>.<br/>Para terminar el proceso y poder subir tus películas, accede a la <a href="http://terres.info/login">intranet</a> con los datos siguientes:</h4>
                </td>
              </tr>
              <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <td style="text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px;" align="center">
                  <h3>Welcome <i>'.$name.'</i></h3>
                  <h4>Thanks for registering at terres Catalunya. To finish the process and upload your films, please access to the <a href="http://terres.info/login">intranet</a> with the following data</h4>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td bgcolor="#ffffff" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="1px solid black" width="100%" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
              <tr>
                <td style="padding:10px;background-color: #eceff1;"><strong>USUARIO</strong></td>
                <td style="padding:10px;background-color: #eceff1;"><strong>CONTRASENYA</strong></td>
              </tr>
              <tr>
                <td style="padding:10px;">'.$email.'</td>
                <td style="padding:10px;">'.$password.'</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td bgcolor="#ffffff" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
              <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <td style="text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px;" align="center">
                  <h4>Vols assistir a terres LAB - Congrés sobre Paisatge, Turisme i Cinema? Aprofita el descompte especial del 20% en la taxa d\'inscripció a terres LAB per a tots els productors que presenten pel.lícules a terres Catalunya!<br>A la teva intranet trobaràs l’enllaç per formalitzar la inscripció.</h4>
                </td>
              </tr>
              <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <td style="text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px;" align="center">
                  <h4>¿Quieres asistir a terres LAB, Congreso sobre Paisaje, Turismo y Cine? ¡Aprovecha el descuento especial del 20% en la tasa de inscripción a terres LAB para todos los productores que presentan películas a terres Catalunya! En tu intranet encontrarás el enlace para formalizar la inscripción.</h4>
                </td>
              </tr>
              <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <td style="text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px;" align="center">
                  <h4>Do you want to assist to terres LAB - Congress on Landscape, Tourism and Cinema? Take advantage of the special 20% reduction in the registration fee of terres LAB for all the producers submitting a film in terres Catalunya! In your intranet, you’ll find the link to the registration form.</h4>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td style="width: 100%; font-size: 14px; font-family: sans-serif; mso-height-rule: exactly; line-height: 18px; text-align: center; color: #888888; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px 10px;" align="center">
            <p>¡Muchas gracias!</p>
          </td>
        </tr>
      </table>
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
          <td style="width: 100%; font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height: 18px; text-align: center; color: #888888; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 40px 10px;" align="center">
            FILMS NÒMADES GS, SL<br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" /><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">Carrer Jaume I 44 entresòl 2a, 43870 Amposta, Tarragona, Spain</span><br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" /><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">977 70 20 74</span>
          </td>
        </tr>
      </table>
      </div>
    </center>
  </body>
  </html>';

  // Set content-type header for sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // Additional headers
  $headers .= 'From: terres International Film Festival <info@terres.info>' . "\r\n";
  $headers .= 'bcc: info@makeinapps.com' . "\r\n";

  // Send email
  if(mail($email,$subject,$htmlContent,$headers)):
    echo 'emailOK';
  else:
    echo 'emailKO';
  endif;
});

///////
// Register a new competitor
///////
Flight::route('/newCompetitor', function(){
    $db = Flight::db();

    ///////
    // Function to generate a random password at registry
    ///////
    function randomPassword() {
      $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789,.()=*/@#-_{}";
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
      $sql = "INSERT INTO competitors(fullName, comName, vat, address, zip, city, country, phone, email, website, facebook, password) VALUES (:fullName, :comName, :vat, :address, :zip, :city, :country, :phone, :email, :website, :facebook, :password)";

      $newpass = randomPassword();

      $new = $db->prepare($sql);
      $new->bindParam(':fullName', $post['pname']);
      $new->bindParam(':comName', $post['cname']);
      $new->bindParam(':vat', $post['vat']);
      $new->bindParam(':address', $post['address']);
      $new->bindParam(':zip', $post['zip']);
      $new->bindParam(':city', $post['city']);
      $new->bindParam(':country', $post['country']);
      $new->bindParam(':phone', $post['phone']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':website', $post['web']);
      $new->bindParam(':facebook', $post['facebook']);
      $new->bindParam(':password', $newpass);

      try {
        if ($new->execute()) {
          $userid = $db->lastInsertId();
          switch (strval($post['valCat'])) {
            case '1':
              $sqlcat = "INSERT INTO tourism(user, nfilms, date) VALUES (:user, :nfilms, NOW())";
              $insertcat = $db->prepare($sqlcat);
              $insertcat->bindParam(':user', $userid);
              $insertcat->bindParam(':nfilms', $post['nfilms']);
              $insertcat->execute();
              break;
            case '2':
              $sqlcat = "INSERT INTO documentary(user, nfilms, date) VALUES (:user, :nfilms, NOW())";
              $insertcat = $db->prepare($sqlcat);
              $insertcat->bindParam(':user', $userid);
              $insertcat->bindParam(':nfilms', $post['nfilms']);
              $insertcat->execute();
              break;
            case '3':
              $sqlcat = "INSERT INTO corporate(user, nfilms, date) VALUES (:user, :nfilms, NOW())";
              $insertcat = $db->prepare($sqlcat);
              $insertcat->bindParam(':user', $userid);
              $insertcat->bindParam(':nfilms', $post['nfilms']);
              $insertcat->execute();
              break;
          }

          $mail = Flight::htmlmail($post['pname'],$post['email'],$newpass);
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

Flight::route('/login', function(){
  $db = Flight::db();

  $login = file_get_contents('php://input');
  $get = json_decode($login, true);

  if (isset($get['user']) AND isset($get['password'])) {
    $sql = "SELECT * FROM competitors WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $get['user']);
    //$check->bindParam(':password', $get['password']);
    $check->execute();
    $count = $check->rowCount();
    if ($count > 0) {
      $user = $check->fetch(PDO::FETCH_ASSOC);
      if ($user['firstEnter'] === '1') {
        $response["status"] = 202;
        $response["message"] = "First enter";
        Flight::json($response);
      } else {
        if (password_verify($get['password'], $user['password'])) {
          $response["status"] = 200;
          $response["message"] = "Login successful";
          $response["id"] = base64_encode($user['email']);
          Flight::json($response);
        } else {
          $response["status"] = 201;
          $response["message"] = "Bad credentials";
          Flight::json($response);
        }
      }
    } else {
      $response["status"] = 401;
      $response["message"] = "This email not exist in our database";
      Flight::json($response);
    }
  } else {
    $response["status"] = 404;
    $response["message"] = "There are no data";
    Flight::json($response);
  }

  $db = NULL;
});

Flight::route('/firstenter', function(){
  $db = Flight::db();

  $login = file_get_contents('php://input');
  $get = json_decode($login, true);

  if (isset($get['user']) AND isset($get['oldpassword'])) {
    $sql = "SELECT * FROM competitors WHERE email = :email AND password = :password LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $get['user']);
    $check->bindParam(':password', $get['oldpassword']);
    $check->execute();
    $count = $check->rowCount();
    if ($count > 0) {
      $hash = password_hash($get['newpassword'], PASSWORD_DEFAULT);
      $user = $check->fetch(PDO::FETCH_ASSOC);
      $sql_update = "UPDATE competitors SET password = :newPassword, firstEnter = 0 WHERE id = :id";
      $update = $db->prepare($sql_update);
      $update->bindParam(':newPassword', $hash);
      $update->bindParam(':id', $user['id']);
      $update->execute();
      $count = $update->rowCount();
      if ($count > 0) {
        $response["status"] = 200;
        $response["message"] = "Password successfully changed";
        $response["email"] =  base64_encode($user['email']);
      } else {
        $response["status"] = 500;
        $response["message"] = "General error, try later";
        $response["id"] = "General error, try later";
      }
    } else {
      $response["status"] = 401;
      $response["message"] = "User incorrect";
      $response["id"] = "User incorrect";
    }
  } else {
    $response["status"] = 404;
    $response["message"] = "There are no data";
    $response["id"] = "There are no data";
  }

  Flight::json($response);

  $db = NULL;
});

Flight::route('/rrss/@page', function($page){
  $db = Flight::db();

  if ($page === 'index.php') {
    $page = 'index';
  }

  $sql = "SELECT * FROM rrss WHERE page = :page";
  $info = $db->prepare($sql);
  $info->bindParam(':page', $page);
  $info->execute();
  $data = $info->fetch(PDO::FETCH_ASSOC);

  $db = NULL;

  echo '<!DOCTYPE html>
  <html>
      <head>
        <title>terres Catalunya International Eco & Tourism Film Festival</title>

        <meta name="description" content="'.$data['description'].'">
        <meta name="keywords" content="'.$data['tags'].'">
        <meta name="author" content="Filmsnòmades - terres Catalunya">

        <meta property="og:site_name" content="terres Catalunya International Eco & Tourism Film Festival"/>
        <meta property="og:url" content="'.$data['url'].'"/>
        <meta property="og:title" content="'.$data['title'].'"/>
        <meta property="og:description" content="'.utf8_encode($data['description']).'"/>
        <meta property="og:image" itemprop="image" content="'.$data['image'].'"/>
        <meta property="og:image:type" content="'.$data['imagetype'].'" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:locale" content="ca_ES" />
        <meta property="og:locale:alternate" content="es_ES" />
      </head>
      <body>
          <p>'.utf8_encode($data['description']).'</p>
          <img src="'.$data['image'].'">
      </body>
  </html>';
});

///////
// Register to terres LAB
///////
Flight::route('/regTerreslab', function(){
    $db = Flight::db();
    $data = [];

    $dades = file_get_contents('php://input');
    $dades = mb_convert_encoding($dades, 'HTML-ENTITIES', "UTF-8");

    $post = json_decode($dades,true);

    ///////
    // Check if user is registered
    ///////
    $sql = "SELECT id FROM terreslab WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $post['email']);
    $check->execute();
    $count = $check->rowCount();
    if (isset($post['matricula'])) {
      $post['matricula'] = $post['matricula']['base64'];
    } else {
      $post['matricula'] = '';
    }

    if ($count === 0){
      $sql = "INSERT INTO terreslab(nom, cognoms, email, direccio, ciutat, pais, categoria, institucio, justificant) VALUES (:nom, :cognoms, :email, :direccio, :ciutat, :pais, :categoria, :institucio, :justificant)";

      $new = $db->prepare($sql);
      $new->bindParam(':nom', $post['nom']);
      $new->bindParam(':cognoms', $post['cognoms']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':direccio', $post['direccio']);
      $new->bindParam(':ciutat', $post['city']);
      $new->bindParam(':pais', $post['country']);
      $new->bindParam(':categoria', $post['categoria']);
      $new->bindParam(':institucio', $post['institucio']);
      $new->bindParam(':justificant', $post['matricula']);

      try {
        if ($new->execute()) {
          $data['status'] = 200;
          $data['message'] = 'User created succesfully';
        } else {
          $data['status'] = 400;
          $data['message'] = 'Unknown error';
        }
      } catch (Exception $e) {
        echo 'Exception: ',  $e->getMessage();
      }
    } else {
      $data['status'] = 404;
      $data['message'] = 'User exist';
    }

    $db = NULL;

    Flight::json($data);
});

///////
// Register to Sustainable day
///////
Flight::route('/regSustain', function(){
    $db = Flight::db();
    $data = [];

    $dades = file_get_contents('php://input');
    $dades = mb_convert_encoding($dades, 'HTML-ENTITIES', "UTF-8");

    $post = json_decode($dades,true);

    ///////
    // Check if user is registered
    ///////
    $sql = "SELECT id FROM sustain WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $post['email']);
    $check->execute();
    $count = $check->rowCount();

    if ($count === 0){
      $sql = "INSERT INTO sustain(nom, cognoms, email, direccio, ciutat, pais) VALUES (:nom, :cognoms, :email, :direccio, :ciutat, :pais)";

      $new = $db->prepare($sql);
      $new->bindParam(':nom', $post['nom']);
      $new->bindParam(':cognoms', $post['cognoms']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':direccio', $post['direccio']);
      $new->bindParam(':ciutat', $post['city']);
      $new->bindParam(':pais', $post['country']);

      try {
        if ($new->execute()) {
          $data['status'] = 200;
          $data['message'] = 'User created succesfully';
        } else {
          $data['status'] = 400;
          $data['message'] = 'Unknown error';
        }
      } catch (Exception $e) {
        echo 'Exception: ',  $e->getMessage();
      }
    } else {
      $data['status'] = 404;
      $data['message'] = 'User exist';
    }

    $db = NULL;

    Flight::json($data);
});

///////
// Return number assistants to Sustainable day
///////
Flight::route('/numSustain', function(){
    $db = Flight::db();
    $data = [];

    $sql = "SELECT id FROM sustain";
    $check = $db->prepare($sql);
    $check->execute();
    $data['assistants'] = $check->rowCount();

    $db = NULL;

    Flight::json($data);
});

///////
// List all films by section
///////
Flight::route('GET /films/', function(){
  $db = Flight::db();

  $films = [];

  $sql = "SELECT title, director FROM corporatefilms ORDER BY title ASC";
  $q = $db->prepare($sql);
  $q->execute();
  $corporate = [];
  while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $corporate[] = $row;
  }

  $films['corporate'] = $corporate;

  $sql = "SELECT title, director FROM documentaryfilms ORDER BY title ASC";
  $q = $db->prepare($sql);
  $q->execute();
  $documentary = [];
  while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $documentary[] = $row;
  }

  $films['documentary'] = $documentary;

  $sql = "SELECT title, director FROM tourismfilms ORDER BY title ASC";
  $q = $db->prepare($sql);
  $q->execute();
  $tourism = [];
  while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $tourism[] = $row;
  }

  $films['tourism'] = $tourism;

  $db = NULL;

  Flight::json($films);
});

///////
// Register to sopar
///////
Flight::route('POST /sopar', function(){
    $db = Flight::db();
    $data = [];

    $dades = file_get_contents('php://input');
    $dades = mb_convert_encoding($dades, 'HTML-ENTITIES', "UTF-8");

    $post = json_decode($dades,true);

    ///////
    // Check if user is registered
    ///////
    $sql = "SELECT id FROM sopar WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $post['email']);
    $check->execute();
    $count = $check->rowCount();

    if ($count === 0){
      $sql = "INSERT INTO sopar(nom, cognoms, email, direccio, ciutat, pais) VALUES (:nom, :cognoms, :email, :direccio, :ciutat, :pais)";

      $new = $db->prepare($sql);
      $new->bindParam(':nom', $post['nom']);
      $new->bindParam(':cognoms', $post['cognoms']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':direccio', $post['direccio']);
      $new->bindParam(':ciutat', $post['city']);
      $new->bindParam(':pais', $post['country']);

      try {
        if ($new->execute()) {
          $data['status'] = 200;
          $data['message'] = 'User created succesfully';
        } else {
          $data['status'] = 400;
          $data['message'] = 'Unknown error';
        }
      } catch (Exception $e) {
        echo 'Exception: ',  $e->getMessage();
      }
    } else {
      $data['status'] = 404;
      $data['message'] = 'User exist';
    }

    $db = NULL;

    Flight::json($data);
});

///////
// Register 1 day student to terres LAB
///////
Flight::route('/regTerreslabStudent', function(){
    $db = Flight::db();
    $data = [];

    $dades = file_get_contents('php://input');
    $dades = mb_convert_encoding($dades, 'HTML-ENTITIES', "UTF-8");

    $post = json_decode($dades,true);

    ///////
    // Check if user is registered
    ///////
    $sql = "SELECT id FROM terreslab_student WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $post['email']);
    $check->execute();
    $count = $check->rowCount();

    if ($count === 0){
      $sql = "INSERT INTO terreslab_student(nom, cognoms, email, direccio, ciutat, pais, dia) VALUES (:nom, :cognoms, :email, :direccio, :ciutat, :pais, :dia)";

      $new = $db->prepare($sql);
      $new->bindParam(':nom', $post['nom']);
      $new->bindParam(':cognoms', $post['cognoms']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':direccio', $post['direccio']);
      $new->bindParam(':ciutat', $post['city']);
      $new->bindParam(':pais', $post['country']);
      $new->bindParam(':dia', $post['dia']);

      try {
        if ($new->execute()) {
          $data['status'] = 200;
          $data['message'] = 'User created succesfully';
        } else {
          $data['status'] = 400;
          $data['message'] = 'Unknown error';
        }
      } catch (Exception $e) {
        echo 'Exception: ',  $e->getMessage();
      }
    } else {
      $data['status'] = 404;
      $data['message'] = 'User exist';
    }

    $db = NULL;

    Flight::json($data);
});

///////
// Register 1 day to terres LAB
///////
Flight::route('/regTerreslabOneday', function(){
    $db = Flight::db();
    $data = [];

    $dades = file_get_contents('php://input');
    $dades = mb_convert_encoding($dades, 'HTML-ENTITIES', "UTF-8");

    $post = json_decode($dades,true);

    ///////
    // Check if user is registered
    ///////
    $sql = "SELECT id FROM terreslab_oneday WHERE email = :email LIMIT 1";
    $check = $db->prepare($sql);
    $check->bindParam(':email', $post['email']);
    $check->execute();
    $count = $check->rowCount();

    if ($count === 0){
      $sql = "INSERT INTO terreslab_oneday(nom, cognoms, email, direccio, ciutat, pais, dia) VALUES (:nom, :cognoms, :email, :direccio, :ciutat, :pais, :dia)";

      $new = $db->prepare($sql);
      $new->bindParam(':nom', $post['nom']);
      $new->bindParam(':cognoms', $post['cognoms']);
      $new->bindParam(':email', $post['email']);
      $new->bindParam(':direccio', $post['direccio']);
      $new->bindParam(':ciutat', $post['city']);
      $new->bindParam(':pais', $post['country']);
      $new->bindParam(':dia', $post['dia']);

      try {
        if ($new->execute()) {
          $data['status'] = 200;
          $data['message'] = 'User created succesfully';
        } else {
          $data['status'] = 400;
          $data['message'] = 'Unknown error';
        }
      } catch (Exception $e) {
        echo 'Exception: ',  $e->getMessage();
      }
    } else {
      $data['status'] = 404;
      $data['message'] = 'User exist';
    }

    $db = NULL;

    Flight::json($data);
});

Flight::start();
