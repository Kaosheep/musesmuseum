<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");

    $data = json_decode(file_get_contents('php://input'));


    if(empty($data)){
        $sql = "SELECT * FROM news ORDER BY news_date DESC";
        $news = $pdo->query($sql);
        $newsRow = $news->fetchAll(PDO::FETCH_ASSOC);
        
    }else{
        $sql = "select * from `news` where `news_id` = :news_id ";
        $newStmt = $pdo->prepare($sql);
        $newStmt->bindValue(":news_id", $data->data->id);
        $newStmt->execute();
        $newsRow = $newStmt->fetch(PDO::FETCH_ASSOC);
    }

    echo json_encode($newsRow);
    

} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>

