<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json"); 

    try {
        require_once("./connectMuses.php");

        $sql = "select * from products";        
        $prods = $pdo->prepare($sql);
        
        $prods->execute();

        //如果找得資料，取回資料，送出json
        if ($prods->rowCount() === 0) {
            echo "查無資料";
        } else {
            $prodRow = $prods->fetchAll(PDO::FETCH_ASSOC);
                        
            echo json_encode($prodRow);//送出json字串
        }
    } catch (PDOException $e) {
        $result = ["error"=>$e->getMessage()];
        echo json_encode($result);
    }
?>