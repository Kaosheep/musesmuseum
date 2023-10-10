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

    $id = isset($data->data->id) ? $data->data->id : '';
    $spexhiImg = $data->data->spexhiImg;
    $spexhi_startdate = $data->data->spexhi_startdate;
    $spexhi_enddate = $data->data->spexhi_enddate;
    $spexhiTitle = $data->data->spexhiTitle;
    $spexhiDesc = $data->data->spexhiDesc;
    $spexhiLoc = $data->data->spexhiLoc;

    if (empty($id)) {  
        // Insert
        $sql = "INSERT INTO spexhibitions (spexhiImg, spexhi_startdate, spexhi_enddate, spexhiTitle, spexhiDesc, spexhiLoc) VALUES (:spexhiImg, :spexhi_startdate, :spexhi_enddate, :spexhiTitle, :spexhiDesc, :spexhiLoc)";
        $newSpex = $pdo->prepare($sql);
    } else {
        // Update
        $sql = "UPDATE spexhibitions SET `spexhiImg` = :spexhiImg, `spexhi_startdate` = :spexhi_startdate, `spexhi_enddate` = :spexhi_enddate, `spexhiTitle` = :spexhiTitle, `spexhiDesc` = :spexhiDesc, `spexhiLoc` = :spexhiLoc WHERE `id` = :id";
        $newSpex = $pdo->prepare($sql);
        $newSpex->bindValue(":id", $id);
    }

    $newSpex->bindValue(":spexhiImg", $spexhiImg);
    $newSpex->bindValue(":spexhi_startdate", $spexhi_startdate);
    $newSpex->bindValue(":spexhi_enddate", $spexhi_enddate);
    $newSpex->bindValue(":spexhiTitle", $spexhiTitle);
    $newSpex->bindValue(":spexhiDesc", $spexhiDesc);
    $newSpex->bindValue(":spexhiLoc", $spexhiLoc);

    $result = $newSpex->execute();

    // 返回 JSON 響應
    $response = ["message" => "新增成功"];
    echo json_encode($response);
} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>