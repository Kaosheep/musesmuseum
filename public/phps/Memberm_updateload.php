<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

try {
    require_once("./connectMuses.php");
    
    $sql = "update members set mbr_status=:statusn where mbr_id=:id";
    $members = $pdo->prepare($sql);
    $members->bindValue(":id", $_POST["id"]);
    $members->bindValue(":statusn", $_POST["statusn"]);
    $result = $members->execute();

echo ($result);
    $response = ["message" => "新增成功"];
    echo json_encode($response);
} catch (Exception $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
}
?>
