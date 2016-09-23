<?php
require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=test','user','pass'),
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);

Flight::route('/', function(){
    echo 'terres';
});

Flight::route('/newCompetitor', function(){
    $post = json_decode(file_get_contents('php://input'),true);
    var_dump($post);
});

Flight::start();
?>
