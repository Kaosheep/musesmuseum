<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");


try {
 require_once("./connectMuses.php");
 if($data=1){
    $sql = "update news set news_status=:status where news_id=:id";
 }


 $news = $pdo->prepare($sql);
 $news->bindValue(":status", $_POST["status"]);
 $news->bindValue(":id", $_POST["id"]);
 $news->execute();



 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";

}

?>
