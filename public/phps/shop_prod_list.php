<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json"); 

    try {
        require_once("./connectMuses.php");

        $sql = "SELECT * FROM products ORDER BY prod_id ";        
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
        echo "錯誤行號 : ", $e->getLine(), "<br>";
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
    }
?>