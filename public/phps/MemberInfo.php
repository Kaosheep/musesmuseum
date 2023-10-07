<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 




// session_start();
try{
        //連線
	require_once("connectMuses.php");

	//在`member`資料表 將來會有mbr_email=:有命名的參數 資料帶入
	$sql = "select * from `members` where `mbr_email` = :mbr_email"; //where mbr_email=:mbr_email
	//將sql指令編譯過
	$members = $pdo->query($sql);
    
      if (isset($_POST["mbr_email"])) {
        $mbr_email = $_POST["mbr_email"];
    } else {
        $mbr_email = ""; 
    }
    $members->bindParam(":mbr_email", $mbr_email, PDO::PARAM_STR);
    $members->execute();
 
    if ( $members->rowCount()=== 0) { 
        $result = ["error" => false, "msg" => "無資料", "members" => "{}"];
        echo json_encode($result);
      } else { 
        $membersRows = $members->fetch(PDO::FETCH_ASSOC);
        $result = [
        "error" => false, 
        "msg" => "取得資料", 
        "members" => $membersRows,
        "mbr_name" => $membersRows["mbr_name"],
        ];

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
