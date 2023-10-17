<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
<<<<<<< HEAD
    require_once("./connectMuses.php");
=======
    $dbname = "musesmuseum";
    $user = "root";
    $password = "";
    $dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";	
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
    $pdo = new PDO($dsn, $user, $password, $options);
>>>>>>> Jeff_dev

    $data = json_decode(file_get_contents('php://input'));


    if(empty($data)){
<<<<<<< HEAD
        $sql = "select * from exhibitions";
=======
        $sql = "select * from `exhibitions`";
>>>>>>> Jeff_dev
        $spex = $pdo->query($sql);
        $spexRow = $spex->fetchAll(PDO::FETCH_ASSOC);
        
    }else{
        $sql = "select * from `exhibitions` where `exh_id` = :exh_id";
        $newSpex = $pdo->prepare($sql);
        $newSpex->bindValue(":exh_id", $data->data->id);
        $newSpex->execute();
        $spexRow = $newSpex->fetch(PDO::FETCH_ASSOC);
    }

<<<<<<< HEAD
    echo json_encode($spexRow);
=======
    echo json_encode($newsRow);
>>>>>>> Jeff_dev
    

} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>