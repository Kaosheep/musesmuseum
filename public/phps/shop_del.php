<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 


try {
   require_once("./connectMuses.php");
   $data = json_decode(file_get_contents('php://input'));

   $sql = "DELETE FROM products WHERE prod_id=:id";
   
   foreach ($data->data as $item) {

      $idArray[] = $item->id;
      $prods = $pdo->prepare($sql);
      $prods->bindValue(":id", $item->id);
      $prods->execute();

   };
   echo json_encode("刪除成功"); 

} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";

}

?>
