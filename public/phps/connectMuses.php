<?php 
  $dbname = "musesmuseum";
  $user = "root";
  $password = "";
  $dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";

  // $dbname = "tibamefe_chd103g1";
  // $user = "tibamefe_since2021";
  // $password = "vwRBSb.j&K#E";
  // $port = 3306;

  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
  $pdo = new PDO($dsn, $user, $password, $options);
?>