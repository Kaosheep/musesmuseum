<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");
    $po_id = "PO20230002";
    $sql = "SELECT * FROM product_orders AS po
    JOIN product_details AS pd ON po.po_id = pd.po_id
    JOIN products AS p ON pd.prod_id = p.prod_id
    WHERE po.po_id = :po_id";
    
    $prods = $pdo->prepare($sql);
    $prods->bindValue(":po_id", $po_id, PDO::PARAM_STR);
    $prods->execute();
    // echo "SQL: " . $sql;
    // print_r($prods->errorInfo());
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