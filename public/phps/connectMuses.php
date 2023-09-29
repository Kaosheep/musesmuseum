<?php 
  $dbname = "musesmuseum";
  $user = "root";
  $password = "";
  $dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";	
  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
  $pdo = new PDO($dsn, $user, $password, $options);
?>