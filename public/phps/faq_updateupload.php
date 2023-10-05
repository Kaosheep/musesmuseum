<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
 
 //連線
 require_once("./connectMuses.php");
    
 //準備sql

 $sql = "update faq set faq_question=:question, faq_ans=:ans where faq_id=:id";

 $faq= $pdo->prepare($sql);
 $faq->bindValue(":question", $_POST["question"]);
 $faq->bindValue(":ans", $_POST["ans"]);
 $faq->bindValue(":id", $_POST["id"]);

 //執行sql
 $faq->execute();



 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
