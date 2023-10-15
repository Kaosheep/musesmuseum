<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

try {
	require_once("./connectMuses.php");

    $data = json_decode(file_get_contents('php://input'));

    $sql = "UPDATE product_orders SET po_status=:po_status, po_pay=:po_pay WHERE po_id=:po_id";
    $po = $pdo->prepare($sql);
    $po->bindParam(":po_id", $data->po_id);
    $po->bindParam(":po_status", $data->po_status);
    $po->bindParam(":po_pay", $data->po_pay);
    $po->execute();

    echo json_encode(['message' => '更新成功!!']);

}
catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
