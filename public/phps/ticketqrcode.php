<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");
    $to_id = $_GET["to_id"]; 


        $sql = "SELECT * FROM ticket_orders AS tod
        JOIN ticket_details AS td ON tod.to_id = td.to_id
        JOIN tickets AS tk ON td.tkt_id = tk.tkt_id
        WHERE tod.to_id = :to_id
        GROUP BY tod.to_id = :to_id
        ORDER BY tod.to_date DESC;";

        $prods = $pdo->prepare($sql);
        $prods->bindValue(":tkt_id", $tkt_id, PDO::PARAM_STR);
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