<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json"); 

try {
    require_once("./connectMuses.php");
    $data = json_decode(file_get_contents('php://input'));

    if (isset($data->mbr_id)) {
        $mbr_id = $data->mbr_id;

        $sql = "SELECT * FROM ticket_orders AS tod
        JOIN ticket_details AS td ON tod.to_id = td.to_id
        JOIN tickets AS tk ON td.tkt_id = tk.tkt_id
        WHERE tod.mbr_id = :mbr_id;";

        $prods = $pdo->prepare($sql);
        $prods->bindParam(':mbr_id', $mbr_id);

        $prods->execute();
        //如果找得資料，取回資料，送出json
        if ($prods->rowCount() === 0) {
            echo "查無資料";
        } else {
            $prodRow = $prods->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($prodRow);//送出json字串
        }
    } else {
        echo "未提供 mbr_id";
    }
} catch (PDOException $e) {
    $result = ["error"=>$e->getMessage()];
    echo json_encode($result);
}

?>