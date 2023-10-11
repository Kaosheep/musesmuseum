<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
try{
	require_once("./connectMuses.php");

  $mbr_id = $_POST["mbr_id"];

  $sql = "select * from favoriteslist join products on favoriteslist.prod_id =products.prod_id where mbr_id=:mbr_id";

  $loves = $pdo->prepare($sql);
 $loves->bindValue(":mbr_id", $_POST["mbr_id"]);
  
  $loves->execute();
  if ($loves->rowCount() === 0) { //無此會員資料
      echo "{}";
    } else {
      $loveRows = $loves->fetchAll(PDO::FETCH_ASSOC);
      
      echo json_encode($loveRows);//送出json字串
    }

  
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
	  echo "錯誤原因 : ", $e->getMessage(), "<br>";
}
?>

