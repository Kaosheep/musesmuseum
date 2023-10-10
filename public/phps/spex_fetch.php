<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
try{
	require_once("./connectMuses.php");
    $sql = "select * from exhibitions order by exh_id DESC";
    $exhibitions = $pdo->query($sql);
    
    $exhibitions->execute();


    if ($exhibitions->rowCount() === 0) { //無此會員資料
        echo "{}";
      } else {
        $newRows = $exhibitions->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($newRows);//送出json字串
      }

  
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
	  echo "錯誤原因 : ", $e->getMessage(), "<br>";
}
?>