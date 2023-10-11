<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
    require_once("connectMuses.php");

    $data = json_decode(file_get_contents('php://input'));


    if(empty($data)){
        $sql = "select * from `manager`";
        $manager = $pdo->query($sql);
        $managerRow = $manager->fetchAll(PDO::FETCH_ASSOC);
        
    }else{
        $sql = "select * from `manager` where `ma_id` = :manager_id";
        $managertmt = $pdo->prepare($sql);
        $managertmt->bindValue(":manager_id", $data->data->id);
        $managertmt->execute();
        $managerRow = $managertmt->fetch(PDO::FETCH_ASSOC);
    }

    echo json_encode($managerRow);
    

} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>

