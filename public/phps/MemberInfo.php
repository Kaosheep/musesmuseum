<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 




// session_start();
try{
        //連線
	require_once("./connectMuses.php");
    if (isset($_POST["mbr_id"])) {
        $mbr_id = $_POST["mbr_id"];
    } else {
        $mbr_id = ""; 
    }

	//在`member`資料表 將來會有mbr_id=:有命名的參數 資料帶入
	$sql = "SELECT * FROM members WHERE mbr_id=:mbr_id"; //where mbr_id=:mbr_id
	//將sql指令編譯過
	$members = $pdo->prepare($sql);
    

    $members->bindParam(":mbr_id", $mbr_id, PDO::PARAM_STR);
    $members->execute();

    if ( $members->rowCount()=== 0) { 
        $result = ["error" => false, "msg" => "無資料", "members" => "{}"];
        echo json_encode($result);
    } else { 
        $membersRows = $members->fetch(PDO::FETCH_ASSOC);
        $result [] = $membersRows;
        echo json_encode($result);//送出json字串
    }
	//將資料代入參數中(未知數中);


	//執行之

    // $mbrInfoArray = $members->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($mbrInfoArray);

    }catch(PDOException $e){
        echo "錯誤行號 : ", $e->getLine();
        echo "錯誤原因 : ", $e->getMessage();
}


?>  
