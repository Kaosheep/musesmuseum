<?php
// 添加新的數據到數據庫+将文件从本地计算机或设备发送到互联网或远程服务器
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

try{

 //連線
 require_once("./connectMuses.php");
 //準備sql
 $sql = "insert into faq (faq_question, faq_ans) values (:question, :ans)";

 $faq = $pdo->prepare($sql);
 $faq->bindValue(":question", $_POST["question"]);
 $faq->bindValue(":ans", $_POST["ans"]);
 //執行sql
 $faq->execute();
 $response = ["message" => "新增成功"];
 echo json_encode($response);


 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
