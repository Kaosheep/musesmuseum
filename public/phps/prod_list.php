<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");

    $data = json_decode(file_get_contents('php://input'));


    if(empty($data)){
        $sql = "SELECT * FROM products";
        $prods = $pdo->query($sql);
        $prodsRow = $prods->fetchAll(PDO::FETCH_ASSOC);
        
    }else{
        $sql = "SELECT * FROM products WHERE prods_id=:prods_id ";
        $prodStmt = $pdo->prepare($sql);
        $prodStmt->bindValue(":prods_id", $data->data->id);
        $prodStmt->execute();
        $prodsRow = $prodStmt->fetch(PDO::FETCH_ASSOC);
    }

    echo json_encode($prodsRow);
    

} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}
?>

