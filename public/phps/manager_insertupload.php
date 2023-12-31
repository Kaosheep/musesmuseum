<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
 //連線Z
 require_once("./connectMuses.php");
    
 //準備sql
 $sql = "insert into manager (ma_id, ma_name, ma_email, ma_psw, ma_type) values (:id, :name, :email, :psw, :type)";

 $news = $pdo->prepare($sql);

 $news->bindValue(":id", $_POST["id"]);
 $news->bindValue(":name", $_POST["name"]);
 $news->bindValue(":email", $_POST["email"]);
 $news->bindValue(":psw", $_POST["psw"]);
 $news->bindValue(":type", $_POST["type"]);
 //執行sql
 $news->execute();


 echo json_encode("新增成功");


 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
