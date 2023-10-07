<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");

    if (isset($_POST["prod_id"])) {
        $prod_id = $_POST["prod_id"];

        $data = json_decode(file_get_contents('php://input'));

        $sql = "SELECT * FROM products WHERE prod_id=:prod_id";
        $prodStmt = $pdo->prepare($sql);

        $prodStmt->bindParam(":prod_id", $prod_id, PDO::PARAM_STR);           

        $prodStmt->execute();

        if ($districts->rowCount() === 0) {
            echo "查無資料";
        } else {
            $prodsRow = $prodStmt->fetch(PDO::FETCH_ASSOC);
                            
            echo json_encode($prodsRow);
        }
    }

} catch (PDOException $e) {
    $result = ["error" => "儲存失敗：" . $e->getMessage()];
    echo json_encode($result);
}
?>