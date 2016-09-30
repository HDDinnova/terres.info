<?php
require 'flight/Flight.php';

$dbuser = 'zk1woweu_admin';
$dbpass = '6S8,fs)u.9Ra';
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=zk1woweu_terres',$dbuser,$dbpass),
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);

Flight::route('/', function(){
    echo 'terres';
});

Flight::route('/newCompetitor', function(){
    $db = Flight::db();

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

    // Primer comprovem que l'usuari no estigui registrat
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
