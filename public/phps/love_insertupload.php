<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {

 require_once("./connectMuses.php");
 $mbr_id = $_POST["mbr_id"];
 $prod_id = $_POST["prod_id"];

 $sql1 = "select * from favoriteslist where mbr_id=:mbr_id";
 $lovescol= $pdo->prepare($sql1);
 $lovescol->bindValue(":mbr_id", $_POST["mbr_id"]);
 $lovescol->execute();
 $loveRows = $lovescol->fetchAll(PDO::FETCH_ASSOC);

if(in_array($prod_id, array_column($loveRows, 'prod_id'))){
    $sql3 = "DELETE FROM favoriteslist where prod_id=:prod_id and mbr_id=:mbr_id"; 
    $loves = $pdo->prepare($sql3);
    $loves->bindValue(":mbr_id", $_POST["mbr_id"]);
    $loves->bindValue(":prod_id", $_POST["prod_id"]);
    $loves->execute();
}else{
    $sql2 = "insert into favoriteslist (prod_id, mbr_id) values (:prod_id, :mbr_id	)"; 
    $loves = $pdo->prepare($sql2);
    $loves->bindValue(":mbr_id", $_POST["mbr_id"]);
    $loves->bindValue(":prod_id", $_POST["prod_id"]);
    $loves->execute();
}

}
catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
