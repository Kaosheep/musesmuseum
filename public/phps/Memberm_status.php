<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 


try {
require_once("./connectMuses.php");
$data = json_decode(file_get_contents('php://input'));
$type = $data->data[0]->type;

if($type == 1){
    $sql = "update members set mbr_status=1 where mbr_id=:id";
}else{
    $sql = "update members set mbr_status=0 where mbr_id=:id";
};

$idArray = array();
unset($data->data[0]);

foreach ($data->data as $item) {

    $idArray[] = $item->id;
    $members = $pdo->prepare($sql);
    $members->bindValue(":id", $item->id);
    $members->execute();

};
echo json_encode("更新成功"); 

} catch (Exception $e) {
echo "錯誤行號 : ", $e->getLine(), "<br>";
echo "錯誤原因 : ", $e->getMessage(), "<br>";

}

?>
