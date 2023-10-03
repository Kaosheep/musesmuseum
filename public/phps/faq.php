<?php
// session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
try{
    //連線mysql
	require_once("./connectMuses.php");
      //準備sql指令
    $sql = "select faq_id from faq where faq_id=?"; 
    $faq = $pdo->prepare($sql);
    $faq->bindValue(1, $_GET["memId"]);
    //執行sql指令
    $faq->execute();
}


?>