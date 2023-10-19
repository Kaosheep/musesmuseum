<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
try{
	require_once("./connectMuses.php");

        $po_id = $_POST["po_id"];

        $sql = "SELECT * FROM product_details 
        JOIN products ON product_details.prod_id = products.prod_id 
        JOIN product_orders ON product_details.po_id = product_orders.po_id WHERE product_orders.po_id = :po_id";
        
        $dlts = $pdo->prepare($sql);
        $dlts->bindValue(":po_id", $_POST["po_id"]);
        
        $dlts->execute();

        //如果找得資料，取回資料，送出json
        if ($dlts->rowCount() === 0) {
            echo json_encode("查無資料");
        } else {
            $dltsRow = $dlts->fetchAll(PDO::FETCH_ASSOC);
                        
            echo json_encode($dltsRow);//送出json字串
        }
    } catch (PDOException $e) {
        echo "錯誤行號 : ", $e->getLine(), "<br>";
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
    }
?>