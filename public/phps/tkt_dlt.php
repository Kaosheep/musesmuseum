<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
try{
	require_once("./connectMuses.php");

  $mbr_id = $_POST["mbr_id"];

  $sql = "select * from ticket_details join tickets on ticket_details.tkt_id = tickets.tkt_id join ticket_orders on ticket_details.to_id = ticket_orders.to_id where mbr_id=:mbr_id";

  $tkt_dlts = $pdo->prepare($sql);
  $tkt_dlts->bindValue(":mbr_id", $_POST["mbr_id"]);
  
  $tkt_dlts->execute();
  if ($tkt_dlts->rowCount() === 0) { //無此會員資料
      echo "{}";
    } else {
      $tkt_dltRows = $tkt_dlts->fetchAll(PDO::FETCH_ASSOC);
      
      echo json_encode($tkt_dltRows);//送出json字串
    }

  
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
	  echo "錯誤原因 : ", $e->getMessage(), "<br>";
}
?>

