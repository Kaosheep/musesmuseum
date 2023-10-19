<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json"); 

    try {
        require_once("./connectMuses.php");

        $sql = "select * from product_orders";        
        $ords = $pdo->prepare($sql);
        
        $ords->execute();

        //如果找得資料，取回資料，送出json
        if ($ords->rowCount() === 0) {
            echo json_encode("查無資料");
        } else {
            $ordsRow = $ords->fetchAll(PDO::FETCH_ASSOC);
                        
            echo json_encode($ordsRow);//送出json字串
        }
    } catch (PDOException $e) {
        echo "錯誤行號 : ", $e->getLine(), "<br>";
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
    }
?>