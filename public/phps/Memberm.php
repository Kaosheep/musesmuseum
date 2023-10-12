<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

// session_start();
try{
    //連線
	require_once("./connectMuses.php");
    
	$sql = "SELECT * FROM members"; 
	$members = $pdo->prepare($sql);
    $members->execute();

    if ( $members->rowCount()=== 0) { 
        $result = ["error" => false, "msg" => "無資料", "members" => "{}"];
        // echo json_encode($result);
    } else { 
        $membersRows = $members->fetchAll(PDO::FETCH_ASSOC);
        $result = $membersRows;
    }
    echo json_encode($result);//送出json字串

    }catch(PDOException $e){
    echo "錯誤行號 : ", $e->getLine();
    echo "錯誤原因 : ", $e->getMessage();
}


?>  
