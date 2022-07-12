<?php
$host = "localhost";
$db = "test";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

$stmt = $conn->prepare("SELECT * FROM `mapa`");
$stmt ->execute();


// $item = $stmt->fetchAll(PDO::FETCH_ASSOC);

