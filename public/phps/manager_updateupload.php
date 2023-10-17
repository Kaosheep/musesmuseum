<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

try {
    require_once("./connectMuses.php");
    
        $sql = "update manager set ma_name=:name, ma_email=:email, ma_type=:type, ma_psw=:psw where ma_id=:id";

    $news = $pdo->prepare($sql);
    $news->bindValue(":id", $_POST["id"]);
    $news->bindValue(":name", $_POST["name"]);
    $news->bindValue(":email", $_POST["email"]);
    $news->bindValue(":psw", $_POST["psw"]);
    $news->bindValue(":type", $_POST["type"]);
        
    $result = $news->execute();

    // 返回 JSON 响应
    // $response = ["message" => "新增成功"];
    echo json_encode("新增成功");
} catch (Exception $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    // 如果有需要，你可以在这里记录错误信息或提供更详细的错误信息
    // echo "系統暫時不能正常運行，請稍後再試<br>";
}
?>
