<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
 //連線
 require_once("./connectMuses.php");
 //準備sql
 $sql = "insert into members (mbr_email, mbr_psw, mbr_name, mbr_birth, mbr_addr, mbr_phone) values (:mbr_email, :mbr_psw, :mbr_name, :mbr_birth, :mbr_addr, :mbr_phone)";

 $mems = $pdo->prepare($sql);
 $mems->bindValue(":mbr_email", $_POST["email"]);
 $mems->bindValue(":mbr_psw", $_POST["memPsw"]);
 $mems->bindValue(":mbr_name", $_POST["name"]);
 $mems->bindValue(":mbr_birth", $_POST["birthday"]);
 $mems->bindValue(":mbr_addr", $_POST["addr"]); 
 $mems->bindValue(":mbr_phone", $_POST["phone"]);

 //執行sql
 $mems->execute();


 echo json_encode("註冊成功"); 
 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
