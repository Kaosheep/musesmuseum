<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");
    $data = json_decode(file_get_contents('php://input'));

    
    if(empty($data)){
        $sql = "select * from `faq`";
        $faq = $pdo->query($sql);
        $faqRow = $faq->fetchAll(PDO::FETCH_ASSOC);
        
    }else{
        $sql = "select * from `faq` where `faq_id` = :faq_id";
        $faqStmt = $pdo->prepare($sql);
        $faqStmt->bindValue(":faq_id", $data->data->id);
        $faqStmt->execute();
        $faqRow = $faqStmt->fetch(PDO::FETCH_ASSOC);
    }

    echo json_encode($faqRow);
    

} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>

