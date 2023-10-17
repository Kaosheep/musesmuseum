<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
    
    require_once("connectMuses.php");
   
    //$data = json_decode(file_get_contents('php://input'));
    // $pwd = md5($data->data->pwd); //md5加密,不可逆
    // $account =  $_POST["account"];
    // $pwd = $_POST["pwd"];
    $account = "money@yahoo.com";
    $pwd = 123456;
    
    $sql = "select * from `manager` where `ma_email` = :ma_email and `ma_psw` = :ma_psw";
    $managerStmt = $pdo->prepare($sql);
    $managerStmt->bindValue(":ma_email",$account);
    $managerStmt->bindValue(":ma_psw",$pwd);
    $managerStmt->execute();
    if($managerStmt->rowCount() === 0){//查無此人, 帳密錯誤
		echo json_encode(["result" => "帳密錯誤"]);
        exit;
	}

    $managerRow = $managerStmt->fetch(PDO::FETCH_ASSOC);
    session_start();
        $_SESSION["ma_id"] =  $managerRow["ma_id"];
        $_SESSION["ma_email"] =  $managerRow["ma_email"]; 
        $_SESSION["ma_name"] =  $managerRow["ma_name"]; 
    

        echo json_encode(["result" => $managerRow]);    

} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>

