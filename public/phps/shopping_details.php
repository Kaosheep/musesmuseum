<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

    try {
        require_once("./connectMuses.php");

        $data = json_decode(file_get_contents('php://input'));

        $sql = "INSERT INTO product_details(prod_id, po_id, prod_dlt_actual_price, prod_dlt_qty, prod_dlt_total) VALUES (:prod_id, :po_id, :prod_dlt_actual_price, :prod_dlt_qty, :prod_dlt_total)";
        $newDetails = $pdo->prepare($sql);

        $newDetails->bindParam(':prod_id', $data->prod_id);
        $newDetails->bindParam(':po_id', $data->po_id);
        $newDetails->bindParam(':prod_dlt_actual_price', $data->prod_dlt_actual_price);
        $newDetails->bindParam(':prod_dlt_qty', $data->prod_dlt_qty);
        $newDetails->bindParam(':prod_dlt_total', $data->prod_dlt_total);

        $newDetails->execute();

        echo json_encode(['message' => '訂單明細新增成功!!']);

    } catch (PDOException $e) {
        $result = ["error"=>$e->getMessage()];
        echo json_encode($result);
    }
?>