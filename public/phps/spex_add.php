<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

try {
    $dbname = "musesmuseum";
    $user = "root";
    $password = "";
    $dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";	
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
    $pdo = new PDO($dsn, $user, $password, $options);

    $data = json_decode(file_get_contents('php://input'));


    $id = isset($data->data->id) ? $data->data->id: '';
    $title = $data->title;
    $content = $data->content;
    $status = $data->status;
    $startDate = $data->startDate;
    $endDate = $data->endDate;

    $sql = "INSERT INTO exhibitions (exhibition_id, title, content, status, start_date, end_date) VALUES (:id, :title, :content, :status, :startDate, :endDate)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":content", $content);
    $stmt->bindValue(":status", $status);
    $stmt->bindValue(":startDate", $startDate);
    $stmt->bindValue(":endDate", $endDate);

    $result = $stmt->execute();

    // 返回 JSON 響應
    $response = ["message" => $result ? "新增成功" : "新增失敗"];
    echo json_encode($response);
} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}

// Function to generate a unique exhibition ID (you may need to implement your own logic)
function generateExhibitionId() {
    return "EXH" . date("YmdHis") . rand(1000, 9999);
}
?>