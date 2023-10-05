<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/x-www-form-urlencoded");

    try {
        require_once("./connectMuses.php");

        if (isset($_POST["mbr_id"])) {
            $mbr_id = $_POST["mbr_id"];
            $sql = "SELECT po_id FROM product_orders WHERE mbr_id=:mbr_id ORDER BY po_date DESC, po_id DESC LIMIT 1";
            $ordersID = $pdo->prepare($sql);

            $ordersID->bindParam(':mbr_id', $mbr_id, PDO::PARAM_INT);  
            
            $ordersID->execute();

            //如果找得資料，取回資料，送出json
            if ($ordersID->rowCount() === 0) {
                echo "查無資料";
            } else {
                $po_id = $ordersID->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($po_id);            
            }
        }
    } catch (PDOException $e) {
        $result = ["error"=>$e->getMessage()];
        echo json_encode($result);
    }
?>