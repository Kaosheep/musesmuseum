<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

    try {
        require_once("./connectMuses.php");

        $data = json_decode(file_get_contents('php://input'));

        $newOrderSql = "INSERT INTO product_orders (mbr_id, po_date, po_sum, po_addr, po_area, po_city, po_phone, po_name) VALUES (:mbr_id, :po_date, :po_sum, :po_addr, :po_area, :po_city, :po_phone, :po_name)";
        $newOrder = $pdo->prepare($newOrderSql);

        $newOrder->bindParam(':mbr_id', $data->mbr_id);
        $newOrder->bindParam(':po_date', $data->po_date);
        $newOrder->bindParam(':po_sum', $data->po_sum);
        $newOrder->bindParam(':po_addr', $data->po_addr);
        $newOrder->bindParam(':po_area', $data->po_area);
        $newOrder->bindParam(':po_city', $data->po_city);
        $newOrder->bindParam(':po_phone', $data->po_phone);
        $newOrder->bindParam(':po_name', $data->po_name);

        $newOrder->execute();

        echo json_encode(['message' => '訂單新增成功!!']);

    } catch (PDOException $e) {
        $result = ["error"=>$e->getMessage()];
        echo json_encode($result);
    }
?>


<!-- 
$newOrder->bindVaule(":mbr_id", $_POST["mbr_id"]);
$newOrder->bindVaule(":po_date", $_POST["po_date"]);
$newOrder->bindVaule(":po_sum", $_POST["po_sum"]);
$newOrder->bindVaule(":po_addr", $_POST["po_addr"]);
$newOrder->bindVaule(":po_area", $_POST["po_area"]);
$newOrder->bindVaule(":po_city", $_POST["po_city"]);
$newOrder->bindVaule(":po_phone", $_POST["po_phone"]);
$newOrder->bindVaule(":po_name", $_POST["po_name"]);
-->