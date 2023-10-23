<?php 
  // $dbname = "musesmuseum";
  // $user = "root";
  // $password = "";
 
  $dbname = "tibamefe_chd103g1";
  $user = "tibamefe_since2021";
  $password = "vwRBSb.j&K#E";
  $port = 3306;
  $dsn = "mysql:host=localhost;port=$port;dbname=$dbname;charset=UTF8";

  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
  $pdo = new PDO($dsn, $user, $password, $options);
?>