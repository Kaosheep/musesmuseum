<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

try{
  //連線mysql
  require_once("./connectMuses.php");

  //準備sql指令
  $sql = "select * from members where mbr_email = ?";
  $member = $pdo->prepare($sql);
  $member->bindValue(1, $_POST["email"]);
  $member->execute();  

  if( $member->rowCount() != 0){ 
    echo json_encode("false");
  }else{ 
    echo json_encode("true");
  } 
}catch(PDOException $e){
  echo "error";
}
?>